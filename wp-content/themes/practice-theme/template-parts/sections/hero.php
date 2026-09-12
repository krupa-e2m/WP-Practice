<?php
$title    = get_sub_field( 'title' );
$subtitle = get_sub_field( 'subtitle' );
$bg_image = get_sub_field( 'background_image' ); // Returns array if set in ACF
?>

<section class="section-hero" style="background-image: url('<?php echo esc_url( $bg_image['url'] ?? '' ); ?>');">
    <div class="container">
        <?php if ( $title ) : ?>
            <h2 class="hero-title"><?php echo esc_html( $title ); ?></h2>
        <?php endif; ?>

        <?php if ( $subtitle ) : ?>
            <p class="hero-subtitle"><?php echo esc_html( $subtitle ); ?></p>
        <?php endif; ?>
    </div>
</section>