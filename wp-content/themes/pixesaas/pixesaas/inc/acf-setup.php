<?php
/**
 * ACF wiring: Local JSON, the options page, and SVG support for icon uploads.
 *
 * @package PixeSaaS
 */

/**
 * Keep Local JSON inside the theme.
 *
 * ACF already defaults to `acf-json/` in the active theme; declaring both paths
 * explicitly means the theme still owns its field groups if a child theme or a
 * plugin moves the default.
 *
 * @param string $path Save path.
 * @return string
 */
function pixesaas_acf_json_save_point( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'pixesaas_acf_json_save_point' );

/**
 * Register the theme's JSON folder as a load point.
 *
 * @param array $paths Load paths.
 * @return array
 */
function pixesaas_acf_json_load_point( $paths ) {
	$paths[] = get_template_directory() . '/acf-json';

	return array_unique( $paths );
}
add_filter( 'acf/settings/load_json', 'pixesaas_acf_json_load_point' );

/**
 * Site-wide options page (header branding and buttons).
 */
function pixesaas_acf_options_page() {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

	acf_add_options_page(
		array(
			'page_title' => __( 'PixeSaaS settings', 'pixesaas' ),
			'menu_title' => __( 'PixeSaaS', 'pixesaas' ),
			'menu_slug'  => 'pixesaas-settings',
			'capability' => 'edit_theme_options',
			'redirect'   => false,
			'icon_url'   => 'dashicons-superhero-alt',
			'position'   => 59,
		)
	);
}
add_action( 'acf/init', 'pixesaas_acf_options_page' );

/**
 * Admin notice when ACF is missing — the page template depends on it.
 */
function pixesaas_acf_missing_notice() {
	if ( function_exists( 'get_field' ) || ! current_user_can( 'activate_plugins' ) ) {
		return;
	}

	printf(
		'<div class="notice notice-error"><p>%s</p></div>',
		esc_html__( 'PixeSaaS needs Advanced Custom Fields (Pro) to build page sections. Activate ACF to edit page content.', 'pixesaas' )
	);
}
add_action( 'admin_notices', 'pixesaas_acf_missing_notice' );

/**
 * Allow SVG uploads so the exported Figma icons can live in the Media Library
 * and stay editable from wp-admin.
 *
 * Restricted to users who can already install plugins/themes (i.e. people who
 * can run arbitrary code anyway), and every upload is screened by
 * pixesaas_screen_svg_upload() below.
 *
 * @param array $mimes Allowed mime types.
 * @return array
 */
function pixesaas_allow_svg_uploads( $mimes ) {
	if ( current_user_can( 'unfiltered_html' ) ) {
		$mimes['svg']  = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';
	}

	return $mimes;
}
add_filter( 'upload_mimes', 'pixesaas_allow_svg_uploads' );

/**
 * WordPress sniffs file contents and rejects SVGs without this correction.
 *
 * @param array  $data     File data.
 * @param string $file     Full path.
 * @param string $filename File name.
 * @param array  $mimes    Allowed mimes.
 * @return array
 */
function pixesaas_fix_svg_filetype( $data, $file, $filename, $mimes ) {
	if ( ! empty( $data['ext'] ) && ! empty( $data['type'] ) ) {
		return $data;
	}

	if ( preg_match( '/\.svgz?$/i', $filename ) && current_user_can( 'unfiltered_html' ) ) {
		$data['ext']  = 'svg';
		$data['type'] = 'image/svg+xml';
	}

	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'pixesaas_fix_svg_filetype', 10, 4 );

/**
 * Reject SVGs carrying script payloads.
 *
 * This is a deliberately blunt screen, not a full sanitiser: it blocks the
 * obvious active-content vectors and leaves everything else to the fact that
 * only trusted, code-capable users may upload SVG at all.
 *
 * @param array $file Uploaded file array.
 * @return array
 */
function pixesaas_screen_svg_upload( $file ) {
	if ( empty( $file['tmp_name'] ) || empty( $file['type'] ) || 'image/svg+xml' !== $file['type'] ) {
		return $file;
	}

	$contents = file_get_contents( $file['tmp_name'] ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

	if ( false === $contents ) {
		$file['error'] = __( 'Could not read the SVG file.', 'pixesaas' );

		return $file;
	}

	$blocked = array( '<script', '<foreignobject', 'javascript:', '<!entity', '<iframe', '<embed' );
	$haystack = strtolower( $contents );

	foreach ( $blocked as $needle ) {
		if ( false !== strpos( $haystack, $needle ) ) {
			$file['error'] = __( 'This SVG contains active content and was rejected.', 'pixesaas' );

			return $file;
		}
	}

	if ( preg_match( '/\son\w+\s*=/i', $contents ) ) {
		$file['error'] = __( 'This SVG contains event handlers and was rejected.', 'pixesaas' );
	}

	return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'pixesaas_screen_svg_upload' );

/**
 * Give SVGs a usable size in the media modal and in the editor.
 *
 * @param array|false  $image         Image data.
 * @param int          $attachment_id Attachment ID.
 * @param string|array $size          Requested size.
 * @return array|false
 */
function pixesaas_svg_image_size( $image, $attachment_id, $size ) {
	if ( 'image/svg+xml' !== get_post_mime_type( $attachment_id ) ) {
		return $image;
	}

	return array( wp_get_attachment_url( $attachment_id ), 60, 60, false );
}
add_filter( 'wp_get_attachment_image_src', 'pixesaas_svg_image_size', 10, 3 );
