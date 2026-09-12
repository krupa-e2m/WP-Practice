<?php
/**
 * Template for displaying Project CPT posts filtered by Taxonomy
 *
 * @package practice-theme
 */

get_header();
?>

<main id="primary" class="site-main container">

    <header class="page-header">
        <h1 class="page-title">Filtered Projects (Web Design)</h1>
    </header>

    <?php
    // Step 6: Define WP_Query parameters using tax_query
    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => 10,
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'project_type',  // Your Custom Taxonomy slug
                'field'    => 'slug',          // Search by slug ('slug', 'term_id', or 'name')
                'terms'    => 'web-design',    // Replace with a valid term slug from your database
                'operator' => 'IN',
            ),
        ),
    );

    // Execute the query
    $project_query = new WP_Query( $args );

    // Start the Loop
    if ( $project_query->have_posts() ) : ?>

        <div class="projects-grid">
            <?php
            while ( $project_query->have_posts() ) :
                $project_query->the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'project-card' ); ?>>
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <div class="project-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="button">View Project</a>
                </article>

            <?php endwhile; ?>
        </div>

        <?php
        // Restore original Post Data (CRITICAL for custom WP_Query instances)
        wp_reset_postdata();

    else :
        ?>
        <p>No projects found matching the selected taxonomy term.</p>
    <?php endif; ?>

</main>

<?php
get_footer();