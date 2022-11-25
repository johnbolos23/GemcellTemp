<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap5');
$navbar_type       = get_theme_mod('understrap_navbar_type', 'collapse');

$headerClass = 'main-header';

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> id="gemcell-customization">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/lightgallery.min.js" integrity="sha512-pG+XpUdyBtp28FzjpaIaj72KYvZ87ZbmB3iytDK5+WFVyun8r5LJ2x1/Jy/KHdtzUXA0CUVhEnG+Isy1jVJAbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/autoplay/lg-autoplay.min.js" integrity="sha512-oG7u2dCYcRZMqByim5wriswqGpgny7a8e6vhcQnGxtFVDQbbFZ9Oi/ShsVF+uN6FEGoyjhi9TotQn7gxAzfA6g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/fullscreen/lg-fullscreen.min.js" integrity="sha512-CReiWBH7nLeHwYN1Se3/sGb3Kr2Y7JIJFx9JVVgfpt2w5Zj4ECKT37OePKfdrX4XWkHwe2UK9eolal6iUBxADw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/mediumZoom/lg-medium-zoom.min.js" integrity="sha512-Iyw6NvFcjzIh3iMLEkUV+Ar101O4Y3Dd/V7tEvl0vjKPh0snQM8wtQOjuqWFpXqAi9ab4IOao5bEG2+9x6yFpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/pager/lg-pager.min.js" integrity="sha512-6CiKqFPa3nDj+D76hiJW0bJZiyGT9KBmVjCTqFjkfrihV9av5wcObxGQyn/3So5FqBKPTL3qWUZ6IfFQ6H8taw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/hash/lg-hash.min.js" integrity="sha512-O9yckC4F8C5Q6+OBzCbxKDz9QbzERrhrx99hucPAIm0rbGsxeJNXZeQC0b8fm4P+m8tVyVoDiL3EpNaswUUcSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/rotate/lg-rotate.min.js" integrity="sha512-i2aLcp8ZjknH+nomkSLbAw4WrcvSgigvfLAZoUUkVKdXSgeM/YlgORNQBvtVMAR2IhrJ3fY/yZOBSnlAGc9x0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/share/lg-share.min.js" integrity="sha512-UPz6JrOUFb2jD9ktPavHjmp+ezETIPmTWZyVBByFkKAP3Ks0VXHUIwD7m5Os4/0A3UeBg4Sv0FyKW+CzMVfDgQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/thumbnail/lg-thumbnail.min.js" integrity="sha512-cs5vRstvdBhVt5xFxjYtmbb3BF0fgVYwbBNsfAxFLGuRiRm/4PoKJvAt55KJtT8AvWOxDL4Xt/AVSE48geDjHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/video/lg-video.min.js" integrity="sha512-QhxghrJdGZrlFzBFJrxy1FLebkJiGI7uzYyYwYnNJqzlxKbkHRQmO+47NWYKqVnd3WwGFxxcKpPehWcCwfKV4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/vimeoThumbnail/lg-vimeo-thumbnail.min.js" integrity="sha512-hm3JM7sO4CdewKNmI19VMNZ+UqaTFDIoDWPed0TbX5ezBw8AGF4Gfsj1VdbGXYuMv5f1qQtpp83piulcNQwqJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/zoom/lg-zoom.min.js" integrity="sha512-Lr6V5jv24JHC1+HU2k4n38smhlr2bBx2pdyM/GrYo/pnpzQ/Th2/LnCxyEesD8+jDnPlK1c6dKiI0uNnOSlyTg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lightgallery-bundle.min.css" integrity="sha512-nUqPe0+ak577sKSMThGcKJauRI7ENhKC2FQAOOmdyCYSrUh0GnwLsZNYqwilpMmplN+3nO3zso8CWUgu33BDag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<header id="<?php echo $headerClass; ?>" class="<?php echo $headerClass; ?>">
			<div class="container">
				<div class="row align-items-center m-0">
					<div class="col-6 col-lg-2 p-0">
						<div class="<?php echo $headerClass; ?>-logo">
							<a href="<?php echo site_url(); ?>">
								<img src="<?php echo get_field('logo','option'); ?>" />
							</a>
						</div>
					</div>
					<div class="col-6 col-lg-8 p-0">
						<div class="d-block d-lg-none <?php echo $headerClass; ?>-hamburger text-right">
							<span class="<?php echo $headerClass; ?>-hamburger-toggle">
								<?php get_template_part('icons/hamburger-icon'); ?>
							</span>
						</div>
						<div class="<?php echo $headerClass; ?>-menu">
							<?php wp_nav_menu( array( 'menu' => get_field('menu','option') ) ); ?>
						</div>
					</div>
					<div class="col-6 col-lg-2 p-0 d-none d-lg-block">
						<div class="<?php echo $headerClass; ?>-search-cta d-flex align-items-center justify-content-end">
							<a><?php get_template_part('icons/search-icon'); ?></a>
							<a href="<?php echo get_field('cta_button','option')['url']; ?>" class="main-button">
								<span><?php echo get_field('cta_button','option')['title']; ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</header>