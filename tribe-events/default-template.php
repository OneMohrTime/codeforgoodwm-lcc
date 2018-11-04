<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Display -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.23
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
	
	/* grab the url for the full size featured image */
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

	<figure class="billboard">
		<img src="<?php echo $featured_img_url; ?>"
				 alt="banner image for latin community coalition; ?>"
				 class="img-fluid" />
		<header class="entry-header">
			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		</header><!-- .entry-header -->
	</figure>

	<?php //lccwm_post_thumbnail(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">
			
			<?php
			$candidates = new WP_Query( array(
				'post_type' => 'past_event',
				'posts_per_page' => 3,
				'meta_key'		=> 'event_cat',
				'meta_value'	=> 'type2'
			) ); ?>
			<h3 class="text-warning">LCC Candidate Panels</h3>
			<div class="card-deck">
			<?php while ( $candidates->have_posts() ) : $candidates->the_post(); ?>
				<div class="card bg-dark p-4">
					<a href="<?php echo get_permalink() ?>" class="d-block text-light">
						<div class="card-date">2018</div>
						<?php the_title(); ?>
					</a>
				</div>
			<?php endwhile; wp_reset_query(); ?>
			</div>

			<?php
			while ( have_posts() ) :
				the_post();

//				get_template_part( 'template-parts/content', 'page' );
//	
//				// If comments are open or we have at least one comment, load up the comment template.
//				if ( comments_open() || get_comments_number() ) :
//					comments_template();
//				endif;

			endwhile; // End of the loop.
			?>
			
			<?php tribe_events_before_html(); ?>
			<?php tribe_get_view(); ?>
			<?php tribe_events_after_html(); ?>
			
			<div class="bg-gray">
			<?php echo do_shortcode('[contact-form-7 id="264" title="Event Form Posting"]'); ?>
			</div>
			
			<?php
			$speakers = new WP_Query( array(
				'post_type'     => 'past_event',
				'posts_per_page' => 3,
				'meta_key'		=> 'event_cat',
				'meta_value'	=> 'type1'
			) ); ?>
			<h3 class="text-warning">Latino Placemaking Series</h3>
			<div class="card-deck">
			<?php while ( $speakers->have_posts() ) : $speakers->the_post(); ?>
				<div class="card bg-primary p-4">
					<a href="<?php echo get_permalink() ?>" class="d-block text-light">
						<div class="card-date">2018</div>
						<?php the_title(); ?>
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="thumbnail image" class="img-fluid" />
					</a>
				</div>
			<?php endwhile; wp_reset_query(); ?>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
