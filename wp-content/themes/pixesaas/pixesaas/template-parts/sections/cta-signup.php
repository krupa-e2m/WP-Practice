<?php
/**
 * Section layout: cta_signup
 *
 * @package PixeSaaS
 */

$ps_image       = pixesaas_sub( 'image' );
$ps_heading     = pixesaas_sub( 'heading' );
$ps_text        = pixesaas_sub( 'text' );
$ps_placeholder = pixesaas_sub( 'placeholder' );
$ps_button      = pixesaas_sub( 'button_label' );
$ps_action      = pixesaas_sub( 'form_action' );
$ps_notes       = pixesaas_sub( 'notes', array() );
$ps_apps        = pixesaas_sub( 'apps', array() );

if ( '' === $ps_heading && '' === $ps_text && ! $ps_image ) {
	return;
}

$ps_show_form = ( '' !== $ps_button || '' !== $ps_placeholder );
$ps_field_id  = 'ps-signup-' . ( isset( $GLOBALS['pixesaas_section_index'] ) ? (int) $GLOBALS['pixesaas_section_index'] : 1 );
?>
<section <?php echo pixesaas_section_atts( 'ps-signup', $ps_image ? array() : array( 'ps-signup--no-media' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container ps-signup__inner">

		<?php if ( $ps_image ) : ?>
			<div class="ps-signup__media">
				<?php pixesaas_image( $ps_image, 'large', array( 'alt' => '' ) ); ?>
			</div>
		<?php endif; ?>

		<div class="ps-signup__content">

			<?php if ( '' !== $ps_heading || '' !== $ps_text ) : ?>
				<div class="ps-signup__intro">
					<?php if ( '' !== $ps_heading ) : ?>
						<h2 class="ps-signup__title"><?php echo esc_html( $ps_heading ); ?></h2>
					<?php endif; ?>
					<?php if ( '' !== $ps_text ) : ?>
						<p class="ps-signup__text"><?php echo esc_html( $ps_text ); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( $ps_show_form ) : ?>
				<form class="ps-signup__form" action="<?php echo esc_url( $ps_action ? $ps_action : '' ); ?>" method="post"<?php echo $ps_action ? '' : ' onsubmit="return false;"'; ?>>
					<label class="screen-reader-text" for="<?php echo esc_attr( $ps_field_id ); ?>">
						<?php echo esc_html( '' !== $ps_placeholder ? $ps_placeholder : __( 'Email address', 'pixesaas' ) ); ?>
					</label>
					<input
						class="ps-signup__field"
						type="email"
						id="<?php echo esc_attr( $ps_field_id ); ?>"
						name="email"
						placeholder="<?php echo esc_attr( $ps_placeholder ); ?>"
					/>
					<?php if ( '' !== $ps_button ) : ?>
						<button type="submit" class="ps-btn ps-btn--primary"><?php echo esc_html( $ps_button ); ?></button>
					<?php endif; ?>
				</form>
			<?php endif; ?>

			<?php if ( ! empty( $ps_notes ) ) : ?>
				<ul class="ps-signup__notes">
					<?php
					foreach ( $ps_notes as $ps_note ) :
						if ( empty( $ps_note['text'] ) ) {
							continue;
						}
						?>
						<li>
							<?php pixesaas_image( isset( $ps_note['icon'] ) ? $ps_note['icon'] : 0, 'thumbnail', array( 'alt' => '' ) ); ?>
							<span><?php echo esc_html( $ps_note['text'] ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ( ! empty( $ps_apps ) ) : ?>
				<div class="ps-signup__apps">
					<?php
					foreach ( $ps_apps as $ps_app ) :
						$ps_badge = isset( $ps_app['image'] ) ? $ps_app['image'] : 0;

						if ( ! pixesaas_attachment_id( $ps_badge ) ) {
							continue;
						}

						$ps_link = pixesaas_link( isset( $ps_app['link'] ) ? $ps_app['link'] : false );

						if ( $ps_link ) :
							?>
							<a href="<?php echo esc_url( $ps_link['url'] ); ?>"<?php echo pixesaas_target_atts( $ps_link['target'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
								<?php pixesaas_image( $ps_badge, 'medium' ); ?>
							</a>
							<?php
						else :
							pixesaas_image( $ps_badge, 'medium' );
						endif;
					endforeach;
					?>
				</div>
			<?php endif; ?>

		</div>

	</div>
</section>
