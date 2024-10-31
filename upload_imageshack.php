<?php
/*
Plugin Name: multiupload imageschack
Plugin URI: http://jessai.fr.nf/archives/4
Description: with multiupload imageschack, you can upload ten images at a time and get code to put in your post.
Version: 1.2.3
Author: jessai
Author URI: http://jessai.fr.nf
*/
// This function tells WP to add a new "meta box"
function add_some_box() {
	add_meta_box(
		'jessai',  // id of the <div> we'll add
		'Upload vers ImageShack', //title
		'add_something_in_the_box', // callback function that will echo the box content
		'post', // where to add the box: on "post", "page", or "link" page
		'normal',
		'high'
	);
}
// This function echoes the content of our meta box
function add_something_in_the_box() {
	echo '<div class="inside"><object type="text/html" id="frame1" data="../wp-content/plugins/multiupload-imageschack/xmlapiformtravaiokl.php" width="800px" height="235px"></object></div>';
}
// Hook things in, late enough so that add_meta_box() is defined
if (is_admin())
	add_action('admin_menu', 'add_some_box');
?>