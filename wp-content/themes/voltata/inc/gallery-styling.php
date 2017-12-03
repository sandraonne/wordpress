<?php
add_action('print_media_templates', function(){
?>
<script type="text/html" id="tmpl-voltata-custom-gallery-setting">
	<label class="setting">
		<span><?php _e('Gallery Style', 'voltata'); ?></span>
		<select data-setting="voltata_gallery_type">
			<option value="default_val"><?php _e('Standard grid gallery', 'voltata'); ?></option>
			<option value="bootstrap"><?php _e('Bootstrap gallery', 'voltata'); ?></option>
		</select>
	</label>
</script>

<script>

	jQuery(document).ready(function(){

		// add your shortcode attribute and its default value to the
		// gallery settings list; $.extend should work as well...
		_.extend(wp.media.gallery.defaults, {
			my_custom_attr: 'default_val'
		});

		// merge default gallery settings template with yours
		wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
			template: function(view){
				return wp.media.template('gallery-settings')(view)
						 + wp.media.template('voltata-custom-gallery-setting')(view);
			}
		});

	});

</script>
<?php
});

function voltata_post_gallery($output = '', $attr) {
	$return = $output;
	
	if ( isset($attr['voltata_gallery_type']) && $attr['voltata_gallery_type'] == 'bootstrap') {
		$unique_id = rand(0, 99999);
		
		global $post;

		if (isset($attr['orderby'])) {
				$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
				if (!$attr['orderby'])
						unset($attr['orderby']);
		}

		extract(shortcode_atts(array(
				'order' => 'ASC',
				'orderby' => 'menu_order ID',
				'id' => $post->ID,
				'itemtag' => 'dl',
				'icontag' => 'dt',
				'captiontag' => 'dd',
				'columns' => 3,
				'size' => 'thumbnail',
				'include' => '',
				'exclude' => ''
		), $attr));

		$id = intval($id);
		if ('RAND' == $order) $orderby = 'none';

		if (!empty($include)) {
				$inqclude = preg_replace('/[^0-9,]+/', '', $include);
				$_attachments = get_posts(array('include' => $inqclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

				$attachments = array();
				foreach ($_attachments as $key => $val) {
						$attachments[$val->ID] = $_attachments[$key];
				}
		}

		if (empty($attachments)) return '';

		$return .= '<div id="carousel-example-generic-' . $unique_id . '" class="carousel slide" data-ride="carousel">';
		$return .= '<ol class="carousel-indicators">';

			for($i = 0; $i < count($attachments ); $i++){
				if($i == 1){
					$active = ' class="active"';
				}else{
					$active = '';
				}
				$output .= '<li data-target="#carousel-example-generic-' . $unique_id . '" data-slide-to="' . $i . '"' . $active . '></li>';
			}

		$return .= '</ol>';
		$return .= '<div class="carousel-inner" role="listbox">';

		// Now you loop through each attachment
		$item = 0;
		foreach ($attachments as $id => $attachment) {
			if($item == 0){
				$active = " active";
			}else{
				$active = "";
			}
			$item++;
			// Fetch all data related to attachment
			$img = wp_prepare_attachment_for_js($id);
			$caption = $attachment->post_excerpt;
			$url = wp_get_attachment_image_src($id, 'full');

			$return .= "<div class='item" . $active . "'>";
			$return .= "<img src=" . $url[0] . " />";
			$return .= '<div class="carousel-caption">' . $caption . '</div>';
			$return .= "</div>";
		}

		$return .= "</div>";

		$return .= '
			<a class="left carousel-control" href="#carousel-example-generic-' . $unique_id . '" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">' . __('Previous', 'voltata') . '</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic-' . $unique_id . '" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">' . __('Next', 'voltata') . '</span>
			</a>
		';

		$return .= "</div>";
	}
	
	return $return;
}

add_filter('post_gallery', 'voltata_post_gallery', 10, 2);