/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	
	// Menu drop down background color.
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			$('#primary-menu .menu-item-has-children .sub-menu, #primary-menu .page_item_has_children .children').css( 'background-color', to );
		} );
	} );
	
	// Menu link color.
	wp.customize( 'voltata_nav_color', function( value ) {
		value.bind( function( to ) {
			$('.main-navigation a, .main-navigation a:visited').css( 'color', to );
		} );
	} );
	
	// Body text color.
	wp.customize( 'voltata_font_color', function( value ) {
		value.bind( function( to ) {
			$('#page, .entry-meta').css( 'color', to );
		} );
	} );
	
	// Body link color.
	wp.customize( 'voltata_link_color', function( value ) {
		value.bind( function( to ) {
			$('#content a, #content a:visited').css( 'color', to );
		} );
	} );
	
	// Body link hover color.
	wp.customize( 'voltata_link_hover_color', function( value ) {
		value.bind( function( to ) {
			$('#content a:hover').css( 'color', to );
		} );
	} );
	
	// Mobile menu background colors.
	wp.customize( 'voltata_mobile_background_colors', function( value ) {
		value.bind( function( to ) {
			if ( 'dark' === to ) {
				$( '#mobile-site-navigation, #mobile-site-navigation a' ).css( 'color', '#ffffff' );
				$( '#secondary-menu' ).css( 'background-color', '#333333' );
				$( '#secondary-menu .menu-item-has-children .sub-menu, #primary-menu .page_item_has_children .children' ).css( 'background-color', '#444444' );
				$( '#secondary-menu .menu-item-has-children .sub-menu .menu-item-has-children .sub-menu, #primary-menu .page_item_has_children .children .page_item_has_children .children' ).css( 'background-color', '#555555' );
			} else {
				$( '#mobile-site-navigation, #mobile-site-navigation a' ).css( 'color', '#000000' );
				$( '#secondary-menu' ).css( 'background-color', '#cccccc' );
				$( '#secondary-menu .menu-item-has-children .sub-menu, #primary-menu .page_item_has_children .children' ).css( 'background-color', '#bbbbbb' );
				$( '#secondary-menu .menu-item-has-children .sub-menu .menu-item-has-children .sub-menu, #primary-menu .page_item_has_children .children .page_item_has_children .children' ).css( 'background-color', '#aaaaaa' );
			}
		} );
	} );
	
	// Footer background-color.
	wp.customize( 'voltata_footer_background', function( value ) {
		value.bind( function( to ) {
			$('#footer').css('background-color', to );
		} );
	} );
	
	// Footer color.
	wp.customize( 'voltata_footer_color', function( value ) {
		value.bind( function( to ) {
			$('#footer').css('color', to );
		} );
	} );
	
	// Footer muted color.
	wp.customize( 'voltata_footer_muted_color', function( value ) {
		value.bind( function( to ) {
			$('#footer caption, #footer .post-date').css('color', to );
		} );
	} );
	
	// Footer link color.
	wp.customize( 'voltata_footer_link', function( value ) {
		value.bind( function( to ) {
			$('#footer a').css('color', to );
		} );
	} );
	
	// Footer link hover color.
	wp.customize( 'voltata_footer_link_hover', function( value ) {
		value.bind( function( to ) {
			$('#footer a:hover').css('color', to );
		} );
	} );
	
	// BackToTop button background-color.
	wp.customize( 'voltata_footer_backtotop_background', function( value ) {
		value.bind( function( to ) {
			$('#footer button').css('background-color', to );
		} );
	} );
	
	// BackToTop button border-color.
	wp.customize( 'voltata_footer_backtotop_border', function( value ) {
		value.bind( function( to ) {
			$('#footer button').css('border-color', to );
		} );
	} );
	
	// BackToTop button color.
	wp.customize( 'voltata_footer_backtotop_color', function( value ) {
		value.bind( function( to ) {
			$('#footer button').css('color', to );
		} );
	} );
} )( jQuery );
