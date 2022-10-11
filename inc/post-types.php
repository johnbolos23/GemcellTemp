<?php
function cptui_register_my_cpts() {

	/**
	 * Post Type: Competitions.
	 */

	$labels = [
		"name" => esc_html__( "Competitions", "gemcell" ),
		"singular_name" => esc_html__( "Competition", "gemcell" ),
		"menu_name" => esc_html__( "Competitions", "gemcell" ),
		"all_items" => esc_html__( "All Competitions", "gemcell" ),
		"add_new" => esc_html__( "Add new", "gemcell" ),
		"add_new_item" => esc_html__( "Add new Competition", "gemcell" ),
		"edit_item" => esc_html__( "Edit Competition", "gemcell" ),
		"new_item" => esc_html__( "New Competition", "gemcell" ),
		"view_item" => esc_html__( "View Competition", "gemcell" ),
		"view_items" => esc_html__( "View Competitions", "gemcell" ),
		"search_items" => esc_html__( "Search Competitions", "gemcell" ),
		"not_found" => esc_html__( "No Competitions found", "gemcell" ),
		"not_found_in_trash" => esc_html__( "No Competitions found in trash", "gemcell" ),
		"parent" => esc_html__( "Parent Competition:", "gemcell" ),
		"featured_image" => esc_html__( "Featured image for this Competition", "gemcell" ),
		"set_featured_image" => esc_html__( "Set featured image for this Competition", "gemcell" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Competition", "gemcell" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Competition", "gemcell" ),
		"archives" => esc_html__( "Competition archives", "gemcell" ),
		"insert_into_item" => esc_html__( "Insert into Competition", "gemcell" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Competition", "gemcell" ),
		"filter_items_list" => esc_html__( "Filter Competitions list", "gemcell" ),
		"items_list_navigation" => esc_html__( "Competitions list navigation", "gemcell" ),
		"items_list" => esc_html__( "Competitions list", "gemcell" ),
		"attributes" => esc_html__( "Competitions attributes", "gemcell" ),
		"name_admin_bar" => esc_html__( "Competition", "gemcell" ),
		"item_published" => esc_html__( "Competition published", "gemcell" ),
		"item_published_privately" => esc_html__( "Competition published privately.", "gemcell" ),
		"item_reverted_to_draft" => esc_html__( "Competition reverted to draft.", "gemcell" ),
		"item_scheduled" => esc_html__( "Competition scheduled", "gemcell" ),
		"item_updated" => esc_html__( "Competition updated.", "gemcell" ),
		"parent_item_colon" => esc_html__( "Parent Competition:", "gemcell" ),
	];

	$args = [
		"label" => esc_html__( "Competitions", "gemcell" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "competition", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "competition", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Categories.
	 */

	$labels = [
		"name" => esc_html__( "Categories", "gemcell" ),
		"singular_name" => esc_html__( "Category", "gemcell" ),
	];

	
	$args = [
		"label" => esc_html__( "Categories", "gemcell" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'competition_tax', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "competition_tax",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "competition_tax", [ "competition" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );