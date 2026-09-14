<?php
/**
 * Section layout: footer_cta
 *
 * The page's own footer band plus the black copyright bar underneath it.
 *
 * @package PixeSaaS
 */

$ps_heading   = pixesaas_sub( 'heading' );
$ps_button    = pixesaas_sub( 'button' );
$ps_columns   = pixesaas_sub( 'columns', array() );
$ps_contact   = pixesaas_sub( 'contact_title' );
$ps_email     = pixesaas_sub( 'email' );
$ps_socials   = pixesaas_sub( 'socials', array() );
$ps_copyright = pixesaas_sub( 'copyright' );
$ps_legal     = pixesaas_sub( 'legal_links', array() );

$ps_has_contact = ( '' !== $ps_contact || '' !== $ps_email || ! empty( $ps_socials ) );
$ps_has_bar     = ( '' !== $ps_copyright || ! empty( $ps_legal ) );

if ( '' === $ps_heading && empty( $ps_columns ) && ! $ps_has_contact && ! $ps_has_bar ) {
	return;
}
?>
<footer <?php echo pixesaas_section_atts( 'ps-footercta' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container ps-footercta__inner">

		<?php if ( '' !== $ps_heading || pixesaas_link( $ps_button ) ) : ?>
			<div class="ps-footercta__intro">
				<?php if ( '' !== $ps_heading ) : ?>
					<h2 class="ps-footercta__title"><?php echo esc_html( $ps_heading ); ?></h2>
				<?php endif; ?>

				<?php pixesaas_button( $ps_button ); ?>
			</div>
		<?php endif; ?>

		<?php
		foreach ( $ps_columns as $ps_column ) :
			$ps_title = isset( $ps_column['title'] ) ? $ps_column['title'] : '';
			$ps_links = isset( $ps_column['links'] ) && is_array( $ps_column['links'] ) ? $ps_column['links'] : array();

			if ( '' === $ps_title && empty( $ps_links ) ) {
				continue;
			}
			?>
			<div class="ps-footercta__col">
				<?php if ( '' !== $ps_title ) : ?>
					<h3 class="ps-footercta__col-title"><?php echo esc_html( $ps_title ); ?></h3>
				<?php endif; ?>

				<?php if ( ! empty( $ps_links ) ) : ?>
					<ul class="ps-footercta__links">
						<?php
						foreach ( $ps_links as $ps_row ) :
							$ps_link = pixesaas_link( isset( $ps_row['link'] ) ? $ps_row['link'] : false );

							if ( ! $ps_link || '' === $ps_link['title'] ) {
								continue;
							}
							?>
							<li>
								<a href="<?php echo esc_url( $ps_link['url'] ); ?>"<?php echo pixesaas_target_atts( $ps_link['target'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
									<?php echo esc_html( $ps_link['title'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>

		<?php if ( $ps_has_contact ) : ?>
			<div class="ps-footercta__col">
				<?php if ( '' !== $ps_contact ) : ?>
					<h3 class="ps-footercta__col-title"><?php echo esc_html( $ps_contact ); ?></h3>
				<?php endif; ?>

				<?php if ( '' !== $ps_email ) : ?>
					<a class="ps-footercta__email" href="<?php echo esc_url( 'mailto:' . $ps_email ); ?>"><?php echo esc_html( $ps_email ); ?></a>
				<?php endif; ?>

				<?php if ( ! empty( $ps_socials ) ) : ?>
					<div class="ps-footercta__social">
						<?php
						foreach ( $ps_socials as $ps_social ) :
							$ps_icon = isset( $ps_social['icon'] ) ? $ps_social['icon'] : 0;

							if ( ! pixesaas_attachment_id( $ps_icon ) ) {
								continue;
							}

							$ps_link  = pixesaas_link( isset( $ps_social['link'] ) ? $ps_social['link'] : false );
							$ps_label = $ps_link && '' !== $ps_link['title'] ? $ps_link['title'] : __( 'Social profile', 'pixesaas' );

							if ( $ps_link ) :
								?>
								<a href="<?php echo esc_url( $ps_link['url'] ); ?>" aria-label="<?php echo esc_attr( $ps_label ); ?>"<?php echo pixesaas_target_atts( $ps_link['target'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
									<?php pixesaas_image( $ps_icon, 'thumbnail', array( 'alt' => '' ) ); ?>
								</a>
								<?php
							else :
								pixesaas_image( $ps_icon, 'thumbnail', array( 'alt' => '' ) );
							endif;
						endforeach;
						?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>
</footer>

<?php if ( $ps_has_bar ) : ?>
	<div class="ps-copyright">
		<div class="ps-container ps-copyright__inner">
			<?php if ( '' !== $ps_copyright ) : ?>
				<p class="ps-copyright__text"><?php echo esc_html( $ps_copyright ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $ps_legal ) ) : ?>
				<ul class="ps-copyright__links">
					<?php
					foreach ( $ps_legal as $ps_row ) :
						$ps_link = pixesaas_link( isset( $ps_row['link'] ) ? $ps_row['link'] : false );

						if ( ! $ps_link || '' === $ps_link['title'] ) {
							continue;
						}
						?>
						<li>
							<a href="<?php echo esc_url( $ps_link['url'] ); ?>"<?php echo pixesaas_target_atts( $ps_link['target'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
								<?php echo esc_html( $ps_link['title'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
