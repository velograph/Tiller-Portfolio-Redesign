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

			</div>

		</article>

		<h3><a href="/contact">Let's Chat!</a></h3>

		<h4><a href="#">See Work</a></h4>

		<?php if ( have_posts() ) : ?>

			<section class="case-study-list">

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="case-study">

						<a href="<?php the_permalink(); ?>">
							<div class="case-study-title">
								<span>&mdash;&nbsp;Case Study&nbsp;&mdash;</span>
								<h2><?php the_title(); ?></h2>
							</div>

							<div class="box outside-border"></div>

							<div class="box inside-border"></div>

							<div class="featured-image-container">
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
