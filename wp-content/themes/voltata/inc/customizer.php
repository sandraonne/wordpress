<?php
/**
 * voltata Theme Customizer.
 *
 * @package voltata
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function voltata_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';	
	
	$wp_customize->get_setting( 'background_color' )->default   = '#ffffff';
	$wp_customize->get_section( 'colors' )->title               = __('General Color Settings', 'voltata');
	$wp_customize->get_section( 'colors' )->description         = __('Adjust the primary colors of your site.', 'voltata');
	$wp_customize->get_section( 'header_image' )->title         = __('Header Image and Header Slider', 'voltata');
	$wp_customize->get_section( 'header_image' )->description   = __('Tick off the check box at the bottom to activate the header slider.', 'voltata');
	
	//  =============================
	//  = 1.1 Menu Link Color       =
	//  =============================
	$wp_customize->add_setting('voltata_nav_color', array(
			'default'           => '#333333',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_nav_color', array(
	    'label'      => __( 'Menu Link Color', 'voltata' ),
	    'section'    => 'colors',
	    'settings'   => 'voltata_nav_color',
  )));
	
	//  =============================
	//  = 1.2 Body Text Color       =
	//  =============================
	$wp_customize->add_setting('voltata_font_color', array(
			'default'           => '#333333',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_font_color', array(
	    'label'      => __( 'Text Color', 'voltata' ),
	    'section'    => 'colors',
	    'settings'   => 'voltata_font_color',
  )));
	
	//  =============================
	//  = 1.3 Body Link Color       =
	//  =============================
	$wp_customize->add_setting('voltata_link_color', array(
			'default'           => '#333333',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_link_color', array(
	    'label'      => __( 'Link Color', 'voltata' ),
	    'section'    => 'colors',
	    'settings'   => 'voltata_link_color',
  )));
	
	//  =============================
	//  = 1.4 Menu Link Hover Color =
	//  =============================
	$wp_customize->add_setting('voltata_link_hover_color', array(
			'default'           => '#333333',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_link_hover_color', array(
	    'label'      => __( 'Link Hover Color', 'voltata' ),
	    'section'    => 'colors',
	    'settings'   => 'voltata_link_hover_color',
  )));
	
	//  ====================================
	//  = 1.5 Mobile Menu Background Color =
	//  ====================================
	$wp_customize->add_setting('voltata_mobile_background_colors', array(
			'default'           => 'dark',
		  'transport'         => 'postMessage',
			'sanitize_callback' => 'voltata_sanitize_menu_background',
	));
	
	$wp_customize->add_control( 'voltata_mobile_background_colors', array(
			'label'    => __('Select which color template for the menu, when shown on mobile devices', 'voltata'),
			'section'  => 'colors',
			'settings' => 'voltata_mobile_background_colors',
			'type'     => 'select',
			'choices'  => array(
					'dark'  => __('Dark', 'voltata'),
					'light' => __('Light', 'voltata'),
			),
	));
	
	//  =============================
	//  = 2.1 Footer color options  =
	//  =============================
	$wp_customize->add_section('voltata_footer_colors', array(
			'title'       => __('Footer Color Settings', 'voltata'),
			'description' => __('Adjust the colors used in the footer of your site.', 'voltata' ),
			'priority'    => 40,
	));
	
	//  ===============================
	//  = 2.1 Footer Background color =
	//  ===============================
	$wp_customize->add_setting('voltata_footer_background', array(
			'default'           => '#333333',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_footer_background', array(
	    'label'      => __( 'Footer Background Color', 'voltata' ),
	    'section'    => 'voltata_footer_colors',
	    'settings'   => 'voltata_footer_background',
  )));
	
	//  =============================
	//  = 2.2 Footer Text Color     =
	//  =============================
	$wp_customize->add_setting('voltata_footer_color', array(
			'default'           => '#eeeeee',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_footer_color', array(
	    'label'      => __( 'Footer Text Color', 'voltata' ),
	    'section'    => 'voltata_footer_colors',
	    'settings'   => 'voltata_footer_color',
  )));
	
	//  ===============================
	//  = 2.3 Footer Muted Text Color =
	//  ===============================
	$wp_customize->add_setting('voltata_footer_muted_color', array(
			'default'           => '#777777',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_footer_muted_color', array(
	    'label'      => __( 'Footer Muted Text Color', 'voltata' ),
	    'section'    => 'voltata_footer_colors',
	    'settings'   => 'voltata_footer_muted_color',
  )));
	
  //  =============================
	//  = 2.4 Footer Link Color     =
	//  =============================
	$wp_customize->add_setting('voltata_footer_link', array(
			'default'           => '#eeeeee',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_footer_link', array(
	    'label'      => __( 'Footer Link Color', 'voltata' ),
	    'section'    => 'voltata_footer_colors',
	    'settings'   => 'voltata_footer_link',
  )));
	
	//  ===============================
	//  = 2.5 Footer Link Hover Color =
	//  ===============================
	$wp_customize->add_setting('voltata_footer_link_hover', array(
			'default'           => '#337ab7',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_footer_link_hover', array(
	    'label'      => __( 'Footer Link Hover Color', 'voltata' ),
	    'section'    => 'voltata_footer_colors',
	    'settings'   => 'voltata_footer_link_hover',
  )));
	
	//  ===============================
	//  = 2.6 BackToTop Background    =
	//  ===============================
	$wp_customize->add_setting('voltata_footer_backtotop_background', array(
			'default'           => '#ffffff',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_footer_backtotop_background', array(
	    'label'      => __( 'BackToTop Button Background Color', 'voltata' ),
	    'section'    => 'voltata_footer_colors',
	    'settings'   => 'voltata_footer_backtotop_background',
  )));
	
	//  ===============================
	//  = 2.7 BackToTop Border        =
	//  ===============================
	$wp_customize->add_setting('voltata_footer_backtotop_border', array(
			'default'           => '#cccccc',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_footer_backtotop_border', array(
	    'label'      => __( 'BackToTop Button Border Color', 'voltata' ),
	    'section'    => 'voltata_footer_colors',
	    'settings'   => 'voltata_footer_backtotop_border',
  )));
	
	//  ===============================
	//  = 2.8 BackToTop Color         =
	//  ===============================
	$wp_customize->add_setting('voltata_footer_backtotop_color', array(
			'default'           => '#333333',
		  'transport'         => 'postMessage',
		  'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'voltata_footer_backtotop_color', array(
	    'label'      => __( 'BackToTop Button Arrow Color', 'voltata' ),
	    'section'    => 'voltata_footer_colors',
	    'settings'   => 'voltata_footer_backtotop_color',
  )));
	
	//  =============================
	//  = 3.0 Header image          =
	//  =============================
	$wp_customize->add_setting('voltata_header_display_type', array(
      'default'           => '',
		  'sanitize_callback' => 'voltata_sanitize_checkbox',
  ));
 
  $wp_customize->add_control('voltata_header_display_type', array(
      'description' => __( 'Display Header Images as a Gallery? (Note: this option only works if you uploaded multiple images.)' , 'voltata'),
		  'label'       => __( 'Header Slider', 'voltata' ),
      'section'     => 'header_image',
      'settings'    => 'voltata_header_display_type',
      'type'        => 'checkbox',
  ));
	
	//  =============================
	//  = 4.0 Theme Google Fonts    =
	//  =============================
	$wp_customize->add_section('voltata_google_fonts', array(
			'title'       => __('Voltata Google Fonts', 'voltata'),
			'description' => __('Select which Google Fonts to use on the site. Add the Google Fonts plugin for more options. Please be aware that Google Fonts <b>might</b> slow down your site.', 'voltata' ),
			'priority'    => 170,
	));
	
	$voltata_font_array = array(
				  'Helvetica'         => __('Helvetica', 'voltata'),
					'Playfair+Display'  => __('Playfair Display', 'voltata'),
					'Work+sans'         => __('Work Sans', 'voltata'),
				  'Alegreya'          => __('Alegreya', 'voltata'),
				  'Alegreya+Sans'     => __('Alegreya Sans', 'voltata'),
				  'Fira+Sans'         => __('Fira Sans', 'voltata'),
				  'Inconsolata'       => __('Inconsolata', 'voltata'),
				  'Source+Sans+Pro'   => __('Source Sans Pro', 'voltata'),
				  'Source+Serif+Pro'  => __('Source Serif Pro', 'voltata'),
				  'Lora'              => __('Lora', 'voltata'),
				  'Karla'             => __('Karla', 'voltata'),
					'Poppins'           => __('Poppins', 'voltata'),
					'Neuton'            => __('Neuton', 'voltata'),
				  'Merriweather'      => __('Merriweather', 'voltata'),
				  'Open+Sans'         => __('Open Sans', 'voltata'),
				  'Roboto'            => __('Roboto', 'voltata'),
				  'Roboto+Slab'       => __('Roboto Slab', 'voltata'),
				  'Lato'              => __('Lato', 'voltata'),
				  'Anonymous+Pro'     => __('Anonymous Pro', 'voltata'),
				  'Archivo+Narrow'    => __('Archivo Narrow', 'voltata'),
				  'Libre+Baskerville' => __('Libre Baskerville', 'voltata'),
					'Crimson+Text'      => __('Crimson Text', 'voltata'),
					'Montserrat'        => __('Montserrat', 'voltata'),
				  'Chivo'             => __('Chivo', 'voltata'),
				  'Old+Standard+TT'    => __('Old Standard TT', 'voltata'),
				  'Domine'            => __('Domine', 'voltata'),
				  'Varela+Round'      => __('Varela Round', 'voltata'),
				  'Bitter'            => __('Bitter', 'voltata'),
				  'Cardo'             => __('Cardo', 'voltata'),
				  'Arvo'              => __('Arvo', 'voltata'),
				  'PT+Serif'          => __('PT Serif', 'voltata'),
	);
	
	//  ==============================
	//  = 4.1 Headings Font Selecter =
	//  ==============================
	$wp_customize->add_setting('voltata_google_font_headings', array(
			'default'           => 'Helvetica',
			'sanitize_callback' => 'voltata_sanitize_google_fonts',
	));
	
	$wp_customize->add_control( 'voltata_google_font_headings', array(
			'label'    => __('Select which font to use for the site title and headers (h1, h2, h3, h4, h5, h6).', 'voltata'),
			'section'  => 'voltata_google_fonts',
			'settings' => 'voltata_google_font_headings',
			'type'     => 'select',
			'choices'  => $voltata_font_array,
	));
	
	//  =============================
	//  = 4.2 Body Font Selecter    =
	//  =============================
	$wp_customize->add_setting('voltata_google_font_body', array(
			'default'           => 'Helvetica',
			'sanitize_callback' => 'voltata_sanitize_google_fonts',
	));
	
	$wp_customize->add_control( 'voltata_google_font_body', array(
			'label'    => __('Select which font to use for the body.', 'voltata'),
			'section'  => 'voltata_google_fonts',
			'settings' => 'voltata_google_font_body',
			'type'     => 'select',
			'choices'  => $voltata_font_array,
	));
	
	//  =============================
	//  = 5. Theme display options  =
	//  =============================
	$wp_customize->add_section('voltata_display_options', array(
			'title'       => __('Voltata Display Options', 'voltata'),
			'description' => __('Select which areas of content you wish to display.', 'voltata' ),
			'priority'    => 180,
	));
	
	//  =============================
	//  = 5.1 Image logo            =
	//  =============================
	$wp_customize->add_setting('voltata_logo_image', array(
			'default'           => '',
		  'sanitize_callback' => 'voltata_sanitize_image',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'voltata_logo_image', array(
			'label'    => __('Upload a logo image. Please note that if you run WordPress v4.5 or newer, you should use the logo uploader found here in the Customizer, but under the Site Identity section', 'voltata'),
			'section'  => 'voltata_display_options',
			'settings' => 'voltata_logo_image',
	)));
	
	//  =============================
	//  = 5.2 Display site title    =
	//  =============================
	$wp_customize->add_setting('voltata_display_title', array(
			'default'           => 'display',
			'sanitize_callback' => 'voltata_sanitize_radio',
	));

	$wp_customize->add_control('voltata_display_title', array(
			'label'      => __('Display site title', 'voltata'),
			'section'    => 'voltata_display_options',
			'settings'   => 'voltata_display_title',
			'type'       => 'radio',
			'choices'    => array(
			    'display' => __('Display', 'voltata'),
			    'hide'    => __('Hide', 'voltata'),
			),
	));
	
	//  =============================
	//  = 5.3 Header alignment      =
	//  =============================
	$wp_customize->add_setting('voltata_header_alignment', array(
			'default'           => 'center',
			'sanitize_callback' => 'voltata_sanitize_select_alignment',
	));
	
	$wp_customize->add_control( 'voltata_header_alignment', array(
			'label'    => __('Header alignment', 'voltata'),
			'section'  => 'voltata_display_options',
			'settings' => 'voltata_header_alignment',
			'type'     => 'select',
			'choices'  => array(
					'left'   => __('Left Alignment', 'voltata'),
					'center' => __('Center Alignment', 'voltata'),
					'right'  => __('Right Alignment', 'voltata'),
			),
	));
	
	//  =============================
	//  = 5.4 Display header search =
	//  =============================
	$wp_customize->add_setting('voltata_display_search', array(
			'default'           => 'display',
			'sanitize_callback' => 'voltata_sanitize_radio',
	));

	$wp_customize->add_control('voltata_display_search', array(
			'label'      => __('Display header search', 'voltata'),
			'section'    => 'voltata_display_options',
			'settings'   => 'voltata_display_search',
			'type'       => 'radio',
			'choices'    => array(
			    'display' => __('Display', 'voltata'),
			    'hide'    => __('Hide', 'voltata'),
			),
	));
	
	//  =============================
	//  = 5.5 Sidebar position      =
	//  =============================
	$wp_customize->add_setting('voltata_sidebar_position', array(
			'default'           => 'none',
			'sanitize_callback' => 'voltata_sanitize_select',
	));
	
	$wp_customize->add_control( 'voltata_sidebar_position', array(
			'label'    => __('Select sidebar position on blog posts and frontpage, if blog posts is featured there', 'voltata'),
			'section'  => 'voltata_display_options',
			'settings' => 'voltata_sidebar_position',
			'type'     => 'select',
			'choices'  => array(
					'right' => __('Right side', 'voltata'),
					'left'  => __('Left side', 'voltata'),
					'none'  => __('No sidebar', 'voltata'),
			),
	));
	
	//  =============================
	//  = 5.6 Blog post length      =
	//  =============================
	$wp_customize->add_setting('voltata_blog_length', array(
			'default'           => 'display',
			'sanitize_callback' => 'voltata_sanitize_radio',
	));

	$wp_customize->add_control('voltata_blog_length', array(
			'label'      => __('Display full blog content on blog list', 'voltata'),
			'section'    => 'voltata_display_options',
			'settings'   => 'voltata_blog_length',
			'type'       => 'radio',
			'choices'    => array(
			    'display' => __('Full content', 'voltata'),
			    'hide'    => __('An excerpt', 'voltata'),
			),
	));
	
	//  =============================
	//  = 5.7 Slide to top button   =
	//  =============================
	$wp_customize->add_setting('voltata_display_top', array(
			'default'           => 'display',
			'sanitize_callback' => 'voltata_sanitize_radio',
	));

	$wp_customize->add_control('voltata_display_top', array(
			'label'      => __('Back to top button', 'voltata'),
			'section'    => 'voltata_display_options',
			'settings'   => 'voltata_display_top',
			'type'       => 'radio',
			'choices'    => array(
			    'display' => __('Display', 'voltata'),
			    'hide'    => __('Hide', 'voltata'),
			),
	));
	
	//  =============================
	//  = 5.8 Footer branding       =
	//  =============================
	$wp_customize->add_setting('voltata_display_branding', array(
			'default'           => 'display',
			'sanitize_callback' => 'voltata_sanitize_radio',
	));

	$wp_customize->add_control('voltata_display_branding', array(
			'label'      => __('Footer branding text', 'voltata'),
			'section'    => 'voltata_display_options',
			'settings'   => 'voltata_display_branding',
			'type'       => 'radio',
			'choices'    => array(
			    'display' => __('Display', 'voltata'),
			    'hide'    => __('Hide', 'voltata'),
			),
	));
	
	/////////////////////////////////////////////////////////////////////////////////////
	
	//  ==============================
	//  = 6. Theme animation options =
	//  ==============================
	$wp_customize->add_section('voltata_animation_options', array(
			'title'       => __('Voltata Animation Options', 'voltata'),
			'description' => __('Set which animations you wish to use and the delay time.<br><br>
			                     Delay times must be 0, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5 or 5 seconds.<br><br>
			                     See examples of the animations <a href="', 'voltata') . esc_url( __( 'https://daneden.github.io/animate.css/', 'voltata' ) ) . __('" target="_blank">here</a>.', 'voltata' ),
			'priority'    => 190,
	));
	
	//  =========================================
	//  = 6. Array containing animation options =
	//  =========================================
	$voltata_animations_array = array(
		      'none'               => __('No animation', 'voltata'),
			    'bounce'             => __('bounce', 'voltata'),
			    'flash'              => __('flash', 'voltata'),
				  'pulse'              => __('pulse', 'voltata'),
				  'rubberBand'         => __('rubberBand', 'voltata'),
				  'shake'              => __('shake', 'voltata'),
				  'headShake'          => __('headShake', 'voltata'),
				  'swing'              => __('swing', 'voltata'),
				  'tada'               => __('tada', 'voltata'),
				  'wobble'             => __('wobble', 'voltata'),
				  'jello'              => __('jello', 'voltata'),
				  'bounceIn'           => __('bounceIn', 'voltata'),
				  'bounceInDown'       => __('bounceInDown', 'voltata'),
				  'bounceInLeft'       => __('bounceInLeft', 'voltata'),
				  'bounceInRight'      => __('bounceInRight', 'voltata'),
				  'bounceInUp'         => __('bounceInUp', 'voltata'),
				  'bounceOut'          => __('bounceOut', 'voltata'),
				  'bounceOutDown'      => __('bounceOutDown', 'voltata'),
				  'bounceOutLeft'      => __('bounceOutLeft', 'voltata'),
				  'bounceOutRight'     => __('bounceOutRight', 'voltata'),
				  'bounceOutUp'        => __('bounceOutUp', 'voltata'),
				  'fadeIn'             => __('fadeIn', 'voltata'),
				  'fadeInDown'         => __('fadeInDown', 'voltata'),
				  'fadeInDownBig'      => __('fadeInDownBig', 'voltata'),
				  'fadeInLeft'         => __('fadeInLeft', 'voltata'),
				  'fadeInLeftBig'      => __('fadeInLeftBig', 'voltata'),
				  'fadeInRight'        => __('fadeInRight', 'voltata'),
				  'fadeInRightBig'     => __('fadeInRightBig', 'voltata'),
				  'fadeInUp'           => __('fadeInUp', 'voltata'),
				  'fadeInUpBig'        => __('fadeInUpBig', 'voltata'),
				  'fadeOut'            => __('fadeOut', 'voltata'),
				  'fadeOutDown'        => __('fadeOutDown', 'voltata'),
				  'fadeOutDownBig'     => __('fadeOutDownBig', 'voltata'),
				  'fadeOutLeft'        => __('fadeOutLeft', 'voltata'),
				  'fadeOutLeftBig'     => __('fadeOutLeftBig', 'voltata'),
				  'fadeOutRight'       => __('fadeOutRight', 'voltata'),
				  'fadeOutRightBig'    => __('fadeOutRightBig', 'voltata'),
				  'fadeOutUp'          => __('fadeOutUp', 'voltata'),
				  'fadeOutUpBig'       => __('fadeOutUpBig', 'voltata'),
				  'flipInX'            => __('flipInX', 'voltata'),
				  'flipInY'            => __('flipInY', 'voltata'),
				  'flipOutX'           => __('flipOutX', 'voltata'),
				  'flipOutY'           => __('flipOutY', 'voltata'),
				  'lightSpeedIn'       => __('lightSpeedIn', 'voltata'),
				  'lightSpeedOut'      => __('lightSpeedOut', 'voltata'),
				  'rotateIn'           => __('rotateIn', 'voltata'),
				  'rotateInDownLeft'   => __('rotateInDownLeft', 'voltata'),
				  'rotateInDownRight'  => __('rotateInDownRight', 'voltata'),
				  'rotateInUpLeft'     => __('rotateInUpLeft', 'voltata'),
				  'rotateInUpRight'    => __('rotateInUpRight', 'voltata'),
				  'rotateOut'          => __('rotateOut', 'voltata'),
				  'rotateOutDownLeft'  => __('rotateOutDownLeft', 'voltata'),
				  'rotateOutDownRight' => __('rotateOutDownRight', 'voltata'),
				  'rotateOutUpLeft'    => __('rotateOutUpLeft', 'voltata'),
				  'rotateOutUpRight'   => __('rotateOutUpRight', 'voltata'),
				  'hinge'              => __('hinge', 'voltata'),
				  'rollIn'             => __('rollIn', 'voltata'),
				  'rollOut'            => __('rollOut', 'voltata'),
				  'zoomIn'             => __('zoomIn', 'voltata'),
				  'zoomInDown'         => __('zoomInDown', 'voltata'),
				  'zoomInLeft'         => __('zoomInLeft', 'voltata'),
				  'zoomInRight'        => __('zoomInRight', 'voltata'),
				  'zoomInUp'           => __('zoomInUp', 'voltata'),
				  'zoomOut'            => __('zoomOut', 'voltata'),
				  'zoomOutDown'        => __('zoomOutDown', 'voltata'),
				  'zoomOutLeft'        => __('zoomOutLeft', 'voltata'),
				  'zoomOutRight'       => __('zoomOutRight', 'voltata'),
				  'zoomOutUp'          => __('zoomOutUp', 'voltata'),
				  'slideInDown'        => __('slideInDown', 'voltata'),
				  'slideInLeft'        => __('slideInLeft', 'voltata'),
				  'slideInRight'       => __('slideInRight', 'voltata'),
				  'slideInUp'          => __('slideInUp', 'voltata'),
				  'slideOutDown'       => __('slideOutDown', 'voltata'),
				  'slideOutLeft'       => __('slideOutLeft', 'voltata'),
				  'slideOutRight'      => __('slideOutRight', 'voltata'),
				  'slideOutUp'         => __('slideOutUp', 'voltata')
	);
	
	//  =============================
	//  = 6.1 Header p1 animation   =
	//  =============================
	$wp_customize->add_setting('voltata_header_one_animation', array(
			'default'           => 'fadeInDown',
		  'sanitize_callback' => 'voltata_sanitize_select_animation',
	));
	
	$wp_customize->add_control('voltata_header_one_animation', array(
		  'label'       => __('The combined logo, title and description animation. Default is fadeInDown.', 'voltata'),
			'section'     => 'voltata_animation_options',
			'settings'    => 'voltata_header_one_animation',
		  'type'        => 'select',
			'choices'     => $voltata_animations_array,
	));
	
	//  =================================
	//  = 6.2 Header p1 animation delay =
	//  ================================
	$wp_customize->add_setting('voltata_header_one_animation_delay', array(
			'default'           => '0',
		  'sanitize_callback' => 'voltata_sanitize_animation_delay',
	));

	$wp_customize->add_control('voltata_header_one_animation_delay', array(
		  'label'       => __('The combined logo, title and description animation delay.', 'voltata'),
			'section'     => 'voltata_animation_options',
			'settings'    => 'voltata_header_one_animation_delay',
		  'type'        => 'number',
	));
	
	//  =============================
	//  = 6.3 Header p2 animation   =
	//  =============================
	$wp_customize->add_setting('voltata_header_two_animation', array(
			'default'           => 'fadeIn',
		  'sanitize_callback' => 'voltata_sanitize_select_animation',
	));
	
	$wp_customize->add_control('voltata_header_two_animation', array(
		  'label'       => __('Header image animation. Default is fadeIn.', 'voltata'),
			'section'     => 'voltata_animation_options',
			'settings'    => 'voltata_header_two_animation',
		  'type'        => 'select',
			'choices'     => $voltata_animations_array,
	));
	
	//  ==============================
	//  = 6.4 Header animation delay =
	//  ==============================
	$wp_customize->add_setting('voltata_header_two_animation_delay', array(
			'default'           => '0.5',
		  'sanitize_callback' => 'voltata_sanitize_animation_delay',
	));

	$wp_customize->add_control('voltata_header_two_animation_delay', array(
		  'label'       => __('Header image animation delay.', 'voltata'),
			'section'     => 'voltata_animation_options',
			'settings'    => 'voltata_header_two_animation_delay',
		  'type'        => 'number',
	));
	
	//  ================================
	//  = 6.5 Main content animation   =
	//  ================================
	$wp_customize->add_setting('voltata_content_animation', array(
			'default'           => 'fadeIn',
		  'sanitize_callback' => 'voltata_sanitize_select_animation',
	));
	
	$wp_customize->add_control('voltata_content_animation', array(
		  'label'       => __('Main content animation. Default is fadeIn.', 'voltata'),
			'section'     => 'voltata_animation_options',
			'settings'    => 'voltata_content_animation',
		  'type'        => 'select',
			'choices'     => $voltata_animations_array,
	));
	
	//  ====================================
	//  = 6.6 Main content animation delay =
	//  ====================================
	$wp_customize->add_setting('voltata_content_animation_delay', array(
			'default'           => '1',
		  'sanitize_callback' => 'voltata_sanitize_animation_delay',
	));

	$wp_customize->add_control('voltata_content_animation_delay', array(
		  'label'       => __('Main content animation delay.', 'voltata'),
			'section'     => 'voltata_animation_options',
			'settings'    => 'voltata_content_animation_delay',
		  'type'        => 'number',
	));
	
	/////////////////////////////////////////////////////////////////////////////////////
	
	//  =============================
	//  = 7. Theme social options   =
	//  =============================
	$wp_customize->add_section('voltata_social_options', array(
			'title'       => __('Voltata Social Options', 'voltata'),
			'description' => __('Provide the URL to the social networks you\'d like to display.<br/><br/>
	                  It\'s highly recommended that you copy and paste the whole link like this:
										<b>https://www.facebook.com/facebook?fref=ts</b>', 'voltata' ),
			'priority'    => 200,
	));
	
	//  =============================
	//  = 7.1 Facebook              =
	//  =============================
	$wp_customize->add_setting('voltata_facebook', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_facebook', array(
		  'label'       => __('Facebook', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_facebook',
	));
	
	//  =============================
	//  = 7.2 Twitter               =
	//  =============================
	$wp_customize->add_setting('voltata_twitter', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_twitter', array(
		  'label'       => __('Twitter', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_twitter',
	));
	
	//  =============================
	//  = 7.3 LinkedIn              =
	//  =============================
	$wp_customize->add_setting('voltata_linkedin', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_linkedin', array(
		  'label'       => __('LinkedIn', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_linkedin',
	));
	
	//  =============================
	//  = 7.4 Pinterest             =
	//  =============================
	$wp_customize->add_setting('voltata_pinterest', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_pinterest', array(
		  'label'       => __('Pinterest', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_pinterest',
	));
	
	//  =============================
	//  = 7.5 Google+               =
	//  =============================
	$wp_customize->add_setting('voltata_google_plus', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_google_plus', array(
		  'label'       => __('Google+', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_google_plus',
	));
	
	//  =============================
	//  = 7.6 Tumblr                =
	//  =============================
	$wp_customize->add_setting('voltata_tumblr', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_tumblr', array(
		  'label'       => __('Tumblr', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_tumblr',
	));
	
	//  =============================
	//  = 7.7 Instagram             =
	//  =============================
	$wp_customize->add_setting('voltata_instagram', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_instagram', array(
		  'label'       => __('Instagram', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_instagram',
	));
	
	//  =============================
	//  = 7.8 Flickr                =
	//  =============================
	$wp_customize->add_setting('voltata_flickr', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_flickr', array(
		  'label'       => __('Flickr', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_flickr',
	));
	
	//  =============================
	//  = 7.9 YouTube               =
	//  =============================
	$wp_customize->add_setting('voltata_youtube', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_youtube', array(
		  'label'       => __('YouTube', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_youtube',
	));
	
	//  =============================
	//  = 7.10 Dribbble             =
	//  =============================
	$wp_customize->add_setting('voltata_dribbble', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_dribbble', array(
		  'label'       => __('Dribbble', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_dribbble',
	));
	
	//  =============================
	//  = 7.11 Soundcloud           =
	//  =============================
	$wp_customize->add_setting('voltata_soundcloud', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_soundcloud', array(
		  'label'       => __('Soundcloud', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_soundcloud',
	));
	
	//  =============================
	//  = 7.12 Envato               =
	//  =============================
	$wp_customize->add_setting('voltata_envato', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_envato', array(
		  'label'       => __('Envato', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_envato',
	));
	
	//  =============================
	//  = 7.13 Behance              =
	//  =============================
	$wp_customize->add_setting('voltata_behance', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_behance', array(
		  'label'       => __('Behance', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_behance',
	));
	
	//  =============================
	//  = 7.14 Vimeo                =
	//  =============================
	$wp_customize->add_setting('voltata_vimeo', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_vimeo', array(
		  'label'       => __('Vimeo', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_vimeo',
	));
	
	//  =============================
	//  = 7.15 WordPress            =
	//  =============================
	$wp_customize->add_setting('voltata_wordpress', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_wordpress', array(
		  'label'       => __('WordPress', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_wordpress',
	));
	
	//  =============================
	//  = 7.16 DeviantArt           =
	//  =============================
	$wp_customize->add_setting('voltata_deviantart', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_deviantart', array(
		  'label'       => __('DeviantArt', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_deviantart',
	));
	
	//  =============================
	//  = 7.17 Evernote             =
	//  =============================
	$wp_customize->add_setting('voltata_evernote', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_evernote', array(
		  'label'       => __('Evernote', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_evernote',
	));
	
	//  =============================
	//  = 7.18 Blogger              =
	//  =============================
	$wp_customize->add_setting('voltata_blogger', array(
			'default'           => '',
		  'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('voltata_blogger', array(
		  'label'       => __('Blogger', 'voltata'),
			'section'     => 'voltata_social_options',
			'settings'    => 'voltata_blogger',
	));
	
}
add_action( 'customize_register', 'voltata_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function voltata_customize_preview_js() {
	wp_enqueue_script( 'voltata-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'voltata_customize_preview_js' );

/**
 * Adds custom colors to wp_head
 */
function voltata_customize_css()
{
	$header_font = str_replace( '+', ' ', get_theme_mod('voltata_google_font_headings', 'Helvetica') );
	$body_font   = str_replace( '+', ' ', get_theme_mod('voltata_google_font_body', 'Helvetica') );
  ?>
  <style type="text/css">
		h1, h2, h3, h4, h5, h6{ font-family: '<?php echo $header_font; ?>', 'Helvetica', 'Arial', sans-serif; }
		body{ font-family: '<?php echo $body_font; ?>', 'Helvetica', 'Arial', sans-serif; }
		
		.main-navigation a, .main-navigation a:visited{ color:<?php echo get_theme_mod('voltata_nav_color', '#333333'); ?>; }
		#page, .entry-meta{ color:<?php echo get_theme_mod('voltata_font_color', '#333333'); ?>; }
		#content a, #content a:visited{ color:<?php echo get_theme_mod('voltata_link_color', '#333333'); ?>; }
		#content a:hover{ color:<?php echo get_theme_mod('voltata_link_hover_color', '#333333'); ?>; }
		
		#primary-menu .menu-item-has-children .sub-menu,
		#primary-menu .page_item_has_children .children{ background-color:#<?php echo get_theme_mod('background_color', '#ffffff'); ?>; }
		
		<?php if ( get_theme_mod('voltata_mobile_background_colors') == 'dark' ) : ?>
		  #mobile-site-navigation, #mobile-site-navigation a{ color:#ffffff; }
		  #secondary-menu{ background-color:#333333; }
		  #secondary-menu .menu-item-has-children .sub-menu,
		  #primary-menu .page_item_has_children .children{ background-color:#444444; }
		  #secondary-menu .menu-item-has-children .sub-menu .menu-item-has-children .sub-menu,
			#primary-menu .page_item_has_children .children .page_item_has_children .children{ background-color:#555555; }
		<?php else : ?>
		  #mobile-site-navigation, #mobile-site-navigation a{ color:#000000; }
		  #secondary-menu{ background-color:#cccccc; }
		  #secondary-menu .menu-item-has-children .sub-menu,
		  #primary-menu .page_item_has_children .children{ background-color:#bbbbbb; }
		  #secondary-menu .menu-item-has-children .sub-menu .menu-item-has-children .sub-menu,
			#primary-menu .page_item_has_children .children .page_item_has_children .children{ background-color:#aaaaaa; }
		<?php endif; ?>
		
		#footer{ background-color:<?php echo get_theme_mod('voltata_footer_background', '#333333'); ?>; 
		         color:<?php echo get_theme_mod('voltata_footer_color', '#eeeeee'); ?>; }
		#footer caption, #footer .post-date{ color:<?php echo get_theme_mod('voltata_footer_muted_color', '#777777'); ?>; }
		#footer a{ color:<?php echo get_theme_mod('voltata_footer_link', '#eeeeee'); ?>; }
    #footer a:hover{ color:<?php echo get_theme_mod('voltata_footer_link_hover', '#337ab7'); ?>; }
		#footer button{ background-color:<?php echo get_theme_mod('voltata_footer_backtotop_background', '#ffffff'); ?>;
			              border-color:<?php echo get_theme_mod('voltata_footer_backtotop_border', '#cccccc'); ?>;
			              color:<?php echo get_theme_mod('voltata_footer_backtotop_color', '#333333'); ?>; }
  </style>
  <?php
}
add_action( 'wp_head', 'voltata_customize_css');

/*
 * Sanitize checkbox
 */
function voltata_sanitize_checkbox( $value ) {
	if ( ! in_array( $value, array( '', 1 ) ) )
    $value = '';
 
  return $value;
}

/*
 * Sanitize image
 */
function voltata_sanitize_image( $image, $setting ) {
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
	
    $file = wp_check_filetype( $image, $mimes );
    return ( $file['ext'] ? $image : $setting->default );
}

/**
 * Sanitize radios
 */
function voltata_sanitize_radio( $value ) {
	if ( ! in_array( $value, array( 'display', 'hide' ) ) )
    $value = 'display';
 
  return $value;
}

/**
 * Sanitize menu background select
 */
function voltata_sanitize_menu_background( $value ) {
	if ( ! in_array( $value, array( 'dark', 'light' ) ) )
    $value = 'dark';
 
  return $value;
}

/**
 * Sanitize Google Fonts selector
 */
function voltata_sanitize_google_fonts( $value ) {
  if ( ! in_array( $value, array( 'Helvetica', 'Playfair+Display', 'Work+sans', 'Alegreya', 'Alegreya+Sans', 'Fira+Sans',
																  'Inconsolata', 'Source+Sans+Pro', 'Source+Serif+Pro', 'Lora', 'Karla', 'Poppins',
					                        'Neuton', 'Merriweather', 'Open+Sans', 'Roboto', 'Roboto+Slab', 'Lato', 'Anonymous+Pro',
				                          'Archivo+Narrow', 'Libre+Baskerville', 'Crimson+Text', 'Montserrat', 'Chivo',
																  'Old+Standard+TT', 'Domine', 'Varela+Round', 'Bitter', 'Cardo', 'Arvo', 'PT+Serif' ) ) )
    $value = 'Helvetica';
  return $value;
}

/**
 * Sanitize select
 */
function voltata_sanitize_select( $value ) {
	if ( ! in_array( $value, array( 'right', 'left', 'none' ) ) )
    $value = 'right';
 
  return $value;
}

/**
 * Sanitize select alignment
 */
function voltata_sanitize_select_alignment( $value ) {
	if ( ! in_array( $value, array( 'right', 'left', 'center' ) ) )
    $value = 'center';
 
  return $value;
}

/**
 * Sanitize animation select
 */
function voltata_sanitize_select_animation( $value ) {
	if ( ! in_array( $value, array( 'none', 'bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'headShake', 'swing', 'tada', 'wobble', 'jello',
                                  'bounceIn', 'bounceInDown','bounceInLeft','bounceInRight', 'bounceInUp',
                                  'bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp',
                                  'fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight','fadeInRightBig',
                                  'fadeInUp','fadeInUpBig',
                                  'fadeOut','fadeOutDown','fadeOutDownBig', 'fadeOutLeft','fadeOutLeftBig','fadeOutRight', 'fadeOutRightBig',
                                  'fadeOutUp', 'fadeOutUpBig',
                                  'flipInX', 'flipInY', 'flipOutX', 'flipOutY', 'lightSpeedIn', 'lightSpeedOut',
                                  'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight',
                                  'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight',
                                  'hinge', 'rollIn', 'rollOut',
                                  'zoomIn', 'zoomInDown', 'zoomInLeft', 'zoomInRight', 'zoomInUp',
                                  'zoomOut', 'zoomOutDown', 'zoomOutLeft', 'zoomOutRight', 'zoomOutUp',
                                  'slideInDown', 'slideInLeft', 'slideInRight', 'slideInUp',
                                  'slideOutDown', 'slideOutLeft', 'slideOutRight', 'slideOutUp' ) ) )
    $value = 'none';
 
  return $value;
}

/**
 * Sanitize animation delay
 */
function voltata_sanitize_animation_delay( $value ) {
	if ( ! in_array( $value, array( 0, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5 ) ) )
		$value = 0;
	
  return $value;
}