<?php
/**
 * The template for displaying the footer
 *
 * Pages built with the Flexible Content template supply their own footer band
 * (the `footer_cta` layout), so the default _s site-info block is skipped for
 * them and only the wrapper is closed.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PixeSaaS
 */

if ( ! pixesaas_has_section_footer() ) :
	?>
	<footer id="colophon" class="site-footer">
		<div class="ps-container site-info">
			<?php
			$pixesaas_copyright = pixesaas_option( 'footer_copyright' );

			if ( '' !== $pixesaas_copyright ) {
				echo '<p>' . esc_html( $pixesaas_copyright ) . '</p>';
			} else {
				printf(
					'<p>&copy; %1$s %2$s</p>',
					esc_html( gmdate( 'Y' ) ),
					esc_html( get_bloginfo( 'name' ) )
				);
			}
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php
endif;
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
