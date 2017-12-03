<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package voltata
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site container">
	<header id="masthead" class="site-header row <?php voltata_header_alignment( 'masthead' ); ?>" role="banner">
		<div class="site-branding col-md-12 wow animated <?php echo get_theme_mod( 'voltata_header_one_animation' ); ?>"
				 data-wow-delay="<?php echo get_theme_mod( 'voltata_header_one_animation_delay' ); ?>s">
			
      <?php voltata_the_custom_logo(); ?>
			
      <?php if( get_theme_mod( 'voltata_display_title' ) != 'hide' ) : ?>
        <?php if ( is_front_page() && is_home() ) : ?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : ?>
          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php endif; ?>
      <?php endif; ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->
		
		<nav id="site-navigation" class="main-navigation row" role="navigation">
			<?php
			  if( get_theme_mod( 'voltata_display_search' ) != 'hide' ) :
			    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu',
															'container_class' => 'col-md-12', 'items_wrap' => add_menu_search() ) );
			  else :
			    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu',
															'container_class' => 'col-md-12' ) );
			  endif;
			?>
			
			<?php  ?>
			
		<?php if( get_theme_mod( 'voltata_display_search' ) != 'hide' ) : ?>
			<div id="menu-search-field" class="col-md-8 col-md-offset-<?php voltata_header_alignment( 'search' ); ?>"><?php get_search_form(); ?></div>
		<?php endif; ?>
		</nav><!-- #site-navigation -->
		
		<!-- Mobile nav -->
		<div id="mobile-site-navigation" class="main-navigation row" role="navigation">
			<div class="col-md-12">
				<div class="btn-group btn-block" role="group">
					<button type="button" id="menu-button" class="btn btn-default col-xs-6<?php voltata_push_mobile_menu(); ?>" aria-label="<?php echo __('Left Align', 'voltata'); ?>">
						<?php echo __('Menu', 'voltata'); ?> <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
					</button>

					<?php if( get_theme_mod( 'voltata_display_search' ) != 'hide' ) : ?>
						<button type="button" id="menu-search-button" class="btn btn-default col-xs-6" aria-label="<?php echo __('Left Align', 'voltata'); ?>">
							<?php echo __('Search', 'voltata'); ?> <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					<?php endif; ?>
				</div>
				
				<div class="row" id="mobile-search-field">
					<div class="col-xs-12"><?php get_search_form(); ?></div>
				</div>
				
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'secondary-menu') ); ?>
			</div>
		</div><!-- #mobile-site-navigation -->
	</header><!-- #masthead -->
	
	<?php if ( get_header_image() && get_theme_mod( 'voltata_header_display_type' ) != 1 ) : ?>  
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" class="img-header wow animated <?php echo get_theme_mod( 'voltata_header_two_animation' ); ?>" data-wow-delay="<?php echo get_theme_mod( 'voltata_header_two_animation_delay' ); ?>s">
		</a>
	<?php elseif ( get_theme_mod( 'voltata_header_display_type' ) == 1 && count( get_uploaded_header_images() ) >= 2 ) : ?>
	  <?php voltata_header_image_slider(); ?>
	<?php endif; // End header image check. ?>
	
	<div id="content" class="site-content row wow animated <?php echo get_theme_mod( 'voltata_content_animation' ); ?>"
			 data-wow-delay="<?php echo get_theme_mod( 'voltata_content_animation_delay' ); ?>s">
