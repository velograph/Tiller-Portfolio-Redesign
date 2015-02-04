<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Gabriel Amadeus
 */
?>

	</div><!-- #content -->


<?php if ( is_page('about') || is_front_page() ) : ?>

	<!-- // BEGIN Testimonials -->
	<?php
		$args = array(
		'post_type' => 'testimonial',
		);

		$wp_query = new WP_Query($args);
	?>

	<?php if( $wp_query->have_posts() ) : ?>

		<section class="testimonials">

			<?php while( $wp_query->have_posts() ) : ?>

				<?php $wp_query->the_post(); ?>

				<article class="testimonial">

					<svg version="1.1" id="Quote" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
					<path style="fill:#c05f4f" d="M5.315,3.401c-1.61,0-2.916,1.343-2.916,3c0,1.656,1.306,3,2.916,3c2.915,0,0.972,5.799-2.916,5.799v1.4
						C9.338,16.601,12.057,3.401,5.315,3.401z M13.715,3.401c-1.609,0-2.915,1.343-2.915,3c0,1.656,1.306,3,2.915,3
						c2.916,0,0.973,5.799-2.915,5.799v1.4C17.738,16.601,20.457,3.401,13.715,3.401z"/>
					</svg><?php the_content() ?><svg version="1.1" id="Quote" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
					<path style="fill:#c05f4f" d="M5.315,3.401c-1.61,0-2.916,1.343-2.916,3c0,1.656,1.306,3,2.916,3c2.915,0,0.972,5.799-2.916,5.799v1.4
						C9.338,16.601,12.057,3.401,5.315,3.401z M13.715,3.401c-1.609,0-2.915,1.343-2.915,3c0,1.656,1.306,3,2.915,3
						c2.916,0,0.973,5.799-2.915,5.799v1.4C17.738,16.601,20.457,3.401,13.715,3.401z"/>
					</svg>

					<span class="title">&mdash;<?php the_title() ?></span>

				</article>

			<?php endwhile; ?>

		</section>

	<?php endif; ?>

	<!-- // END Testimonials -->

<?php endif; ?>

	<!-- // BEGIN Skills -->

	<?php
		$args = array(
		'post_type' => 'skill',
		);

		$wp_query = new WP_Query($args);
	?>

	<?php if( $wp_query->have_posts() ) : ?>

		<section class="skills-container">

			<h1>What can I do for you?</h1>

			<div class="skill-row">

				<?php while( $wp_query->have_posts() ) : ?>

					<?php $wp_query->the_post(); ?>

					<article class="skill">

						<img src="<?php the_field('skill_icon') ?>" />
						<h3 class="skill-title"><?php the_title() ?></h3>
						<?php the_content() ?>

					</article>

				<?php endwhile; ?>

			</div>

		</section>

	<?php endif; ?>

	<!-- // END Skills -->

	<a href="/contact" class="contact-button">Let's Chat!</a>

	<footer class="footer">

		<section>

			<div class="social-media">

				<a href="https://www.facebook.com/gabrielamadeus" target="_blank">
					<!-- // Facebook -->
					<svg version="1.1" id="Facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
					<path style="fill:#fff" d="M17,1H3C1.9,1,1,1.9,1,3v14c0,1.101,0.9,2,2,2h7v-7H8V9.525h2V7.475c0-2.164,1.212-3.684,3.766-3.684l1.803,0.002v2.605
						h-1.197C13.378,6.398,13,7.144,13,7.836v1.69h2.568L15,12h-2v7h4c1.1,0,2-0.899,2-2V3C19,1.9,18.1,1,17,1z"/>
					</svg>
				</a>

				<a href="http://instagram.com/gabrielamadeus" target="_blank">
					<!-- // Instagram -->
					<svg version="1.1" id="Instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
					<path style="fill:#fff;" d="M17,1H3C1.9,1,1,1.9,1,3v14c0,1.101,0.9,2,2,2h14c1.1,0,2-0.899,2-2V3C19,1.9,18.1,1,17,1z M9.984,15.523
						c3.059,0,5.538-2.481,5.538-5.539c0-0.338-0.043-0.664-0.103-0.984H17v7.216c0,0.382-0.31,0.69-0.693,0.69H3.693
						C3.31,16.906,3,16.598,3,16.216V9h1.549C4.488,9.32,4.445,9.646,4.445,9.984C4.445,13.043,6.926,15.523,9.984,15.523z M6.523,9.984
						c0-1.912,1.55-3.461,3.462-3.461c1.911,0,3.462,1.549,3.462,3.461s-1.551,3.462-3.462,3.462C8.072,13.446,6.523,11.896,6.523,9.984z
						M16.307,6h-1.615C14.31,6,14,5.688,14,5.308V3.691C14,3.309,14.31,3,14.691,3h1.615C16.69,3,17,3.309,17,3.691v1.616
						C17,5.688,16.69,6,16.307,6z"/>
					</svg>
				</a>

				<a href="https://twitter.com/gabrielamadeus" target="_blank">
					<!-- // Twitter -->
					<svg version="1.1" id="Twitter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
					<path style="fill:#fff;" d="M17.316,6.246c0.008,0.162,0.011,0.326,0.011,0.488c0,4.99-3.797,10.742-10.74,10.742c-2.133,0-4.116-0.625-5.787-1.697
						c0.296,0.035,0.596,0.053,0.9,0.053c1.77,0,3.397-0.604,4.688-1.615c-1.651-0.031-3.046-1.121-3.526-2.621
						c0.23,0.043,0.467,0.066,0.71,0.066c0.345,0,0.679-0.045,0.995-0.131c-1.727-0.348-3.028-1.873-3.028-3.703c0-0.016,0-0.031,0-0.047
						c0.509,0.283,1.092,0.453,1.71,0.473c-1.013-0.678-1.68-1.832-1.68-3.143c0-0.691,0.186-1.34,0.512-1.898
						C3.942,5.498,6.725,7,9.862,7.158C9.798,6.881,9.765,6.594,9.765,6.297c0-2.084,1.689-3.773,3.774-3.773
						c1.086,0,2.067,0.457,2.756,1.191c0.859-0.17,1.667-0.484,2.397-0.916c-0.282,0.881-0.881,1.621-1.66,2.088
						c0.764-0.092,1.49-0.293,2.168-0.594C18.694,5.051,18.054,5.715,17.316,6.246z"/>
					</svg>
				</a>

			</div>

		</section>

		<section class="footer-nav">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'before' => '<span class="separator">| </span>',
				)
			); ?>
		</section>

		<div class="site-info">
			&copy;&nbsp;<?php echo date("Y") ?> Gabriel Amadeus
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
