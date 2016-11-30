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
** Name : Google map Contact
*/
$cuckoo_contact = get_option(THEMEPREFIX . "_contact_settings");
$cuckoo_social = get_option(THEMEPREFIX . "_social_settings");
$margin_icones = "";
if( !empty( $cuckoo_contact['contact_address'] ) or
	!empty( $cuckoo_contact['contact_details'] ) or 
	!empty( $cuckoo_contact['contact_primary_email'] ) or
	!empty( $cuckoo_contact['contact_web'] ) ) :
		$margin_icones = 'style="margin-top: 15px;"';
endif;
?>
<section id="contact" class="clearfix">
	<?php if($cuckoo_contact['google_shoose'] != 2): ?>
		<?php if($cuckoo_contact['google_shoose'] == 0) : ?>
			<?php $gPropert = !empty($cuckoo_contact['google_properties']) ? cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Your Address Google Map', str_replace(" ", "+" , trim($cuckoo_contact['google_properties'])), 0) : '' ; ?>
			<?php echo '<iframe class="map-baqckground" src="https://www.google.com/maps?layer=c&amp;sll=41.038965999999995,-111.93812000000001&amp;cid=8050861939481193270&amp;panoid=ozq4s2grQMIAAAAGOikGfg&amp;cbp=13,37.16,,0,0&amp;q=bikers+edge+kaysville&amp;ie=UTF8&amp;hq=bikers+edge+kaysville&amp;hnear=&amp;ll=41.038966,-111.93812&amp;spn=0.006295,0.006295&amp;t=m&amp;cbll=41.039131,-111.938097&amp;source=embed&amp;output=svembed"></iframe>' ?>
		<?php else : ?>
			<?php echo do_shortcode(cuckoo_decode($cuckoo_contact['google_new_shortcode'])); ?>
		<?php endif; ?>
	<?php else : 
		$backgroundColor 		= ( !empty($cuckoo_contact['backgroundColor']) ? 'background-color:'.$cuckoo_contact['backgroundColor'].";" : '' );
		$backgroundImage 		= ( !empty($cuckoo_contact['img_url']) ? "background-image:url('".$cuckoo_contact['img_url']."');" : '' );
		$backgroundPosition 	= ( !empty($cuckoo_contact['imgPosition']) ? 'background-position:'.$cuckoo_contact['imgPosition'].';' : '' );
		$backgroundAttachment 	= ( !empty($cuckoo_contact['imgAttachment']) ? 'background-attachment:'.$cuckoo_contact['imgAttachment'].';' : '' );
		$backgroundRepeat	 	= ( !empty($cuckoo_contact['imgRepeat']) ? 'background-repeat:'.$cuckoo_contact['imgRepeat'].';': '' );
		$parallaxSpeed			= ( !empty($cuckoo_contact['parallax-speed']) ? $cuckoo_contact['parallax-speed'] : 10 );
		
		if( $backgroundColor && !$backgroundImage ) :
			$backgroundImage = 'background-image:none;';
		endif;
		
		if(!$backgroundImage or $backgroundImage == 'background-image:none;' ) :
			$backgroundPosition = ''; $backgroundAttachment = ''; $backgroundRepeat = '';
		endif;
		
		if($cuckoo_contact['parallax'] == '1') :
			$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundRepeat . ' background-attachment:fixed" data-type="background" data-speed="'.$parallaxSpeed.'"';
		else :
			$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundPosition . $backgroundAttachment . $backgroundRepeat . '"';
		endif; ?>
		<div class="map-baqckground image-map parallax-background" <?php echo $style; ?>></div>
	<?php endif; ?>
	<article class="contact-content screen-large<?php echo $show_welcome = $cuckoo_contact['google_shoose'] != 2 ? ' map-on' : ' map-off'; ?>">
		<?php get_template_part("templates/contact_form"); ?>
		<?php if($cuckoo_contact['google_shoose'] == 2): ?>
			<div class="welcome_message_contact"><?php cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Welcome Message', do_shortcode(cuckoo_decode(nl2br($cuckoo_contact['welcome_message'])))); ?></div>
		<?php endif; ?>
		<?php if( $cuckoo_contact['contact_address'] or 
				$cuckoo_contact['contact_details'] or 
				$cuckoo_contact['contact_primary_email'] or 
				$cuckoo_contact['contact_web'] or
				$cuckoo_social['elements'] ) :  
		?>
			<div class="contact-info-block<?php echo $show_welcome = $cuckoo_contact['google_shoose'] == 2 ? ' welcome_message_on' : ''; ?>">
				<?php if($cuckoo_contact['contact_address']): ?>
					<span><?php cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Address', do_shortcode(cuckoo_decode(nl2br($cuckoo_contact['contact_address'])))); ?></span><br />
				<?php endif; ?>			
				<?php if($cuckoo_contact['contact_details']): ?>
					<span><?php cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Contact Details', do_shortcode(cuckoo_decode(nl2br($cuckoo_contact['contact_details'])))); ?></span><br />
				<?php endif; ?>			
				<?php echo $email = ($cuckoo_contact['contact_primary_email'] != null ? '<a href="mailto:'.cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Primary Email Address', $cuckoo_contact['contact_primary_email'], 0).'">'.cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Primary Email Address', $cuckoo_contact['contact_primary_email'], 0).'</a><br />' : "");  ?>
				<?php echo $website = ($cuckoo_contact['contact_web'] != null ? '<a target="_blank" href="http://'.cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Website Address', $cuckoo_contact['contact_web'], 0).'">'.cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Website Address', $cuckoo_contact['contact_web'], 0).'</a><br /><br />' : "" ); echo determineHours();  ?>
				<?php if($cuckoo_contact['display_icon'] == "Yes") : ?>
					<div class="contact-social-media" <?php echo $margin_icones; ?>>
						<?php if( $cuckoo_social['elements'] != null )
							{
								foreach($cuckoo_social['elements'] as $k=>$v)
								{
									foreach($v as $key=>$value)
									{ 
										if($value['values'] != null)
										{  ?>
											<a class="<?php echo $value['class'] ?>-small" title="<?php echo $value['name']; ?>" <?php if($value['name'] != 'Email') { ?> target="_blank" <?php } ?> href="<?php echo $value['link'].$value['values']; ?>"></a>
										<?php 
										}
									}
								}
							} ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</article>
	<?php if($cuckoo_contact['google_shoose'] != 2): ?>
		<div class="show-map"><?php _e('Show Shop Tour', 'cuckoothemes'); ?></div>
	<?php endif; ?>
	<div id="result"></div>
</section>