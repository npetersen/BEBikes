<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 **************/
$cuckoo_builder = get_option( THEMEPREFIX . "_builder_settings" );
$cuckoo_social = get_option( THEMEPREFIX . "_social_settings" );
$slider_elements = get_option( THEMEPREFIX . "_slidershow_settings" );
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
$cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" );
 
get_header(); 

/* SlideShow Templates */

$backgroundColorSlide 		= ( !empty($slider_elements['settings']['background-color']) ? 'background-color:'.$slider_elements['settings']['background-color'].";" : '' );
$backgroundImageSlide 		= ( !empty($slider_elements['settings']['background-image']) ? "background-image:url('".$slider_elements['settings']['background-image']."');" : '' );
$backgroundPositionSlide 	= ( !empty($slider_elements['settings']['background-position']) ? 'background-position:'.$slider_elements['settings']['background-position'].';' : '' );
$backgroundAttachmentSlide 	= ( !empty($slider_elements['settings']['background-attachment']) ? 'background-attachment:'.$slider_elements['settings']['background-attachment'].';' : '' );
$backgroundRepeatSlide	 	= ( !empty($slider_elements['settings']['background-repeat']) ? 'background-repeat:'.$slider_elements['settings']['background-repeat'].';': '' );
$parallaxSpeedSlide			= ( !empty($slider_elements['settings']['parallax-speed']) ? $slider_elements['settings']['parallax-speed'] : 10 );
$paralaxSlide				= $slider_elements['settings']['parallax'];
if( $backgroundColorSlide && !$backgroundImageSlide ) :
	$backgroundImageSlide = 'background-image:none;';
endif;
if(!$backgroundImageSlide or $backgroundImageSlide == 'background-image:none;' ) :
	$backgroundPositionSlide = ''; $backgroundAttachmentSlide = ''; $backgroundRepeatSlide = '';
endif;
if($paralaxSlide == 1) :
	$styleSlide = 'style="' . $backgroundColorSlide . $backgroundImageSlide . $backgroundRepeatSlide . ' background-attachment:fixed" data-type="background" data-speed="'.$parallaxSpeedSlide.'"';
else :
	$styleSlide = 'style="' . $backgroundColorSlide . $backgroundImageSlide . $backgroundPositionSlide . $backgroundAttachmentSlide . $backgroundRepeatSlide . '"';
endif;

if( $slider_elements['settings']['homepage_slider'] == 'Nivo Slider' ){
	get_template_part("templates/main_slideshow");
}elseif( $slider_elements['settings']['homepage_slider'] == 'Revolution Slider' ){ ?>
	<section class="slideshowHomepageWrapper clearfix parallax-background" <?php echo $styleSlide; ?>>
		<div class="revolution_slider_homepage">
			<?php echo do_shortcode(cuckoo_decode($slider_elements['settings']['rev_alias'])); ?>
		</div>
	</section>
	<?php }elseif( $slider_elements['settings']['homepage_slider'] == 'LayerSlider' ){ ?>
		<?php echo do_shortcode(cuckoo_decode($slider_elements['settings']['layer_shortcode'])); ?>
	<?php }elseif( $slider_elements['settings']['homepage_slider'] == 'FullScreen Slider' ){ ?>
		<?php get_template_part("templates/fullwidthslider"); ?>
	<?php }elseif( $slider_elements['settings']['homepage_slider'] == 'FullScreen Image' ){
	
		$imgUrlLogo 				= ( !empty($slider_elements['settings']['img-logo-parallax']) ? "background-image:url('".$slider_elements['settings']['img-logo-parallax']."');" : '' );
		$imgPosition				= ( !empty($slider_elements['settings']['background-position-a']) ? 'background-position:'.$slider_elements['settings']['background-position-a'].';' : '' );
		$imgAttachment 				= ( !empty($slider_elements['settings']['background-attachment-a']) ? 'background-attachment:'.$slider_elements['settings']['background-attachment-a'].';' : '' );
		$imgRepeat	 				= ( !empty($slider_elements['settings']['background-repeat-a']) ? 'background-repeat:'.$slider_elements['settings']['background-repeat-a'].';': '' );
		$imgSpeed					= ( !empty($slider_elements['settings']['parallax-speed-logo']) ? $slider_elements['settings']['parallax-speed-logo'] : 10 );
		$imgParalax					= $slider_elements['settings']['parallax-effect-image'];
		
		if( $imgUrlLogo ) :
		
			if($imgParalax == 1) :
				$imgStyle = 'style="' . $imgUrlLogo . $imgRepeat . ' background-attachment:fixed; background-position:50% 50%" data-type="sprite" data-offsetY="150" data-Xposition="50%" data-speed="'.$imgSpeed.'"';
			else :
				$imgStyle = 'style="' . $imgUrlLogo . $imgPosition . $imgAttachment . $imgRepeat . '"';
			endif;
		
		endif;
		
	$imgbackgroundColorSlide 		= ( !empty($slider_elements['settings']['img-background-color']) ? 'background-color:'.$slider_elements['settings']['img-background-color'].";" : '' );
	$imgbackgroundImageSlide 		= ( !empty($slider_elements['settings']['img-background-image']) ? "background-image:url('".$slider_elements['settings']['img-background-image']."');" : '' );
	$imgbackgroundPositionSlide 	= ( !empty($slider_elements['settings']['img-background-position']) ? 'background-position:'.$slider_elements['settings']['img-background-position'].';' : '' );
	$imgbackgroundAttachmentSlide 	= ( !empty($slider_elements['settings']['img-background-attachment']) ? 'background-attachment:'.$slider_elements['settings']['img-background-attachment'].';' : '' );
	$imgbackgroundRepeatSlide	 	= ( !empty($slider_elements['settings']['img-background-repeat']) ? 'background-repeat:'.$slider_elements['settings']['img-background-repeat'].';': '' );
	$imgparallaxSpeedSlide			= ( !empty($slider_elements['settings']['img-parallax-speed']) ? $slider_elements['settings']['img-parallax-speed'] : 10 );
	$imgparalaxSlide				= $slider_elements['settings']['img-parallax'];
	if( $imgbackgroundColorSlide && !$imgbackgroundImageSlide ) :
		$imgbackgroundImageSlide = 'background-image:none;';
	endif;
	if(!$imgbackgroundImageSlide or $imgbackgroundImageSlide == 'background-image:none;' ) :
		$imgbackgroundPositionSlide = ''; $imgbackgroundAttachmentSlide = ''; $imgbackgroundRepeatSlide = '';
	endif;
	if($imgparalaxSlide == 1) :
		$imgstyleSlide = 'style="' . $imgbackgroundColorSlide . $imgbackgroundImageSlide . $imgbackgroundRepeatSlide . ' background-attachment:fixed" data-type="background" data-speed="'.$imgparallaxSpeedSlide.'"';
	else :
		$imgstyleSlide = 'style="' . $imgbackgroundColorSlide . $imgbackgroundImageSlide . $imgbackgroundPositionSlide . $imgbackgroundAttachmentSlide . $imgbackgroundRepeatSlide . '"';
	endif;
	
		$alignLog = $slider_elements['settings']['aling_text'];
		$imgLog = $slider_elements['settings']['img-logo-parallax'] ? '<div class="fullLogoWidth" '.$imgStyle.'></div>' : '';
		$h2img = $slider_elements['settings']['image_full_title'] ? '<h2 class="slide-title '.$alignLog.'">'.cuckoo_echo_for_wpml(THEMENAME.' Homepage FullScreen Image', 'Title', nl2br($slider_elements['settings']['image_full_title']), 0).'</h2>' : '';
		$divimg = $slider_elements['settings']['image_full_subtitle'] ? '<div class="slide-subtitle ' .$alignLog. '">'.cuckoo_echo_for_wpml(THEMENAME.' Homepage FullScreen Image', 'Subtitle', nl2br($slider_elements['settings']['image_full_subtitle']), 0).'</div>' : '';
	?>
		<section id="top-background-image" class="homepage-img clearfix parallax-background" <?php echo $imgstyleSlide; ?>>
			<style>
				section.homepage-img { padding-top: 1px; }
			</style>
			<script type="text/javascript">
				jQuery(document).ready(function($){
					var heightAdminBar =  document.getElementById('wpadminbar') ? 28 : 0;
					var widthMain = $("body").find('#footer-container').width();
					var heightTop = widthMain < 481 ? $('#header_wrapper').height() : 0;
					$("#top-background-image").height($(window).height() - heightAdminBar + 1 - heightTop);
					<?php if($imgParalax == 1 && $slider_elements['settings']['img-logo-parallax']) : ?>
						var imgHeight, aa;
						var tmpImg = new Image() ;
						tmpImg.src = '<?php echo $slider_elements['settings']['img-logo-parallax'] ?>' ;
						tmpImg.onload = function() {
							imgHeight = tmpImg.height/2;
							aa = ($(window).height())/2;
							$('.fullLogoWidth').attr('data-offsetY', aa-imgHeight);
						};
					<?php endif; ?>
					$('html,body').css('height', 'auto'); // for cuckooBizz
					$(window).resize(function(){
						var heightAdminBar =  document.getElementById('wpadminbar') ? 28 : 0;
						var widthMain = $("body").find('#footer-container').width();
						var heightTop = widthMain < 481 ? $('#header_wrapper').height() : 0;
						$("#top-background-image").height($(window).height() - heightAdminBar + 1 - heightTop);
						$('.fullLogoWidth').css('background-position', '50% ' + ($(window).height() - heightAdminBar - heightTop )/2 + 'px').attr('data-offsetY', ($(window).height() - heightAdminBar )/2);
					});
				});
			</script>
			<div class="container message screen-large zbox-cuckoo">
				<?php echo $imgLog; ?>
				<div id="slidecaption">
					<?php echo $h2img . $divimg; ?>
				</div>
			</div>
		</section>
	<?php }else{
		get_template_part("templates/main_slideshow");
	}

/* woocommerce */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	$wooActive = 1;
}else{
	$wooActive = 0;
}

if(!empty($cuckoo_builder)){
	foreach( $cuckoo_builder as $keys ){
		foreach( $keys as $key=>$content ){
			if(!empty($content)){
				$source 				= ( !empty($content['source']) ? $content['source'] : "" ); 
				$backgroundColor 		= ( !empty($content['backgroundColor']) ? 'background-color:'.$content['backgroundColor'].";" : '' );
				$backgroundImage 		= ( !empty($content['imgUrl']) ? "background-image:url('".$content['imgUrl']."');" : '' );
				$backgroundPosition 	= ( !empty($content['imgPosition']) ? 'background-position:'.$content['imgPosition'].';' : '' );
				$backgroundAttachment 	= ( !empty($content['imgAttachment']) ? 'background-attachment:'.$content['imgAttachment'].';' : '' );
				$backgroundRepeat	 	= ( !empty($content['imgRepeat']) ? 'background-repeat:'.$content['imgRepeat'].';': '' );
				$parallaxSpeed			= ( !empty($content['parallax-speed']) ? $content['parallax-speed'] : 10 );
				$paralax 				= $content['parallax'];
				if( $backgroundColor && !$backgroundImage ) :
					$backgroundImage = 'background-image:none;';
				endif;
				if(!$backgroundImage or $backgroundImage == 'background-image:none;' ) :
					$backgroundPosition = ''; $backgroundAttachment = ''; $backgroundRepeat = '';
				endif;
				if($paralax == 1) :
					$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundRepeat . ' background-attachment:fixed" data-type="background" data-speed="'.$parallaxSpeed.'"';
				else :
					$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundPosition . $backgroundAttachment . $backgroundRepeat . '"';
				endif;
				
				
				/*============================*/			
				/*======== Testimonials Unit =========*/			
				/*============================*/
				if($source == 'Testimonials'){ ?>		
				<section id="<?php echo make_ID_in_text($content['slug']); ?>" class="testimonials-wrap clearfix parallax-background" <?php echo $style; ?>>
					<article class="testimonials-content screen-large">
						<?php 
						$args =  array( 
						'post_type' => 'testimonials',
						'posts_per_page' 	=> $content['testimonialCount'],
						'orderby'			=> $content['testimonialsSorting']
						);
						query_posts( $args ); ?>
						<?php if($content['testListsOpions'] == 'option-1'): ?>
							<ul class="testimonials-list-homepage">
							<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
								$company = cuckoo_get_post_meta(get_the_ID(), "_company");
								$details = cuckoo_get_post_meta(get_the_ID(), "_details");
								$imgTitleTest = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_title");
								$imgUrlTest = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_url");
								$UrlTest = cuckoo_get_post_meta(get_the_ID(), "_testimonial_url_site");
								$excerpt = get_the_excerpt();
								$excerpt = cuckoo_excerpt_testimonials( $excerpt ); ?>
								<li class="testimonial-element screen-large">
									<?php if($excerpt) : ?>
										<div class="testimonials-excerpt"><?php echo $excerpt; ?></div>
									<?php endif; ?>
									<?php if($company) : ?>
										<div class="testimonials-company">
											<?php if( $imgUrlTest ): ?>
												<div class="testimonials-thumb">
												<?php if($UrlTest): ?>
													<a title="<?php echo $imgTitleTest; ?>" href="<?php echo $UrlTest; ?>"><img width="60" alt="<?php echo $imgTitleTest; ?>" height="60" src="<?php echo cuckoo_get_attachment_all_size($imgUrlTest , 'mini-thumb'); ?>" title="<?php echo $imgTitleTest; ?>" /></a>
												<?php else : ?>
													<img width="60" height="60" alt="<?php echo $imgTitleTest; ?>" src="<?php echo cuckoo_get_attachment_all_size($imgUrlTest , 'mini-thumb'); ?>" title="<?php echo $imgTitleTest; ?>" />
												<?php endif; ?>
												</div>
											<?php endif; ?>
											<span class="text-test" <?php if( $imgUrlTest ){ ?> style="text-align:left;"<?php } ?>>
												<?php echo $company; ?>
												<?php if($details): ?>
													<span class="test-details">
														<?php echo $details; ?>
													</span>
												<?php endif; ?>
											</span>
										</div>
									<?php endif; ?>
								</li>
							<?php endwhile; ?>	
							</ul>
						<?php elseif($content['testListsOpions'] == 'option-2') : ?>
							<ul class="testimonials-option-2">
							<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
								$company = cuckoo_get_post_meta(get_the_ID(), "_company");
								$details = cuckoo_get_post_meta(get_the_ID(), "_details");
								$imgTitleTest = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_title");
								$imgUrlTest = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_url");
								$UrlTest = cuckoo_get_post_meta(get_the_ID(), "_testimonial_url_site");
								$excerpt = get_the_excerpt();
								$excerpt = cuckoo_excerpt_testimonials( $excerpt ); ?>
								<li class="testimonials-option-2-list">
									<?php if($excerpt) : ?>
										<div class="testimonials-option-2-excerpt">
											<div class="test-exp"><?php echo $excerpt; ?></div>
											<div class="test-arrow"></div>
										</div>
									<?php endif; ?>
									<?php if($company) : ?>
										<div class="testimonials-company">
											<?php if( $imgUrlTest ): ?>
											<div class="testimonials-opt-2-thumb">
												<?php if($UrlTest): ?>
													<a title="<?php echo $imgTitleTest; ?>" href="<?php echo $UrlTest; ?>"><img width="60" height="60" alt="<?php echo $imgTitleTest; ?>" src="<?php echo cuckoo_get_attachment_all_size($imgUrlTest , 'mini-thumb'); ?>" title="<?php echo $imgTitleTest; ?>" /></a>
												<?php else : ?>
													<img width="60" height="60" alt="<?php echo $imgTitleTest; ?>" src="<?php echo cuckoo_get_attachment_all_size($imgUrlTest , 'mini-thumb'); ?>" title="<?php echo $imgTitleTest; ?>" />
												<?php endif; ?>
											</div>
											<?php endif; ?>
											<div class="testimonials-opt-2-test"><?php echo $company; ?></div>
											<?php if($details): ?>
												<div class="test-details">
													<?php echo $details; ?>
												</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</li>
							<?php endwhile; ?>	
							</ul>
						<?php endif; ?>
					</article>
					<div class="post-navigation">
						<div title="<?php _e('Next', 'cuckoothemes'); ?>" class="next-blog-nav"></div>
						<div title="<?php _e('Previuos', 'cuckoothemes'); ?>" class="prev-blog-nav"></div>
					</div>
					<script type="text/javascript">
						jQuery(document).ready(function($){
							$('body').cuckoobizz('blogListHomepage', { 
								main: '#<?php echo make_ID_in_text($content['slug']); ?>',
								mainUL: '<?php echo $uls = $content['testListsOpions'] == 'option-2' ? 'ul.testimonials-option-2' : 'ul.testimonials-list-homepage'; ?>',
								effect: '<?php echo $content['testimElementsEffects']; ?>',
								hoverEffect: '<?php echo $cuckoo_style['testimonialsThumbHover']; ?>'
							});
						});
					</script>
				</section>
				<?php wp_reset_query();
				}
				/*============================*/			
				/*======== Team Unit =========*/			
				/*============================*/
				if($source == 'Team'){ ?>
					<section id="<?php echo make_ID_in_text($content['slug']); ?>" class="team-wrap clearfix section parallax-background" <?php echo $style; ?>>
						<?php $margin_title = ""; ?>
						<?php if( $content['pageTitle'] != 1 ) : ?>
							<header class="item-header-wrap">
								<h2 class="homepage-unit-title"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Title', $content['title']); ?></h2>
								<?php if($content['subtitle']) : ?><h4 class="homepage-subtitle"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Subtitle', $content['subtitle']); ?></h4><?php endif; ?>
							</header>
						<?php else : ?>
							<?php $margin_title = 'style="margin-top:70px!important;"'; ?>
							<div class="no-header-page"></div>
						<?php endif; ?>
						<article class="team-content screen-large" <?php echo $margin_title; ?>>
							<ul class="team-wrapper-homepage">
							<?php 
							
							$term_team = get_term( $content['teamContent'], 'team-categories' );
							$team_categories = ( $content['teamContent'] == 0 ) ? cuckoo_list_taxha( 'team-categories',  $content['teamContent'] ) : $term_team->slug ;
							$team_args = array(
							'team-categories' 	=> $team_categories,
							'post_type' 		=> 'team',
							'posts_per_page' 	=> $content['teamCount'],
							'orderby'			=> $content['teamSorting']
							);
							query_posts($team_args);
							
							if(have_posts()) :
								while ( have_posts() ) : the_post(); 
								$memberDesc = cuckoo_get_post_meta(get_the_ID(), "_member-desc");
								$socialFacebook = cuckoo_get_post_meta(get_the_ID(), "_social-facebook");
								$socialTwitter = cuckoo_get_post_meta(get_the_ID(), "_social-twitter"); 
								$socialGoogle = cuckoo_get_post_meta(get_the_ID(), "_social-google"); 
								$socialFlickr = cuckoo_get_post_meta(get_the_ID(), "_social-flickr"); 
								$socialInstagram = cuckoo_get_post_meta(get_the_ID(), "_social-instagram"); 
								$socialPinterest = cuckoo_get_post_meta(get_the_ID(), "_social-pinterest"); 
								$socialDribble = cuckoo_get_post_meta(get_the_ID(), "_social-dribble"); 
								$socialBehance = cuckoo_get_post_meta(get_the_ID(), "_social-behance"); 
								$socialYouTube = cuckoo_get_post_meta(get_the_ID(), "_social-youtube"); 
								$socialVimeo = cuckoo_get_post_meta(get_the_ID(), "_social-vimeo"); 
								$socialLinkedin = cuckoo_get_post_meta(get_the_ID(), "_social-linkedin"); 
								$socialEmail = cuckoo_get_post_meta(get_the_ID(), "_social-email"); 
								$socialRss = cuckoo_get_post_meta(get_the_ID(), "_social-rss"); 
								$margin = "";
								if($socialFacebook or $socialTwitter or $socialGoogle or $socialFlickr or $socialPinterest or $socialDribble or 
										$socialBehance or $socialYouTube or $socialVimeo or $socialLinkedin or $socialEmail or $socialRss) :
										$margin = " social-margin";
								endif;
								?>
									<li id="team-<?php the_ID(); ?>" <?php post_class('test-list'); ?>>
										<?php if($content['no_link_thumb_team'] == 1) : ?>
											<?php get_template_part( "loop/team/list-header-no-link" ); ?>
										<?php else : ?>
											<?php get_template_part( "loop/team/list-header" ); ?>
										<?php endif; ?>
										<div class="team-desc-bottom<?php echo $margin; ?>">
											<?php if($socialFacebook): ?>
												<a class="facebook-small" target="_blank" href="<?php echo $socialFacebook; ?>" title="Facebook"></a>
											<?php endif; ?>
											<?php if($socialTwitter): ?>
												<a class="twitter-small" target="_blank" href="<?php echo $socialTwitter; ?>" title="Twitter"></a>
											<?php endif; ?>									
											<?php if($socialGoogle): ?>
												<a class="google-small" target="_blank" href="<?php echo $socialGoogle; ?>" title="Google+"></a>
											<?php endif; ?>									
											<?php if($socialFlickr): ?>
												<a class="flickr-small" target="_blank" href="<?php echo $socialFlickr; ?>" title="Flickr"></a>
											<?php endif; ?>									
											<?php if($socialInstagram): ?>
												<a class="instagram-small" target="_blank" href="<?php echo $socialInstagram; ?>" title="Instagram"></a>
											<?php endif; ?>	
											<?php if($socialPinterest): ?>
												<a class="pinterest-small" target="_blank" href="<?php echo $socialPinterest; ?>" title="Pinterest"></a>
											<?php endif; ?>									
											<?php if($socialDribble): ?>
												<a class="dribble-small" target="_blank" href="<?php echo $socialDribble; ?>" title="Dribble"></a>
											<?php endif; ?>									
											<?php if($socialBehance): ?>
												<a class="behance-small" target="_blank" href="<?php echo $socialBehance; ?>" title="Behance"></a>
											<?php endif; ?>									
											<?php if($socialYouTube): ?>
												<a class="youtube-small" target="_blank" href="<?php echo $socialYouTube; ?>" title="YouTube"></a>
											<?php endif; ?>									
											<?php if($socialVimeo): ?>
												<a class="vimeo-small" target="_blank" href="<?php echo $socialVimeo; ?>" title="Vimeo"></a>
											<?php endif; ?>									
											<?php if($socialLinkedin): ?>
												<a class="linkendin-small" target="_blank" href="<?php echo $socialLinkedin; ?>" title="Linkedin"></a>
											<?php endif; ?>									
											<?php if($socialEmail): ?>
												<a class="email-small" href="mailto:<?php echo $socialEmail; ?>" title="Email"></a>
											<?php endif; ?>									
											<?php if($socialRss): ?>
												<a class="rss-small" target="_blank" href="<?php echo $socialRss; ?>" title="RSS"></a>
											<?php endif; ?>
											<div class="team-description"><?php echo $memberDesc; ?></div>
										</div>
									</li>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php wp_reset_query(); ?>
							</ul>
						</article>
						<div class="post-navigation">
							<div title="<?php _e('Next', 'cuckoothemes'); ?>" class="next-blog-nav"></div>
							<div title="<?php _e('Previuos', 'cuckoothemes'); ?>" class="prev-blog-nav"></div>
						</div>
						<script type="text/javascript">
							jQuery(document).ready(function($){
								$('body').cuckoobizz('blogListHomepage', { 
									main: '#<?php echo make_ID_in_text($content['slug']); ?>',
									mainUL: 'ul.team-wrapper-homepage',
									effect: '<?php echo $content['teamElementsEffects']; ?>',
									around: '<?php echo $content['teamElementsAround']; ?>',
									hoverEffect: '<?php echo $cuckoo_style['teamThumbHover']; ?>'
								});
							});
						</script>
					</section>
				<?php }
				/*============================*/			
				/*======== Blog Unit =========*/			
				/*============================*/		
				if($source == 'Blog Posts'){ ?>
					<section id="<?php echo make_ID_in_text($content['slug']); ?>" class="blog-wrap clearfix section parallax-background" <?php echo $style; ?>>
						<?php $margin_title = ""; ?>
						<?php if( $content['pageTitle'] != 1 ) : ?>
							<header class="item-header-wrap">
								<h2 class="homepage-unit-title"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Title', $content['title']); ?></h2>
								<?php if($content['subtitle']) : ?><h4 class="homepage-subtitle"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Subtitle', $content['subtitle']); ?></h4><?php endif; ?>
							</header>
						<?php else : ?>
							<?php $margin_title = 'style="margin-top:70px!important;"'; ?>
							<div class="no-header-page"></div>
						<?php endif; ?>
						<?php 
							$args= array(
								'post_types' 	 => 'post',
								'posts_per_page' => $content['blogCount'],
								'orderby'		 => $content['blogSorting'],
								'cat' 			 => $cat = $content['postContent'] == 0 ? $content['blogExclude'] : $content['postContent']
							);
							query_posts($args);
						?>
						<?php if($content['blogListsOpions'] == 'option-1') : ?>
						<article class="blog-content screen-large" <?php echo $margin_title; ?>>
							<ul class="blog-list-homepage">
								<?php if(have_posts()) :
									while ( have_posts() ) : the_post(); ?>
										<li id="post-<?php the_ID(); ?>" <?php post_class('blog-li-home'); ?>>
											<?php get_template_part( "loop/post/blog-header" ); ?>
											<div class="blog-content-text">
												<?php the_excerpt(); ?>
												<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', 'cuckoothemes' ); ?></a></div>
											</div>
										</li>
									<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</article>
						<div class="post-navigation">
							<div title="<?php _e('Next', 'cuckoothemes'); ?>" class="next-blog-nav"></div>
							<div title="<?php _e('Previuos', 'cuckoothemes'); ?>" class="prev-blog-nav"></div>
						</div>
						<script type="text/javascript">
							jQuery(document).ready(function($){
								$('body').cuckoobizz('blogListHomepage', { 
									main: '#<?php echo make_ID_in_text($content['slug']); ?>',
									mainUL: 'ul.blog-list-homepage',
									effect: '<?php echo $content['blogElementsEffects']; ?>',
									around: '<?php echo $content['blogElementsAround']; ?>',
									hoverEffect: '<?php echo $cuckoo_style['postsThumbHover']; ?>'
								});
							});
						</script>
						<?php elseif($content['blogListsOpions'] == 'option-2') :  ?>
						<article class="blog-content screen-large home-blog-unit">
							<div class="item-top-line home-page-blog"></div>
							<ul class="blog-list-option">
								<?php if(have_posts()) :
									while ( have_posts() ) : the_post(); ?>
										<li id="post-<?php the_ID(); ?>" <?php post_class('blog-li-option'); ?>>
											<?php get_template_part( "loop/post/header-list-option" ); ?>
											<div class="excerpt-post-li-option-225<?php if ( !has_post_thumbnail() ) : ?> no-thumb-post<?php endif; ?>">
												<?php the_excerpt(); ?>
												<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', 'cuckoothemes' ); ?></a></div>
											</div>
										</li>
									<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</article>
						<script type="text/javascript">
							jQuery(document).ready(function($){
								var a = $('#<?php echo make_ID_in_text($content['slug']); ?>').find('img');
								$('body').cuckoobizz('blackWhiteEffectsUse', a, '<?php echo $cuckoo_style['postsThumbHover']; ?>');
							});
						</script>
						<?php elseif($content['blogListsOpions'] == 'option-3') : ?>
						<article class="blog-content screen-large home-blog-unit">
							<div class="item-top-line home-page-blog"></div>
							<ul class="blog-list-option">
								<?php if(have_posts()) :
									while ( have_posts() ) : the_post(); ?>
										<li id="post-<?php the_ID(); ?>" <?php post_class('blog-li-option'); ?>>
											<?php get_template_part( "loop/post/header-list-option-470" ); ?>
											<div class="excerpt-post-li-option-470<?php if ( !has_post_thumbnail() ) : ?> no-thumb-post<?php endif; ?>">
												<?php the_excerpt(); ?>
												<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', 'cuckoothemes' ); ?></a></div>
											</div>
										</li>
									<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</article>
						<script type="text/javascript">
							jQuery(document).ready(function($){
								var a = $('#<?php echo make_ID_in_text($content['slug']); ?>').find('img');
								$('body').cuckoobizz('blackWhiteEffectsUse', a, '<?php echo $cuckoo_style['postsThumbHover']; ?>');
							});
						</script>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</section>
				<?php }
				/*============================*/			
				/*======== HTML text Unit =========*/			
				/*============================*/
				if($source == 'HTML Text'){ ?>
					<section id="<?php echo make_ID_in_text($content['slug']); ?>" class="text-box-wrap clearfix parallax-background" <?php echo $style; ?>>
						<article class="image-unit-content page-content screen-large" style="padding-top:<?php echo $content['imageTopPadding']; ?>px; padding-bottom:<?php echo $content['imageBottomPadding']; ?>px;">
							<?php if(!empty($content['imageText'])) : ?>
								<?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'HTML unit text', do_shortcode(cuckoo_decode($content['imageText']))); ?>
							<?php else : ?>
								&nbsp;
							<?php endif; ?>
						</article>
					</section>
				<?php }	
				/*============================*/			
				/*======== Page Unit =========*/			
				/*============================*/
				if($source == 'Page'){
					$pageurl = cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Page unit url', $content['pageUrl'], 0);
					$my_id = url_to_postid($pageurl);
					$my_page = get_post($my_id);
					$page_content = $my_page->post_content;
					$page_content = apply_filters('the_content', $page_content);
					$page_content = str_replace(']]>', ']]>', $page_content);
					$margin_title = "";
					?>
					<section id="<?php echo make_ID_in_text($content['slug']); ?>" class="page-wrap clearfix section parallax-background" <?php echo $style; ?>>
						<?php if( $content['pageTitle'] != 1 ) : ?>
							<header class="item-header-wrap">
								<h2 class="homepage-unit-title"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Title', $content['title']); ?></h2>
								<?php if($content['subtitle']) : ?><h4 class="homepage-subtitle"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Subtitle', $content['subtitle']); ?></h4><?php endif; ?>
							</header>
						<?php else : ?>
							<?php $margin_title = 'style="margin-top:70px!important;"'; ?>
							<div class="no-header-page"></div>
						<?php endif; ?>
						<article class="page-content screen-large" <?php echo $margin_title; ?>>
							<?php echo $page_content; ?>
						</article>
					</section>
					<?php
				}
				/*============================*/			
				/*======== Work gallery Unit =========*/			
				/*============================*/
				if($source == 'Works Gallery'){ ?>
				<section id="<?php echo make_ID_in_text($content['slug']); ?>" class="work-wrap clearfix section parallax-background" <?php echo $style; ?>>
					<?php $margin_title = ""; ?>
					<?php if( $content['pageTitle'] != 1 ) : ?>
						<header class="item-header-wrap">
								<h2 class="homepage-unit-title"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Title', $content['title']); ?></h2>
								<?php if($content['subtitle']) : ?><h4 class="homepage-subtitle"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Subtitle', $content['subtitle']); ?></h4><?php endif; ?>
						</header>
					<?php else : ?>
						<?php $margin_title = 'style="margin-top:70px!important;"'; ?>
						<div class="no-header-page"></div>
					<?php endif; ?>
					<article class="work-content screen-large" <?php echo $margin_title; ?>>
						<?php 
						$term = get_term( $content['worksContent'], 'types' );
						$lightBox = $content['woks-lightbox'];
						$types = ( $content['worksContent'] == 0 ) ? cuckoo_list_taxha( 'types',  $content['worksExclude'] ) : $term->slug ;
						$args_works =  array(
						'types' 			=> $types,
						'orderby' 			=> $content['worksSorting'],
						'posts_per_page' 	=> $content['worksCount'],
						'post_type' 		=> 'works'
						);
						query_posts($args_works);
						
						if ( have_posts() ):
						if( $content['filterPosition'] == 1 ): ?>
						<div class="works-top-line home-page-gallery"></div>
						<ul id="<?php echo make_ID_in_text($content['slug']); ?>-filters" data-option-key="filter" class="item-info-list homepage-works-galery">
							<?php
									$terms = get_terms("types" , array( 'exclude' => $content['worksExclude']));
									$count = count($terms);
									$names = "";
									$slug = "";
									$alone = "";
									if($content['filterFirst'] != 0) :
										$alone = get_term( $content['filterFirst'], 'types' );
									endif;
									if ( $count > 0 ) : ?>
											<li><a title="<?php _e('Show All', 'cuckoothemes'); ?>" class="type-list <?php echo ( $content['filterFirst'] == 0 ) ?  "selected" :  "";  ?>" href="#" data-filter="*"><?php _e('Show All', 'cuckoothemes'); ?></a></li>
										<?php
										if ( have_posts() ):
											while ( have_posts() ) : the_post();
												$wo_id = get_the_ID();
												$work_cat = wp_get_object_terms( $wo_id, "types" );
													foreach($work_cat as $cat) :
													$names .= $cat->name.",";
													$slug .=  $cat->slug.",";
													endforeach;
											endwhile;
											$slug_array = array_unique(explode(",",$slug));
											$names_array = array_unique(explode(",",$names));
											foreach( $names_array as $k=>$v ) : 
												if( $v != null ) : 
												?>
												<li><a title="<?php echo $v; ?>" class="type-list <?php echo  ($alone != null) ? $alone->name == $v  ? "selected" : "" : ""; ?>" href="#" data-filter=".<?php echo $slug_array[$k]; ?>"><?php echo $v; ?></a></li>
												<?php 
												endif;
											endforeach;

										endif; ?>
							<?php endif; ?>
						</ul>
						<?php endif; ?>
						<div id="<?php echo make_ID_in_text($content['slug']); ?>-portfolio-home" class="clerfix-isotope screen-large-portfolio">
						<?php while ( have_posts() ) : the_post();
							$work_id = get_the_ID();
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($work_id), 'full' );
							$urlThumb = $thumb['0'];
							$post_categories = wp_get_object_terms( $work_id, "types" );
							$video = cuckoo_get_post_meta(get_the_ID(), "_work_video");
							$cats ="element ";
							foreach($post_categories as $cat) {
								$cats .= $cat->slug.' ';
							} ?>
								<?php if($lightBox == 1): ?>
									
									<a class="cuckooLightbox-<?php echo make_ID_in_text($content['slug']); ?> <?php echo $cats; ?> work-item-240" href="<?php echo $showUrl = $video ? lightbox_video($video, 1) : $urlThumb; ?>" <?php echo $showUrlIframe = $video ? 'data-cuckoolightbox-type="iframe"' : ''; ?> title="<?php echo cuckoo_max_trim(the_title('', '', false), 70); ?>" data-cuckoolightbox-class="cuckooLightbox-<?php echo make_ID_in_text($content['slug']); ?>">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( '240-size', array( 'title' => '', 'class' => 'item-group-0' ) ); ?>
										<?php else : ?>
											<div class="no-thumbnail-225"></div>
										<?php endif; ?>
										<div class="work-info">
											<div class="work-contur">
												<div class="single-container">
													<div class="cells">
													<h4 class="work-thumb-title"><?php echo cuckoo_max_trim(the_title('', '', false), 70);  ?></h4>
													<?php $categories = wp_get_object_terms( $work_id, "types" );
														$ca ="";
														foreach($categories as $c) {
														$ca .= '<span class="work-type">'. $c->name .'</span>';
														}
														echo $ca;
													?>
													</div>
													<span class="item-background"></span>
												</div>
											</div>
										</div>
										<div class="border-img"></div>
									</a>
								<?php else : ?>
									<a class="<?php echo $cats; ?> work-item-240" href="<?php echo get_permalink(); ?>" title="<?php echo cuckoo_max_trim(the_title('', '', false), 70); ?>">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( '240-size', array( 'title' => '', 'class' => 'item-group-0' ) ); ?>
										<?php else : ?>
											<div class="no-thumbnail-225"></div>
										<?php endif; ?>
										<div class="work-info">
											<div class="work-contur">
												<div class="single-container">
													<div class="cells">
													<h4 class="work-thumb-title"><?php echo cuckoo_max_trim(the_title('', '', false), 70);  ?></h4>
													<?php $categories = wp_get_object_terms( $work_id, "types" );
														$ca ="";
														foreach($categories as $c) {
														$ca .= '<span class="work-type">'. $c->name .'</span>';
														}
														echo $ca;
													?>
													</div>
													<span class="item-background"></span>
												</div>
											</div>
										</div>
										<div class="border-img"></div>
									</a>
								<?php endif; ?>
						<?php endwhile; ?>
						<?php else: ?>
							<?php get_template_part("loop/alert/no-works"); ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
						</div>
					</article>
					<script type="text/javascript">
						jQuery(document).ready(function($){
							
							<?php if( $content['filterPosition'] == 1 ): ?>
							if(document.getElementById('<?php echo make_ID_in_text($content['slug']); ?>-filters')){
								var starter = $("#<?php echo make_ID_in_text($content['slug']); ?>-filters a.selected").attr('data-filter');
								var $container = $('#<?php echo make_ID_in_text($content['slug']); ?>-portfolio-home');
								$container.isotope({ filter: starter });
							}
							
							$('#<?php echo make_ID_in_text($content['slug']); ?>-filters a').click(function(){
							var selector = $(this).attr('data-filter');
								if ( !$(this).hasClass('selected') ) {
									$(this).parents('#<?php echo make_ID_in_text($content['slug']); ?>-filters').find('.selected').removeClass('selected');
									$(this).addClass('selected');
								}
								$container.isotope({
									filter: selector			
										});	
								return false;
							});
							<?php endif; ?>
							
							// hover 
							$('#<?php echo make_ID_in_text($content['slug']); ?>-portfolio-home a.element div.work-info').each( function() { $(this).hoverdir(); } );
							
							var a = $('#<?php echo make_ID_in_text($content['slug']); ?>').find('a.work-item-240 img.item-group-0');
							$(a).unbind('load');
							$('body').cuckoobizz('blackWhiteEffectsUse', a, '<?php echo $cuckoo_style['worksThumbHover']; ?>');
							
							<?php if($lightBox == 1) : ?>
							$('.cuckooLightbox-<?php echo make_ID_in_text($content['slug']); ?>').cuckoolightbox({
								title: 'outside'
							});
							<?php endif; ?>
						});
					</script>
				</section>
				<?php }
				/*============================*/			
				/*======== Text box unit =========*/			
				/*============================*/
				if($source == 'Text Box'){ ?>
				<section id="<?php echo  make_ID_in_text($content['slug']); ?>" class="text-box-wrap clearfix parallax-background" <?php echo $style; ?>>
					<article class="text-box-content screen-large">
						<div class="text-box-box">
							<div class="text-box">
								<?php if( $content['textBoxText'] ) : ?>
									<div class="text-box-text"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Text Box unit text', nl2br($content['textBoxText'])); ?></div>
								<?php endif; ?>
								<?php if( $content['textBoxUrl'] ) : ?>
									<a class="text-box-link" style="<?php echo $boxMargin = $content['textBoxText'] ? 'margin-top:30px;' : ''; ?>" href="<?php echo $content['textBoxUrl']; ?>" title="<?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Text Box unit button title', nl2br($content['textBoxUrlTitle'])); ?>"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Text Box unit button title', nl2br($content['textBoxUrlTitle'])); ?></a>
								<?php endif; ?>
							</div>
						</div>
					</article>
				</section>
				<?php }
				/*============================*/			
				/*======== Map Unit =========*/			
				/*============================*/
				if($source == 'Map'){ ?>
				<section id="<?php echo make_ID_in_text($content['slug']); ?>" class="map-unit-wrap clearfix">
					<iframe style="height:<?php echo $content['mapHeight'] ?>px; width:100%; display:block;" scrolling="no" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;iwloc=B&amp;hl=&amp;q=<?php echo $content['mapAddressInput']; ?>&amp;z=<?php echo $content['mapZoom']; ?>&amp;ie=UTF8&amp;t=m&amp;output=embed"></iframe>
				</section>
				<?php }
				/*============================*/			
				/*======== SlideShow Unit =========*/			
				/*============================*/
				if($source == 'Slideshow'){ ?>
					<section id="<?php echo make_ID_in_text($content['slug']); ?>" class="text-box-wrap clearfix parallax-background" <?php echo $style; ?>>
						<article class="image-unit-content page-content" style="padding-top:<?php echo $content['slideTopPadding']; ?>px; padding-bottom:<?php echo $content['slideBottomPadding']; ?>px;">
							<?php if(!empty($content['slideShortcode'])) : ?>
								<?php echo do_shortcode($content['slideShortcode']); ?>
							<?php else : ?>
								&nbsp;
							<?php endif; ?>
						</article>
					</section>
				<?php }	
				/*============================*/			
				/*======== Social Media Unit =========*/			
				/*============================*/
				if($source == 'Social Media'){
				?>
				<section id="<?php echo make_ID_in_text($content['slug']); ?>" class="social-media-wrap clearfix parallax-background" <?php echo $style; ?>>
					<article class="social-media-content screen-large">
						<div class="social-media-box">
							<div class="social-media">
								<?php if( $cuckoo_social['elements'] != null )
									{
										foreach($cuckoo_social['elements'] as $k=>$v)
										{
											foreach($v as $key=>$value)
											{ 
												if($value['values'] != null)
												{ 
													foreach( $content['socialMedia'] as $socialName=>$activateKey  ) {
														$socName = $socialName == 'Google' ? 'Google+' : $socialName;
														if( $socName == $value['name'] && $activateKey == 1 ) { ?>
														<a class="<?php echo $value['class'] ?>-large" title="<?php echo $value['name']; ?>" <?php if($value['name'] != 'Email') { ?> target="_blank" <?php } ?> href="<?php echo $value['link'].$value['values']; ?>"></a>
														<?php 
														}
													}
												}
											}
										}
									}
								?>
							</div>
						</div>
					</article>
				</section>
				<?php
				}
				/*============================*/			
				/*======== Woocommerce Unit =========*/			
				/*============================*/
				if($wooActive == 1){
					if($source == 'WooCommerce'){ ?>
					<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="work-wrap woo-cuckoo-active clearfix section parallax-background" <?php echo $style; ?>>
						<?php $margin_titles = ""; ?>
						<?php if( $content['pageTitle'] != 1 ) : ?>
							<header class="item-header-wrap">
								<h2 class="homepage-unit-title"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Title', $content['title']); ?></h2>
								<?php if($content['subtitle']) : ?><h4 class="homepage-subtitle"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit #'.$key, 'Subtitle', $content['subtitle']); ?></h4><?php endif; ?>
							</header>
						<?php else : ?>
							<?php $margin_titles = 'style="margin-top:70px!important;"'; ?>
							<div class="no-header-page"></div>
						<?php endif; ?>
						<?php if($content['cart_show'] == 1) : 
								global $woocommerce;
								$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
								$cart_url = $woocommerce->cart->get_cart_url();
								$checkout_url = $woocommerce->cart->get_checkout_url();
									
								$myaccount_page_url = "";
								if ( $myaccount_page_id ) {
								 $myaccount_page_url = get_permalink( $myaccount_page_id );
								} ?>
							<article class="woocoomerce-links-content in-woo-unit page-content screen-large" <?php echo $margin_titles; ?>>
								<div class="cart-accuont-unit">
									<a class="woo-links" href="<?php echo $cart_url; ?>" title="<?php _e('Cart', 'cuckoothemes'); ?>"><span class="cart-show"></span><?php _e('Cart', 'cuckoothemes'); ?></a> | <div class="total-cart"><?php _e('Total', 'cuckoothemes'); ?> <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></div> | <a class="woo-links" href="<?php echo $myaccount_page_url; ?>" title="<?php _e('My Account', 'cuckoothemes'); ?>"><?php _e('My Account', 'cuckoothemes'); ?></a> | <a class="woo-links" href="<?php echo $checkout_url; ?>" title="<?php _e('Checkout', 'cuckoothemes'); ?>"><?php _e('Checkout', 'cuckoothemes'); ?></a>
								</div>
							</article>
						<?php endif; ?>
						<?php if($content['wooSourcePosition'] == 'Carousel') : ?>
							<article class="woo-content-home woo-cuckoo-homepage cars"<?php if($content['cart_show'] == 1) :?> style="margin:0 auto!important;"<?php endif; ?> <?php echo $margin_titles; ?>>
								<?php if($content['wooSource'] == 'Products'){
									if( $content['productContent'] == '0' ){ ?>
										<div class="woocommerce">
										<?php if($content['wooSorting'] == 'rand'){
											echo do_shortcode('[list_products per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'"]'); 
										}else{
											echo do_shortcode('[list_products per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'" order="'.$content['wooOrder'].'"]'); 
										} ?>
										</div> <?php
									}else{
										$category = get_term( $content['productContent'], 'product_cat' );
										if($content['wooSorting'] == 'rand'){
											echo do_shortcode('[product_category category="'.$category->name.'" per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'"]'); 
										}else{
											echo do_shortcode('[product_category category="'.$category->name.'" per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'" order="'.$content['wooOrder'].'"]'); 
										}
									}
								}elseif($content['wooSource'] == 'Categories'){
									echo do_shortcode('[product_categories number="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'" order="'.$content['wooOrder'].'"]'); 
								} ?>
								<div class="post-navigation">
									<div title="<?php _e('Next', 'cuckoothemes'); ?>" class="next-blog-nav"></div>
									<div title="<?php _e('Previuos', 'cuckoothemes'); ?>" class="prev-blog-nav"></div>
								</div>
							</article>
							<script type="text/javascript">
								jQuery(document).ready(function($){
									$('body').cuckoobizz('blogListHomepage', { 
										main: '#<?php echo make_ID_in_text($content['slug']); ?> .woo-content-home div',
										mainUL: 'ul.products',
										effect: '<?php echo $content['wooElementsEffects']; ?>',
										around: '<?php echo $content['wooEllemenAround']; ?>',
										hoverEffect: '<?php echo $cuckoo_woocommerce['productThumbHover'] ?>'
									});
								});
							</script>
						<?php else : ?>
							<article class="woo-content-home screen-large woo-cuckoo-homepage man"<?php if($content['cart_show'] == 1) :?> style="margin:0 auto!important;"<?php endif; ?> <?php echo $margin_title; ?>>
								<?php if($content['wooSource'] == 'Products'){
									if( $content['productContent'] == '0' ){
										if($content['wooSorting'] == 'rand'){
											echo do_shortcode('[list_products per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'"]'); 
										}else{
											echo do_shortcode('[list_products per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'" order="'.$content['wooOrder'].'"]'); 
										}
									}else{
										$category = get_term( $content['productContent'], 'product_cat' );
										if($content['wooSorting'] == 'rand'){
											echo do_shortcode('[product_category category="'.$category->name.'" per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'"]'); 
										}else{
											echo do_shortcode('[product_category category="'.$category->name.'" per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'" order="'.$content['wooOrder'].'"]'); 
										}
									}
								}elseif($content['wooSource'] == 'Categories'){
									echo do_shortcode('[product_categories number="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'" order="'.$content['wooOrder'].'"]'); 
								} ?>
							</article>
							<script type="text/javascript">
								jQuery(document).ready(function($){
									var acomme = $('#<?php echo make_ID_in_text($content['slug']); ?>').find('ul.products li.product img');
									$('body').cuckoobizz('blackWhiteEffectsUse', acomme, '<?php echo $cuckoo_woocommerce['productThumbHover']; ?>');
									
									$('.woo-cuckoo-homepage.man').masonry({
									  itemSelector: '.product',
									  columnWidth: 5,
									  isAnimated: !Modernizr.csstransitions
									});
								});
							</script>
						<?php endif; ?>
					</section>
					<?php 
					}
					/* Woo Navigation Bar */
					if($source == 'Woo Navigation Bar'){
						global $woocommerce;
						$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
						$cart_url = $woocommerce->cart->get_cart_url();
						$checkout_url = $woocommerce->cart->get_checkout_url();
						
						$myaccount_page_url = "";
						if ( $myaccount_page_id ) {
						  $myaccount_page_url = get_permalink( $myaccount_page_id );
						}
					?>
					<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="woocoomerce-links-wrap clearfix section parallax-background" <?php echo $style; ?>>
						<?php $fontSize = !empty($content['linksWooFontSize']) ? 'style="font-size:'.$content['linksWooFontSize'].'px;"' : ''; ?>
						<div class="text-box-shadow"></div>
						<article class="woocoomerce-links-content-unit page-content screen-large">
							<div class="cart-accuont-unit-home">
								<a href="<?php echo $cart_url; ?>" title="<?php _e('Cart', 'cuckoothemes'); ?>"><span class="cart-show"></span><?php _e('Cart', 'cuckoothemes'); ?></a> | 
								<div class="total-cart"><?php _e('Total', 'cuckoothemes'); ?> <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></div> | 
								<a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('My Account', 'cuckoothemes'); ?>"><?php _e('My Account', 'cuckoothemes'); ?></a> | 
								<a href="<?php echo $checkout_url; ?>" title="<?php _e('Checkout', 'cuckoothemes'); ?>"><?php _e('Checkout', 'cuckoothemes'); ?></a>
							</div>
						</article>
					</section>
					<?php
					}
				}
			}
		}
	}
}
$cuckoo_contact = get_option(THEMEPREFIX . "_contact_settings"); 
 
if( $cuckoo_contact['displayInHomepage'] == 1 ){
	get_template_part("templates/map");
}
 
/* Super Footer since 1.3 */

$cuckoo_footer = get_option( THEMEPREFIX . "_header_footer_settings");

if(!empty($cuckoo_footer['superfoterhomepage'])) :
	$my_id = url_to_postid($cuckoo_footer['superfoterhomepage']);
	$my_page = get_post($my_id);
	$page_content = $my_page->post_content;
	$page_content = apply_filters('the_content', $page_content);
	$page_content = str_replace(']]>', ']]>', $page_content);
	
	if($page_content) : ?>
		<article id="main-super-footer-home" class="clearfix<?php if($cuckoo_footer['parallax-super-homepage'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_footer['parallax-super-homepage'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_footer['parallax-speed-super-homepage']; ?>"<?php endif; ?>>
			<div class="page-content superfoter-content screen-large">
				<?php echo $page_content; ?>
			</div>
		</article>
	<?php endif;
endif;
?>
<?php get_footer(); ?>