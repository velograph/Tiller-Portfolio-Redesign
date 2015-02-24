<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gabriel Amadeus
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>

			<section id="case-study-archive" class="case-study-archive">

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="lazyload case-study">

						<div class="featured-image-container">

							<a href="<?php the_permalink(); ?>">

								<div class="hover-border" style="border-color:<?php the_field('border_color'); ?>"></div>

								<?php $small_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'case-study-mobile' ); ?>
								<?php $medium_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'case-study-tablet' ); ?>
								<?php $large_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'case-study-desktop' ); ?>

								<img
									alt=""
									data-sizes="auto"
									src="<?php echo $small_image[0]; ?>"
									data-srcset="<?php echo $small_image[0]; ?> 600w,
									<?php echo $medium_image[0]; ?> 640w,
									<?php echo $large_image[0]; ?> 1024w"
									class="lazyload" />

							</a>

						</div>

						<div class="case-study-title-container">

							<div class="case-study-title">
								<span>&mdash;&nbsp;<?php the_category('&mdash;'); ?>&nbsp;&mdash;</span>
								<a href="<?php the_permalink(); ?>">
									<h2><?php the_title(); ?></h2>
								</a>
							</div>

						</div>

					</div>

				<?php endwhile; ?>

			</section>

			<?php scratch_paging_nav(); ?>

		<?php endif; ?>

		<?php
			global $wp_query;

			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
		?>

	</div><!-- #primary -->

<?php get_footer(); ?>
