<?php
function emmify_script_enqueue(){
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css');
  wp_enqueue_script('my-scripts', get_stylesheet_directory_uri().'/script/script.js', array ( 'jquery' ), 1.1, true);

  }
add_action('wp_enqueue_scripts', 'emmify_script_enqueue');


function emmify_theme_functionality() {

	add_theme_support('menus');

	register_nav_menu('primary', 'Main Navigation');
	register_nav_menu('secondary', 'Footer Menu');
  add_theme_support( 'post-thumbnails' );
}
add_action('init', 'emmify_theme_functionality');

function wpdocs_excerpt_more( $more ) {
    return '<a href="'.get_the_permalink().'" rel="nofollow">...</a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function portfolio_custom_post(){
    $labels = array(
      'name' => 'Portfolio',
      'singular_name' => 'Portfolio'
    );

    $args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
      'menu_icon'   => 'dashicons-admin-customizer',
			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
			),
			'menu_position' => 5,
			'exclude_from_search' => false
		);
  register_post_type('portfolio', $args);

}
add_action('init','portfolio_custom_post');

function emmify_custom_taxonomies() {

	$labels = array(
		'name' => 'Types',
		'singular_name' => 'Type',

	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
	);

	register_taxonomy('types', array('portfolio'), $args);

}
add_action( 'init' , 'emmify_custom_taxonomies' );

function ourWidgetsInit() {

	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => 'Footer Area 1',
		'id' => 'footer1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => 'Footer Area 2',
		'id' => 'footer2',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => 'Footer Area 3',
		'id' => 'footer3',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar( array(
		'name' => 'Footer Area 4',
		'id' => 'footer4',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

}

add_action('widgets_init', 'ourWidgetsInit');

function extra_content_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function extra_content_add_meta_box() {

	add_meta_box(
		'extra_content-extra-content',
		__( 'Extra content', 'extra_content' ),
		'extra_content_html',
		'portfolio',
		'advanced',
		'high'
	);
}
add_action( 'add_meta_boxes', 'extra_content_add_meta_box' );

function extra_content_html( $post) {
	wp_nonce_field( '_extra_content_nonce', 'extra_content_nonce' ); ?>

	<p>
		<label for="extra_content_header_1"><?php _e( 'Header 1', 'extra_content' ); ?></label><br>
		<input style="width:50%;" type="text" name="extra_content_header_1" id="extra_content_header_1" value="<?php echo extra_content_get_meta( 'extra_content_header_1' ); ?>">
	</p>	<p>
		<label for="extra_content_text_1"><?php _e( 'Text 1', 'extra_content' ); ?></label><br>
		<textarea style="width:100%;" name="extra_content_text_1" id="extra_content_text_1" ><?php echo extra_content_get_meta( 'extra_content_text_1' ); ?></textarea>

	</p>	<p>
		<label for="extra_content_image_url"><?php _e( 'Image url', 'extra_content' ); ?></label><br>
		<input style="width:100%;" type="text" name="extra_content_image_url" id="extra_content_image_url" value="<?php echo extra_content_get_meta( 'extra_content_image_url' ); ?>">
	</p>

  <hr>
  	<p>

		<label for="extra_content_header_2"><?php _e( 'Header 2', 'extra_content' ); ?></label><br>
		<input style="width:50%;" type="text" name="extra_content_header_2" id="extra_content_header_2" value="<?php echo extra_content_get_meta( 'extra_content_header_2' ); ?>">
	</p>	<p>
		<label for="extra_content_text_2"><?php _e( 'Text 2', 'extra_content' ); ?></label><br>
		<textarea style="width:100%;" name="extra_content_text_2" id="extra_content_text_2" ><?php echo extra_content_get_meta( 'extra_content_text_2' ); ?></textarea>

	</p>	<p>
		<label for="extra_content_image_url_2"><?php _e( 'Image url 2', 'extra_content' ); ?></label><br>
		<input style="width:100%;" type="text" name="extra_content_image_url_2" id="extra_content_image_url_2" value="<?php echo extra_content_get_meta( 'extra_content_image_url_2' ); ?>">
	</p><?php
}

function extra_content_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['extra_content_nonce'] ) || ! wp_verify_nonce( $_POST['extra_content_nonce'], '_extra_content_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['extra_content_header_1'] ) )
		update_post_meta( $post_id, 'extra_content_header_1', esc_attr( $_POST['extra_content_header_1'] ) );
	if ( isset( $_POST['extra_content_text_1'] ) )
		update_post_meta( $post_id, 'extra_content_text_1', esc_attr( $_POST['extra_content_text_1'] ) );
	if ( isset( $_POST['extra_content_image_url'] ) )
		update_post_meta( $post_id, 'extra_content_image_url', esc_attr( $_POST['extra_content_image_url'] ) );
	if ( isset( $_POST['extra_content_header_2'] ) )
		update_post_meta( $post_id, 'extra_content_header_2', esc_attr( $_POST['extra_content_header_2'] ) );
	if ( isset( $_POST['extra_content_text_2'] ) )
		update_post_meta( $post_id, 'extra_content_text_2', esc_attr( $_POST['extra_content_text_2'] ) );
	if ( isset( $_POST['extra_content_image_url_2'] ) )
		update_post_meta( $post_id, 'extra_content_image_url_2', esc_attr( $_POST['extra_content_image_url_2'] ) );
}
add_action( 'save_post', 'extra_content_save' );

// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Layouts', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Post Layout', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taxonomy', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'posttype', array( 'portfolio' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );


include_once 'custom-image-uploader.php';

/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function knapp_box_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function knapp_box_add_meta_box() {
	add_meta_box(
		'knapp_box-knapp-box',
		__( 'Knapp box', 'knapp_box' ),
		'knapp_box_html',
		'portfolio',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'knapp_box_add_meta_box' );

function knapp_box_html( $post) {
	wp_nonce_field( '_knapp_box_nonce', 'knapp_box_nonce' ); ?>

	<p>
		<label for="knapp_box_url"><?php _e( 'URL', 'knapp_box' ); ?></label><br>
		<input type="text" name="knapp_box_url" id="knapp_box_url" value="<?php echo knapp_box_get_meta( 'knapp_box_url' ); ?>">
	</p>	<p>
		<label for="knapp_box_text_p_knapp"><?php _e( 'Text på knapp', 'knapp_box' ); ?></label><br>
		<input type="text" name="knapp_box_text_p_knapp" id="knapp_box_text_p_knapp" value="<?php echo knapp_box_get_meta( 'knapp_box_text_p_knapp' ); ?>">
	</p><?php
}

function knapp_box_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['knapp_box_nonce'] ) || ! wp_verify_nonce( $_POST['knapp_box_nonce'], '_knapp_box_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['knapp_box_url'] ) )
		update_post_meta( $post_id, 'knapp_box_url', esc_attr( $_POST['knapp_box_url'] ) );
	if ( isset( $_POST['knapp_box_text_p_knapp'] ) )
		update_post_meta( $post_id, 'knapp_box_text_p_knapp', esc_attr( $_POST['knapp_box_text_p_knapp'] ) );
}
add_action( 'save_post', 'knapp_box_save' );

/*
	Usage: knapp_box_get_meta( 'knapp_box_url' )
	Usage: knapp_box_get_meta( 'knapp_box_text_p_knapp' )
*/


?>
