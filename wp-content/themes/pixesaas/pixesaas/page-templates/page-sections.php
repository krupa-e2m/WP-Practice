<?php
/**
 * Template Name: Page sections (Flexible)
 * Template Post Type: page
 *
 * Renders a page entirely from the ACF Flexible Content field `sections`.
 * Each layout maps to one template part in template-parts/sections/ and one
 * SCSS partial in sass/sections/.
 *
 * @package PixeSaaS
 */

get_header();
?>

	<main id="primary" class="site-main ps-page">
		<?php
		while ( have_posts() ) :
			the_post();

			pixesaas_render_sections();

		endwhile;
		?>
	</main><!-- #primary -->

<?php
get_footer();
