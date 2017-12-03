<?php
/**
 * The sidebar containing the main footer area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package voltata
 */

if ( ! is_active_sidebar( 'sidebar-4' ) ) {
	return;
}
?>

<div id="secondary-bottom" class="widget-area row" role="complementary">
	<?php dynamic_sidebar( 'sidebar-4' ); ?>
</div><!-- #secondary -->