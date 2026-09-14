<?php
/**
 * Section layout: logo_wall
 *
 * @package PixeSaaS
 */

$ps_heading = pixesaas_sub( 'heading' );
$ps_logos   = pixesaas_sub( 'logos', array() );

if ( '' === $ps_heading && empty( $ps_logos ) ) {
	return;
}
?>
<section <?php echo pixesaas_section_atts( 'ps-logowall' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container">

		<?php
		pixesaas_section_head(
			array(
				'title'   => $ps_heading,
				'align'   => 'center',
				'classes' => 'ps-logowall__head',
			)
		);
		?>

		<?php if ( ! empty( $ps_logos ) ) : ?>
			<div class="ps-logowall__grid">
				<?php
				foreach ( $ps_logos as $ps_logo ) :
					$ps_image = isset( $ps_logo['image'] ) ? $ps_logo['image'] : 0;

					if ( ! pixesaas_attachment_id( $ps_image ) ) {
						continue;
					}

					$ps_link = pixesaas_link( isset( $ps_logo['link'] ) ? $ps_logo['link'] : false );

					if ( $ps_link ) :
						?>
						<a class="ps-logowall__item" href="<?php echo esc_url( $ps_link['url'] ); ?>"<?php echo pixesaas_target_atts( $ps_link['target'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
							<?php pixesaas_image( $ps_image, 'medium' ); ?>
						</a>
						<?php
					else :
						?>
						<div class="ps-logowall__item">
							<?php pixesaas_image( $ps_image, 'medium' ); ?>
						</div>
						<?php
					endif;
				endforeach;
				?>
			</div>
		<?php endif; ?>

	</div>
</section>
