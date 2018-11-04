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
	
	/* grab the url for the full size featured image */
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

	<figure class="billboard">
		<img src="<?php echo $featured_img_url; ?>"
				 alt="banner image for latin community coalition; ?>"
				 class="img-fluid" />
		<header class="entry-header">
			<?php the_title( '<h3 class="entry-title text-uppercase">', '</h3>' ); ?>
		</header><!-- .entry-header -->
	</figure>

	<?php //lccwm_post_thumbnail(); ?>

	<div id="primary" class="content-area container">
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
		
		if( have_rows('values_card') ):
		echo '<h3>Our Values</h3>';
		
		$i = 0;
		while ( have_rows('values_card') ) : the_row();
			// vars
			$values_color = get_sub_field('color');
			$values_title = get_sub_field('title');
			$values_body = get_sub_field('body'); ?>

			<div class="col-12 col-sm-6 col-md-4">
			<div class="card <?php echo $values_color; ?>">
				<div class="card-header">
					<h3 class="card-title"><?php echo $values_title; ?></h3>
				</div>
				<div class="card-body">
					<?php echo $values_body; ?>
				</div>
			</div>
			</div>
			<?php 
			// Increment the iterator.
			$i ++;
			if ($i % 3 === 0) {
				// Wrap card deck for small displays on every second card.
				echo '<div class="clearfix mb-4"></div>';
			}
		
		endwhile;
		endif; ?>
		
		<div class="clearfix mt-5"></div>

		<?php
		$our_story = get_field('our_story');
		
		if($our_story): ?>
		
		<figure class="my-5">
			<div class="col-12 col-sm-6">
				<h3 class="mb-2">Our Story</h3>
				<?php echo $our_story['body_copy']; ?>
			</div>
			<div class="col-12 col-sm-6">
				<img src="<?php echo $our_story['image']['url']; ?>" alt="<?php echo $our_story['image']['alt']; ?>" class="img-fluid mt-5" />
			</div>
		</figure>
		
		<div class="clearfix"></div>
		
		<?php
		endif;
		
		// check if the repeater field has rows of data
		if( have_rows('person') ): ?>
			<h3 class="my-3">Our Steering Committee</h3>
			<div class="row mb-5">

			<?php
			// loop through the rows of data
			while ( have_rows('person') ) : the_row();

				// display a sub field value
				$image = get_sub_field('image');
				$name = get_sub_field('name');
				$description = get_sub_field('description'); ?>
				
				<div class="col-12 col-sm-6 col-md-4">
				<div class="card bg-light text-dark pt-3 px-3 mb-3">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="card-img-top" />
					<div class="card-body px-0">
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
get_footer();
