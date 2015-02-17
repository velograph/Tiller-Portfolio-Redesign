<?php
/**
 * Template Name: About
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Gabriel Amadeus
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_post_thumbnail(); ?>

			<article class="about-gabe">

				<div class="entry-content">
					<h4>&mdash;&nbsp;Who?&nbsp;&mdash;</h4>
					<h1>Hi.</h1>
					<?php the_content(); ?>
				</div>
				
			</article>

			<section class="experience-container">

				<div class="experience-row">

					<div class="experience">

						<h3><?php the_field('first_position_title'); ?>
						<?php the_field('first_position_company'); ?>
						<?php the_field('first_position_date'); ?></h3>

						<?php the_field('first_position_summary'); ?>

					</div>

					<div class="experience">

						<h3><?php the_field('second_position_title'); ?>
						<?php the_field('second_position_company'); ?>
						<?php the_field('second_position_date'); ?></h3>

						<?php the_field('second_position_summary'); ?>

					</div>

					<div class="experience">

						<h3><?php the_field('third_position_title'); ?>
						<?php the_field('third_position_company'); ?>
						<?php the_field('third_position_date'); ?></h3>

						<?php the_field('third_position_summary'); ?>

					</div>

					<div class="experience">
						<h4>Technical Skills</h4>
						<?php the_field('technical_skills'); ?>

						<h4>Education</h4>
						<?php the_field('education'); ?>

						<h4>Interests</h4>
						<?php the_field('interests'); ?>

					</div>

				</div>

			</section>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
