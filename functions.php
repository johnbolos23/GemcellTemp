<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/acf-fields.php',
	'/post-types.php'
);


// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

add_filter('get_the_archive_title_prefix','__return_false');


add_action("wp_ajax_fetch_blog_list", "fetch_blog_list");
add_action("wp_ajax_nopriv_fetch_blog_list", "fetch_blog_list");

function fetch_blog_list() {
	$paged = $_POST['page_num'];
    
    $category = $_POST['category'];
    $args = array(
        'post_type'      => 'competition',
        'posts_per_page' => '6',
        'publish_status' => 'published',
        'orderby' => 'post_date',
        'order' => 'ASC',
        'paged' => $paged,
     );
    
     if( $category ){
        $args['tax_query'] = array(
			array(
				'taxonomy' => 'competition_tax',
				'field' => 'term_id',
				'terms' => $category
			)
		);
    }
  
    $query = new WP_Query($args);
  	$result = '';
    if($query->have_posts()) :
//   		$result .= '<div class="post-list-cont">';
        while($query->have_posts()) :
  
            $query->the_post() ;
                      
		$result .= '<div class="col-12">';
            $result .= '<div class="post-list-item-wrapper">';
                $result .= '<div class="post-list-item-image-title">';
                    $result .= '<div class="post-list-item-title-wrapper style-'.get_field('shade_style').'">
                                    <div class="post-list-item-title-inner-wrapper">
                                        '.get_the_title().'
                                    </div>
                                </div>
                                <div class="post-list-item-image">
                                    '.get_the_post_thumbnail().'
                                </div>';
                $result .= '</div>';

                $categories = get_the_terms( get_the_ID(), 'competition_tax' );
                if( $categories ){ 
                $result .= '<div class="post-list-item-meta">
                                <span>';
   
                                    foreach( $categories as $category ) {
                                        $result .= '<a>' . esc_html( $category->name ) . '</a>' . ', ';
                                    }
                                    echo trim( $output, ', ' );


                    $result .= '</span>';                 
                $result .= '</div>';
                }
                $result .= '<h3 class="heading">'.get_the_title().'</h3>
                                    <div class="post-list-item-link">
                                        <a href="'.get_permalink().'">View More </a>
                                    </div>';
            $result .= '</div>';
        $result .= '</div>';
  
        endwhile;
		// $result .= '</div>';
		$result .= '<div class="custom-pagination">';
        $result_paginate .= paginate_links(array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'current'      => max(1, $paged ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( '<', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ));

		$result .= '</div>';
        wp_reset_postdata();
  
    endif;    
      $result_arr = array();

    $result_arr['content'] = $result;
    $result_arr['content_paginate'] = $result_paginate;
    $result_arr['next_page'] = intval($paged) + 1;
    
    //return $result;
    $result_arr = json_encode($result_arr);
    echo $result_arr;   
	die();
}



// Method 1: Filter.
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyCApwB8Swt_t4MlQN8qnvKMVl5cawtl6Og';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// Method 2: Setting.
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCApwB8Swt_t4MlQN8qnvKMVl5cawtl6Og');
}
add_action('acf/init', 'my_acf_init');


function getGeoCode($address)
{
        $address = urlencode($address);
        // geocoding api url
        $url = "https://maps.google.com/maps/api/geocode/json?address=$address&key=AIzaSyCApwB8Swt_t4MlQN8qnvKMVl5cawtl6Og";

        // send api request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        $data['lat'] = $json->results[0]->geometry->location->lat;
        $data['lng'] = $json->results[0]->geometry->location->lng;

        return $data;
}

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}

function getDistanceBetweenCoordinates($lat1, $lon1, $lat2, $lon2, $unit) {

    if( $lat1 == 'null' || $lon1 == 'null' ){
        return false;
    }
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
  
    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
  }

  