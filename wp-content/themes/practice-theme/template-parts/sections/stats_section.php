<?php
$section_title = get_sub_field( 'section_title' );
?>

<section class="section-stats">
    <div class="container">
        <?php if ( $section_title ) : ?>
            <h2><?php echo esc_html( $section_title ); ?></h2>
        <?php endif; ?>

        <?php if ( have_rows( 'stat_items' ) ) : ?>
            <div class="stats-grid">
                <?php while ( have_rows( 'stat_items' ) ) : the_row();
                    $number = get_sub_field( 'number' );
                    $label  = get_sub_field( 'label' );
                ?>
                    <div class="stat-card">
                        <span class="stat-number"><?php echo esc_html( $number ); ?></span>
                        <span class="stat-label"><?php echo esc_html( $label ); ?></span>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>