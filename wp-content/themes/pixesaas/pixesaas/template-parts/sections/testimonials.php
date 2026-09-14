<?php
/**
 * Section layout: testimonials
 *
 * @package PixeSaaS
 */

$ps_heading = pixesaas_sub( 'heading' );
$ps_icon    = pixesaas_sub( 'quote_icon' );
$ps_items   = pixesaas_sub( 'items', array() );

if ( '' === $ps_heading && empty( $ps_items ) ) {
	return;
}
?>
<section <?php echo pixesaas_section_atts( 'ps-testimonials' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container">

		<?php
		pixesaas_section_head(
			array(
				'title'   => $ps_heading,
				'align'   => 'center',
				'classes' => 'ps-testimonials__head',
			)
		);
		?>

		<?php if ( ! empty( $ps_items ) ) : ?>
			<div class="ps-testimonials__grid">
				<?php
				foreach ( $ps_items as $ps_item ) :
					$ps_quote = isset( $ps_item['quote'] ) ? $ps_item['quote'] : '';
					$ps_name  = isset( $ps_item['name'] ) ? $ps_item['name'] : '';
					$ps_role  = isset( $ps_item['role'] ) ? $ps_item['role'] : '';
					$ps_photo = isset( $ps_item['photo'] ) ? $ps_item['photo'] : 0;

					if ( '' === $ps_quote && '' === $ps_name ) {
						continue;
					}
					?>
					<figure class="ps-testimonials__item">

						<?php if ( $ps_icon ) : ?>
							<span class="ps-testimonials__mark"><?php pixesaas_image( $ps_icon, 'thumbnail', array( 'alt' => '' ) ); ?></span>
						<?php endif; ?>

						<div class="ps-testimonials__card">
							<?php if ( '' !== $ps_quote ) : ?>
								<blockquote class="ps-testimonials__quote"><?php echo esc_html( $ps_quote ); ?></blockquote>
							<?php endif; ?>

							<?php if ( '' !== $ps_name || $ps_photo ) : ?>
								<figcaption class="ps-testimonials__author">
									<?php pixesaas_image( $ps_photo, 'thumbnail', array( 'class' => 'ps-testimonials__avatar', 'alt' => '' ) ); ?>

									<span>
										<?php if ( '' !== $ps_name ) : ?>
											<strong class="ps-testimonials__name"><?php echo esc_html( $ps_name ); ?></strong>
										<?php endif; ?>
										<?php if ( '' !== $ps_role ) : ?>
											<span class="ps-testimonials__role"><?php echo esc_html( $ps_role ); ?></span>
										<?php endif; ?>
									</span>
								</figcaption>
							<?php endif; ?>
						</div>

					</figure>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
