<?php
/**
 * Generate WordPress Application Passwords and store them in the gitignored .env.
 *
 * Runs against the local WordPress install directly -- it boots core via
 * wp-load.php rather than calling the REST API. This matters: the REST endpoint
 * /wp/v2/users/me/application-passwords cannot be used to create your *first*
 * credential, because core's Basic auth handler only validates existing
 * application passwords, never the account's login password. Loading core
 * in-process sidesteps authentication entirely.
 *
 * CLI only -- no plugin, mu-plugin or hook required. Run it on demand.
 *
 * Usage (from Local's "Open site shell"):
 *   php tools/generate-app-password.php [--user=admin|all] [--name="..."] [--force] [--print-only]
 *
 * Options:
 *   --user        user_login, user_email or numeric ID, or "all" to issue a
 *                 credential for every user on the site. Default: admin.
 *   --name        label shown in Users -> Profile -> Application Passwords.
 *   --force       revoke an existing password with the same name and reissue.
 *   --print-only  print the password to stdout without touching .env.
 *   --env-prefix  override the .env key prefix. Default: derived from the user
 *                 login plus --name, so admin + "Internal_API" writes
 *                 ADMIN_INTERNAL_API_USER / ADMIN_INTERNAL_API_PASSWORD.
 *
 * Boolean flags accept an explicit value: --force, --force=1 and --force=true
 * all enable, while --force=0, --force=false, --force=no and --force=off
 * disable. A bare flag with no value means "on".
 *
 * @package practice-theme
 */

if ( 'cli' !== PHP_SAPI ) {
	http_response_code( 403 );
	exit( "This script may only be run from the command line.\n" );
}

// ---------------------------------------------------------------------------
// Configuration. No credentials live here -- core is loaded in-process, so the
// admin login password is never needed.
// ---------------------------------------------------------------------------

$options = array(
	'user'       => 'admin',
	'name'       => 'Local_API',
	'force'      => false,
	'print-only' => false,
	'env-prefix' => '',
);

// Flags that are on/off switches rather than value-carrying options. Anything
// listed here is normalised to a real boolean after parsing, so that a spelled
// out --print-only=false does not arrive as the (truthy) string "false".
$boolean_flags = array( 'force', 'print-only' );

// The .env keys are derived from the user login and --name further down, so
// that each user and each credential gets its own pair of entries. With a
// single shared key, one run would overwrite another user's password -- which
// cannot be recovered afterwards.
$url_key = 'WP_SITE_URL';

/**
 * Interpret a CLI flag value as a boolean.
 *
 * A bare flag (no "=") arrives as true. An explicit value is read the way a
 * shell user expects: only the recognised negatives turn the flag off.
 *
 * @param mixed $value Parsed flag value.
 * @return bool Whether the flag is enabled.
 */
function wp_app_password_flag_to_bool( $value ) {
	if ( is_bool( $value ) ) {
		return $value;
	}

	return ! in_array( strtolower( trim( (string) $value ) ), array( '', '0', 'false', 'no', 'off' ), true );
}

/**
 * Build a valid .env key prefix out of an arbitrary label.
 *
 * Anything not alphanumeric collapses to a single underscore, since dotenv keys
 * and shell variable names permit nothing else.
 *
 * @param string $label Raw label, e.g. "admin Internal_API".
 * @return string Upper-case prefix, or '' when nothing usable remains.
 */
function wp_app_password_env_prefix( $label ) {
	$prefix = strtoupper( trim( preg_replace( '/[^A-Za-z0-9]+/', '_', $label ), '_' ) );

	if ( '' === $prefix || preg_match( '/^[0-9]/', $prefix ) ) {
		return '';
	}

	return $prefix;
}

/**
 * Merge key/value pairs into the .env file, preserving unrelated keys.
 *
 * Existing keys are overwritten in place, so revoking and reissuing a password
 * replaces the stale value instead of appending a duplicate entry.
 *
 * @param string $env_file Absolute path to the .env file.
 * @param array  $values   Map of key => value to write.
 * @return bool True when the file was written.
 */
function wp_app_password_write_env( $env_file, array $values ) {
	$lines = file_exists( $env_file )
		? file( $env_file, FILE_IGNORE_NEW_LINES )
		: array( '# Local dev only. Gitignored -- never commit real credentials.' );

	foreach ( $values as $key => $value ) {
		$replaced = false;

		foreach ( $lines as $index => $line ) {
			if ( preg_match( '/^\s*' . preg_quote( $key, '/' ) . '\s*=/', $line ) ) {
				$lines[ $index ] = $key . '="' . $value . '"';
				$replaced        = true;
				break;
			}
		}

		if ( ! $replaced ) {
			$lines[] = $key . '="' . $value . '"';
		}
	}

	// FILE WRITE: credentials land in the gitignored .env at the site root.
	return false !== file_put_contents( $env_file, implode( "\n", $lines ) . "\n" );
}

// ---------------------------------------------------------------------------
// Argument parsing.
// ---------------------------------------------------------------------------

foreach ( array_slice( $argv, 1 ) as $argument ) {
	// Accept CLI flags and inspect its format like --user=admin, --name=local-api, or bare --force.
	if ( preg_match( '/^--([a-z-]+)(?:=(.*))?$/', $argument, $matches ) ) {
		$key = $matches[1];

		if ( ! array_key_exists( $key, $options ) ) {
			exit( "Unknown option: {$argument}\n" );
		}

		$options[ $key ] = isset( $matches[2] ) ? $matches[2] : true;
	}
}

foreach ( $boolean_flags as $flag ) {
	$options[ $flag ] = wp_app_password_flag_to_bool( $options[ $flag ] );
}

// ---------------------------------------------------------------------------
// Bootstrap WordPress.
// ---------------------------------------------------------------------------

$site_root = dirname( __DIR__ );
$wp_load   = $site_root . '/wp-load.php';
$env_file  = $site_root . '/.env';

//Needs wp_load file to load WordPress and use the Application Passwords API.
if ( ! file_exists( $wp_load ) ) {
	exit( "Could not find wp-load.php at {$wp_load}.\n" );
}

define( 'WP_USE_THEMES', false );

require_once $wp_load;

//Check if the Application Passwords class exists and if Application Passwords are available on this site.
if ( ! class_exists( 'WP_Application_Passwords' ) ) {
	exit( "Application Passwords require WordPress 5.6 or newer.\n" );
}

if ( ! wp_is_application_passwords_available() ) {
	exit( "Application Passwords are disabled on this site (check the 'wp_is_application_passwords_available' filter).\n" );
}

// ---------------------------------------------------------------------------
// Resolve the target user(s). "--user=all" covers every account on the site, so
// a single run can populate .env for everyone.
// ---------------------------------------------------------------------------

$identifier = $options['user'];

if ( 'all' === strtolower( (string) $identifier ) ) {
	$users = get_users( array( 'orderby' => 'ID' ) );

	if ( empty( $users ) ) {
		exit( "No users found on this site.\n" );
	}
} else {
	//Allows the user to be specified by user_login, user_email, or numeric ID. Defaults to 'admin'.
	if ( is_numeric( $identifier ) ) {
		$user = get_user_by( 'id', (int) $identifier );
	} elseif ( is_email( $identifier ) ) {
		$user = get_user_by( 'email', $identifier );
	} else {
		$user = get_user_by( 'login', $identifier );
	}

	if ( ! $user instanceof WP_User ) {
		exit( "No user found matching '{$identifier}'.\n" );
	}

	$users = array( $user );
}

// In multi-user mode a problem with one account must not abort the whole run,
// so failures are reported and skipped instead of exiting.
$multiple = count( $users ) > 1;

// ---------------------------------------------------------------------------
// Issue a credential per user and collect the resulting .env entries.
// ---------------------------------------------------------------------------

$values          = array( $url_key => untrailingslashit( home_url() ) );
$verify_commands = array();

foreach ( $users as $user ) {
	if ( ! wp_is_application_passwords_available_for_user( $user ) ) {
		$message = "Application Passwords are not available for user '{$user->user_login}'.\n";

		if ( ! $multiple ) {
			exit( $message );
		}

		echo 'Skipped: ' . $message;
		continue;
	}

	// The .env key must be unique per user, otherwise a second user's password
	// would overwrite the first one's entry. An explicit --env-prefix only
	// makes sense for a single user, so it is ignored in "all" mode.
	$label  = ( '' !== $options['env-prefix'] && ! $multiple )
		? $options['env-prefix']
		: $user->user_login . '_' . $options['name'];
	$prefix = wp_app_password_env_prefix( $label );

	if ( '' === $prefix ) {
		$message = "Could not derive a valid .env key for '{$user->user_login}' / '{$options['name']}'. Pass --env-prefix=SOME_NAME.\n";

		if ( ! $multiple ) {
			exit( $message );
		}

		echo 'Skipped: ' . $message;
		continue;
	}

	// -----------------------------------------------------------------------
	// Revoke a same-named password first, so repeat runs stay idempotent.
	// -----------------------------------------------------------------------

	$existing = WP_Application_Passwords::get_user_application_passwords( $user->ID );
	$conflict = false;

	foreach ( $existing as $item ) {
		if ( $item['name'] !== $options['name'] ) {
			continue;
		}

		if ( ! $options['force'] ) {
			$conflict = true;
			break;
		}

		WP_Application_Passwords::delete_application_password( $user->ID, $item['uuid'] );
		echo "Revoked existing password '{$options['name']}' for {$user->user_login}.\n";
	}

	if ( $conflict ) {
		$message =
			"A password named '{$options['name']}' already exists for {$user->user_login}.\n" .
			"The plaintext value is only shown at creation time and cannot be recovered.\n" .
			"Re-run with --force to revoke it and issue a replacement.\n";

		if ( ! $multiple ) {
			exit( $message );
		}

		echo 'Skipped: ' . $message;
		continue;
	}

	// -----------------------------------------------------------------------
	// Create the password. This is the only moment the plaintext value exists.
	// -----------------------------------------------------------------------

	$created = WP_Application_Passwords::create_new_application_password(
		$user->ID,
		array( 'name' => $options['name'] )
	);

	if ( is_wp_error( $created ) ) {
		$message = "Failed to create the application password for {$user->user_login}: " . $created->get_error_message() . "\n";

		if ( ! $multiple ) {
			exit( $message );
		}

		echo 'Skipped: ' . $message;
		continue;
	}

	list( $password ) = $created;

	echo "Created application password '{$options['name']}' for {$user->user_login}.\n";

	if ( $options['print-only'] ) {
		echo $user->user_login . ': ' . $password . "\n";
		continue;
	}

	$values[ $prefix . '_USER' ]     = $user->user_login;
	$values[ $prefix . '_PASSWORD' ] = $password;

	$verify_commands[] = '  curl -u "' . $user->user_login . ':' . $password . '" ' . untrailingslashit( home_url() ) . '/wp-json/wp/v2/users/me';
}

// ---------------------------------------------------------------------------
// Write the credentials into .env, preserving any unrelated keys.
// ---------------------------------------------------------------------------

if ( $options['print-only'] ) {
	exit( 0 );
}

// Only the site URL is present, so nothing was actually issued this run.
if ( 1 === count( $values ) ) {
	exit( "No credentials were issued, so {$env_file} was left unchanged.\n" );
}

if ( ! wp_app_password_write_env( $env_file, $values ) ) {
	echo "Created the password(s) but could not write to {$env_file}. Values:\n";

	foreach ( $values as $key => $value ) {
		echo "  {$key}=\"{$value}\"\n";
	}

	exit( 1 );
}

echo "\nWrote " . implode( ', ', array_keys( $values ) ) . " to {$env_file}.\n";
echo "\nVerify with:\n";
echo implode( "\n", $verify_commands ) . "\n";
