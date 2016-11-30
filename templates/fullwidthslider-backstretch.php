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

$slider_elements = get_option( THEMEPREFIX . "_slidershow_settings" );

?>
	<section id="fullscreen-homepage" class="entry">
		<style>
			html, body { height:100%; }
		</style>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				var heightAdminBar =  document.getElementById('wpadminbar') ? 28 : 0;
				
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
			<!-- <a id="prevslide" class="load-item"></a>
			<a id="nextslide" class="load-item"></a> -->
			
			<?php if($slider_elements['settings']['FullScreen_progress_bar'] == 1){ ?>
			<!--Time Bar-->
			<!-- <div id="progress-back" class="load-item">
				<div id="progress-bar"></div>
			</div> -->
			<?php } ?>
			
			<!--Slide captions displayed here-->
			<div class="container message screen-large">
				<div id="slidecaption">
					<h2 class="slide-title"></h2>
					<div class="slide-subtitle"></div>
					<div class="but"><a title="Read More" class="slide-button Left">Read More</a></div>
				</div>
			</div>
			
			<!-- <div id="supersized-loader" class="slidePreloadImg">
				<div class="img-loader"></div>
			</div> -->
				<!--Control Bar-->
			<!-- <div id="controls-wrapper" class="load-item">
				<div id="controls">

				</div>
			</div> -->
			
			
		</div>
		
	</section>