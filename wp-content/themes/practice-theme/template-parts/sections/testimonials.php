<?php
$section_title = get_sub_field( 'section_title' );

if ( ! have_rows( 'testimonials' ) ) {
    return;
}
?>

<section class="section-testimonials">
    <div class="container">
        <?php if ( $section_title ) : ?>
            <h2><?php echo esc_html( $section_title ); ?></h2>
        <?php endif; ?>

        <div class="testimonials-grid">
            <?php while ( have_rows( 'testimonials' ) ) : the_row();
                $quote       = get_sub_field( 'quote' );
                $author_name = get_sub_field( 'author_name' );
                $author_role = get_sub_field( 'author_role' );
                $photo       = get_sub_field( 'author_photo' );
                $rating      = (int) get_sub_field( 'rating' );

                if ( ! $quote ) {
                    continue;
                }
            ?>
                <figure class="testimonial-card">
                    <?php if ( $rating >= 1 && $rating <= 5 ) : ?>
                        <div class="testimonial-rating" role="img" aria-label="<?php echo esc_attr( sprintf( 'Rated %d out of 5', $rating ) ); ?>">
                            <?php echo esc_html( str_repeat( '★', $rating ) ); ?>
                        </div>
                    <?php endif; ?>

                    <blockquote class="testimonial-quote">
                        <?php echo wp_kses_post( wpautop( $quote ) ); ?>
                    </blockquote>

                    <?php if ( $author_name || ! empty( $photo['ID'] ) ) : ?>
                        <figcaption class="testimonial-author">
                            <?php if ( ! empty( $photo['ID'] ) ) : ?>
                                <?php echo wp_get_attachment_image( $photo['ID'], 'thumbnail', false, array( 'class' => 'testimonial-photo' ) ); ?>
                            <?php endif; ?>

                            <span class="testimonial-meta">
                                <?php if ( $author_name ) : ?>
                                    <cite><?php echo esc_html( $author_name ); ?></cite>
                                <?php endif; ?>

                                <?php if ( $author_role ) : ?>
                                    <span class="testimonial-role"><?php echo esc_html( $author_role ); ?></span>
                                <?php endif; ?>
                            </span>
                        </figcaption>
                    <?php endif; ?>
                </figure>
            <?php endwhile; ?>
        </div>
    </div>
</section>
