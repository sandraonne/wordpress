<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package voltata
 */

if ( ! function_exists( 'voltata_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function voltata_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'voltata' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'voltata' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'voltata_posted_on_date_only' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time
 */
function voltata_posted_on_date_only() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'voltata' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	
	echo '<span class="posted-on">' . $posted_on . '</span>';
}
endif;

if ( ! function_exists( 'voltata_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function voltata_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'voltata' ) );
		if ( $categories_list && voltata_categorized_blog() ) {
			printf( '<div id="voltata-cat"><span class="glyphicon glyphicon-folder-open"></span>
			         <span class="cat-links">' . esc_html__( 'Posted in %1$s', 'voltata' ) . '</span></div>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'voltata' ) );
		if ( $tags_list ) {
			printf( '<div id="voltata-tag"><span class="glyphicon glyphicon-tags"></span>
			         <span class="tags-links">' . esc_html__( 'Tagged in %1$s', 'voltata' ) . '</span></div>', $tags_list ); // WPCS: XSS OK.
		}
		
		$byline = sprintf(
			esc_html_x( '%s', 'post author', 'voltata' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		
		$author_button = sprintf(
			esc_html_x( '%s', 'post author', 'voltata' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" class="btn btn-default text-center" role="button" id="authorbutton">More posts by ' . esc_html( get_the_author() ) . '</a>'
		);
		
		if(is_single()){
		echo '<div id="author-info-post">';
		  echo get_avatar( get_the_author_meta( 'ID' ), 96, null, get_the_author(), array( 'class' => array( 'img-circular center-block' ) ) );
			echo '<h2>' . $byline . '</h2>';

			echo '<p>';
				the_author_meta( 'description' );
			echo '</p>';

			echo $author_button;
		echo '</div>';
		}
	}
	
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<div id="voltata-com"><span class="glyphicon glyphicon-comment"></span><span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'voltata' ), esc_html__( '1 Comment', 'voltata' ), esc_html__( '% Comments', 'voltata' ) );
		echo '</span></div>';
	}

	edit_post_link( esc_html__( 'Edit', 'voltata' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function voltata_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'voltata_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'voltata_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so voltata_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so voltata_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in voltata_categorized_blog.
 */
function voltata_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'voltata_categories' );
}
add_action( 'edit_category', 'voltata_category_transient_flusher' );
add_action( 'save_post',     'voltata_category_transient_flusher' );

/**
 * Displays the optional custom logo.
 * @since Voltata 1.2
 */
if ( ! function_exists( 'voltata_the_custom_logo' ) ) :
function voltata_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) :
		the_custom_logo();
	elseif ( get_theme_mod( 'voltata_logo_image' ) != '' ) :
    echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
      echo '<img class="logo-image img-responsive" src="' . esc_url( get_theme_mod( 'voltata_logo_image' ) ) . '" width="250" height="250">';
    echo '</a>';
	endif;
}
endif;