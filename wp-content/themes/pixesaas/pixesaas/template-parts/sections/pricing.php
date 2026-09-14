<?php
/**
 * Section layout: pricing
 *
 * @package PixeSaaS
 */

$ps_heading = pixesaas_sub( 'heading' );
$ps_monthly = pixesaas_sub( 'monthly_label' );
$ps_annual  = pixesaas_sub( 'annual_label' );
$ps_badge   = pixesaas_sub( 'badge' );
$ps_badge_i = pixesaas_sub( 'badge_icon' );
$ps_tick    = pixesaas_sub( 'tick_icon' );
$ps_plans   = pixesaas_sub( 'plans', array() );

if ( '' === $ps_heading && empty( $ps_plans ) ) {
	return;
}

// The switch only earns its place when at least one plan has both prices.
$ps_has_switch = false;

foreach ( $ps_plans as $ps_plan ) {
	if ( ! empty( $ps_plan['price_monthly'] ) && ! empty( $ps_plan['price_annual'] ) ) {
		$ps_has_switch = true;
		break;
	}
}

$ps_has_switch = $ps_has_switch && ( '' !== $ps_monthly || '' !== $ps_annual );
$ps_uid        = 'ps-pricing-' . ( isset( $GLOBALS['pixesaas_section_index'] ) ? (int) $GLOBALS['pixesaas_section_index'] : 1 );
?>
<section <?php echo pixesaas_section_atts( 'ps-pricing' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?> data-pricing="<?php echo esc_attr( $ps_uid ); ?>">
	<div class="ps-container">

		<div class="ps-pricing__head">
			<?php
			pixesaas_section_head(
				array(
					'title' => $ps_heading,
					'align' => 'center',
				)
			);
			?>

			<?php if ( $ps_has_switch ) : ?>
				<div class="ps-pricing__switch">
					<?php if ( '' !== $ps_monthly ) : ?>
						<span class="ps-pricing__switch-label is-active" data-pricing-label="monthly"><?php echo esc_html( $ps_monthly ); ?></span>
					<?php endif; ?>

					<button
						type="button"
						class="ps-pricing__toggle"
						role="switch"
						aria-checked="false"
						data-pricing-toggle
						aria-label="<?php esc_attr_e( 'Switch between monthly and annual pricing', 'pixesaas' ); ?>"
					></button>

					<?php if ( '' !== $ps_annual ) : ?>
						<span class="ps-pricing__switch-label" data-pricing-label="annual"><?php echo esc_html( $ps_annual ); ?></span>
					<?php endif; ?>

					<?php if ( '' !== $ps_badge ) : ?>
						<span class="ps-pricing__badge">
							<?php pixesaas_image( $ps_badge_i, 'thumbnail', array( 'alt' => '' ) ); ?>
							<?php echo esc_html( $ps_badge ); ?>
						</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $ps_plans ) ) : ?>
			<div class="ps-pricing__grid">
				<?php
				foreach ( $ps_plans as $ps_plan ) :
					$ps_name     = isset( $ps_plan['name'] ) ? $ps_plan['name'] : '';
					$ps_m_price  = isset( $ps_plan['price_monthly'] ) ? $ps_plan['price_monthly'] : '';
					$ps_a_price  = isset( $ps_plan['price_annual'] ) ? $ps_plan['price_annual'] : '';
					$ps_period   = isset( $ps_plan['period'] ) ? $ps_plan['period'] : '';
					$ps_features = isset( $ps_plan['features'] ) && is_array( $ps_plan['features'] ) ? $ps_plan['features'] : array();
					$ps_desc     = isset( $ps_plan['description'] ) ? $ps_plan['description'] : '';

					if ( '' === $ps_name && '' === $ps_m_price && empty( $ps_features ) ) {
						continue;
					}
					?>
					<div class="ps-pricing__card">

						<?php if ( ! empty( $ps_plan['artwork'] ) ) : ?>
							<div class="ps-pricing__art"><?php pixesaas_image( $ps_plan['artwork'], 'medium', array( 'alt' => '' ) ); ?></div>
						<?php endif; ?>

						<div class="ps-pricing__body">

							<?php if ( '' !== $ps_name ) : ?>
								<h3 class="ps-pricing__name"><?php echo esc_html( $ps_name ); ?></h3>
							<?php endif; ?>

							<?php if ( ! empty( $ps_features ) ) : ?>
								<ul class="ps-pricing__features">
									<?php
									foreach ( $ps_features as $ps_feature ) :
										if ( empty( $ps_feature['text'] ) ) {
											continue;
										}
										?>
										<li>
											<?php pixesaas_image( $ps_tick, 'thumbnail', array( 'alt' => '' ) ); ?>
											<span><?php echo esc_html( $ps_feature['text'] ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>

							<?php if ( '' !== $ps_m_price || '' !== $ps_a_price ) : ?>
								<p class="ps-pricing__price">
									<strong>
										<?php if ( '' !== $ps_m_price ) : ?>
											<span class="ps-pricing__amount ps-pricing__amount--monthly"><?php echo esc_html( $ps_m_price ); ?></span>
										<?php endif; ?>
										<?php if ( '' !== $ps_a_price ) : ?>
											<span class="ps-pricing__amount ps-pricing__amount--annual"><?php echo esc_html( $ps_a_price ); ?></span>
										<?php endif; ?>
									</strong>
									<?php if ( '' !== $ps_period ) : ?>
										<span><?php echo esc_html( $ps_period ); ?></span>
									<?php endif; ?>
								</p>
							<?php endif; ?>

							<?php if ( '' !== $ps_desc ) : ?>
								<p class="ps-pricing__text"><?php echo esc_html( $ps_desc ); ?></p>
							<?php endif; ?>

							<?php if ( pixesaas_link( isset( $ps_plan['button'] ) ? $ps_plan['button'] : false ) ) : ?>
								<div class="ps-pricing__cta">
									<?php pixesaas_button( $ps_plan['button'], 'primary', array( 'ps-btn--block' ) ); ?>
								</div>
							<?php endif; ?>

						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
