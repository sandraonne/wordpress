<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package voltata
 */

?>

	</div><!-- #content -->
</div><!-- #page -->

<footer id="footer">
	<div class="container site-footer">
		
		<?php get_sidebar('footer'); ?>
		
		<?php if( get_theme_mod('voltata_display_top') != 'hide' ): ?>
      <a href="#" class="scrollToTop">
        <button type="button" class="btn btn-default center-block">
          <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
        </button>
      </a>
    <?php endif; ?>
		
		<div id="colophon" class="row" role="contentinfo">
			<div class="site-info col-md-12">
				<?php wp_nav_menu( array('theme_location' => 'footer_menu', 'depth' => 1, 'menu_class' => 'footer-menu', 'fallback_cb' => false) ); ?>
				
				<?php if( get_theme_mod('voltata_display_branding') != 'hide' ): ?>
				  <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Proudly powered by %s', 'voltata' ), 'WordPress' ); ?></a>
				  <span class="sep"> | </span>
				  <a href="<?php echo esc_url( __( 'http://sultenhest.dk/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Theme %s developed by Sultenhest', 'voltata' ), 'voltata' ); ?></a>
				<?php endif; ?>
			</div><!-- .site-info -->
		</div><!-- #colophon -->
		
		<div id="footer-social-icons" class="col-md-12">
      <?php if( get_theme_mod('voltata_facebook') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_facebook') ) ?>" target="_blank" title="<?php echo __('Facebook', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/01_facebook.png" alt="<?php echo __('Facebook', 'voltata'); ?>" title="<?php echo __('Facebook', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_twitter') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_twitter') ) ?>" target="_blank" title="<?php echo __('Twitter', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/02_twitter.png" alt="<?php echo __('Twitter', 'voltata'); ?>" title="<?php echo __('Twitter', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_linkedin') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_linkedin') ) ?>" target="_blank" title="<?php echo __('LinkedIn', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/03_linkedin.png" alt="<?php echo __('LinkedIn', 'voltata'); ?>" title="<?php echo __('LinkedIn', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_pinterest') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_pinterest') ) ?>" target="_blank" title="<?php echo __('Pinterest', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/04_pinterest.png" alt="<?php echo __('Pinterest', 'voltata'); ?>" title="<?php echo __('Pinterest', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_google_plus') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_google_plus') ) ?>" target="_blank" title="<?php echo __('Google+', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/05_google+.png" alt="<?php echo __('Google+', 'voltata'); ?>" title="<?php echo __('Google+', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_tumblr') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_tumblr') ) ?>" target="_blank" title="<?php echo __('Tumblr', 'voltata'); ?>">	
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/06_tumblr.png" alt="<?php echo __('Tumblr', 'voltata'); ?>" title="<?php echo __('Tumblr', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_instagram') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_instagram') ) ?>" target="_blank" title="<?php echo __('Instagram', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/07_instagram.png" alt="<?php echo __('Instagram', 'voltata'); ?>" title="<?php echo __('Instagram', 'voltata'); ?>">
        </a>
      <?php endif;?>

      <?php if( get_theme_mod('voltata_flickr') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_flickr') ) ?>" target="_blank" title="<?php echo __('Flickr', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/08_flickr.png" alt="<?php echo __('Flickr', 'voltata'); ?>" title="<?php echo __('Flickr', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_youtube') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_youtube') ) ?>" target="_blank" title="<?php echo __('Youtube', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/09_youtube.png" alt="<?php echo __('Youtube', 'voltata'); ?>" title="<?php echo __('Youtube', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_dribbble') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_dribbble') ) ?>" target="_blank" title="<?php echo __('Dribbble', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/10_dribbble.png" alt="<?php echo __('Dribbble', 'voltata'); ?>" title="<?php echo __('Dribbble', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_soundcloud') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_soundcloud') ) ?>" target="_blank" title="<?php echo __('Soundcloud', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/11_soundcloud.png" alt="<?php echo __('Soundcloud', 'voltata'); ?>" title="<?php echo __('Soundcloud', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_envato') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_envato') ) ?>" target="_blank" title="<?php echo __('Envato', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/12_envato.png" alt="<?php echo __('Envato', 'voltata'); ?>" title="<?php echo __('Envato', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_behance') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_behance') ) ?>" target="_blank" title="<?php echo __('Behance', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/13_behance.png" alt="<?php echo __('Behance', 'voltata'); ?>" title="<?php echo __('Behance', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_vimeo') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_vimeo') ) ?>" target="_blank" title="<?php echo __('Vimeo', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/14_vimeo.png" alt="<?php echo __('Vimeo', 'voltata'); ?>" title="<?php echo __('Vimeo', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_wordpress') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_wordpress') ) ?>" target="_blank" title="<?php echo __('Wordpress', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/15_wordpress.png" alt="<?php echo __('Wordpress', 'voltata'); ?>" title="<?php echo __('Wordpress', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_deviantart') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_deviantart') ) ?>" target="_blank" title="<?php echo __('DeviantArt', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/16_deviantart.png" alt="<?php echo __('DeviantArt', 'voltata'); ?>" title="<?php echo __('DeviantArt', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_evernote') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_evernote') ) ?>" target="_blank" title="<?php echo __('Evernote', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/17_evernote.png" alt="<?php echo __('Evernote', 'voltata'); ?>" title="<?php echo __('Evernote', 'voltata'); ?>">
        </a>
      <?php endif; ?>

      <?php if( get_theme_mod('voltata_blogger') ): ?>
        <a href="<?php echo esc_url( get_theme_mod('voltata_blogger') ) ?>" target="_blank" title="<?php echo __('Blogger', 'voltata'); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/social/18_blogger.png" alt="<?php echo __('Blogger', 'voltata'); ?>" title="<?php echo __('Blogger', 'voltata'); ?>">
        </a>
      <?php endif; ?>
		</div>
		
	</div>
</div><!-- #footer -->

<?php wp_footer(); ?>

</body>
</html>
