<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
$cuckoo_header = get_option( THEMEPREFIX . "_header_footer_settings");
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
$_SESSION['n1'] = rand(1,20);
$_SESSION['n2'] = rand(1,20);
$_SESSION['expect'] = $_SESSION['n1']+$_SESSION['n2'];
$smooth = $cuckoo_settings['smooth'] ? 'smooth-effect' : ''; 
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Meta tags -->
	<meta name="p:domain_verify" content="2f012bb3ca182a8cf28f348b0aae309b" />
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
	<?php if($cuckoo_settings['responsive'] == "Yes"){ ?>
	<meta name='viewport' content='width=device-width, initial-scale=1' />
	<?php } ?>
	
	<!-- Title -->
	<title><?php echo $title = is_home() ?  bloginfo('name') : bloginfo('name').' | '. the_title('', '', false) ; ?></title>
	
	<!-- Main stylesheet -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- RSS & Pingbacks -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' ); 
	?>
	<?php get_template_part("templates/fonts"); /* Font templates */ ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class($smooth); ?>>
	<header id="<?php  echo $homeid = (is_home()) ? "home" : "top" ?>" class="main-header section">
		<section id="header_wrapper">
			<div class="main_header_background"></div>
			<div id="header_content">
				<?php if($cuckoo_header['logo_setting'] == "Plain Text Logo" or $cuckoo_header['logo_setting'] == "Image Logo" ) : ?>
				<div id="theme_logo">
					<div class="logo_content">
						<div class="logo">
							<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php if(!empty($cuckoo_header['image_url']) && $cuckoo_header['logo_setting'] == "Image Logo") : ?>
									<img src="<?php echo $cuckoo_header['image_url']; ?>" alt="<?php cuckoo_echo_for_wpml(THEMENAME.' Header & Footer', 'Image Logo Title', $cuckoo_header['image_title']); ?>" title="<?php cuckoo_echo_for_wpml(THEMENAME.' Header & Footer', 'Image Logo Title', $cuckoo_header['image_title']); ?>" />
								<?php elseif(!empty($cuckoo_header['plain_text_header']) && $cuckoo_header['logo_setting'] == "Plain Text Logo") : ?>
									<?php cuckoo_echo_for_wpml(THEMENAME.' Header & Footer', 'Plain Text Logo Title', $cuckoo_header['plain_text_header']); ?>
								<?php endif; ?>
							</a>
							<div class="logo_background"></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<div id="header_links">
					<?php wp_nav_menu( array( 'theme_location' => 'thirdary', 'menu_class' => 'header_cuctom_links'  ) ); ?>
				</div>
				<?php 
					$search_home = $cuckoo_header['display_search_home'] == 1 ? 'nav-search' : 'nav-no-search';
					$search_landing = $cuckoo_header['display_search_landing'] == 1 ? 'nav-search' : 'nav-no-search';
				?>
				<div id="header_nav" class="<?php echo $search_show = is_home() ? $search_home : $search_landing ; ?>">
					<nav class="navigation-top">
						<div id="nav" role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'top-menu', 'menu_id' => 'cuckoo-nav-top',  ) ); ?>
						</div>
						<div id="mini-nav" role="navigation">
							<?php wp_nav_menu(array(
								'theme_location' => 'primary',
								'menu_class' => 'top-menu-mob',
								'items_wrap'     => '<select id="sec-selector" name="sec-selector"><option>'.__('Site Navigation',THEMENAME).'</option>%3$s</select>',
								'container_id' => 'mobile_menu',
								'walker'         => new Walker_Nav_Menu_Dropdown()
							)); ?>
						</div>
					</nav>
					<?php if(is_home()) : ?>
						<?php if($cuckoo_header['display_search_home'] == 1): ?>
							<div id="search_nav" class="<?php echo $cuckoo_header['homepage_search_button']; ?>">
								<div id="search-content"><?php cuckoo_search_form_header(); ?></div>
							</div>
						<?php endif; ?>
					<?php else : ?>
						<?php if($cuckoo_header['display_search_landing'] == 1): ?>
							<div id="search_nav" class="<?php echo $cuckoo_header['landing_search_button']; ?>">
								<div id="search-content"><?php cuckoo_search_form_header(); ?></div>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
			<!-- <div id="additional-content">Additional content goes here.</div> -->
		</section>
	</header>