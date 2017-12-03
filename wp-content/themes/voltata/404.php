<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package voltata
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'voltata' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content row">
					<p class="col-md-12"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'voltata' ); ?></p>

					<div class="col-md-12">
					  <?php get_search_form(); ?>
					</div>
					
				</div><!-- .page-content -->
				
				<?php get_sidebar('search'); ?>
				
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
