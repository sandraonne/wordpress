<?php
/**
 * voltata theme functions.
 *
 * @package voltata
 */

/**
 * Determinating header alignment
 */
function voltata_header_alignment( $function ){
	if ( $function == 'masthead' ) :
	  switch ( get_theme_mod( 'voltata_header_alignment' ) ){
		  case 'center':
		    $return = ' text-center';
		    break;
  		case 'left':
	  	  $return = ' text-left';
	  	  break;
	  	case 'right':
	  	  $return = ' text-right';
	  	  break;
	  	default:
		    $return = ' text-center';
	  }
	else :
	  switch ( get_theme_mod( 'voltata_header_alignment' ) ){
		  case 'center':
		    $return = '2';
		    break;
  		case 'left':
	  	  $return = '0';
	  	  break;
	  	case 'right':
	  	  $return = '4';
	  	  break;
	  	default:
		    $return = '2';
	  }
	endif;
	
	echo $return;
}

/**
 * Determinating search bar position in header on mobile
 */
function voltata_push_mobile_menu(){
	if( get_theme_mod( 'voltata_display_search' ) != 'hide' ) :
	  $return = "";
	else :
	  $return = " col-xs-push-3";
	endif;
	
	echo $return;
}

/**
 * Generating header image slider
 */
function voltata_header_image_slider(){
	$return = '';
	$images = array();
	
	foreach( get_uploaded_header_images() as $image_array ) :
		$images[] = $image_array['url'];
	endforeach;
	
	$return .= '<div id="carousel-example-generic-header" class="carousel slide" data-ride="carousel">';
		$return .= '<ol class="carousel-indicators">';
			for ( $i = 0; $i < count( $images ); $i++ ) :
				if ( $i == 0 ) :
					$active = ' class="active"';
				else : 
					$active = '';
				endif;
				$return .= '<li data-target="#carousel-example-generic-header" data-slide-to="' . $i . '"' . $active . '></li>';
			endfor;
		$return .= '</ol>';

		$return .= '<div class="carousel-inner" role="listbox">';
			for ( $i = 0; $i < count( $images ); $i++ ) :
				if ( $i == 0 ) :
					$active = ' active';
				else :
					$active = '';
				endif;

				$return .= '<div class="item' . $active . '">';
				$return .= '<img src=' . $images[$i] . ' width="2000" height="499" alt="' . get_bloginfo( 'title' ) . '">';
				$return .= '</div>';
			endfor;
		$return .= '</div>';

		$return .= '
			<a class="left carousel-control" href="#carousel-example-generic-header" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">' . __('Previous', 'voltata') . '</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic-header" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">' . __('Next', 'voltata') . '</span>
			</a>
		';
	$return .= '</div>';
	
	echo $return;
}

/**
 * Determinating which posts and how to style the posts on front-page.php
 */
function voltata_frontpage_display_posts(){
	$return = '<div id="fp-first-part" class="row">'; $secondary = ''; $classes = ' '; $count = 1;
	
  $recent_posts = wp_get_recent_posts( array( 'numberposts' => '3', 'post_status' => 'publish' ) );
  foreach( $recent_posts as $recent ){
		
		//Get post classes
		foreach( get_post_class($recent['ID']) as $class){
			$classes .= $class . ' ';
		}
		
		if($count == 1){
			$return .= '<div id="post-'. $recent['ID'] . '" class="col-md-8' . $classes . '"><a href="' . get_permalink($recent['ID']) . '" rel="bookmark">';
			
			  if(has_post_thumbnail( $recent['ID'] )){
					$return .= '<a href="' . esc_url( get_permalink( $recent['ID'] ) ) . '" rel="bookmark">';
					$return .= get_the_post_thumbnail( $recent['ID'], 'voltata-front-main', array( 'class' => 'img-responsive' ) );
					$return .= '</a><hr>';
				}
				
			  $return .= '<h1><a href="' . esc_url( get_permalink( $recent['ID'] ) ) . '" rel="bookmark">' . $recent['post_title'] . '</h1></a>';
			  $return .= '<span class="post-date"><a href="' . esc_url( get_permalink( $recent['ID'] ) ) . '" rel="bookmark">' . date('F j, Y', strtotime($recent['post_date'])) . '</a></span>';
			
			  if(!has_post_thumbnail( $recent['ID'] )){
					$return .= '<hr>';
					
				  $content_post = get_post( $recent['ID'] );
					$content = $content_post->post_content;
					$content = apply_filters('the_content', $content);
					$content = str_replace(']]>', ']]&gt;', $content);
					$return .= $content;
				}
			
			$return .= '</div>';
		}else{
			$secondary .= '<div id="post-'. $recent['ID'] . '" class="col-md-12 col-xs-6' . $classes . '"><a href="' . get_permalink($recent['ID']) . '" rel="bookmark">';
			
			  $secondary .= '<a href="' . esc_url( get_permalink( $recent['ID'] ) ) . '" rel="bookmark">';
			  if(has_post_thumbnail( $recent['ID'] )){
					$secondary .= get_the_post_thumbnail( $recent['ID'], 'voltata-sub-main', array( 'class' => 'img-responsive' ) );
				}else{
					$secondary .= '<div class="no-image"></div>';
				}
			  $secondary .= '</a><hr>';
			
			  $secondary .= '<h3><a href="' . esc_url( get_permalink( $recent['ID'] ) ) . '" rel="bookmark">' . $recent['post_title'] . '</h3></a>';
			  $secondary .= '<span class="post-date"><a href="' . esc_url( get_permalink( $recent['ID'] ) ) . '" rel="bookmark">' . date('F j, Y', strtotime($recent['post_date'])) . '</a></span>';
			$secondary .= '</div>';
		}
		
		$count++;
  }
	
	$return .= '<div class="col-md-4" id="secondary"><div class="row">' . $secondary . '</div></div>';
	
	$return .= '</div><hr>'; //end row
	
	echo $return;
}

function voltata_frontpage_display_posts_2(){
	$classes = ' ';
	$return = '<div id="fp-second-part" class="row">';
	
	$recent_posts = wp_get_recent_posts( array( 'numberposts' => '3', 'offset' => '3', 'post_status' => 'publish' ) );
  foreach( $recent_posts as $recent ){
		//Get post classes
		foreach( get_post_class($recent['ID']) as $class){
			$classes .= $class . ' ';
		}
		
		$return .= '<div id="post-'. $recent['ID'] . '" class="col-md-4 col-xs-4 ' . $classes . '">';
		
		  $return .= '<a href="' . esc_url( get_permalink( $recent['ID'] ) ) . '" rel="bookmark">';
			if(has_post_thumbnail( $recent['ID'] )){
			  $return .= get_the_post_thumbnail( $recent['ID'], 'voltata-square-main', array( 'class' => 'img-responsive' ) );
			}else{
				$return .= '<div class="no-image"></div>';
			}
			$return .= '</a><hr>';
		
		  $return .= '<h3><a href="' . esc_url( get_permalink( $recent['ID'] ) ) . '" rel="bookmark">' . $recent['post_title'] . '</h3></a>';
		  $return .=  '<span class="post-date"><a href="' . esc_url( get_permalink( $recent['ID'] ) ) . '" rel="bookmark">' . date('F j, Y', strtotime($recent['post_date'])) . '</a></span>';
		$return .= '</div>';
	}
	
	$return .= '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '" id="fp-read-more" class="col-md-2 col-md-offset-5 col-xs-10 col-xs-offset-1">' . __('Read more', 'voltata') . '</a>';
	
	$return .= '</div><hr>'; //end row
	
	echo $return;
}

/**
 * Determinating sidebar position on single.php and index.php if blog posts is being displayed there
 */
function voltata_sidebar_position_class(){
	switch ( get_theme_mod( 'voltata_sidebar_position' ) ){
		case 'right':
		  $column_order = '8';
		  break;
		case 'left':
		  $column_order = '8 col-sm-push-4';
		  break;
		case 'none':
		  $column_order = '10 col-md-offset-1';
		  break;
		default:
		  $column_order = '8';
	}
	
	echo $column_order;
}

/**
 * Fix embeded youtube vids
 */
function voltata_bootstrap_wrap_oembed( $html ){
  $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
  return'<div class="embed-responsive embed-responsive-16by9">'.$html.'</div>';
}

add_filter( 'embed_oembed_html', 'voltata_bootstrap_wrap_oembed', 10, 1 );