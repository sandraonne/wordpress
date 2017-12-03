<?php
/**
 * The template for displaying image attachments
 *
 * @package voltata
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

			<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php voltata_posted_on(); ?>
						<div class="entry-attachment">
							<?php
								echo wp_get_attachment_image( get_the_ID(), 'large' );
							?>

							<?php if ( has_excerpt() ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div><!-- .entry-caption -->
							<?php endif; ?>

						</div><!-- .entry-attachment -->

						<?php
							the_content();
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'voltata' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'voltata' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
						?>
						
						<?php
							// Previous/next post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in </span><span class="post-title">%title</span>', 'Parent post link', 'voltata' ),
							) );
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<nav id="image-navigation" class="navigation image-navigation">
							<div class="nav-links">
								<div class="nav-prev"><?php previous_image_link( false, __( 'Previous Image', 'voltata' ) ); ?></div>
								
								<div class="nav-next"><?php next_image_link( false, __( 'Next Image', 'voltata' ) ); ?></div>
							</div><!-- .nav-links -->
						</nav><!-- .image-navigation -->
						
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->
			<br>
        <?php edit_post_link( __( 'Edit', 'voltata' ), '<span class="edit-link">', '</span>' ); ?>
			  
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				// End the loop.
				endwhile;
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
