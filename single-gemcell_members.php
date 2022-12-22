<?php 
defined( 'ABSPATH' ) || exit;

get_header();

$theTerms = get_terms( array(
    'taxonomy' => 'gemcell_states',
    'hide_empty' => true,
) );

$mainMemberTitle = get_the_title();
$mainMemberID = get_the_ID();

?>
<section class="page-title page-title-main">
<div class="row m-0">
        <div class="col-12 col-lg-5 p-0 background-member-color">
            <div class="page-title-wrapper pos-relative">
            <span class="icon-top"><?php get_template_part('icons/banner-content-icon-top'); ?></span>
                <h1 class="heading"><?php echo get_field('members_title', 'option') ? get_field('members_title', 'option') : 'Member Profile'; ?></h1>
            </div>
        </div>
    <div class="col-12 col-lg-7 p-0">
        <div class="page-title-image pos-relative">
            <img src="
            <?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : ( get_field('other_images') ? get_field('other_images')[0] : get_stylesheet_directory_uri() . '/images/Active-banner-1.jpg' ); ?>
            ">
        </div>
    </div>
</div>
</section>

<section class="page-title">
    <div class="breadcrumbs">
        <div class="container">
            <a href="<?= site_url(); ?>">Home</a>
            <?php get_template_part('icons/breadcrumb-arrow'); ?>
            <a href="<?= site_url(); ?>/members/">Members</a>
            <?php get_template_part('icons/breadcrumb-arrow'); ?>
            <span><?= get_the_title(); ?></span>
        </div>
    </div>
</section>

<section class="single-members" id="single-members">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="single-members-details top-position" style="display:none;">
                     <h4 class="subheading"><span>Member</span></h4>
                    <h2 class="heading"><?php echo get_the_title(); ?></h2>
                </div>
                <?php if( get_field('contact_persons') ) : ?>
                <div class="member-list-col">
                    <div class="owl-carousel member-list-slider owl-theme">
						<?php foreach( get_field('contact_persons') as $block ) : ?>
                            <div class="members-item">
                                <img src="<?php echo $block['image']; ?>" />
                                <h4 class="name"><?php echo $block['name'] ? $block['name'] : ''; ?></h4>
                                <p class="position"><?php echo $block['position'] ? $block['position'] : ''; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="single-members-image">
                    <div class="single-members-image-wrapper">
                        <img src="<?php echo get_field('logo'); ?>" />
                    </div>
                    <div class="member-a-col">
                        <?php if( get_field('gemcell_address') ) : ?>
                        <div class="member-website m-0">
                            <h4 class="m-0"><b>Address:</b></h4>
                            <p class="m-0"><?php echo get_field('gemcell_address')['address']; ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if( get_field('phone') ) : ?>
                        <div class="member-phone">
                            <h4 class="m-0"><b>Phone:</b></h4>
                            <p class="m-0"><?php echo get_field('phone'); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if( get_field('email') ) : ?>
                        <div class="member-email">
                            <h4 class="m-0"><b>Email:</b></h4>
                            <p class="m-0"><?php echo get_field('email'); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if( get_field('website') ) : ?>
                        <div class="member-website">
                            <h4 class="m-0"><b>Website:</b></h4>
                            <p class="m-0"><?php echo get_field('website'); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="single-members-details">
                    <div class="single-members-details-wrapper">
                        <h4 class="subheading"><span>Member</span></h4>
                        <h2 class="heading"><?php echo get_the_title(); ?></h2>
                        <div class="wysiwyg-content"><?php the_content(); ?></div>
                    </div>
                </div>
                
                
                <div class="member-map-col">
                    <h3 class="members-col-title">Maps</h3>
                    <div id="custom-map-render">
                        <?php 
                        $args = array(
                            'post_type' => 'member_branches',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key'     => 'gemcell_member_id',
                                    'value'   => $mainMemberID,
                                ),
                            ),
                        );

                        $theQuery = new WP_Query( $args );
                        
                        if( $theQuery->have_posts() ) : ?>
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

                <?php if( $theTerms ) : ?>
                <div class="member-branches-col">
                    <h3 class="members-col-title">Branches</h3>
                    <div class="member-branches-tabs-wrapper">
                        <div class="member-branches-tabs">
                            <div class="member-tab active" data-member-filter="all">All</div>
                            <?php foreach( $theTerms as $theTerm ) : 
                                $args = array(
                                    'post_type' => 'member_branches',
                                    'posts_per_page' => -1,
                                    'post_status' => 'publish',
                                    'orderby' => 'title',
                            		'order' => 'ASC',
                                    'meta_query' => array(
                                        array(
                                            'key'     => 'gemcell_member_id',
                                            'value'   => $mainMemberID,
                                        ),
                                    ),
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'gemcell_states',
                                            'field'    => 'term_id',
                                            'terms'    => array( $theTerm->term_id ),
                                        ),
                                    ),
                                );

                                $theQuery = new WP_Query( $args );   
                                
                                if( $theQuery->found_posts <= 0 ) {
                                    continue;
                                }
                            ?>
                            <div class="member-tab" data-member-filter="<?php echo $theTerm->term_id; ?>"><?php echo get_field('state_code', 'gemcell_states_'. $theTerm->term_id);?></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="member-branches-content">
                            <div class="member-branch-content active" data-member-filter="all">
                                <ul>
                                <?php 
                                    $args = array(
                                        'post_type' => 'member_branches',
                                        'posts_per_page' => -1,
                                        'post_status' => 'publish',
                                        'orderby' => 'title',
                                        'order' => 'ASC',
                                        'meta_query' => array(
                                            array(
                                                'key'     => 'gemcell_member_id',
                                                'value'   => $mainMemberID,
                                            ),
                                        ),
                                    );

                                    $theQuery = new WP_Query( $args );

                                    while( $theQuery->have_posts() ){
                                        $theQuery->the_post();

                                        echo '<li><a href="'. site_url() .'/find-a-branch/?branch-detail='. get_the_ID() .'">'. get_the_title() .'</a></li>';
                                    }

                                    wp_reset_postdata();
                                ?>
                                </ul>
                            </div>
                            <?php foreach( $theTerms as $theTerm ) : ?>
                            <div class="member-branch-content" data-member-filter="<?php echo $theTerm->term_id; ?>">
                                <ul>
                                <?php 
                                    $args = array(
                                        'post_type' => 'member_branches',
                                        'posts_per_page' => -1,
                                        'post_status' => 'publish',
                                        'orderby' => 'title',
                                        'order' => 'ASC',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'gemcell_states',
                                                'field'    => 'term_id',
                                                'terms'    => array( $theTerm->term_id ),
                                            ),
                                        ),
                                        'meta_query' => array(
                                            array(
                                                'key'     => 'gemcell_member_id',
                                                'value'   => $mainMemberID,
                                            ),
                                        ),
                                    );

                                    $theQuery = new WP_Query( $args );

                                    while( $theQuery->have_posts() ){
                                        $theQuery->the_post();

                                        echo '<li><a href="'. site_url() .'/find-a-branch/?branch-detail='. get_the_ID() .'">'. get_the_title() .'</a></li>';
                                    }

                                    wp_reset_postdata();
                                ?>
                                </ul>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php 
				$images = get_field('other_images');
				$size = 'full';
				
				if( $images ) : ?>
                <div class="member-other-images-col">
                    <h3 class="members-col-title">Other Images</h3>
					<div class="slider-items">
						<?php foreach( $images as $image_id ): ?>
						<div class="slider-item">
							<img src="<?php echo $image_id; ?>" />
						</div>
						<?php endforeach; ?>
					</div>
                </div>
				<?php endif; ?>
            </div>
        </div>

        <?php if( get_field('info_blocks', 'option') ) : ?>
        <div class="row members-info-blocks">
            <?php $counter = 1; foreach( get_field('info_blocks', 'option') as $block ) : ?>
            <div class="col-12 col-lg-4">
                <div class="members-block-item">
                    <div class="members-block-item-wrapper">
                        <img src="<?php echo $block['icon']; ?>" />
                        <h3 class="block-title"><?php echo $block['title']; ?></h3>
                        <div class="wysiwyg-content"><?php echo $block['detail']; ?></div>
                        <?php if( $block['link'] ) : ?>
                        <a href="<?php echo $block['link']['url']; ?>"><?php echo $block['link']['title']; get_template_part('icons/arrow-up'); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="members-block-border">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/icons/supplier-image/' . $counter .'.jpg'; ?>" />
                    </div>
                </div>
            </div>
            <?php $counter++; if( $counter > 3 ) { $counter = 1; } endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>







<style type="text/css">
.custom-map {
    width: 100%;
    height: 400px;
    border: #ccc solid 1px;
    margin: 20px 0;
}

// Fixes potential theme css conflict.
.custom-map img {
   max-width: inherit !important;
}
</style>






<?php get_footer(); ?>