<?php
/**
 * Section layout: stats_media
 *
 * @package PixeSaaS
 */

$ps_heading = pixesaas_sub( 'heading' );
$ps_text    = pixesaas_sub( 'text' );
$ps_button  = pixesaas_sub( 'button' );
$ps_image   = pixesaas_sub( 'image' );
$ps_stats   = pixesaas_sub( 'stats', array() );

if ( '' === $ps_heading && '' === $ps_text && ! $ps_image && empty( $ps_stats ) ) {
	return;
}
?>
<section <?php echo pixesaas_section_atts( 'ps-statsmedia' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container ps-statsmedia__inner">

		<div class="ps-statsmedia__content">
			<?php if ( '' !== $ps_heading ) : ?>
				<h2 class="ps-statsmedia__title"><?php echo esc_html( $ps_heading ); ?></h2>
			<?php endif; ?>

			<?php if ( '' !== $ps_text ) : ?>
				<p class="ps-statsmedia__text"><?php echo esc_html( $ps_text ); ?></p>
			<?php endif; ?>

			<?php if ( pixesaas_link( $ps_button ) ) : ?>
				<div class="ps-actions"><?php pixesaas_button( $ps_button ); ?></div>
			<?php endif; ?>
		</div>

		<?php if ( $ps_image || ! empty( $ps_stats ) ) : ?>
			<div class="ps-statsmedia__media">

				<?php if ( $ps_image ) : ?>
					<div class="ps-statsmedia__image">
						<?php pixesaas_image( $ps_image, 'large' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $ps_stats ) ) : ?>
					<div class="ps-statsmedia__stats">
						<?php
						$ps_total = count( $ps_stats );

						foreach ( $ps_stats as $ps_index => $ps_stat ) {
							pixesaas_counter( $ps_stat );

							if ( $ps_index < $ps_total - 1 ) {
								echo '<span class="ps-statsmedia__stats-divider" aria-hidden="true"></span>';
							}
						}
						?>
					</div>
				<?php endif; ?>

			</div>
		<?php endif; ?>

	</div>
</section>
