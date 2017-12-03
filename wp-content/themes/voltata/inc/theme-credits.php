<?php
/**
 * voltata theme options.
 *
 * @package voltata
 */
function voltata_theme_menu(){
  add_theme_page( __( 'Voltata', 'voltata' ),
                 __( 'Voltata', 'voltata' ),
                 'administrator',
                 'voltata_theme_options',
                 'voltata_theme',
								 'dashicons-layout',
								 1);
}
add_action('admin_menu', 'voltata_theme_menu');

function voltata_theme() {
	echo '<div class="wrap">';
		_e('<h1>Voltata</h1>', 'voltata');
	  ?>

    <p>
      <?php _e('For theme customization head over to the WordPress customizer', 'voltata'); ?>
	    <a href="<?php echo esc_url( __( 'customize.php', 'voltata' ) ); ?>"><?php printf( esc_html__( 'here', 'voltata' ), 'voltata' ); ?></a>
    </p>

	  <?php _e('<h2>Voltata Theme Information</h2>', 'voltata'); ?>

    <p>
	    <?php _e('This theme recommends the following plugins:<br>', 'voltata'); ?>
			
	    <?php _e('Need a contact form? Consider using ', 'voltata'); ?>
	    <a href="<?php echo esc_url( __( 'https://wordpress.org/plugins/contact-form-7/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Contact Form 7', 'voltata' ), 'voltata' ); ?></a>
			<?php _e('alongside the styling plugin', 'voltata'); ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/plugins/bootstrap-for-contact-form-7/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Bootstrap for Contact Form 7', 'voltata' ), 'voltata' ); ?></a><br>
			
			<?php _e('For columns use ', 'voltata'); ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/plugins/bootstrap-3-shortcodes/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Bootstrap Shortcodes for WordPress', 'voltata' ), 'voltata' ); ?></a><br>
			
			<?php _e('For custom CSS use a plugin like ', 'voltata'); ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/plugins/simple-custom-css/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Simple Custom CSS', 'voltata' ), 'voltata' ); ?></a><br><br>
			
			<?php _e('Got any questions, issues, suggestions or simply want to leave a review?', 'voltata'); ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/themes/voltata/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'If so, please do so here', 'voltata' ), 'voltata' ); ?></a><br>
	  </p>

    <?php _e('<h2>Voltata Theme Credits</h2>', 'voltata'); ?>

    <p>
      <?php _e('This theme was built with the help of the technologies and code presented by:', 'voltata'); ?>
			<ul>
				<li><a href="<?php echo esc_url( __( 'http://getbootstrap.com/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Bootstrap &middot; The worlds most popular mobile-first and responsive front-end framework', 'voltata' ), 'voltata' ); ?></a></li>
				<li><a href="<?php echo esc_url( __( 'http://necolas.github.io/normalize.css/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Normalize by Nicolas Gallagher & Jonathan Neal', 'voltata' ), 'voltata' ); ?></a></li>
				<li><a href="<?php echo esc_url( __( 'http://underscores.me/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Underscores | A Starter Theme for WordPress', 'voltata' ), 'voltata' ); ?></a></li>
				<li><a href="<?php echo esc_url( __( 'https://dribbble.com/shots/1233464-24-Free-Flat-Social-Icons', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Social Icons by Mohammed Alyousfi', 'voltata' ), 'voltata' ); ?></a></li>
				<li><a href="<?php echo esc_url( __( 'https://daneden.github.io/animate.css/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Animate.css by Daniel Eden', 'voltata' ), 'voltata' ); ?></a></li>
				<li><a href="<?php echo esc_url( __( 'http://glyphicons.com', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'Glyphicons by Jan Kovarik', 'voltata' ), 'voltata' ); ?></a></li>
				<li><a href="<?php echo esc_url( __( 'http://mynameismatthieu.com/WOW/', 'voltata' ) ); ?>" target="_blank"><?php printf( esc_html__( 'WOW by Matt Aussaguel', 'voltata' ), 'voltata' ); ?></a></li>
      </ul>
    </p>
  </div>
  <?php
}