<?php
/**
 * Custom hooks
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function understrap_site_info() {
		do_action( 'understrap_site_info' );
	}
}

add_action( 'understrap_site_info', 'understrap_add_site_info' );
if ( ! function_exists( 'understrap_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function understrap_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'https://wordpress.org/', 'understrap' ) ),
			sprintf(
				/* translators: WordPress */
				esc_html__( 'Proudly powered by %s', 'understrap' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: 1: Theme name, 2: Theme author */
				esc_html__( 'Theme: %1$s by %2$s.', 'understrap' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'https://understrap.com', 'understrap' ) ) . '">understrap.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators: Theme version */
				esc_html__( 'Version: %1$s', 'understrap' ),
				$the_theme->get( 'Version' )
			)
		);

		// Check if customizer site info has value.
		if ( get_theme_mod( 'understrap_site_info_override' ) ) {
			$site_info = get_theme_mod( 'understrap_site_info_override' );
		}

		echo apply_filters( 'understrap_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}

add_action( 'getGemcellDataCron', 'getGemcellMembersAPI' );
  function getGemcellMembersAPI(){
	global $wpdb;

	$endpoint = 'member_locations';
	$host = "https://tradenet.gemcell.com.au/api/$endpoint";
	$apiKey = '8wogckcggs804kwgs0kss0o4oco8w4ws4408sg4g';

	$curl = curl_init( $host );

	curl_setopt( $curl, CURLOPT_HTTPHEADER, array("X-API-KEY: $apiKey") );
	curl_setopt( $curl, CURLOPT_TIMEOUT, 2000 );
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, TRUE);

	$response = curl_exec( $curl );

	$jsonResponse = json_decode( $response, true )['data'];


	$stateArray = array(
		'VIC' => 'Victoria',
		'NSW' => 'New South Wales',
		'NT' => 'Northern Territory',
		'QLD' => 'Queensland',
		'ACT' => 'Australian Capital Territory',
		'SA' => 'South Australia',
		'TAS' => 'Tasmania',
		'WA' => 'Western Australia'
	);

	$terms = get_terms( array(
		'taxonomy' => 'gemcell_states',
		'hide_empty' => false,
	) );

	foreach( $jsonResponse as $memberData ){
		// ACF Member ID
		$companyName = $memberData['company_name'];
		$memberID = $wpdb->get_row( "SELECT ID FROM wp_posts WHERE post_type = 'gemcell_members' and post_title LIKE '%$companyName%'" );

		if( !$memberID ){
			continue;
		}else{
			$memberID = $memberID->ID;
		}


		$existingChecker = json_decode( $wpdb->get_row( "SELECT * FROM wp_gemcell_members WHERE ID = 1" )->members_ids );

		if( in_array($memberData['id'], $existingChecker ) ){
			continue;
		}
		if( !in_array($memberData['id'], $existingChecker ) ){

			$existingChecker[] = $memberData['id'];
			$existingChecker = json_encode( $existingChecker );

			$wpdb->update('wp_gemcell_members', array('members_ids' => $existingChecker ), array( 'ID' => 1 ));

			// get created post ID
			$postID = wp_insert_post(array(
				'post_type' => 'member_branches',
				'post_title' => $memberData['location_name'],
				'post_status' => 'publish'
			));


			// Add Featured Image to Post
			// $image_url = $memberData['company_logo']; // Define the image URL here
			// $image_name = basename($image_url);
			// $upload_dir = wp_upload_dir(); // Set upload folder
			// $image_data = file_get_contents($image_url); // Get image data
			// $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
			// $filename = basename( $unique_file_name ); // Create image file name

			// // Check folder permission and define file location
			// if( wp_mkdir_p( $upload_dir['path'] ) ) {
			// 	$file = $upload_dir['path'] . '/' . $filename;
			// } else {
			// 	$file = $upload_dir['basedir'] . '/' . $filename;
			// }

			// // Create the image  file on the server
			// file_put_contents( $file, $image_data );

			// // Check image file type
			// $wp_filetype = wp_check_filetype( $filename, null );

			// // Set attachment data
			// $attachment = array(
			// 	'post_mime_type' => $wp_filetype['type'],
			// 	'post_title'     => sanitize_file_name( $filename ),
			// 	'post_content'   => '',
			// 	'post_status'    => 'inherit'
			// );

			// // Create the attachment
			// $attach_id = wp_insert_attachment( $attachment, $file );

			// // Include image.php
			// require_once(ABSPATH . 'wp-admin/includes/image.php');

			// // Define attachment metadata
			// $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

			// // Assign metadata to attachment
			// wp_update_attachment_metadata( $attach_id, $attach_data );

			// // And finally assign featured image to post
			set_post_thumbnail( $postID, 625 );



			// ACF phone field
			update_field('phone', $memberData['phone'], $postID);
			
			// ACF email field
			update_field('email', $memberData['email_address'], $postID);

			// ACF address field
			$address = $memberData['street_address1'];
			$address .= $memberData['street_address2'] ? ', ' . $memberData['street_address2']  : '';
			$address .= $memberData['street_address3'] ? ', ' . $memberData['street_address3']  : '';
			$address .= $memberData['street_suburb'] ? ', ' . $memberData['street_suburb']  : '';
			$address .= $memberData['street_state'] ? ', ' . $memberData['street_state']  : '';
			$address .= $memberData['street_postcode'] ? ' ' . $memberData['street_postcode']  : '';

			if( isset( $stateArray[ $memberData['street_state'] ] ) ){
				$address .= ', Australia';
			}
			
			update_field('address', $address, $postID);

			
			// ACF location field
			$location = array('address' => $address, 'lat' => $memberData['latitude'], 'lng' => $memberData['longitude']);

			update_field('address', $location, $postID);


			// ACF member ID
			if( $memberID ){
				update_post_meta($postID, 'gemcell_member_id', $memberID );
			}


			// Update State Taxonomy
			$termId = '';

			foreach( $terms as $term ){
				if( isset( $stateArray[ $memberData['street_state'] ] ) && ( strtolower( $stateArray[ $memberData['street_state'] ] ) == strtolower( $term->name ) ) ){
					$termId = $term->term_id;
				}
			}
			wp_set_post_terms( $postID, array( $termId ), 'gemcell_states' );
		}
	}
}