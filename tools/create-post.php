<?php
/**
 * Create a WordPress post through the REST API.
 *
 * The site URL and username live in this file as configuration; the
 * application password is read from LOCAL_API_PASSWORD in the gitignored .env
 * at the site root, so no secret is ever stored here. Values found in .env
 * (WP_SITE_URL, LOCAL_API_USER) take precedence over the defaults below.
 *
 * Unlike tools/generate-app-password.php this script does NOT boot WordPress:
 * it talks to the public REST endpoint over HTTP with Basic auth, exactly the
 * way an external integration would, which is the behaviour being exercised.
 *
 * Usage (from Local's "Open site shell"):
 *   php tools/create-post.php "<title>" "<content>" [status]
 *
 * Arguments:
 *   title    Required. The post title.
 *   content  Required. The post body.
 *   status   Optional. publish (default) | draft | pending | private | future.
 *
 * The file is also safe to require: the CLI block only runs when the script is
 * executed directly, so wp_create_post_via_rest() can be reused elsewhere.
 *
 * @package practice-theme
 */

// ---------------------------------------------------------------------------
// Configuration. Used as fallbacks when the matching .env key is absent.
// ---------------------------------------------------------------------------

const WP_CREATE_POST_DEFAULT_URL      = 'http://admin.local';
const WP_CREATE_POST_DEFAULT_USER     = 'admin';
const WP_CREATE_POST_PASSWORD_ENV_KEY = 'LOCAL_API_PASSWORD';
const WP_CREATE_POST_DEFAULT_STATUS   = 'publish';

// ---------------------------------------------------------------------------
// Helpers.
// ---------------------------------------------------------------------------

/**
 * Parse a dotenv-style file into a key => value map.
 *
 * Only the minimal subset needed here is supported: KEY=value lines, optional
 * surrounding single or double quotes, and # comments. No variable expansion.
 *
 * @param string $env_file Absolute path to the .env file.
 * @return array<string,string> Parsed values, empty when the file is missing.
 */
function wp_create_post_read_env( $env_file ) {
	$values = array();

	if ( ! is_readable( $env_file ) ) {
		return $values;
	}

	foreach ( file( $env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES ) as $line ) {
		$line = trim( $line );

		if ( '' === $line || '#' === $line[0] || false === strpos( $line, '=' ) ) {
			continue;
		}

		list( $key, $value ) = explode( '=', $line, 2 );

		$key   = trim( $key );
		$value = trim( $value );

		// Strip one matching pair of surrounding quotes, if present.
		if ( strlen( $value ) > 1 && ( '"' === $value[0] || "'" === $value[0] ) && substr( $value, -1 ) === $value[0] ) {
			$value = substr( $value, 1, -1 );
		}

		$values[ $key ] = $value;
	}

	return $values;
}

/**
 * Send a JSON POST request with HTTP Basic auth.
 *
 * Uses the cURL extension when it is available and falls back to a stream
 * context otherwise: Local's bundled PHP ships with cURL, but a bare PHP on
 * PATH often does not, and the script should run under either.
 *
 * @param string $endpoint Absolute URL to POST to.
 * @param string $payload  Raw JSON request body.
 * @param string $username Basic auth username.
 * @param string $password Basic auth password (application password).
 * @return array{code:int,body:string,error:string} Status code, raw body and transport error.
 */
function wp_create_post_http_post( $endpoint, $payload, $username, $password ) {
	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic ' . base64_encode( $username . ':' . $password ),
	);

	if ( function_exists( 'curl_init' ) ) {
		$handle = curl_init( $endpoint );

		curl_setopt_array(
			$handle,
			array(
				CURLOPT_POST           => true,
				CURLOPT_POSTFIELDS     => $payload,
				CURLOPT_HTTPHEADER     => $headers,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_TIMEOUT        => 30,
			)
		);

		$raw_body   = curl_exec( $handle );
		$http_code  = (int) curl_getinfo( $handle, CURLINFO_HTTP_CODE );
		$curl_error = curl_error( $handle );

		curl_close( $handle );

		return array(
			'code'  => $http_code,
			'body'  => false === $raw_body ? '' : $raw_body,
			'error' => false === $raw_body ? $curl_error : '',
		);
	}

	// Stream fallback. ignore_errors keeps the body readable on 4xx/5xx
	// responses, which is where the REST API puts its error messages.
	$context = stream_context_create(
		array(
			'http' => array(
				'method'        => 'POST',
				'header'        => implode( "\r\n", $headers ),
				'content'       => $payload,
				'timeout'       => 30,
				'ignore_errors' => true,
			),
		)
	);

	$raw_body = @file_get_contents( $endpoint, false, $context );

	if ( false === $raw_body ) {
		$last_error = error_get_last();

		return array(
			'code'  => 0,
			'body'  => '',
			'error' => isset( $last_error['message'] ) ? $last_error['message'] : 'unknown transport error',
		);
	}

	// $http_response_header is populated by the stream wrapper in this scope.
	$http_code = 0;

	if ( isset( $http_response_header[0] ) && preg_match( '#\s(\d{3})\s#', $http_response_header[0], $matches ) ) {
		$http_code = (int) $matches[1];
	}

	return array(
		'code'  => $http_code,
		'body'  => $raw_body,
		'error' => '',
	);
}

/**
 * POST a new post to the WordPress REST API.
 *
 * @param string $title   Post title. Required, must not be empty.
 * @param string $content Post body. Required, must not be empty.
 * @param string $status  Post status. Defaults to 'publish'.
 * @param array  $config  Optional overrides: site_url, username, password.
 * @return array{ok:bool,code:int,body:mixed,error:string} Result of the call.
 */
function wp_create_post_via_rest( $title, $content, $status = WP_CREATE_POST_DEFAULT_STATUS, array $config = array() ) {
	$site_root = dirname( __DIR__ );
	$env       = wp_create_post_read_env( $site_root . '/.env' );

	$site_url = isset( $config['site_url'] ) ? $config['site_url']
		: ( isset( $env['WP_SITE_URL'] ) ? $env['WP_SITE_URL'] : WP_CREATE_POST_DEFAULT_URL );

	$username = isset( $config['username'] ) ? $config['username']
		: ( isset( $env['LOCAL_API_USER'] ) ? $env['LOCAL_API_USER'] : WP_CREATE_POST_DEFAULT_USER );

	$password = isset( $config['password'] ) ? $config['password']
		: ( isset( $env[ WP_CREATE_POST_PASSWORD_ENV_KEY ] ) ? $env[ WP_CREATE_POST_PASSWORD_ENV_KEY ] : '' );

	if ( '' === $password ) {
		return array(
			'ok'    => false,
			'code'  => 0,
			'body'  => '',
			'error' => WP_CREATE_POST_PASSWORD_ENV_KEY . " is not set in {$site_root}/.env. Run tools/generate-app-password.php first.",
		);
	}

	$endpoint = rtrim( $site_url, '/' ) . '/wp-json/wp/v2/posts';

	// Data transform: the three arguments become the REST request body.
	// JSON_UNESCAPED_UNICODE keeps accented characters intact; the API rejects
	// malformed UTF-8 outright, so the input must already be valid UTF-8.
	$payload = json_encode(
		array(
			'title'   => $title,
			'content' => $content,
			'status'  => $status,
		),
		JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
	);

	if ( false === $payload ) {
		return array(
			'ok'    => false,
			'code'  => 0,
			'body'  => '',
			'error' => 'Could not encode the payload as JSON (the title or content is not valid UTF-8).',
		);
	}

	// API call: POST /wp/v2/posts with HTTP Basic auth (application password).
	$response = wp_create_post_http_post( $endpoint, $payload, $username, $password );

	if ( '' !== $response['error'] ) {
		return array(
			'ok'    => false,
			'code'  => 0,
			'body'  => '',
			'error' => "Request to {$endpoint} failed: {$response['error']}",
		);
	}

	$raw_body  = $response['body'];
	$http_code = $response['code'];

	$decoded = json_decode( $raw_body, true );

	return array(
		'ok'    => 201 === $http_code,
		'code'  => $http_code,
		'body'  => null === $decoded ? $raw_body : $decoded,
		'error' => 201 === $http_code ? '' : "The REST API returned HTTP {$http_code}.",
	);
}

// ---------------------------------------------------------------------------
// CLI entry point. Skipped when this file is required from other code.
// ---------------------------------------------------------------------------

if ( 'cli' !== PHP_SAPI ) {
	http_response_code( 403 );
	exit( "This script may only be run from the command line.\n" );
}

if ( ! isset( $_SERVER['SCRIPT_FILENAME'] ) || realpath( __FILE__ ) !== realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
	return;
}

$arguments = array_slice( $argv, 1 );

// Title and content are required and have no defaults; status falls back to
// 'publish' so the common case needs only two arguments.
if ( count( $arguments ) < 2 || '' === trim( $arguments[0] ) || '' === trim( $arguments[1] ) ) {
	fwrite( STDERR, "Usage: php tools/create-post.php \"<title>\" \"<content>\" [status]\n" );
	fwrite( STDERR, "  title and content are required; status defaults to '" . WP_CREATE_POST_DEFAULT_STATUS . "'.\n" );
	exit( 1 );
}

$title   = $arguments[0];
$content = $arguments[1];
$status  = isset( $arguments[2] ) && '' !== $arguments[2] ? $arguments[2] : WP_CREATE_POST_DEFAULT_STATUS;

echo "Creating post \"{$title}\" with status '{$status}'...\n";

$result = wp_create_post_via_rest( $title, $content, $status );

if ( ! $result['ok'] ) {
	fwrite( STDERR, $result['error'] . "\n" );

	if ( is_array( $result['body'] ) && isset( $result['body']['message'] ) ) {
		fwrite( STDERR, $result['body']['message'] . "\n" );
	} elseif ( '' !== $result['body'] ) {
		fwrite( STDERR, print_r( $result['body'], true ) . "\n" );
	}

	exit( 1 );
}

$post = $result['body'];

echo "Created post ID {$post['id']}.\n";
echo "Link: {$post['link']}\n";
