<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Latino_Community_Coalition
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lccwm' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	
	<?php //lccwm_post_thumbnail();

	if(get_field('photo_gallery')):
	$image_ids = get_field('photo_gallery', false, false);
	$shortcode = '[gallery ids="' . implode(',', $image_ids) . '"]';

	echo do_shortcode( $shortcode );
	endif;
	
	$sponsors = get_field('sponsors');

	if( $sponsors ): ?>
		<ul>
		<?php foreach( $sponsors as $sponsor ): // variable must NOT be called $post (IMPORTANT) ?>
			<li>
				<?php echo wp_get_attachment_image( $sponsor->ID, 'full' ); ?>
				<?php echo get_the_title( $sponsor->ID ); ?>
			</li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'lccwm' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
