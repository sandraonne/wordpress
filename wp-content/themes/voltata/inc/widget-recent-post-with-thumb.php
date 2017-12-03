<?php
/**
 * Adds Recent_post_with_thumb widget.
 */
class Recent_post_with_thumb extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'recent_post_with_thumb', // Base ID
			__( 'Recent Posts with Thumbnails', 'voltata' ), // Name
			array( 'description' => __( 'Very similar to the recent posts widgets, but also displaying post thumbnails.', 'voltata' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'voltata' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
		if ( ! $number )
			$number = 3;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		
		$show_round = isset( $instance['show_round'] ) ? $instance['show_round'] : false;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'meta_query' => array(array('key' => '_thumbnail_id'))
		) ) );

		if ($r->have_posts()) :
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) :
			echo $args['before_title'] . $title . $args['after_title'];
		endif; ?>
		<ul>
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>" class="row">
					<?php
					if( has_post_thumbnail( ) && ( $show_round ) ) :
					  the_post_thumbnail( 'thumbnail', array( 'class' => 'col-xs-6 img-responsive img-circle' ) );
		      else :
		        the_post_thumbnail( 'thumbnail', array( 'class' => 'col-xs-6 img-responsive' ) );
					endif; ?>

					<div class="col-xs-6">
						<?php get_the_title() ? the_title() : the_ID(); ?>
						<?php if ( $show_date ) : ?>
							<span class="post-date"><?php echo get_the_date(); ?></span>
						<?php endif; ?>
					</div>
				</a>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
		$show_date  = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_round = isset( $instance['show_round'] ) ? (bool) $instance['show_round'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'voltata' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'voltata' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?', 'voltata' ); ?></label></p>

    <p><input class="checkbox" type="checkbox"<?php checked( $show_round ); ?> id="<?php echo $this->get_field_id( 'show_round' ); ?>" name="<?php echo $this->get_field_name( 'show_round' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_round' ); ?>"><?php _e( 'Display round image.', 'voltata' ); ?></label></p>
    <?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_round'] = isset( $new_instance['show_round'] ) ? (bool) $new_instance['show_round'] : false;
		return $instance;
	}

} // class Recent_post_with_thumb


	
	// register Recent_post_with_thumb widget
  function register_recent_post_with_thumb_widget() {
    register_widget( 'Recent_post_with_thumb' );
  }
  add_action( 'widgets_init', 'register_recent_post_with_thumb_widget' );