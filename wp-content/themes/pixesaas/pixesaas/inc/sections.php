<?php
/**
 * Flexible Content renderer + the helpers every section template part uses.
 *
 * Design rules encoded here:
 *  - A field that is empty renders nothing at all (no stray markup, no gap).
 *  - Images always go through wp_get_attachment_image() so WordPress emits
 *    srcset/sizes, and always inside a CSS aspect-ratio box so an odd upload
 *    crops instead of stretching the layout.
 *  - Every string is escaped at the point of output.
 *
 * @package PixeSaaS
 */

/**
 * Render every row of a Flexible Content field by loading one template part
 * per layout: layout `hero_showcase` => template-parts/sections/hero-showcase.php
 *
 * @param string   $field   Field name.
 * @param int|null $post_id Optional post ID.
 */
function pixesaas_render_sections( $field = 'sections', $post_id = null ) {
	if ( ! function_exists( 'have_rows' ) ) {
		pixesaas_editor_notice( __( 'Advanced Custom Fields is not active, so this page has no sections to show.', 'pixesaas' ) );

		return;
	}

	if ( ! have_rows( $field, $post_id ) ) {
		pixesaas_editor_notice( __( 'No sections yet. Edit this page and add your first section.', 'pixesaas' ) );

		return;
	}

	$index = 0;

	while ( have_rows( $field, $post_id ) ) {
		the_row();

		$layout = get_row_layout();
		$slug   = str_replace( '_', '-', $layout );
		$index++;

		$GLOBALS['pixesaas_section_index'] = $index;

		if ( ! locate_template( 'template-parts/sections/' . $slug . '.php' ) ) {
			pixesaas_editor_notice(
				sprintf(
					/* translators: %s: layout name. */
					__( 'Missing template part for the "%s" section.', 'pixesaas' ),
					$layout
				)
			);

			continue;
		}

		get_template_part( 'template-parts/sections/' . $slug );
	}

	unset( $GLOBALS['pixesaas_section_index'] );
}

/**
 * A message only logged-in editors see — visitors never get debug chrome.
 *
 * @param string $message Message.
 */
function pixesaas_editor_notice( $message ) {
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}

	printf(
		'<div class="ps-section"><div class="ps-container"><p class="ps-empty">%s</p></div></div>',
		esc_html( $message )
	);
}

/**
 * Build the class/id attributes for a section wrapper from the shared
 * background / spacing / anchor sub fields.
 *
 * @param string $modifier Block class for this layout, e.g. "ps-hero".
 * @param array  $extra    Extra classes.
 * @return string Attribute string, already escaped.
 */
function pixesaas_section_atts( $modifier = '', $extra = array() ) {
	$background = pixesaas_sub( 'background', 'white' );
	$spacing    = pixesaas_sub( 'spacing', 'default' );
	$anchor     = pixesaas_sub( 'anchor' );

	$classes = array( 'ps-section' );

	if ( 'white' !== $background ) {
		$classes[] = 'ps-section--' . sanitize_html_class( $background );
	}

	switch ( $spacing ) {
		case 'tight':
			$classes[] = 'ps-section--tight';
			break;
		case 'flush_top':
			$classes[] = 'ps-section--flush-top';
			break;
		case 'flush_bottom':
			$classes[] = 'ps-section--flush-bottom';
			break;
		case 'none':
			$classes[] = 'ps-section--flush-top';
			$classes[] = 'ps-section--flush-bottom';
			break;
	}

	if ( $modifier ) {
		$classes[] = $modifier;
	}

	$classes = array_merge( $classes, (array) $extra );
	$classes = array_filter( array_map( 'sanitize_html_class', $classes ) );

	$atts = sprintf( 'class="%s"', esc_attr( implode( ' ', $classes ) ) );

	if ( $anchor ) {
		$atts .= sprintf( ' id="%s"', esc_attr( sanitize_title( $anchor ) ) );
	}

	return $atts;
}

/**
 * get_sub_field() with a default, so template parts never juggle false/null.
 *
 * @param string $name    Sub field name.
 * @param mixed  $default Fallback.
 * @return mixed
 */
function pixesaas_sub( $name, $default = '' ) {
	if ( ! function_exists( 'get_sub_field' ) ) {
		return $default;
	}

	$value = get_sub_field( $name );

	if ( null === $value || false === $value || '' === $value || array() === $value ) {
		return $default;
	}

	return $value;
}

/**
 * Normalise an attachment reference (ID, ACF array, or URL) to an ID.
 *
 * @param mixed $image Image value.
 * @return int
 */
function pixesaas_attachment_id( $image ) {
	if ( is_array( $image ) && isset( $image['ID'] ) ) {
		return (int) $image['ID'];
	}

	if ( is_array( $image ) && isset( $image['id'] ) ) {
		return (int) $image['id'];
	}

	if ( is_numeric( $image ) ) {
		return (int) $image;
	}

	return 0;
}

/**
 * Markup for an ACF image field.
 *
 * Returns an empty string when nothing is set, so callers can branch on it and
 * skip the whole wrapper rather than printing an empty box.
 *
 * @param mixed  $image Image value.
 * @param string $size  Registered image size.
 * @param array  $attrs Extra <img> attributes.
 * @return string
 */
function pixesaas_get_image( $image, $size = 'large', $attrs = array() ) {
	$id = pixesaas_attachment_id( $image );

	if ( ! $id ) {
		return '';
	}

	$attrs = wp_parse_args(
		$attrs,
		array(
			'loading'  => 'lazy',
			'decoding' => 'async',
		)
	);

	// Vector files have no intrinsic raster size; render them directly so we
	// never emit a bogus 1x1 srcset.
	if ( 'image/svg+xml' === get_post_mime_type( $id ) ) {
		$url = wp_get_attachment_url( $id );

		if ( ! $url ) {
			return '';
		}

		$alt = get_post_meta( $id, '_wp_attachment_image_alt', true );

		if ( isset( $attrs['alt'] ) ) {
			$alt = $attrs['alt'];
			unset( $attrs['alt'] );
		}

		$out = sprintf( '<img src="%s" alt="%s"', esc_url( $url ), esc_attr( $alt ) );

		foreach ( $attrs as $key => $value ) {
			$out .= sprintf( ' %s="%s"', esc_attr( $key ), esc_attr( $value ) );
		}

		return $out . ' />';
	}

	return wp_get_attachment_image( $id, $size, false, $attrs );
}

/**
 * Echo helper for pixesaas_get_image().
 *
 * @param mixed  $image Image value.
 * @param string $size  Image size.
 * @param array  $attrs Attributes.
 */
function pixesaas_image( $image, $size = 'large', $attrs = array() ) {
	echo pixesaas_get_image( $image, $size, $attrs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper.
}

/**
 * Normalise an ACF link field.
 *
 * @param mixed  $link         Link value.
 * @param string $default_text Text to use when the editor left the label empty.
 * @return array|false { url, title, target } or false when unusable.
 */
function pixesaas_link( $link, $default_text = '' ) {
	if ( empty( $link ) ) {
		return false;
	}

	if ( is_string( $link ) ) {
		$link = array( 'url' => $link );
	}

	if ( ! is_array( $link ) || empty( $link['url'] ) ) {
		return false;
	}

	$title = isset( $link['title'] ) ? trim( $link['title'] ) : '';

	return array(
		'url'    => $link['url'],
		'title'  => '' !== $title ? $title : $default_text,
		'target' => ! empty( $link['target'] ) ? $link['target'] : '',
	);
}

/**
 * Render a button from an ACF link field.
 *
 * Skips silently when there is no URL or no label — an unlabelled button is
 * worse than no button.
 *
 * @param mixed  $link    Link value.
 * @param string $style   primary|outline|light.
 * @param array  $classes Extra classes.
 */
function pixesaas_button( $link, $style = 'primary', $classes = array() ) {
	$link = pixesaas_link( $link );

	if ( ! $link || '' === $link['title'] ) {
		return;
	}

	$classes = array_merge( array( 'ps-btn', 'ps-btn--' . $style ), (array) $classes );
	$classes = array_filter( array_map( 'sanitize_html_class', $classes ) );

	printf(
		'<a class="%1$s" href="%2$s"%3$s>%4$s</a>',
		esc_attr( implode( ' ', $classes ) ),
		esc_url( $link['url'] ),
		pixesaas_target_atts( $link['target'] ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper.
		esc_html( $link['title'] )
	);
}

/**
 * target/rel attributes for a link opened in a new tab.
 *
 * @param string $target Target value.
 * @return string
 */
function pixesaas_target_atts( $target ) {
	if ( '_blank' !== $target ) {
		return '';
	}

	return ' target="_blank" rel="noopener noreferrer"';
}

/**
 * Render a "Learn more →" style text link.
 *
 * @param mixed $link Link value.
 * @param mixed $icon Optional arrow icon (attachment ID).
 */
function pixesaas_text_link( $link, $icon = 0 ) {
	$link = pixesaas_link( $link );

	if ( ! $link || '' === $link['title'] ) {
		return;
	}

	printf(
		'<a class="ps-link" href="%1$s"%2$s>%3$s%4$s</a>',
		esc_url( $link['url'] ),
		pixesaas_target_atts( $link['target'] ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper.
		esc_html( $link['title'] ),
		pixesaas_get_image( $icon, 'full', array( 'alt' => '', 'aria-hidden' => 'true' ) ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper.
	);
}

/**
 * Render a counter (value + suffix + label) used by the stats layouts.
 *
 * @param array  $row     Repeater row with value/suffix/label keys.
 * @param string $classes Extra wrapper classes.
 */
function pixesaas_counter( $row, $classes = '' ) {
	$value  = isset( $row['value'] ) ? $row['value'] : '';
	$suffix = isset( $row['suffix'] ) ? $row['suffix'] : '';
	$label  = isset( $row['label'] ) ? $row['label'] : '';

	if ( '' === $value && '' === $label ) {
		return;
	}

	printf( '<div class="ps-counter %s">', esc_attr( $classes ) );

	if ( '' !== $value || '' !== $suffix ) {
		printf(
			'<p class="ps-counter__value">%s<span>%s</span></p>',
			esc_html( $value ),
			esc_html( $suffix )
		);
	}

	if ( '' !== $label ) {
		printf( '<span class="ps-counter__label">%s</span>', esc_html( $label ) );
	}

	echo '</div>';
}

/**
 * Section heading block (eyebrow/title/intro), shared by most layouts.
 *
 * @param array $args Arguments.
 */
function pixesaas_section_head( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'title'   => '',
			'text'    => '',
			'align'   => 'center',
			'width'   => '',
			'classes' => '',
			'tag'     => 'h2',
		)
	);

	if ( '' === $args['title'] && '' === $args['text'] ) {
		return;
	}

	$classes = array( 'ps-head' );

	if ( 'center' === $args['align'] ) {
		$classes[] = 'ps-head--center';
	}

	if ( 'wide' === $args['width'] ) {
		$classes[] = 'ps-head--wide';
	}

	if ( $args['classes'] ) {
		$classes[] = $args['classes'];
	}

	$tag = in_array( $args['tag'], array( 'h1', 'h2', 'h3' ), true ) ? $args['tag'] : 'h2';

	printf( '<div class="%s">', esc_attr( implode( ' ', $classes ) ) );

	if ( '' !== $args['title'] ) {
		printf( '<%1$s class="ps-head__title">%2$s</%1$s>', esc_html( $tag ), esc_html( $args['title'] ) );
	}

	if ( '' !== $args['text'] ) {
		printf( '<p class="ps-head__text">%s</p>', esc_html( $args['text'] ) );
	}

	echo '</div>';
}

/**
 * Trim any string to a sane card length without cutting mid-word.
 *
 * @param string $text  Source text.
 * @param int    $words Word count.
 * @return string
 */
function pixesaas_summary( $text, $words = 22 ) {
	$text = wp_strip_all_tags( (string) $text );

	if ( '' === trim( $text ) ) {
		return '';
	}

	return wp_trim_words( $text, $words, '&hellip;' );
}

/**
 * get_field() against the theme options page, with a default.
 *
 * Used by header.php and footer.php so the chrome is editable too.
 *
 * @param string $name    Field name on the options page.
 * @param mixed  $default Fallback.
 * @return mixed
 */
function pixesaas_option( $name, $default = '' ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $default;
	}

	$value = get_field( $name, 'option' );

	if ( null === $value || false === $value || '' === $value || array() === $value ) {
		return $default;
	}

	return $value;
}

/**
 * True when the current page renders its own footer band via Flexible Content.
 *
 * The footer_cta layout already prints a <footer> and the copyright bar, so
 * footer.php must not also print the default _s site-info block.
 *
 * @return bool
 */
function pixesaas_has_section_footer() {
	if ( ! is_singular() || ! function_exists( 'have_rows' ) ) {
		return false;
	}

	$post_id = get_queried_object_id();

	if ( ! $post_id || ! have_rows( 'sections', $post_id ) ) {
		return false;
	}

	$found = false;

	while ( have_rows( 'sections', $post_id ) ) {
		the_row();

		if ( 'footer_cta' === get_row_layout() ) {
			$found = true;
		}
	}

	reset_rows();

	return $found;
}
