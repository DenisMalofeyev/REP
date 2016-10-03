<?php
/*
Plugin Name: Our Succes
Plugin URI: http://denis1986.esy.es
Description: Declares a plugin that will create a custom post type
Version: 1.0
Author: VarriableID
Author URI: http://vk.com/varriableid
License: GPLv2
*/

add_action( 'init', 'create_our_succes' );


function create_our_succes() {
register_post_type( 'our_success',
array(
'labels' => array(
'name' => 'Our Succes',
'singular_name' => 'Our Succes',
'add_new' => 'Add New',
'add_new_item' => 'Add New Our Succes',
'edit' => 'Edit',
'edit_item' => 'Edit Our Succes',
'new_item' => 'New Our Succes',
'view' => 'View',
'view_item' => 'View Our Succes',
'search_items' => 'Search Our Succes',
'not_found' => 'No Our Succes found',
'not_found_in_trash' =>
'No Our Succes found in Trash',
'parent' => 'Parent Our Succes'
),
'public' => true,
'menu_position' => 15,
'supports' =>
array( 'title', 'editor', 'comments',
'thumbnail',  ),
'taxonomies' => array( '' ),
'menu_icon' =>
plugins_url( 'images/image.png', __FILE__ ),
'has_archive' => true
)
);
}

add_action( 'admin_init', 'my_admin' );




function my_admin() {
add_meta_box( 'our_succes_meta_box',
'Our Succes Details',
'display_our_succes_meta_box',
'our_success', 'normal', 'high' );
}




add_action( 'save_post',
'add_our_succes_fields', 10, 2 );


function add_our_succes_fields( $our_succes_id,
$our_succes ) {
// Check post type for Our Succes
if ( $our_succes->post_type == 'our_success' ) {
// Store data in post meta table if present in post data
if ( isset( $_POST['our_succes_director_name'] ) &&
$_POST['our_succes_director_name'] != '' ) {
update_post_meta( $our_succes_id, ' succes_director',
$_POST['our_succes_director_name'] );
}
if ( isset( $_POST['our_succes_rating'] ) &&
$_POST['our_succes_rating'] != '' ) {
update_post_meta( $our_succes_id, ' succes_rating',
$_POST['our_succes_rating'] );
}
}
}


add_filter( 'template_include',
'include_template_function', 1 );


function include_template_function( $template_path ) {
if ( get_post_type() == 'our_success' ) {
if ( is_single() ) {
// checks if the file exists in the theme first,
// otherwise serve the file from the plugin
if ( $theme_file = locate_template( array
( 'single-our_success.php' ) ) ) {
$template_path = $theme_file;
} else {
$template_path = plugin_dir_path( __FILE__ ) .
'/single-our_success.php';
}
}
}
return $template_path;
}


?>