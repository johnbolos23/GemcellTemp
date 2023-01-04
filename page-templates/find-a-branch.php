<?php
/**
 * Template Name: Find a Branch
 * 
 * 
 */

get_header();

get_template_part('inc/flexible-blocks/breadcrumbs'); 

$args = array(
    'post_type' => 'member_branches',
    'post_status' => 'publish',
    'posts_per_page' => 20
);

$hasfilter = false;

if( isset( $_POST['keyword'] ) && !is_numeric( $_POST['keyword'] ) ){
    // $args['s'] = $_POST['keyword'];

    // $args['meta_query'] = array(
    //     array(
    //         'key' => 'address',
    //         'value' => $_POST['keyword'],
    //         'compare' => 'LIKE'
    //     )
    // );

    $hasfilter = true;

    $args['posts_per_page'] = -1;
}

if( isset( $_POST['state'] ) && ( $_POST['state'] && $_POST['state'] != 'all' ) ){
    $args['tax_query'] = array(
        array(
			'taxonomy' => 'gemcell_states',
			'field'    => 'term_id',
			'terms'    => $_POST['state'],
		),
    );

    $args['posts_per_page'] = -1;

    $hasfilter = true;
}

$selectedState = 'All';

if( isset( $_GET['branch-detail'] ) ) {
    $args['post__in'] = array( $_GET['branch-detail'] );

    $hasfilter = true;
}

$theQuery = new WP_Query( $args );

if( !$hasfilter ){
    $args2 = array(
        'post_type' => 'member_branches',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );

    $mapPinsQuery = new WP_Query( $args2 );
}



$PublicIP = get_client_ip() != '::1' ? get_client_ip() : '35.201.24.201';
$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");

?>

<section class="find-a-branch" id="find-a-branch">
    <div class="row m-0">
        <div class="col-12 col-md-12 col-lg-12 col-xl-5 col-xxl-5 p-0">
            <div class="branch-finder-wrapper">
                <div id="branch-finder">
                    <form action="" method="POST" id="customBranchSearch">
                        <div class="row">
                            <div class="col-12 col-md-8 col-lg-7">
                                <div class="branch-field-wrapper pos-relative">
                                    <input autocomplete="on" id="searchTextField" name="keyword" type="text" placeholder="Enter postcode or suburb" <?php echo isset( $_POST['keyword'] ) && $_POST['keyword'] ? 'value="'. $_POST['keyword'] .'"': ''; ?>/>
                                    <input type="hidden" id="cityLat" name="cityLat" />
                                    <input type="hidden" id="cityLng" name="cityLng" />  
                                    <span id="branch-finder-toggle"><?php get_template_part('icons/search-icon'); ?></span>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-5">
                                <div class="branch-field-wrapper">
                                    <select name="state" id="state-picker">
                                        <option value="all">All States</option>
                                        <?php 
                                        $theTerms = get_terms( array(
                                            'taxonomy' => 'gemcell_states',
                                            'hide_empty' => false,
                                        ) );
                                        foreach( $theTerms as $state ) : 
                                        
                                            if( isset( $_POST['state'] ) && $_POST['state'] == $state->term_id ){
                                                $selectedState = $state->name;
                                            }

                                        ?>
                                        <option <?php echo isset( $_POST['state'] ) && $_POST['state'] == $state->term_id ? 'selected': ''; ?> value="<?php echo $state->term_id; ?>"><?php echo get_field('state_code', 'term_'. $state->term_id); ?></option>
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
                            <span class="num-results"><?php echo !$hasfilter ? $theQuery->found_posts : '0'; ?> Results</span>
                        </div>
                        <div class="branch-results-items <?php echo isset( $_POST['keyword'] ) ? 'sort-results' : ''; ?>">
                            <?php 
                            if( $theQuery->have_posts() ) {
                                while( $theQuery->have_posts() ) { 
                                    $theQuery->the_post();
                                    
                                    get_template_part('inc/helpers/branch-item', '', array( 'json' => $json));
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
                                    
                                    get_template_part('inc/helpers/branch-item-details', '', array( 'json' => $json));
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
                <?php 
                $tempQuery = $hasfilter ?  $theQuery : $mapPinsQuery;

                $json = json_decode( $json, true);

                $country  = $json['country'];
                $region   = $json['region'];
                $city     = $json['city'];

                if( $tempQuery->have_posts() ) : ?>
                <div class="custom-map" data-zoom="16">
                    <?php while( $tempQuery->have_posts() ) : $tempQuery->the_post();

                        $latitude = get_field('address')['lat'];
                        $longtitude = get_field('address')['lng'];
                        $address = get_field('address')['address'];

                        if( isset( $_POST['cityLat'] ) && isset( $_POST['cityLng'] ) ){
                            $currentUserLatLong[] = $_POST['cityLat'];
                            $currentUserLatLong[] = $_POST['cityLng'];
                        }else{
                            if( $json['loc'] ){
                                $currentUserLatLong = explode(',', $json['loc']);
                            }else{
                                $addressString = $city . ','. $region . ','. $country;
                            
                                $currentUserAddress = getGeoCode($addressString);
                                
                                $currentUserLatLong[] = $currentUserAddress['lat'];
                                $currentUserLatLong[] = $currentUserAddress['lng'];
                            }
                        }

                        $Branchlatitude = get_field('address')['lat'];
                        $Branchlongtitude = get_field('address')['lng'];
                        $Branchaddress = get_field('address')['address'];

                        if( $currentUserLatLong && ( $Branchlatitude != 'null' && $Branchlongtitude != 'null' ) ){
                            $distance = getDistanceBetweenCoordinates( $Branchlatitude, $Branchlongtitude, $currentUserLatLong[0], $currentUserLatLong[1], 'K' );
                        }else{
                            $distance = 13685.38;
                        }

                        $distance = number_format((float)$distance, 2, '.', '');

                        if( $distance > 100 && $hasfilter ){
                            continue;
                        }

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
            <div id="branch-results" class="d-block d-lg-none">
                <div class="branch-result-main-list show">
                    <div class="branch-results-heading">
                        <span class="heading"><?php echo $selectedState; ?> States</span>
                        <span class="num-results"><?php echo !$hasfilter ? $theQuery->found_posts : '0'; ?> Results</span>
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


<?php if( isset( $_GET['branch-detail'] )) : ?>
<script>
    jQuery(window).ready(function(){
        jQuery('.branch-item-details a[data-branch-target-detail="<?php echo $_GET['branch-detail']; ?>"]').trigger('click');
    });
</script>
<?php endif; ?>