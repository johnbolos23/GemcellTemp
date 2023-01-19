<?php 
get_header();

$args = array(
	'post_type' => 'member_branches',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'tax_query' => array(
		array(
			'taxonomy' => 'gemcell_states',
			'field'    => 'term_id',
			'terms'    => array( get_queried_object()->term_id ),
		),
	)
);

$theQuery = new WP_Query( $args );

$totalBranches = $theQuery->found_posts;


$args2 = array(
	'post_type' => 'gemcell_members',
	'posts_per_page' => 2,
	'post_status' => 'publish',
	'tax_query' => array(
		array(
			'taxonomy' => 'gemcell_states',
			'field'    => 'term_id',
			'terms'    => array( get_queried_object()->term_id ),
		),
	)
);

$theQuery2 = new WP_Query( $args2 );

?>

<section class="state-header">
	<img src="<?php echo get_field('background_image', 'gemcell_states_'.get_queried_object()->term_id); ?> " />
</section>


<section class="page-title">
    <div class="breadcrumbs">
        <div class="container">
            <a href="<?= site_url(); ?>">Home</a>
            <?php get_template_part('icons/breadcrumb-arrow'); ?>
            <a href="<?= site_url(); ?>/members/">Members</a>
            <?php get_template_part('icons/breadcrumb-arrow'); ?>
            <span><?= get_queried_object()->name; ?></span>
        </div>
    </div>
</section>


<section class="gemcell-branches">
	<div class="container">
		<h2 class="heading state-heading"><?php echo get_queried_object()->name; ?> <span>(<?php echo $totalBranches; ?> Branches)</span></h2>
		<div class="row">
			<div class="col-12 col-md-12 col-lg-12 col-xl-8 col-xxl-8">
				<?php if( $theQuery->have_posts() ) : ?>
				<div class="branches-wrapper">
					<div class="row">
						<?php while( $theQuery->have_posts() ) : $theQuery->the_post(); ?>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 pb-4">
							<div class="gemcell-member-details">
								<div class="gemcell-member-image">
									<img src="<?php echo get_field('logo', get_field('gemcell_member_id')); ?>" />
								</div>
								<div class="gemcell-member-detail">
									<h4 class="heading"><?php echo get_the_title(); ?></h4>
									<a href="<?php echo site_url(); ?>/find-a-branch/?branch-detail=<?php echo get_the_ID(); ?>">View member details</a>
								</div>
							</div>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4">
				<div id="custom-map-render">
					<?php if( $theQuery->have_posts() ) : ?>
					<div class="custom-map" data-zoom="16">
						<?php while( $theQuery->have_posts() ) : $theQuery->the_post();

							$latitude = get_field('address')['lat'];
							$longtitude = get_field('address')['lng'];
							$address = get_field('address')['address'];

							?>
							
							<div class="marker d-none" data-mappin="<?php echo get_stylesheet_directory_uri() .'/icons/images/map-marker.png'; ?>" data-lat="<?php echo esc_attr($latitude); ?>" data-lng="<?php echo esc_attr($longtitude); ?>">
								<h3 class="heading"><?php echo get_the_title(); ?></h3>
								<div class="wysiwyg-content"><?php echo $address; ?></div>
							</div>

							<?php

							endwhile;
							wp_reset_postdata();
						?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>


<?php get_template_part('inc/flexible-blocks/states'); ?>


<?php get_footer(); ?>