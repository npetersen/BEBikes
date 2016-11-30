<?php 
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
/* This is your function's */ 

// http://nouveller.com/quick-tips/quick-tip-8-limit-the-length-of-the_excerpt-in-wordpress/
function limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit)) . '...';
}

// Returns timestamp from Unix epoch - http://filchiprogrammer.wordpress.com/2008/02/27/getting-the-first-monday-of-the-month/
function getFirstMonday($month, $year) {
	$num = date("w", mktime(0, 0, 0, $month, 1, $year));
	if($num == 1) {
		return mktime(0, 0, 0, $month, 1, $year);
	} elseif ($num > 1) {
		return mktime(0, 0, 0, $month, 1, $year) + (86400 * (8 - $num));
	} else {
		return mktime(0, 0, 0, $month, 1, $year) + (86400 * (1 - $num));
	}
}


function determineHours() {
	$today = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
	$summerStart = getFirstMonday(03, date("Y"));
	$winterStart = getFirstMonday(10, date("Y"));

	if ($today >= $summerStart && $today < $winterStart) {
		return "Weekdays: 10am - 7pm<br />Saturday: 10am - 5pm<br />Sunday: Closed"; // Summer Hours
	} else {
		return "Weekdays: 10am - 6pm<br />Saturday: 10am - 5pm<br />Sunday: Closed"; // Winter Hours
	}
}


// Start admin bar custom code /////////////////////////////////////////////////////////////////////////
// http://www.sandboxdev.com/2014/04/24/remove-menu-items-from-wordpress-admin-bar/
// http://www.sandboxdev.com/2014/04/24/remove-menu-items-from-wordpress-admin-bar/#sthash.EKDRe2im.dpuf


function custom_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('cuckoothemes');
	$wp_admin_bar->remove_menu('new-content');
}

add_action( 'wp_before_admin_bar_render', 'custom_admin_bar' );


// End admin bar custom code ///////////////////////////////////////////////////////////////////////////


// Start dashboard column custom code ////////////////////////////////////////////////////////////////
// http://wordpress.stackexchange.com/questions/126301/wordpress-3-8-dashboard-1-column-screen-options


/* function wpse126301_dashboard_columns() {
	add_screen_option('layout_columns', 
		array(
			'max' => 2, 
			'default' => 1
		)
	);
}

add_action( 'admin_head-index.php', 'wpse126301_dashboard_columns' ); */

add_action( 'admin_head-index.php', function() {
	?>
	<style>
		.postbox-container { min-width: 100% !important; }
		.meta-box-sortables.ui-sortable.empty-container { display: none; } 
	</style>
    <?php
});


// End dashboard column custom code //////////////////////////////////////////////////////////////////


// Start review post type custom code ////////////////////////////////////////////////
// https://github.com/MyThemeShop/WP-Review-by-MyThemeShop
// https://github.com/MyThemeShop/WP-Review-by-MyThemeShop/blob/master/filter-list.php


// Hide selected review types in metabox dropdown
function mts_hide_review_types($types) {
	unset($types['star'], $types['percentage']); // remove types
	$types['point'] = __('Enable Reviews'); // Change label
	return $types;
}

add_filter( 'wp_review_metabox_types', 'mts_hide_review_types' );


// Set colors for all displayed reviews
function new_review_colors($colors, $id) {
	$colors['color'] = '#dd3333'; // review color i.e. color of stars, bars etc.
	$colors['fontcolor'] = '#555555'; // review font color
	$colors['bgcolor1'] = '#e7e7e7'; // review heading background color
	$colors['bgcolor2'] = '#ffffff'; // review background color
	$colors['bordercolor'] = '#e7e7e7'; // review border color
	return $colors;
}

add_filter( 'wp_review_colors', 'new_review_colors', 10, 2 );

 
// Set default colors for new reviews
function new_default_review_colors($colors) {
	$colors['color'] = '#dd3333'; // review color i.e. color of stars, bars etc.
	$colors['fontcolor'] = '#555555'; // review font color
	$colors['bgcolor1'] = '#e7e7e7'; // review heading background color
	$colors['bgcolor2'] = '#ffffff'; // review background color
	$colors['bordercolor'] = '#e7e7e7'; // review border color
	return $colors;
}

add_filter( 'wp_review_default_colors', 'new_default_review_colors' );


// Set location for all displayed reviews
function new_review_location($position, $id) {
	$position = 'bottom';
	return $position;
}

add_filter( 'wp_review_location', 'new_review_location', 10, 2 );


// Set default location for new reviews
function new_default_review_location($position) {
	$position = 'bottom';
	return $position;
}

add_filter( 'wp_review_default_location', 'new_default_review_location' );


// Hide fields in "item" meta box
function hide_item_metabox_fields($fields) {
	// unset($fields['location'], $fields['fontcolor'], $fields['bordercolor']);
	// unset($fields['location']);
	// Or remove all with:
	$fields = array();
	return $fields;
}

add_filter( 'wp_review_metabox_item_fields', 'hide_item_metabox_fields' );


// Exclude post types
function mts_wp_review_exclude_post_types($excluded) {
	// default: $excluded = array('attachment');
	$excluded[] = 'page'; // Don't allow reviews on pages
	return $excluded;
}

add_filter( 'wp_review_excluded_post_types', 'mts_wp_review_exclude_post_types' );


// End review post type custom code //////////////////////////////////////////////////


// Start custom login page code /////////////////////////////////////////
// http://andornagy.com/customizing-the-wordpress-login-page/
// https://premium.wpmudev.org/blog/create-a-custom-wordpress-login-page/


// Adding the function to the login page
add_action('login_head', 'custom_login');
 

// Our custom function that includes the custom stylesheet
function custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo( 'stylesheet_directory' ) . '/custom-login/custom-login.css" />';
}


function set_login_logo_url() {
	return get_bloginfo( 'url' );
}

add_filter( 'login_headerurl', 'set_login_logo_url' );


function set_login_logo_url_title() {
	return 'BEBikes';
}

add_filter( 'login_headertitle', 'set_login_logo_url_title' );


function remove_lostpassword_text ( $text ) {
	if ($text == 'Lost your password?'){$text = '';}
	return $text;
}

add_filter( 'gettext', 'remove_lostpassword_text' );


// End custom login page code ///////////////////////////////////////////


// Start auto complete orders code /////////////////////////////////
// http://docs.woothemes.com/document/automatically-complete-orders/

add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );

function custom_woocommerce_auto_complete_order( $order_id ) {
	global $woocommerce;
	
	if ( !$order_id ) {
		return;
	}
	
    $order = new WC_Order( $order_id );
	
	$order->update_status( 'completed' );
}

// End auto complete orders code ///////////////////////////////////


?>