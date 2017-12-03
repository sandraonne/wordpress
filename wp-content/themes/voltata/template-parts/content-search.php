<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package voltata
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
					the_post_thumbnail( 'voltata-blog-list' );
				echo '</a>';
				
				echo '<hr>';
			} 
		?>
		
		<?php
			if(is_sticky()){
				$sticky = '<span class="glyphicon glyphicon-pushpin"></span> ';
			}else{
				$sticky = '';
			}
		?>
		
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php voltata_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php voltata_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
	<?php echo __('<span class="glyphicon glyphicon-option-horizontal center-block"></span>', 'voltata'); ?>
	
</article><!-- #post-## -->

