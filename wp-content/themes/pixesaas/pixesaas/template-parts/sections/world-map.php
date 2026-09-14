<?php
/**
 * Section layout: world_map
 *
 * @package PixeSaaS
 */

$ps_heading = pixesaas_sub( 'heading' );
$ps_map     = pixesaas_sub( 'map' );
$ps_stats   = pixesaas_sub( 'stats', array() );

if ( '' === $ps_heading && ! $ps_map && empty( $ps_stats ) ) {
	return;
}
?>
<section <?php echo pixesaas_section_atts( 'ps-worldmap' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container ps-worldmap__inner">

		<?php
		pixesaas_section_head(
			array(
				'title' => $ps_heading,
				'align' => 'center',
				'width' => 'wide',
			)
		);
		?>

		<?php if ( $ps_map ) : ?>
			<div class="ps-worldmap__map">
				<?php pixesaas_image( $ps_map, 'full', array( 'alt' => '' ) ); ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $ps_stats ) ) : ?>
			<div class="ps-worldmap__stats">
				<?php
				foreach ( $ps_stats as $ps_stat ) {
					pixesaas_counter( $ps_stat, 'ps-worldmap__stat' );
				}
				?>
			</div>
		<?php endif; ?>

	</div>
</section>
