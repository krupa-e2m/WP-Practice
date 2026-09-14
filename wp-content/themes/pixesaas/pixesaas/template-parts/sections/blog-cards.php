<?php
/**
 * Section layout: blog_cards
 *
 * Dynamic section: latest posts, filtered by category from wp-admin.
 *
 * @package PixeSaaS
 */

$ps_heading = pixesaas_sub( 'heading' );
$ps_count   = (int) pixesaas_sub( 'count', 3 );
$ps_terms   = pixesaas_sub( 'terms', array() );
$ps_empty   = pixesaas_sub( 'empty_message' );
$ps_arrow   = pixesaas_sub( 'arrow_icon' );

$ps_count = max( 1, min( 12, $ps_count ) );

$ps_args = array(
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => $ps_count,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
);

if ( ! empty( $ps_terms ) ) {
	$ps_args['category__in'] = array_map( 'intval', (array) $ps_terms );
}

$ps_query = new WP_Query( $ps_args );

if ( ! $ps_query->have_posts() && '' === $ps_heading && '' === $ps_empty ) {
	return;
}
?>
<section <?php echo pixesaas_section_atts( 'ps-blog' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?>>
	<div class="ps-container">

		<?php
		pixesaas_section_head(
			array(
				'title'   => $ps_heading,
				'align'   => 'center',
				'classes' => 'ps-blog__head',
			)
		);
		?>

		<?php if ( $ps_query->have_posts() ) : ?>
			<div class="ps-blog__grid">
				<?php
				while ( $ps_query->have_posts() ) :
					$ps_query->the_post();

					$ps_title      = get_the_title();
					$ps_categories = get_the_category();
					$ps_category   = ! empty( $ps_categories ) ? $ps_categories[0]->name : '';
					?>
					<article class="ps-blog__card">

						<div class="ps-blog__media">
							<?php if ( '' !== $ps_category ) : ?>
								<span class="ps-blog__tag"><?php echo esc_html( $ps_category ); ?></span>
							<?php endif; ?>

							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'pixesaas-card', array( 'alt' => esc_attr( $ps_title ) ) );
							}
							?>
						</div>

						<div class="ps-blog__body">
							<h3 class="ps-blog__title">
								<a href="<?php the_permalink(); ?>"><?php echo esc_html( $ps_title ); ?></a>
							</h3>

							<div class="ps-blog__foot">
								<time class="ps-blog__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
									<?php echo esc_html( get_the_date() ); ?>
								</time>

								<a class="ps-blog__arrow" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: post title. */ __( 'Read %s', 'pixesaas' ), $ps_title ) ); ?>">
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
