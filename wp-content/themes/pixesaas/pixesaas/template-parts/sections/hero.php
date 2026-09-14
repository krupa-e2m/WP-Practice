<?php
/**
 * Section layout: hero
 *
 * @package PixeSaaS
 */

$ps_heading = pixesaas_sub( 'heading' );
$ps_text    = pixesaas_sub( 'text' );
$ps_buttons = pixesaas_sub( 'buttons', array() );

if ( '' === $ps_heading && '' === $ps_text && empty( $ps_buttons ) ) {
	return;
}
?>
<section <?php echo pixesaas_section_atts( 'ps-hero' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container ps-hero__inner">

		<?php if ( '' !== $ps_heading ) : ?>
			<h1 class="ps-hero__title"><?php echo esc_html( $ps_heading ); ?></h1>
		<?php endif; ?>

		<?php if ( '' !== $ps_text ) : ?>
			<p class="ps-hero__text"><?php echo esc_html( $ps_text ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $ps_buttons ) ) : ?>
			<div class="ps-actions ps-actions--center">
				<?php
				foreach ( $ps_buttons as $ps_button ) {
					pixesaas_button(
						isset( $ps_button['link'] ) ? $ps_button['link'] : false,
						isset( $ps_button['style'] ) ? $ps_button['style'] : 'primary',
						array( 'ps-btn--lg' )
					);
				}
				?>
			</div>
		<?php endif; ?>

	</div>
</section>
