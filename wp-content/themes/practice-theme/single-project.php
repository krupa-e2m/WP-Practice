<?php
/**
 * The template for displaying all single project CPT posts
 *
 * @package practice-theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'project-single' ); ?>>
            
            <header class="entry-header container">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->

            <div class="project-sections" container>
                <?php
                // Check if ACF Flexible Content layout rows exist
                if ( have_rows( 'page_sections' ) ) :

                    // Loop through each layout section added in wp-admin
                    while ( have_rows( 'page_sections' ) ) : the_row();

                        $layout = get_row_layout();
                        
                        // Loads template-parts/sections/{layout}.php
                        get_template_part( 'template-parts/sections/' . $layout );

                    endwhile;

                else :
                    ?>
                    <div class="container">
                        <p>No layout sections added yet.</p>
                    </div>
                <?php endif; ?>
            </div><!-- .project-sections -->

        </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();