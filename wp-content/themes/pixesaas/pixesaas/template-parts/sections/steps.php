<?php
/**
 * Section layout: steps
 *
 * @package PixeSaaS
 */

$ps_heading = pixesaas_sub( 'heading' );
$ps_text    = pixesaas_sub( 'text' );
$ps_feature = pixesaas_sub( 'feature', array() );
$ps_items   = pixesaas_sub( 'items', array() );

$ps_has_feature = ( ! empty( $ps_feature['title'] ) || ! empty( $ps_feature['text'] ) || ! empty( $ps_feature['image'] ) );

if ( '' === $ps_heading && '' === $ps_text && ! $ps_has_feature && empty( $ps_items ) ) {
	return;
}

$ps_accents = array( 'green', 'blue', 'pink', 'yellow', 'grey' );
?>
<section <?php echo pixesaas_section_atts( 'ps-steps' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container ps-steps__inner">

		<?php
		pixesaas_section_head(
			array(
				'title'   => $ps_heading,
				'text'    => $ps_text,
				'align'   => 'center',
				'classes' => 'ps-steps__head',
			)
		);
		?>

		<?php
		if ( $ps_has_feature ) :
			$ps_accent = isset( $ps_feature['accent'] ) && in_array( $ps_feature['accent'], $ps_accents, true ) ? $ps_feature['accent'] : 'green';
			?>
			<div class="ps-steps__feature ps-steps--<?php echo esc_attr( $ps_accent ); ?>">
				<div class="ps-steps__feature-body">
					<?php if ( ! empty( $ps_feature['icon'] ) ) : ?>
						<span class="ps-steps__icon ps-steps__icon--lg"><?php pixesaas_image( $ps_feature['icon'], 'thumbnail', array( 'alt' => '' ) ); ?></span>
					<?php endif; ?>

					<?php if ( ! empty( $ps_feature['title'] ) ) : ?>
						<h3 class="ps-steps__feature-title"><?php echo esc_html( $ps_feature['title'] ); ?></h3>
					<?php endif; ?>

					<?php if ( ! empty( $ps_feature['text'] ) ) : ?>
						<p class="ps-steps__feature-text"><?php echo esc_html( $ps_feature['text'] ); ?></p>
					<?php endif; ?>

					<?php pixesaas_text_link( isset( $ps_feature['link'] ) ? $ps_feature['link'] : false ); ?>
				</div>

				<?php if ( ! empty( $ps_feature['image'] ) ) : ?>
					<div class="ps-steps__feature-media">
						<?php pixesaas_image( $ps_feature['image'], 'large', array( 'alt' => '' ) ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $ps_items ) ) : ?>
			<div class="ps-steps__row">
				<?php
				foreach ( $ps_items as $ps_item ) :
					$ps_title = isset( $ps_item['title'] ) ? $ps_item['title'] : '';
					$ps_body  = isset( $ps_item['text'] ) ? $ps_item['text'] : '';

					if ( '' === $ps_title && '' === $ps_body ) {
						continue;
					}

					$ps_accent = isset( $ps_item['accent'] ) && in_array( $ps_item['accent'], $ps_accents, true ) ? $ps_item['accent'] : 'grey';
					?>
					<div class="ps-steps__card ps-steps--<?php echo esc_attr( $ps_accent ); ?>">
						<?php if ( ! empty( $ps_item['icon'] ) ) : ?>
							<span class="ps-steps__icon"><?php pixesaas_image( $ps_item['icon'], 'thumbnail', array( 'alt' => '' ) ); ?></span>
						<?php endif; ?>

						<?php if ( '' !== $ps_title ) : ?>
							<h3 class="ps-steps__card-title"><?php echo esc_html( $ps_title ); ?></h3>
						<?php endif; ?>

						<?php if ( '' !== $ps_body ) : ?>
							<p class="ps-steps__card-text"><?php echo esc_html( $ps_body ); ?></p>
						<?php endif; ?>

						<?php pixesaas_text_link( isset( $ps_item['link'] ) ? $ps_item['link'] : false ); ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
