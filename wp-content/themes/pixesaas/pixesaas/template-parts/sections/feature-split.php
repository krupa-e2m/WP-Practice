<?php
/**
 * Section layout: feature_split
 *
 * @package PixeSaaS
 */

$ps_heading  = pixesaas_sub( 'heading' );
$ps_items    = pixesaas_sub( 'items', array() );
$ps_button   = pixesaas_sub( 'button' );
$ps_position = pixesaas_sub( 'media_position', 'left' );
$ps_type     = pixesaas_sub( 'media_type', 'app_card' );
$ps_image    = pixesaas_sub( 'image' );
$ps_app      = pixesaas_sub( 'app_card', array() );

$ps_rows      = isset( $ps_app['transactions'] ) && is_array( $ps_app['transactions'] ) ? $ps_app['transactions'] : array();
$ps_has_app   = ( 'app_card' === $ps_type ) && ( ! empty( $ps_app['name'] ) || ! empty( $ps_app['message'] ) || ! empty( $ps_rows ) );
$ps_has_image = ( 'image' === $ps_type ) && $ps_image;

if ( '' === $ps_heading && empty( $ps_items ) && ! $ps_has_app && ! $ps_has_image ) {
	return;
}

$ps_inner_class = 'ps-container ps-split__inner';

if ( 'right' === $ps_position ) {
	$ps_inner_class .= ' ps-split__inner--media-right';
}
?>
<section <?php echo pixesaas_section_atts( 'ps-split', ( $ps_has_app || $ps_has_image ) ? array() : array( 'ps-split--no-media' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="<?php echo esc_attr( $ps_inner_class ); ?>">

		<?php if ( $ps_has_app || $ps_has_image ) : ?>
			<div class="ps-split__media">

				<?php if ( $ps_has_image ) : ?>
					<div class="ps-split__image">
						<?php pixesaas_image( $ps_image, 'large' ); ?>
					</div>
				<?php else : ?>
					<div class="ps-appcard">

						<div class="ps-appcard__panel">
							<div class="ps-appcard__head">
								<div class="ps-appcard__person">
									<?php pixesaas_image( isset( $ps_app['avatar'] ) ? $ps_app['avatar'] : 0, 'thumbnail', array( 'class' => 'ps-appcard__avatar', 'alt' => '' ) ); ?>
									<span>
										<?php if ( ! empty( $ps_app['name'] ) ) : ?>
											<strong class="ps-appcard__name"><?php echo esc_html( $ps_app['name'] ); ?></strong>
										<?php endif; ?>
										<?php if ( ! empty( $ps_app['status'] ) ) : ?>
											<small class="ps-appcard__status"><?php echo esc_html( $ps_app['status'] ); ?></small>
										<?php endif; ?>
									</span>
								</div>

								<?php if ( ! empty( $ps_app['time'] ) ) : ?>
									<span class="ps-appcard__time"><?php echo esc_html( $ps_app['time'] ); ?></span>
								<?php endif; ?>
							</div>

							<?php if ( ! empty( $ps_app['message'] ) || ! empty( $ps_app['badge'] ) ) : ?>
								<div class="ps-appcard__message">
									<?php if ( ! empty( $ps_app['message'] ) ) : ?>
										<p><?php echo esc_html( $ps_app['message'] ); ?></p>
									<?php endif; ?>
									<?php if ( ! empty( $ps_app['badge'] ) ) : ?>
										<span class="ps-appcard__badge"><?php echo esc_html( $ps_app['badge'] ); ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>

						<?php if ( ! empty( $ps_app['tab_one'] ) || ! empty( $ps_app['tab_two'] ) || ! empty( $ps_rows ) ) : ?>
							<div class="ps-appcard__panel">

								<?php if ( ! empty( $ps_app['tab_one'] ) || ! empty( $ps_app['tab_two'] ) || ! empty( $ps_app['sort_label'] ) ) : ?>
									<div class="ps-appcard__tabs">
										<?php if ( ! empty( $ps_app['tab_one'] ) ) : ?>
											<span class="ps-appcard__tab is-active"><?php echo esc_html( $ps_app['tab_one'] ); ?></span>
										<?php endif; ?>
										<?php if ( ! empty( $ps_app['tab_two'] ) ) : ?>
											<span class="ps-appcard__tab"><?php echo esc_html( $ps_app['tab_two'] ); ?></span>
										<?php endif; ?>
										<?php if ( ! empty( $ps_app['sort_label'] ) ) : ?>
											<span class="ps-appcard__sort">
												<?php echo esc_html( $ps_app['sort_label'] ); ?>
												<?php pixesaas_image( isset( $ps_app['sort_icon'] ) ? $ps_app['sort_icon'] : 0, 'thumbnail', array( 'alt' => '' ) ); ?>
											</span>
										<?php endif; ?>
									</div>
								<?php endif; ?>

								<?php if ( ! empty( $ps_rows ) ) : ?>
									<div class="ps-appcard__rows">
										<?php
										foreach ( $ps_rows as $ps_row ) {
											$ps_bg    = isset( $ps_row['icon_bg'] ) ? trim( (string) $ps_row['icon_bg'] ) : '';
											$ps_style = '';

											// Only accept a hex colour — the value is echoed into a style attribute.
											if ( $ps_bg && preg_match( '/^#([a-f0-9]{3}|[a-f0-9]{6})$/i', $ps_bg ) ) {
												$ps_style = ' style="background-color:' . esc_attr( $ps_bg ) . '"';
											}

											$ps_icon_class = 'ps-appcard__row-icon' . ( $ps_style ? '' : ' ps-appcard__row-icon--plain' );
											$ps_tone       = ( isset( $ps_row['type'] ) && 'credit' === $ps_row['type'] ) ? 'credit' : 'debit';
											?>
											<div class="ps-appcard__row">
												<span class="<?php echo esc_attr( $ps_icon_class ); ?>"<?php echo $ps_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
													<?php pixesaas_image( isset( $ps_row['icon'] ) ? $ps_row['icon'] : 0, 'thumbnail', array( 'alt' => '' ) ); ?>
												</span>

												<span class="ps-appcard__row-text">
													<?php if ( ! empty( $ps_row['title'] ) ) : ?>
														<strong><?php echo esc_html( $ps_row['title'] ); ?></strong>
													<?php endif; ?>
													<?php if ( ! empty( $ps_row['subtitle'] ) ) : ?>
														<small><?php echo esc_html( $ps_row['subtitle'] ); ?></small>
													<?php endif; ?>
												</span>

												<?php if ( ! empty( $ps_row['amount'] ) || ! empty( $ps_row['date'] ) ) : ?>
													<span class="ps-appcard__row-amount ps-appcard__row-amount--<?php echo esc_attr( $ps_tone ); ?>">
														<?php if ( ! empty( $ps_row['amount'] ) ) : ?>
															<strong><?php echo esc_html( $ps_row['amount'] ); ?></strong>
														<?php endif; ?>
														<?php if ( ! empty( $ps_row['date'] ) ) : ?>
															<small><?php echo esc_html( $ps_row['date'] ); ?></small>
														<?php endif; ?>
													</span>
												<?php endif; ?>
											</div>
											<?php
										}
										?>
									</div>
								<?php endif; ?>

							</div>
						<?php endif; ?>

					</div>
				<?php endif; ?>

			</div>
		<?php endif; ?>

		<div class="ps-split__content">

			<?php if ( '' !== $ps_heading ) : ?>
				<h2 class="ps-split__title"><?php echo esc_html( $ps_heading ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $ps_items ) ) : ?>
				<div class="ps-split__items">
					<?php foreach ( $ps_items as $ps_item ) : ?>
						<?php
						$ps_item_title = isset( $ps_item['title'] ) ? $ps_item['title'] : '';
						$ps_item_text  = isset( $ps_item['text'] ) ? $ps_item['text'] : '';
						$ps_item_icon  = isset( $ps_item['icon'] ) ? $ps_item['icon'] : 0;

						if ( '' === $ps_item_title && '' === $ps_item_text ) {
							continue;
						}
						?>
						<div class="ps-split__item">
							<?php if ( $ps_item_icon ) : ?>
								<span class="ps-split__item-icon"><?php pixesaas_image( $ps_item_icon, 'thumbnail', array( 'alt' => '' ) ); ?></span>
							<?php endif; ?>

							<div class="ps-split__item-body">
								<?php if ( '' !== $ps_item_title ) : ?>
									<h3 class="ps-split__item-title"><?php echo esc_html( $ps_item_title ); ?></h3>
								<?php endif; ?>
								<?php if ( '' !== $ps_item_text ) : ?>
									<p class="ps-split__item-text"><?php echo esc_html( $ps_item_text ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<?php if ( pixesaas_link( $ps_button ) ) : ?>
				<div class="ps-actions"><?php pixesaas_button( $ps_button ); ?></div>
			<?php endif; ?>

		</div>

	</div>
</section>
