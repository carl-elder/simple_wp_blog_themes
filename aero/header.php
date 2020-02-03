<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aero
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header container">
		<div class="site-branding row">
			<?php the_custom_logo(); ?>
		</div>

        <nav class="navbar navbar-light navbar-expand-sm">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
			<?php
				wp_nav_menu( array(
					'theme_location'    => 'menu-1',
					'container'         => 'div',
					'container_id'      => 'primary-menu',
                    'container_class'   => 'collapse collapse navbar-collapse',
                    'menu_class'        => 'navbar-nav',
                    'depth'             => '2',
                    'fallback_cb'       => 'Aero_Walker_Nav::fallback',
                    'walker'            => new Aero_Walker_Nav()
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
        <?php if(is_front_page()) get_template_part('template-parts/home_slider'); ?>
