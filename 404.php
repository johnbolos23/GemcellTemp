<style>

</style>

<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="container error-container-col">
				<?php get_template_part('icons/error'); ?>
				<h2 class="heading" style="text-align:center;">404 Page Not Found</h2>
				<p style="text-align:center;">The page you were looking for doesn’t exist or has been removed.</p>
				<div class="dual-button-col">
					<button class="white">
						<a href="">
							Back to Homepage
						</a>
					</button>
					<button class="blue">
						<a href="">
							Contact Us
						</a>
					</button>
				</div>
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<?php
get_footer();
