<?php
/**
 * Section layout: hero_showcase
 *
 * @package PixeSaaS
 */

$ps_artwork   = pixesaas_sub( 'artwork' );
$ps_light     = pixesaas_sub( 'tagline_light' );
$ps_strong    = pixesaas_sub( 'tagline_strong' );
$ps_trusted   = pixesaas_sub( 'trusted_label' );
$ps_logos     = pixesaas_sub( 'logos', array() );
$ps_avatars   = pixesaas_sub( 'avatars', array() );
$ps_value     = pixesaas_sub( 'counter_value' );
$ps_label     = pixesaas_sub( 'counter_label' );
$ps_card      = pixesaas_sub( 'card', array() );

$ps_card_has_content = false;

foreach ( array( 'brand', 'amount', 'amount_label', 'note', 'foot_amount', 'pill' ) as $ps_key ) {
	if ( ! empty( $ps_card[ $ps_key ] ) ) {
		$ps_card_has_content = true;
		break;
	}
}

$ps_has_counter = ( '' !== $ps_value || '' !== $ps_label || ! empty( $ps_avatars ) );
$ps_has_left    = ( '' !== $ps_light || '' !== $ps_strong || '' !== $ps_trusted || ! empty( $ps_logos ) );

if ( ! $ps_artwork && ! $ps_has_left && ! $ps_has_counter && ! $ps_card_has_content ) {
	return;
}
?>
<section <?php echo pixesaas_section_atts( 'ps-showcase' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container">
		<div class="ps-showcase__stage">

			<?php if ( $ps_artwork ) : ?>
				<div class="ps-showcase__art">
					<?php pixesaas_image( $ps_artwork, 'full', array( 'alt' => '', 'loading' => 'eager' ) ); ?>
				</div>
			<?php endif; ?>

			<?php if ( $ps_has_left ) : ?>
				<div class="ps-showcase__col">

					<?php if ( '' !== $ps_light || '' !== $ps_strong ) : ?>
						<p class="ps-showcase__tagline">
							<?php echo esc_html( $ps_light ); ?><?php if ( '' !== $ps_strong ) : ?><strong><?php echo esc_html( $ps_strong ); ?></strong><?php endif; ?>
						</p>
					<?php endif; ?>

					<?php if ( '' !== $ps_trusted || ! empty( $ps_logos ) ) : ?>
						<div class="ps-showcase__trusted">
							<?php if ( '' !== $ps_trusted ) : ?>
								<span><?php echo esc_html( $ps_trusted ); ?></span>
							<?php endif; ?>

							<?php if ( ! empty( $ps_logos ) ) : ?>
								<span class="ps-showcase__logos">
									<?php
									foreach ( $ps_logos as $ps_logo ) {
										pixesaas_image( isset( $ps_logo['image'] ) ? $ps_logo['image'] : 0, 'thumbnail', array( 'alt' => '' ) );
									}
									?>
								</span>
							<?php endif; ?>
						</div>
					<?php endif; ?>

				</div>
			<?php endif; ?>

			<?php if ( $ps_has_counter || $ps_card_has_content ) : ?>
				<div class="ps-showcase__col ps-showcase__col--end">

					<?php if ( $ps_has_counter ) : ?>
						<div class="ps-showcase__counter">
							<?php if ( ! empty( $ps_avatars ) ) : ?>
								<span class="ps-showcase__avatars">
									<?php
									foreach ( $ps_avatars as $ps_avatar ) {
										pixesaas_image( isset( $ps_avatar['image'] ) ? $ps_avatar['image'] : 0, 'thumbnail', array( 'alt' => '' ) );
									}
									?>
								</span>
							<?php endif; ?>

							<?php if ( '' !== $ps_value || '' !== $ps_label ) : ?>
								<span>
									<?php if ( '' !== $ps_value ) : ?>
										<strong class="ps-showcase__counter-value"><?php echo esc_html( $ps_value ); ?></strong>
									<?php endif; ?>
									<?php if ( '' !== $ps_label ) : ?>
										<small class="ps-showcase__counter-label"><?php echo esc_html( $ps_label ); ?></small>
									<?php endif; ?>
								</span>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $ps_card_has_content ) : ?>
						<div class="ps-showcase__card">

							<?php if ( ! empty( $ps_card['brand'] ) || ! empty( $ps_card['period'] ) || ! empty( $ps_card['icon'] ) ) : ?>
								<div class="ps-showcase__card-top">
									<span class="ps-showcase__card-brand">
										<?php pixesaas_image( isset( $ps_card['icon'] ) ? $ps_card['icon'] : 0, 'thumbnail', array( 'alt' => '' ) ); ?>
										<?php echo esc_html( isset( $ps_card['brand'] ) ? $ps_card['brand'] : '' ); ?>
									</span>
									<?php if ( ! empty( $ps_card['period'] ) ) : ?>
										<span class="ps-showcase__card-period"><?php echo esc_html( $ps_card['period'] ); ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $ps_card['amount'] ) ) : ?>
								<p class="ps-showcase__card-amount"><?php echo esc_html( $ps_card['amount'] ); ?></p>
							<?php endif; ?>

							<?php if ( ! empty( $ps_card['amount_label'] ) ) : ?>
								<p class="ps-showcase__card-label"><?php echo esc_html( $ps_card['amount_label'] ); ?></p>
							<?php endif; ?>

							<?php if ( ! empty( $ps_card['note'] ) ) : ?>
								<p class="ps-showcase__card-text"><?php echo esc_html( $ps_card['note'] ); ?></p>
							<?php endif; ?>

							<?php if ( ! empty( $ps_card['foot_amount'] ) || ! empty( $ps_card['pill'] ) ) : ?>
								<div class="ps-showcase__card-foot">
									<?php if ( ! empty( $ps_card['foot_amount'] ) ) : ?>
										<span class="ps-showcase__card-foot-amount">
											<?php echo esc_html( $ps_card['foot_amount'] ); ?>
											<?php if ( ! empty( $ps_card['foot_period'] ) ) : ?>
												<small><?php echo esc_html( $ps_card['foot_period'] ); ?></small>
											<?php endif; ?>
										</span>
									<?php endif; ?>

									<?php if ( ! empty( $ps_card['pill'] ) ) : ?>
										<span class="ps-showcase__card-pill"><?php echo esc_html( $ps_card['pill'] ); ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>

						</div>
					<?php endif; ?>

				</div>
			<?php endif; ?>

		</div>
	</div>
</section>
