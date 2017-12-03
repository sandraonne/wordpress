<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package voltata
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php
  if ( get_theme_mod( 'voltata_sidebar_position' ) == 'left' && (is_single() || is_home() ) ){
		$sidebar_column_order = ' col-sm-pull-8';
	}else{
		$sidebar_column_order = '';
	}
?>

<div id="secondary" class="widget-area col-md-4<?php echo $sidebar_column_order; ?>" role="complementary">
	<?php
	  dynamic_sidebar( 'sidebar-1' );
	?>
</div><!-- #secondary -->
