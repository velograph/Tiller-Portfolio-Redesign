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

		<article class="lead-in">

			<div class="lead-in-content">

				<h1><?php the_field('case_study_title', 25); ?></h1>

				<?php $the_content = apply_filters('the_content', get_post(25)->post_content); ?>
				<?php echo $the_content; ?>

				<h3><a href="/contact">Let's Chat!</a></h3>

				<h4><a href="#">See Work</a></h4>

				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					width="30px" height="13.084px" viewBox="0 0 30 13.084" enable-background="new 0 0 30 13.084" xml:space="preserve">
				<polygon fill="#C2C8CA" points="28.004,2.123 15.056,10.698 1.716,2.123 0,2.123 0,2.229 14.275,11.337 15.835,11.337 29.721,2.229
					29.721,2.123 "/>
				</svg>

			</div>

		</article>

		<?php if ( have_posts() ) : ?>

			<section class="case-study-list">

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="case-study">

						<a href="<?php the_permalink(); ?>">

							<div class="featured-image-container">

								<div class="case-study-title">
									<span>&mdash;&nbsp;Case Study&nbsp;&mdash;</span>
									<h2><?php the_title(); ?></h2>
								</div>

								<div class="hover-border" style="border-color:<?php the_field('border_color'); ?>"></div>
								<?php the_post_thumbnail(); ?>

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
