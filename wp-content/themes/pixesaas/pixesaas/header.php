<?php
/**
 * The header for our theme
 *
 * Outputs the <head> section and the PixeSaaS navbar (Figma node 1:22).
 * Brand, logo, login link and CTA all come from the "PixeSaaS Settings"
 * options page; the menu itself is a normal WordPress menu.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PixeSaaS
 */

$pixesaas_brand = pixesaas_option( 'header_brand' );
$pixesaas_logo  = pixesaas_option( 'header_logo' );
$pixesaas_login = pixesaas_link( pixesaas_option( 'header_login' ) );
$pixesaas_cta   = pixesaas_option( 'header_cta' );

if ( '' === $pixesaas_brand ) {
	$pixesaas_brand = get_bloginfo( 'name' );
}

$pixesaas_has_menu    = has_nav_menu( 'menu-1' );
$pixesaas_has_actions = ( $pixesaas_login || pixesaas_link( $pixesaas_cta ) );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'pixesaas' ); ?></a>

	<header id="masthead" class="ps-header">
		<div class="ps-container ps-header__inner">

			<a class="ps-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php
				if ( pixesaas_attachment_id( $pixesaas_logo ) ) {
					pixesaas_image(
						$pixesaas_logo,
						'medium',
						array(
							'alt'     => $pixesaas_brand,
							'loading' => 'eager',
						)
					);
				} elseif ( has_custom_logo() ) {
					the_custom_logo();
				}
				?>
				<span class="ps-header__name"><?php echo esc_html( $pixesaas_brand ); ?></span>
			</a>

			<?php if ( $pixesaas_has_menu || $pixesaas_has_actions ) : ?>

				<button class="ps-header__toggle" aria-controls="site-navigation" aria-expanded="false" data-nav-toggle>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'pixesaas' ); ?></span>
				</button>

				<nav id="site-navigation" class="ps-header__nav" aria-label="<?php esc_attr_e( 'Primary menu', 'pixesaas' ); ?>" data-nav-panel>
					<div class="ps-header__nav-inner">
					<?php
					if ( $pixesaas_has_menu ) {
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'ps-header__menu',
								'container'      => false,
								'depth'          => 2,
							)
						);
					}
					?>

					<?php if ( $pixesaas_has_actions ) : ?>
						<div class="ps-header__actions">
							<?php if ( $pixesaas_login && '' !== $pixesaas_login['title'] ) : ?>
								<a class="ps-header__login" href="<?php echo esc_url( $pixesaas_login['url'] ); ?>"<?php echo pixesaas_target_atts( $pixesaas_login['target'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
									<?php echo esc_html( $pixesaas_login['title'] ); ?>
								</a>
							<?php endif; ?>

							<?php pixesaas_button( $pixesaas_cta ); ?>
						</div>
					<?php endif; ?>
					</div>
				</nav><!-- #site-navigation -->

			<?php endif; ?>

		</div>
	</header><!-- #masthead -->
