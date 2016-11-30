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

function bebikes_backstretch() {

	wp_register_script( 'backstretch', 'http://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.3/jquery.backstretch.min.js', array( 'jquery' ), '20130207', true );
	// wp_register_script( 'call_backstretch', plugins_url( 'call-backstretch.js', __FILE__ ), array( 'backstretch' ), '20130207', true );

	if ( is_front_page() ) {
		wp_enqueue_script( 'backstretch' );
		//wp_enqueue_script( 'call_backstretch' );
	}

}

add_action( 'wp_enqueue_scripts', 'bebikes_backstretch', 101 );

function bebikes_call_backstretch() {

	if ( is_front_page() ) {

		echo '<script>';
		echo 'jQuery(document).ready(function($) {';

		$query = 'posts_per_page=3';
		$qSlideshowData = new WP_Query( $query );

		if ( $qSlideshowData->have_posts() ) {
			// echo 'var items = [ { img: "", permalink: "", title: "", content: "" },';
			echo 'var items = [';
			while ( $qSlideshowData->have_posts() ) : $qSlideshowData->the_post();
				$permalink = get_permalink();
				$feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
				$title = get_the_title();
				$excerpt = limit_words(get_the_excerpt(), '10');
				echo '{ img: "' . $feat_image . '", ';
				echo 'permalink: "' . $permalink . '", ';
				echo 'title: "' . $title . '", ';
				echo 'content: "' . $excerpt . '" },';
			endwhile;
			wp_reset_postdata();
			echo '];';
		} else {
			echo 'var items = [{ img: "http://teamintermountainlivewell.org/wp-content/uploads/2013/02/team-race.jpg", permalink: "http://www.velonews.com", title: "VeloNews", content: "A link to velo news" }];';
		}

		echo 'var images = $.map(items, function (item) { return item.img; });';
		echo '$(".super-homepage").backstretch(images, {duration: 5000, fade: 750, centeredY: true});';
		echo '$(".super-homepage").on("click", function () { document.location.href = $(this).data("permalink"); });';
		echo '$(".super-homepage").on("backstretch.show", function(e, instance) {
					var nextItem = items[instance.index];
					$("#slidecaption")
						.find("h2").text( nextItem.title ).end()
						.find("div.slide-subtitle").html( nextItem.content ).end()
						.find("a").attr("href", nextItem.permalink).end()
						.data("permalink", nextItem.permalink);
				});';

		echo '});';
		echo '</script>';

	}

}

add_action( 'wp_footer', 'bebikes_call_backstretch', 102 );

?>