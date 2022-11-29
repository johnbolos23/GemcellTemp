<?php
/**
 * Template Name: Find a Branch
 * 
 * 
 */

get_header();

get_template_part('inc/flexible-blocks/breadcrumbs'); 

$args = array(
    'post_type' => 'members',
    'post_status' => 'publish',
    'posts_per_page' => 100
);

if( isset( $_POST['keyword'] ) && $_POST['keyword'] ){
    $args['s'] = $_POST['keyword'];
}

if( isset( $_POST['state'] ) && ( $_POST['state'] && $_POST['state'] != 'all' ) ){
    $args['tax_query'] = array(
        array(
			'taxonomy' => 'state',
			'field'    => 'term_id',
			'terms'    => $_POST['state'],
		),
    );
}

$selectedState = 'All';

$theQuery = new WP_Query( $args );

?>

<section class="find-a-branch" id="find-a-branch">
    <div class="row m-0">
        <div class="col-12 col-md-12 col-lg-12 col-xl-5 col-xxl-5 p-0">
            <div class="branch-finder-wrapper">
                <div id="branch-finder">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-12 col-md-8 col-lg-7">
                                <div class="branch-field-wrapper pos-relative">
                                    <input name="keyword" type="text" placeholder="Search" <?php echo isset( $_POST['keyword'] ) && $_POST['keyword'] ? 'value="'. $_POST['keyword'] .'"': ''; ?>/>
                                    <span id="branch-finder-toggle"><?php get_template_part('icons/search-icon'); ?></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-5">
                                <div class="branch-field-wrapper">
                                    <select name="state" id="state-picker">
                                        <option value="all">All States</option>
                                        <?php 
                                        $theTerms = get_terms( array(
                                            'taxonomy' => 'state',
                                            'hide_empty' => false,
                                        ) );
                                        foreach( $theTerms as $state ) : 
                                        
                                            if( isset( $_POST['state'] ) && $_POST['state'] == $state->term_id ){
                                                $selectedState = $state->name;
                                            }

                                        ?>
                                        <option <?php echo isset( $_POST['state'] ) && $_POST['state'] == $state->term_id ? 'selected': ''; ?> value="<?php echo $state->term_id; ?>"><?php echo $state->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="branch-results" class="d-none d-lg-block">
                    <div class="branch-result-main-list show">
                        <div class="branch-results-heading">
                            <span class="heading"><?php echo $selectedState; ?> States</span>
                            <span class="num-results"><?php echo $theQuery->found_posts; ?> Results</span>
                        </div>
                        <div class="branch-results-items">
                            <?php 
                            if( $theQuery->have_posts() ) {
                                while( $theQuery->have_posts() ) { 
                                    $theQuery->the_post();
                                    
                                    get_template_part('inc/helpers/branch-item');
                                }
                                wp_reset_postdata(); 
                            }else{
                                echo 'No results';
                            } ?>
                        </div>
                    </div>
                    <div class="branch-result-list-details hide">
                        <div class="branch-result-list-details-heading">
                            <span class="heading branch-result-list-details-toggle"><?php get_template_part('icons/chevron-left'); ?> Back</span>
                        </div>
                        <div class="branch-result-list-details-wrapper">
                        <?php 
                            if( $theQuery->have_posts() ) {
                                while( $theQuery->have_posts() ) { 
                                    $theQuery->the_post();
                                    
                                    get_template_part('inc/helpers/branch-item-details');
                                }
                                wp_reset_postdata(); 
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12 col-xl-7 col-xxl-7 p-0" >
            <div id="custom-map-render">
                <?php if( $theQuery->have_posts() ) : ?>
                <div class="custom-map" data-zoom="16">
                    <?php while( $theQuery->have_posts() ) : $theQuery->the_post();

                        $latitude = get_field('maps')['lat'];
                        $longtitude = get_field('maps')['lng'];
                        $address = get_field('maps')['address'];

                        ?>
                        
                        <div class="marker" data-mappin="<?php echo get_stylesheet_directory_uri() .'/icons/images/map-marker.png'; ?>" data-lat="<?php echo esc_attr($latitude); ?>" data-lng="<?php echo esc_attr($longtitude); ?>">
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
            <div id="branch-results" class="d-block d-lg-none">
                <div class="branch-result-main-list show">
                    <div class="branch-results-heading">
                        <span class="heading"><?php echo $selectedState; ?> States</span>
                        <span class="num-results"><?php echo $theQuery->found_posts; ?> Results</span>
                    </div>
                    <div class="branch-results-items">
                        <?php 
                        if( $theQuery->have_posts() ) {
                            while( $theQuery->have_posts() ) { 
                                $theQuery->the_post();
                                
                                get_template_part('inc/helpers/branch-item');
                            }
                            wp_reset_postdata(); 
                        }else{
                            echo 'No results';
                        } ?>
                    </div>
                </div>
                <div class="branch-result-list-details hide">
                    <div class="branch-result-list-details-heading">
                        <span class="heading branch-result-list-details-toggle"><?php get_template_part('icons/chevron-left'); ?> Back</span>
                    </div>
                    <div class="branch-result-list-details-wrapper">
                    <?php 
                        if( $theQuery->have_posts() ) {
                            while( $theQuery->have_posts() ) { 
                                $theQuery->the_post();
                                
                                get_template_part('inc/helpers/branch-item-details');
                            }
                            wp_reset_postdata(); 
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>