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
					<div class="col-8 p-0">
						<div class="<?php echo $headerClass; ?>-menu">
							<?php wp_nav_menu( array( 'menu' => get_field('menu','option') ) ); ?>
						</div>
					</div>
					<div class="col-6 col-lg-2 p-0">
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