<?php
$heading = get_sub_field( 'heading' );
$content = get_sub_field( 'content' ); // WYSIWYG content
?>

<section class="section-text-block">
    <div class="container">
        <?php if ( $heading ) : ?>
            <h2><?php echo esc_html( $heading ); ?></h2>
        <?php endif; ?>

        <?php if ( $content ) : ?>
            <div class="wysiwyg-content">
                <?php echo wp_kses_post( $content ); ?>
            </div>
        <?php endif; ?>
    </div>
</section>