<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Latino_Community_Coalition
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container-fluid">
	<a class="sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'lccwm' ); ?></a>

	<nav id="site-navigation" class="row navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="site-branding navbar-brand">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$lccwm_description = get_bloginfo( 'description', 'display' );
			if ( $lccwm_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $lccwm_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'depth'          => '1',
			'container_id'   => '',
			'container_class' => 'ml-auto',
			'menu_id'        => 'primary-menu',
			'menu_class'     => 'collapse navbar-collapse list-unstyled',
			'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
			'walker'         => new WP_Bootstrap_Navwalker()
		) ); ?>
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle <?php esc_html_e( 'Primary Menu', 'lccwm' ); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>
		
	</nav>

	<div id="content" class="site-content row">
