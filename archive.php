<?php
/**
 * The template for displaying archive pages.
 *
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

					<a href="<?php the_permalink(); ?>">

						<div class="featured-image-container">

							<div class="hover-border" style="border-color:<?php the_field('border_color'); ?>"></div>

							<?php $small_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-width-hero-mobile' ); ?>
							<?php $medium_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-width-hero-tablet' ); ?>
							<?php $large_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-width-hero-desktop' ); ?>
							<?php $retina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-width-hero-2x' ); ?>

							<picture>
								<!--[if IE 9]><video style="display: none;"><![endif]-->
								<source srcset="<?php echo $small_image[0]; ?>" media="(max-width: 600px)">
								<source srcset="<?php echo $medium_image[0]; ?>" media="(min-width: 601px)">
								<source srcset="<?php echo $large_image[0]; ?>" media="(min-width: 801px)">
								<source srcset="<?php echo $retina[0]; ?>" media="(min-device-pixel-ratio: 2)">
								<!--[if IE 9]></video><![endif]-->
								<img srcset="<?php echo $large_image[0]; ?>">
							</picture>

						</div>
					</a>

					<div class="case-study-title">
						<a href="<?php the_permalink(); ?>">
							<span>&mdash;&nbsp;Case Study&nbsp;&mdash;</span>
							<h2><?php the_title(); ?></h2>
						</a>
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
