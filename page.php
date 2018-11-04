<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Latino_Community_Coalition
 */

get_header();
?>

	<div id="primary" class="content-area col-12 col-sm-8 col-lg-9">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
			
		<?php

		// check if the repeater field has rows of data
		if( have_rows('person') ): ?>
			<div class="card-deck row">

			<?php
			// loop through the rows of data
			while ( have_rows('person') ) : the_row();

				// display a sub field value
				$image = get_sub_field('image');
				$name = get_sub_field('name');
				$description = get_sub_field('description'); ?>
				
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
				<div class="card orange">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="card-img-top" />
					<div class="card-body">
						<h5 class="card-title"><?php echo $name; ?></h5>
						<div class="card-text">
							<?php echo $description; ?>
						</div>
					</div>
				</div>
				</div>
			<?php
			endwhile; ?>
			</div>
		<?php
		else :

			// no rows found

		endif;

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
