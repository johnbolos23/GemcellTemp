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
		"can_export" => true,
		"rewrite" => [ "slug" => "competition", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "competition", $args );

	/**
	 * Post Type: Suppliers.
	 */

	$labels = [
		"name" => esc_html__( "Suppliers", "gemcell" ),
		"singular_name" => esc_html__( "Supplier", "gemcell" ),
		"menu_name" => esc_html__( "Our Suppliers", "gemcell" ),
		"all_items" => esc_html__( "All Suppliers", "gemcell" ),
		"add_new" => esc_html__( "Add new", "gemcell" ),
		"add_new_item" => esc_html__( "Add new Supplier", "gemcell" ),
		"edit_item" => esc_html__( "Edit Supplier", "gemcell" ),
		"new_item" => esc_html__( "New Supplier", "gemcell" ),
		"view_item" => esc_html__( "View Supplier", "gemcell" ),
		"view_items" => esc_html__( "View Suppliers", "gemcell" ),
		"search_items" => esc_html__( "Search Suppliers", "gemcell" ),
		"not_found" => esc_html__( "No Suppliers found", "gemcell" ),
		"not_found_in_trash" => esc_html__( "No Suppliers found in trash", "gemcell" ),
		"parent" => esc_html__( "Parent Supplier:", "gemcell" ),
		"featured_image" => esc_html__( "Featured image for this Supplier", "gemcell" ),
		"set_featured_image" => esc_html__( "Set featured image for this Supplier", "gemcell" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Supplier", "gemcell" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Supplier", "gemcell" ),
		"archives" => esc_html__( "Supplier archives", "gemcell" ),
		"insert_into_item" => esc_html__( "Insert into Supplier", "gemcell" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Supplier", "gemcell" ),
		"filter_items_list" => esc_html__( "Filter Suppliers list", "gemcell" ),
		"items_list_navigation" => esc_html__( "Suppliers list navigation", "gemcell" ),
		"items_list" => esc_html__( "Suppliers list", "gemcell" ),
		"attributes" => esc_html__( "Suppliers attributes", "gemcell" ),
		"name_admin_bar" => esc_html__( "Supplier", "gemcell" ),
		"item_published" => esc_html__( "Supplier published", "gemcell" ),
		"item_published_privately" => esc_html__( "Supplier published privately.", "gemcell" ),
		"item_reverted_to_draft" => esc_html__( "Supplier reverted to draft.", "gemcell" ),
		"item_scheduled" => esc_html__( "Supplier scheduled", "gemcell" ),
		"item_updated" => esc_html__( "Supplier updated.", "gemcell" ),
		"parent_item_colon" => esc_html__( "Parent Supplier:", "gemcell" ),
	];

	$args = [
		"label" => esc_html__( "Suppliers", "gemcell" ),
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
		"can_export" => true,
		"rewrite" => [ "slug" => "suppliers", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "suppliers", $args );

	/**
	 * Post Type: Archive Gems.
	 */

	$labels = [
		"name" => esc_html__( "Archive Gems", "gemcell" ),
		"singular_name" => esc_html__( "Archive Gem", "gemcell" ),
		"menu_name" => esc_html__( "Archive Gems", "gemcell" ),
		"all_items" => esc_html__( "All Archive Gems", "gemcell" ),
		"add_new" => esc_html__( "Add new", "gemcell" ),
		"add_new_item" => esc_html__( "Add new Archive Gem", "gemcell" ),
		"edit_item" => esc_html__( "Edit Archive Gem", "gemcell" ),
		"new_item" => esc_html__( "New Archive Gem", "gemcell" ),
		"view_item" => esc_html__( "View Archive Gem", "gemcell" ),
		"view_items" => esc_html__( "View Archive Gems", "gemcell" ),
		"search_items" => esc_html__( "Search Archive Gems", "gemcell" ),
		"not_found" => esc_html__( "No Archive Gems found", "gemcell" ),
		"not_found_in_trash" => esc_html__( "No Archive Gems found in trash", "gemcell" ),
		"parent" => esc_html__( "Parent Archive Gem:", "gemcell" ),
		"featured_image" => esc_html__( "Featured image for this Archive Gem", "gemcell" ),
		"set_featured_image" => esc_html__( "Set featured image for this Archive Gem", "gemcell" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Archive Gem", "gemcell" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Archive Gem", "gemcell" ),
		"archives" => esc_html__( "Archive Gem archives", "gemcell" ),
		"insert_into_item" => esc_html__( "Insert into Archive Gem", "gemcell" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Archive Gem", "gemcell" ),
		"filter_items_list" => esc_html__( "Filter Archive Gems list", "gemcell" ),
		"items_list_navigation" => esc_html__( "Archive Gems list navigation", "gemcell" ),
		"items_list" => esc_html__( "Archive Gems list", "gemcell" ),
		"attributes" => esc_html__( "Archive Gems attributes", "gemcell" ),
		"name_admin_bar" => esc_html__( "Archive Gem", "gemcell" ),
		"item_published" => esc_html__( "Archive Gem published", "gemcell" ),
		"item_published_privately" => esc_html__( "Archive Gem published privately.", "gemcell" ),
		"item_reverted_to_draft" => esc_html__( "Archive Gem reverted to draft.", "gemcell" ),
		"item_scheduled" => esc_html__( "Archive Gem scheduled", "gemcell" ),
		"item_updated" => esc_html__( "Archive Gem updated.", "gemcell" ),
		"parent_item_colon" => esc_html__( "Parent Archive Gem:", "gemcell" ),
	];

	$args = [
		"label" => esc_html__( "Archive Gems", "gemcell" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
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
		"can_export" => true,
		"rewrite" => [ "slug" => "archive_gems", "with_front" => false ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "archive_gems", $args );
	
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

	/**
	 * Taxonomy: Categories.
	 */

	$labels = [
		"name" => esc_html__( "Categories", "gemcell" ),
		"singular_name" => esc_html__( "Category", "gemcell" ),
		"menu_name" => esc_html__( "Categories", "gemcell" ),
		"all_items" => esc_html__( "All Categories", "gemcell" ),
		"edit_item" => esc_html__( "Edit Category", "gemcell" ),
		"view_item" => esc_html__( "View Category", "gemcell" ),
		"update_item" => esc_html__( "Update Category name", "gemcell" ),
		"add_new_item" => esc_html__( "Add new Category", "gemcell" ),
		"new_item_name" => esc_html__( "New Category name", "gemcell" ),
		"parent_item" => esc_html__( "Parent Category", "gemcell" ),
		"parent_item_colon" => esc_html__( "Parent Category:", "gemcell" ),
		"search_items" => esc_html__( "Search Categories", "gemcell" ),
		"popular_items" => esc_html__( "Popular Categories", "gemcell" ),
		"separate_items_with_commas" => esc_html__( "Separate Categories with commas", "gemcell" ),
		"add_or_remove_items" => esc_html__( "Add or remove Categories", "gemcell" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Categories", "gemcell" ),
		"not_found" => esc_html__( "No Categories found", "gemcell" ),
		"no_terms" => esc_html__( "No Categories", "gemcell" ),
		"items_list_navigation" => esc_html__( "Categories list navigation", "gemcell" ),
		"items_list" => esc_html__( "Categories list", "gemcell" ),
		"back_to_items" => esc_html__( "Back to Categories", "gemcell" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "gemcell" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "gemcell" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "gemcell" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "gemcell" ),
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
		"rewrite" => [ 'slug' => 'suppliers_cat', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "suppliers_cat",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "suppliers_cat", [ "suppliers" ], $args );

	/**
	 * Taxonomy: Member Categories.
	 */

	$labels = [
		"name" => esc_html__( "Member Categories", "gemcell" ),
		"singular_name" => esc_html__( "Member Category", "gemcell" ),
	];

	
	$args = [
		"label" => esc_html__( "Member Categories", "gemcell" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'member_categories', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "member_categories",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "member_categories", [ "members" ], $args );

	/**
	 * Taxonomy: State.
	 */

	$labels = [
		"name" => esc_html__( "State", "gemcell" ),
		"singular_name" => esc_html__( "State", "gemcell" ),
	];

	
	$args = [
		"label" => esc_html__( "State", "gemcell" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'state', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "state",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "state", [ "members" ], $args );

	/**
	 * Taxonomy: Categories.
	 */

	$labels = [
		"name" => esc_html__( "Categories", "gemcell" ),
		"singular_name" => esc_html__( "Category", "gemcell" ),
		"menu_name" => esc_html__( "Categories", "gemcell" ),
		"all_items" => esc_html__( "All Categories", "gemcell" ),
		"edit_item" => esc_html__( "Edit Category", "gemcell" ),
		"view_item" => esc_html__( "View Category", "gemcell" ),
		"update_item" => esc_html__( "Update Category name", "gemcell" ),
		"add_new_item" => esc_html__( "Add new Category", "gemcell" ),
		"new_item_name" => esc_html__( "New Category name", "gemcell" ),
		"parent_item" => esc_html__( "Parent Category", "gemcell" ),
		"parent_item_colon" => esc_html__( "Parent Category:", "gemcell" ),
		"search_items" => esc_html__( "Search Categories", "gemcell" ),
		"popular_items" => esc_html__( "Popular Categories", "gemcell" ),
		"separate_items_with_commas" => esc_html__( "Separate Categories with commas", "gemcell" ),
		"add_or_remove_items" => esc_html__( "Add or remove Categories", "gemcell" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Categories", "gemcell" ),
		"not_found" => esc_html__( "No Categories found", "gemcell" ),
		"no_terms" => esc_html__( "No Categories", "gemcell" ),
		"items_list_navigation" => esc_html__( "Categories list navigation", "gemcell" ),
		"items_list" => esc_html__( "Categories list", "gemcell" ),
		"back_to_items" => esc_html__( "Back to Categories", "gemcell" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "gemcell" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "gemcell" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "gemcell" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "gemcell" ),
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
		"rewrite" => [ 'slug' => 'archive_tax', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "archive_tax",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "archive_tax", [ "archive_gems" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );



function cptui_register_my_cpts_gemcell_members() {

	/**
	 * Post Type: Gemcell Members.
	 */

	$labels = [
		"name" => esc_html__( "Gemcell Members", "gemcell" ),
		"singular_name" => esc_html__( "Gemcell Member", "gemcell" ),
		"menu_name" => esc_html__( "Gemcell Members", "gemcell" ),
		"all_items" => esc_html__( "All Gemcell Members", "gemcell" ),
		"add_new" => esc_html__( "Add new", "gemcell" ),
		"add_new_item" => esc_html__( "Add new Gemcell Member", "gemcell" ),
		"edit_item" => esc_html__( "Edit Gemcell Member", "gemcell" ),
		"new_item" => esc_html__( "New Gemcell Member", "gemcell" ),
		"view_item" => esc_html__( "View Gemcell Member", "gemcell" ),
		"view_items" => esc_html__( "View Gemcell Members", "gemcell" ),
		"search_items" => esc_html__( "Search Gemcell Members", "gemcell" ),
		"not_found" => esc_html__( "No Gemcell Members found", "gemcell" ),
		"not_found_in_trash" => esc_html__( "No Gemcell Members found in trash", "gemcell" ),
		"parent" => esc_html__( "Parent Gemcell Member:", "gemcell" ),
		"featured_image" => esc_html__( "Featured image for this Gemcell Member", "gemcell" ),
		"set_featured_image" => esc_html__( "Set featured image for this Gemcell Member", "gemcell" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Gemcell Member", "gemcell" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Gemcell Member", "gemcell" ),
		"archives" => esc_html__( "Gemcell Member archives", "gemcell" ),
		"insert_into_item" => esc_html__( "Insert into Gemcell Member", "gemcell" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Gemcell Member", "gemcell" ),
		"filter_items_list" => esc_html__( "Filter Gemcell Members list", "gemcell" ),
		"items_list_navigation" => esc_html__( "Gemcell Members list navigation", "gemcell" ),
		"items_list" => esc_html__( "Gemcell Members list", "gemcell" ),
		"attributes" => esc_html__( "Gemcell Members attributes", "gemcell" ),
		"name_admin_bar" => esc_html__( "Gemcell Member", "gemcell" ),
		"item_published" => esc_html__( "Gemcell Member published", "gemcell" ),
		"item_published_privately" => esc_html__( "Gemcell Member published privately.", "gemcell" ),
		"item_reverted_to_draft" => esc_html__( "Gemcell Member reverted to draft.", "gemcell" ),
		"item_scheduled" => esc_html__( "Gemcell Member scheduled", "gemcell" ),
		"item_updated" => esc_html__( "Gemcell Member updated.", "gemcell" ),
		"parent_item_colon" => esc_html__( "Parent Gemcell Member:", "gemcell" ),
	];

	$args = [
		"label" => esc_html__( "Gemcell Members", "gemcell" ),
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
		"can_export" => true,
		"rewrite" => [ "slug" => "members", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields", "author" ],
		"show_in_graphql" => false,
	];

	register_post_type( "gemcell_members", $args );
}

add_action( 'init', 'cptui_register_my_cpts_gemcell_members' );


function cptui_register_my_cpts_member_branches() {

	/**
	 * Post Type: Branches.
	 */

	$labels = [
		"name" => esc_html__( "Branches", "gemcell" ),
		"singular_name" => esc_html__( "Branch", "gemcell" ),
		"menu_name" => esc_html__( "Branches", "gemcell" ),
		"all_items" => esc_html__( "All Branches", "gemcell" ),
		"add_new" => esc_html__( "Add new", "gemcell" ),
		"add_new_item" => esc_html__( "Add new Branch", "gemcell" ),
		"edit_item" => esc_html__( "Edit Branch", "gemcell" ),
		"new_item" => esc_html__( "New Branch", "gemcell" ),
		"view_item" => esc_html__( "View Branch", "gemcell" ),
		"view_items" => esc_html__( "View Branches", "gemcell" ),
		"search_items" => esc_html__( "Search Branches", "gemcell" ),
		"not_found" => esc_html__( "No Branches found", "gemcell" ),
		"not_found_in_trash" => esc_html__( "No Branches found in trash", "gemcell" ),
		"parent" => esc_html__( "Parent Branch:", "gemcell" ),
		"featured_image" => esc_html__( "Featured image for this Branch", "gemcell" ),
		"set_featured_image" => esc_html__( "Set featured image for this Branch", "gemcell" ),
		"remove_featured_image" => esc_html__( "Remove featured image for this Branch", "gemcell" ),
		"use_featured_image" => esc_html__( "Use as featured image for this Branch", "gemcell" ),
		"archives" => esc_html__( "Branch archives", "gemcell" ),
		"insert_into_item" => esc_html__( "Insert into Branch", "gemcell" ),
		"uploaded_to_this_item" => esc_html__( "Upload to this Branch", "gemcell" ),
		"filter_items_list" => esc_html__( "Filter Branches list", "gemcell" ),
		"items_list_navigation" => esc_html__( "Branches list navigation", "gemcell" ),
		"items_list" => esc_html__( "Branches list", "gemcell" ),
		"attributes" => esc_html__( "Branches attributes", "gemcell" ),
		"name_admin_bar" => esc_html__( "Branch", "gemcell" ),
		"item_published" => esc_html__( "Branch published", "gemcell" ),
		"item_published_privately" => esc_html__( "Branch published privately.", "gemcell" ),
		"item_reverted_to_draft" => esc_html__( "Branch reverted to draft.", "gemcell" ),
		"item_scheduled" => esc_html__( "Branch scheduled", "gemcell" ),
		"item_updated" => esc_html__( "Branch updated.", "gemcell" ),
		"parent_item_colon" => esc_html__( "Parent Branch:", "gemcell" ),
	];

	$args = [
		"label" => esc_html__( "Branches", "gemcell" ),
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
		"can_export" => true,
		"rewrite" => [ "slug" => "member_branches", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields", "author" ],
		"show_in_graphql" => false,
	];

	register_post_type( "member_branches", $args );
}

add_action( 'init', 'cptui_register_my_cpts_member_branches' );



function cptui_register_my_taxes_gemcell_states() {

	/**
	 * Taxonomy: Gemcell States.
	 */

	$labels = [
		"name" => esc_html__( "Gemcell States", "gemcell" ),
		"singular_name" => esc_html__( "Gemcell State", "gemcell" ),
		"menu_name" => esc_html__( "Gemcell States", "gemcell" ),
		"all_items" => esc_html__( "All Gemcell States", "gemcell" ),
		"edit_item" => esc_html__( "Edit Gemcell State", "gemcell" ),
		"view_item" => esc_html__( "View Gemcell State", "gemcell" ),
		"update_item" => esc_html__( "Update Gemcell State name", "gemcell" ),
		"add_new_item" => esc_html__( "Add new Gemcell State", "gemcell" ),
		"new_item_name" => esc_html__( "New Gemcell State name", "gemcell" ),
		"parent_item" => esc_html__( "Parent Gemcell State", "gemcell" ),
		"parent_item_colon" => esc_html__( "Parent Gemcell State:", "gemcell" ),
		"search_items" => esc_html__( "Search Gemcell States", "gemcell" ),
		"popular_items" => esc_html__( "Popular Gemcell States", "gemcell" ),
		"separate_items_with_commas" => esc_html__( "Separate Gemcell States with commas", "gemcell" ),
		"add_or_remove_items" => esc_html__( "Add or remove Gemcell States", "gemcell" ),
		"choose_from_most_used" => esc_html__( "Choose from the most used Gemcell States", "gemcell" ),
		"not_found" => esc_html__( "No Gemcell States found", "gemcell" ),
		"no_terms" => esc_html__( "No Gemcell States", "gemcell" ),
		"items_list_navigation" => esc_html__( "Gemcell States list navigation", "gemcell" ),
		"items_list" => esc_html__( "Gemcell States list", "gemcell" ),
		"back_to_items" => esc_html__( "Back to Gemcell States", "gemcell" ),
		"name_field_description" => esc_html__( "The name is how it appears on your site.", "gemcell" ),
		"parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "gemcell" ),
		"slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "gemcell" ),
		"desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "gemcell" ),
	];

	
	$args = [
		"label" => esc_html__( "Gemcell States", "gemcell" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'members_state', 'with_front' => false, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "gemcell_states",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "gemcell_states", [ "gemcell_members", "member_branches" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_gemcell_states' );