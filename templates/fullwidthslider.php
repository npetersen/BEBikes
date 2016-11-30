<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
*
*
** Name : Fullwidth Slider
*/

$query = 'posts_per_page=3';
$qSlideshowData = new WP_Query( $query );
// $slides = '';
$slides = "{ image : ' http://bebikesdev.utahwebdev.com/wp-content/uploads/2014/02/be-building-1.jpg ', title : '  <h2 class=\"slide-title\"> Welcome to Biker’s Edge </h2>  <div class=\"slide-subtitle\"> Biker’s Edge is a full service bike shop catering to... </div>  <div class=\"but\"><a href=\"#welcome\" title=\"Read More\" class=\"slide-button Left\">Read More</a></div>  ' },";
// $slides = "{ image : ' http://bebikes.com/wp-content/uploads/2015/03/2015-cinco-de-mayo-jersey-large.jpg ', title : '  <h2 class=\"slide-title\"> 2015 Cinco de Mayo Century Jersey </h2>  <div class=\"slide-subtitle\"> Get Your Official 2015 Cinco de Mayo Century Jersey! </div>  <div class=\"but\"><a href=\"/product/2015-cinco-de-mayo-century-jersey/\" title=\"Buy Now\" class=\"slide-button Left\">Buy Now!</a></div>  ' },";

if ( $qSlideshowData->have_posts() ) {
	
	while ( $qSlideshowData->have_posts() ) : $qSlideshowData->the_post();
		
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id() );
		$title = ' <h2 class="slide-title"> ' . get_the_title() . ' </h2> ';
		$excerpt = ' <div class="slide-subtitle"> ' . limit_words(get_the_excerpt(), '10') . ' </div> ';
		$permalink = ' <div class="but"><a href=" ' . get_permalink() . ' " title="Read More" class="slide-button Left">Read More</a></div> '; 
		
		$slides .= "{ image : ' " . $feat_image . " ', title : ' " . $title . $excerpt . $permalink . " ' },";

	endwhile;

	wp_reset_postdata();

}

$slider_elements = get_option( THEMEPREFIX . "_slidershow_settings" );

?>
	<section id="fullscreen-homepage" class="entry">
		<style>
			html, body { height:100%; }
		</style>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				var heightAdminBar =  document.getElementById('wpadminbar') ? 28 : 0;
				
				$(".super-homepage").supersized({
					slide_interval          :   <?php echo $slider_elements['settings']['FullScreen_slide_interval']; ?>,		// Length between transitions
					transition              :   <?php echo $slider_elements['settings']['effects_FullScreen']; ?>, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	<?php echo $slider_elements['settings']['FullScreen_transition_speed']; ?>,		// Speed of transition
					slides 					:  	[<?php echo $slides; ?>],	   
					progress_bar			:	<?php echo $slider_elements['settings']['FullScreen_progress_bar']; ?>,			// Timer for each slide	
				});
				
				$(window).resize(function(){
					var widthMain = $("body").find('#footer-container').width();
					var heightTop = widthMain < 481 ? $('#header_wrapper').height() : 0;
					$(".super-homepage").height($(window).height() - heightAdminBar - heightTop );
				});
			});
		</script>
		<!-- <div id="additional-content">Additional content goes here.</div> -->
		<div id="supersized-container" class="super-homepage">
		
			<!--Arrow Navigation-->
			<a id="prevslide" class="load-item"></a>
			<a id="nextslide" class="load-item"></a>
			
			<?php if($slider_elements['settings']['FullScreen_progress_bar'] == 1){ ?>
			<!--Time Bar-->
			<div id="progress-back" class="load-item">
				<div id="progress-bar"></div>
			</div>
			<?php } ?>
			
			<!--Slide captions displayed here-->
			<div class="container message screen-large">
				<div id="slidecaption"></div>
			</div>
			
			<div id="supersized-loader" class="slidePreloadImg">
				<div class="img-loader"></div>
			</div>
				<!--Control Bar-->
			<div id="controls-wrapper" class="load-item">
				<div id="controls">

				</div>
			</div>
			
			
		</div>
		
	</section>