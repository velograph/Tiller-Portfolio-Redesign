<?php
/**
* The template for displaying all single posts.
*
* @package Gabriel Amadeus
*/

get_header(); ?>

	<script>
	jQuery(document).ready(function($) {
		jQuery(document).ready(function(){
			jQuery('.gallery').slick({
				arrows: true,
				dots: true,
				mobileFirst: true,
				variableWidth: false,
			});
		});
	});
	</script>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>

			<article class="case-study">

				<div class="gallery">

					<?php the_field('gallery'); ?>

				</div>

				<div class="case-study-content">

					&mdash;&nbsp;<?php the_category(); ?>&nbsp;&mdash;

					<h4><?php the_title(); ?></h4>

					<?php the_field('case_study_content'); ?>

				</div>

			</article>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

<?php get_footer(); ?>
