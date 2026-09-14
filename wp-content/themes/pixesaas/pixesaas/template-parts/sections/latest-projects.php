<?php
/**
 * Section layout: latest_projects
 *
 * Dynamic section: runs a WP_Query against the `project` CPT and renders real
 * posts — title, featured image, taxonomy term, excerpt and the ACF project
 * meta. Editors control the query (count, project types, order) from wp-admin.
 *
 * @package PixeSaaS
 */

$ps_heading = pixesaas_sub( 'heading' );
$ps_text    = pixesaas_sub( 'text' );
$ps_cta     = pixesaas_sub( 'cta' );
$ps_count   = (int) pixesaas_sub( 'count', 3 );
$ps_terms   = pixesaas_sub( 'terms', array() );
$ps_order   = pixesaas_sub( 'order_by', 'date' );
$ps_excerpt = (bool) pixesaas_sub( 'show_excerpt', false );
$ps_meta    = (bool) pixesaas_sub( 'show_meta', false );
$ps_empty   = pixesaas_sub( 'empty_message' );
$ps_arrow   = pixesaas_sub( 'arrow_icon' );

$ps_count = max( 1, min( 12, $ps_count ) );

$ps_args = array(
	'post_type'              => 'project',
	'post_status'            => 'publish',
	'posts_per_page'         => $ps_count,
	'ignore_sticky_posts'    => true,
	'no_found_rows'          => true,
	'update_post_term_cache' => true,
);

switch ( $ps_order ) {
	case 'title':
		$ps_args['orderby'] = 'title';
		$ps_args['order']   = 'ASC';
		break;
	case 'menu_order':
		$ps_args['orderby'] = array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		);
		break;
	case 'rand':
		$ps_args['orderby'] = 'rand';
		break;
	default:
		$ps_args['orderby'] = 'date';
		$ps_args['order']   = 'DESC';
}

// Optional taxonomy filter — only applied when the taxonomy actually exists.
if ( ! empty( $ps_terms ) && taxonomy_exists( 'project_type' ) ) {
	$ps_args['tax_query'] = array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
		array(
			'taxonomy' => 'project_type',
			'field'    => 'term_id',
			'terms'    => array_map( 'intval', (array) $ps_terms ),
		),
	);
}

$ps_query = new WP_Query( $ps_args );

if ( ! $ps_query->have_posts() && '' === $ps_heading && '' === $ps_empty ) {
	return;
}
?>
<section <?php echo pixesaas_section_atts( 'ps-projects' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container">

		<?php if ( '' !== $ps_heading || '' !== $ps_text || pixesaas_link( $ps_cta ) ) : ?>
			<div class="ps-projects__head">
				<?php
				pixesaas_section_head(
					array(
						'title' => $ps_heading,
						'text'  => $ps_text,
						'align' => 'left',
					)
				);
				?>

				<?php if ( pixesaas_link( $ps_cta ) ) : ?>
					<div class="ps-actions"><?php pixesaas_button( $ps_cta, 'outline' ); ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $ps_query->have_posts() ) : ?>
			<div class="ps-projects__grid">
				<?php
				while ( $ps_query->have_posts() ) :
					$ps_query->the_post();

					$ps_id     = get_the_ID();
					$ps_title  = get_the_title();
					$ps_terms_ = get_the_terms( $ps_id, 'project_type' );
					$ps_term   = ( $ps_terms_ && ! is_wp_error( $ps_terms_ ) ) ? $ps_terms_[0]->name : '';

					// ACF summary wins, then the excerpt, then the content.
					$ps_summary = '';

					if ( $ps_excerpt ) {
						$ps_custom  = function_exists( 'get_field' ) ? get_field( 'project_summary', $ps_id ) : '';
						$ps_summary = $ps_custom ? pixesaas_summary( $ps_custom ) : pixesaas_summary( get_the_excerpt() );
					}

					$ps_client = function_exists( 'get_field' ) ? get_field( 'project_client', $ps_id ) : '';
					$ps_year   = function_exists( 'get_field' ) ? get_field( 'project_year', $ps_id ) : '';
					?>
					<article class="ps-projects__card">

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="ps-projects__media">
								<?php if ( '' !== $ps_term ) : ?>
									<span class="ps-projects__tag"><?php echo esc_html( $ps_term ); ?></span>
								<?php endif; ?>
								<?php the_post_thumbnail( 'pixesaas-card', array( 'alt' => esc_attr( $ps_title ) ) ); ?>
							</div>
						<?php else : ?>
							<div class="ps-projects__media ps-projects__media--empty" aria-hidden="true">
								<?php if ( '' !== $ps_term ) : ?>
									<span class="ps-projects__tag"><?php echo esc_html( $ps_term ); ?></span>
								<?php endif; ?>
								<span><?php echo esc_html( mb_substr( wp_strip_all_tags( $ps_title ), 0, 1 ) ); ?></span>
							</div>
						<?php endif; ?>

						<div class="ps-projects__body">
							<h3 class="ps-projects__title">
								<a href="<?php the_permalink(); ?>"><?php echo esc_html( $ps_title ); ?></a>
							</h3>

							<?php if ( '' !== $ps_summary ) : ?>
								<p class="ps-projects__excerpt"><?php echo esc_html( $ps_summary ); ?></p>
							<?php endif; ?>

							<?php if ( $ps_meta && ( $ps_client || $ps_year ) ) : ?>
								<dl class="ps-projects__meta">
									<?php if ( $ps_client ) : ?>
										<dt><?php esc_html_e( 'Client', 'pixesaas' ); ?></dt>
										<dd><?php echo esc_html( $ps_client ); ?></dd>
									<?php endif; ?>
									<?php if ( $ps_year ) : ?>
										<dt><?php esc_html_e( 'Year', 'pixesaas' ); ?></dt>
										<dd><?php echo esc_html( $ps_year ); ?></dd>
									<?php endif; ?>
								</dl>
							<?php endif; ?>

							<div class="ps-projects__foot">
								<time class="ps-projects__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
									<?php echo esc_html( get_the_date() ); ?>
								</time>

								<a class="ps-projects__arrow" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: project title. */ __( 'Read more about %s', 'pixesaas' ), $ps_title ) ); ?>">
									<?php
									if ( pixesaas_attachment_id( $ps_arrow ) ) {
										pixesaas_image( $ps_arrow, 'thumbnail', array( 'alt' => '' ) );
									} else {
										echo '<span aria-hidden="true">&rarr;</span>';
									}
									?>
								</a>
							</div>
						</div>

					</article>
					<?php
				endwhile;
				?>
			</div>
			<?php
			wp_reset_postdata();
		elseif ( '' !== $ps_empty ) :
			?>
			<p class="ps-empty"><?php echo esc_html( $ps_empty ); ?></p>
		<?php endif; ?>

	</div>
</section>
