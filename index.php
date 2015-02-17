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

<script>
$(function() {
	$('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						if (target.length) {
								$('html,body').animate({ scrollTop: target.offset().top -0 }, 1500);
				return false;
				}
			}
			});
		});
</script>

	<div id="primary" class="content-area">

		<article class="lead-in">

			<div class="lead-in-content">

				<h1><?php the_field('case_study_title', 25); ?></h1>

				<div class="the-content">
					<?php $the_content = apply_filters('the_content', get_post(25)->post_content); ?>
					<?php echo $the_content; ?>
				</div>

				<h3><a href="mailto:gabrielamadeus@gmail.com">Let's Chat!</a></h3>

				<h4><a class="jump-to-content" href="#case-study-list">See Work</a></h4>

				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					width="30px" height="13.084px" viewBox="0 0 30 13.084" enable-background="new 0 0 30 13.084" xml:space="preserve">
				<polygon fill="#C2C8CA" points="28.004,2.123 15.056,10.698 1.716,2.123 0,2.123 0,2.229 14.275,11.337 15.835,11.337 29.721,2.229
					29.721,2.123 "/>
				</svg>

			</div>

		</article>

		<?php if ( have_posts() ) : ?>

			<section id="case-study-list" class="case-study-list">

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="lazyload case-study">

						<a href="<?php the_permalink(); ?>">

							<div class="featured-image-container">

								<div class="case-study-title">
									<span>&mdash;&nbsp;Case Study&nbsp;&mdash;</span>
									<h2><?php the_title(); ?></h2>
								</div>

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

					</div>

				<?php endwhile; ?>

			</section>

			<?php scratch_paging_nav(); ?>

		<?php else : ?>

			<?php the_title(); ?>

		<?php endif; ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
