<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package voltata
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php 
		  if ( has_post_format( 'video' ) ) :
		    the_content();
		    echo '<hr>';
		  elseif ( has_post_thumbnail() ) :
				echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
		      if ( has_post_format( 'image' ) ) :
		        the_post_thumbnail();
		      else :
					  the_post_thumbnail( 'voltata-blog-list' );
		      endif;
				echo '</a>';
				
				if( is_home() ):
				 echo '<hr>';
				endif;
			endif;
		?>
		
		<?php
			if( is_sticky() ) :
				$sticky = __('<span class="glyphicon glyphicon-pushpin"></span> ', 'voltata');
			else :
				$sticky = '';
			endif;
		?>
		
		<?php
		  if ( !has_post_format( array('aside', 'image', 'quote') ) ) :
		    the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">' . $sticky, esc_url( get_permalink() ) ), '</a></h2>' );
		  endif;
		?>

		<?php if ( 'post' === get_post_type() ) : ?>
		  <div class="entry-meta">
			  <?php voltata_posted_on(); ?>
		  </div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		  if ( !has_post_format( 'video' ) ) :
	      if ( get_theme_mod('voltata_blog_length') == 'display' ) :
		      the_content();
		    else :
			    the_excerpt( sprintf(
			  	  wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'voltata' ), array( 'span' => array( 'class' => array() ) ) ),
				    the_title( '<span class="screen-reader-text">"', '"</span>', false )
			    ) );
		    endif;
		  endif;
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'voltata' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( !has_post_format( 'aside' ) ) : ?>
	<footer class="entry-footer">
		<?php voltata_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php endif; ?>
			
	<?php echo __('<span class="glyphicon glyphicon-option-horizontal center-block"></span>', 'voltata'); ?>
	
</article><!-- #post-## -->
