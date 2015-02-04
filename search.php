<?php
/**
 * The template for displaying search results pages.
 *
 * @package Gabriel Amadeus
 */

get_header(); ?>

	<section id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'Gabriel Amadeus' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_title(); ?>

			<?php endwhile; ?>

			<?php scratch_paging_nav(); ?>

		<?php else : ?>

			<?php the_title(); ?>

		<?php endif; ?>

	</section><!-- #primary -->

<?php get_footer(); ?>
