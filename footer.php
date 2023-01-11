<?php
defined( 'ABSPATH' ) || exit;

$mainClass = 'main-footer';

$currentYear = date('Y');
$siteName = get_bloginfo('name');

$copyrightText = '';

if( get_field('copyright_text', 'option') ){
	$copyrightText = str_replace('{current_year}', $currentYear, str_replace('{site_name}', $siteName, get_field('copyright_text', 'option') ) );
}
?>


<footer class="<?php echo $mainClass; ?>" id="<?php echo $mainClass; ?>">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 col-xxl-6">
				<div class="<?php echo $mainClass; ?>-col-wrapper <?php echo $mainClass; ?>-logo-copyright">
					<a href="<?php echo site_url(); ?>">
						<img src="<?php echo get_field('logo','option'); ?>" />
					</a>

					<?php if( get_field('copyright_text', 'option') ) : ?>
					<div class="<?php echo $mainClass; ?>-copyright-text text-left text-md-right text-lg-left">
						<p><?php echo $copyrightText; ?></p>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-12 col-lg-8 col-xxl-6">
				<div class="<?php echo $mainClass; ?>-col-wrapper">
					<?php if( get_field('newsletter', 'option')['show_newsletter'] ) : $newsletterGroup = get_field('newsletter', 'option'); ?>
					<div class="<?php echo $mainClass; ?>-newsletter-wrapper">
						<?php if( $newsletterGroup['newsletter_message'] ) : ?>
						<p><?php echo $newsletterGroup['newsletter_message']; ?></p>
						<?php endif; ?>

						<?php 
							if( $newsletterGroup['form'] ){
								gravity_form( $newsletterGroup['form'] );
							}
						?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-6 col-lg-4 col-xxl-6">
				<div class="<?php echo $mainClass; ?>-col-wrapper">
				<?php if( get_field('member_of_logos','option') ) : ?>
					<h4><b>Member of</b></h4>
					<div class="<?php echo $mainClass; ?>-member-logos">
						<?php foreach( get_field('member_of_logos','option') as $logo ) : ?>
						<img src="<?php echo $logo; ?>" />
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

					<h4><b>Follow Us</b></h4>
					<div class="d-flex flex-wrap social-links-wrapper">
					<?php foreach( get_field('social_links','option') as $key => $social ) : ?>
						<?php if( $social ) : ?>
						<a href="<?php echo $social; ?>" target="_blank" data-social="<?php echo $key; ?>">
							<?php get_template_part('icons/'. $key); ?>
						</a>
						<?php endif; ?>
					<?php endforeach; ?>
					</div>
				</div>
			</div>

			<div class="col-8 col-xxl-6 d-none d-lg-block">
				<div class="<?php echo $mainClass; ?>-col-wrapper">
					<div class="<?php echo $mainClass; ?>-menus-wrapper d-flex">
						<?php foreach( get_field('footer_menus','option') as $menu ) : ?>
						<div class="<?php echo $mainClass; ?>-menu-item">
							<h4><b><?php echo $menu['menu_title']; ?></b></h4>
							<?php wp_nav_menu( array( 'menu' => $menu['menu'] ) ); ?>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<?php foreach( get_field('footer_menus','option') as $menu ) : ?>
			<div class="col-6 d-block d-lg-none <?php echo $mainClass; ?>-footer-menus">
				<div class="<?php echo $mainClass; ?>-col-wrapper">
					<div class="<?php echo $mainClass; ?>-menus-wrapper d-flex">
						<div class="<?php echo $mainClass; ?>-menu-item">
							<h4><b><?php echo $menu['menu_title']; ?></b></h4>
							<?php wp_nav_menu( array( 'menu' => $menu['menu'] ) ); ?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="<?php echo $mainClass; ?>-bottom">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 text-lg-left">
					<?php if( get_field('created_by', 'option') ) : ?>
						<p><?php echo get_field('created_by', 'option'); ?></p>
					<?php endif; ?>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 text-right">
					<?php if( get_field('enable_back_to_top','option') ) : ?>
					<a href="" class="back-to-top">Back to Top <?php get_template_part('icons/back-to-top'); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</footer>



</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

