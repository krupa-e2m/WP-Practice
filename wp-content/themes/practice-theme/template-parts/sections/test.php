<?php
$title    = get_sub_field( 'title' );
$subtitle = get_sub_field( 'subtitle' );

if ( ! $title && ! $subtitle ) {
	return;
}
?>

<section class="section-test">
	<div class="container">
		<?php if ( $title ) : ?>
			<h2 class="test-title"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>

		<?php if ( $subtitle ) : ?>
			<p class="test-subtitle"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>
	</div>
</section>
