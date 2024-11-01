<?php

/**
 * This file registers the Teams custom post type
 *
 * @package    	Skil_Toolbox
 * @link        http://stylishthemes.co
 * Author:      StylishThemes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


// Register Team Post Type
function stb_team_pt() {

	$labels = array(
		'name'                  => _x( 'Teams', 'Post Type General Name', 'skil-toolbox' ),
		'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'skil-toolbox' ),
		'menu_name'             => esc_html__( 'Teams', 'skil-toolbox' ),
		'name_admin_bar'        => esc_html__( 'Team', 'skil-toolbox' ),
		'archives'              => esc_html__( 'Item Archives', 'skil-toolbox' ),
		'parent_item_colon'     => esc_html__( 'Parent Item:', 'skil-toolbox' ),
		'all_items'             => esc_html__( 'All Teams', 'skil-toolbox' ),
		'add_new_item'          => esc_html__( 'Add New Team', 'skil-toolbox' ),
		'add_new'               => esc_html__( 'Add New', 'skil-toolbox' ),
		'new_item'              => esc_html__( 'New Team', 'skil-toolbox' ),
		'edit_item'             => esc_html__( 'Edit Team', 'skil-toolbox' ),
		'update_item'           => esc_html__( 'Update Team', 'skil-toolbox' ),
		'view_item'             => esc_html__( 'View Team', 'skil-toolbox' ),
		'search_items'          => esc_html__( 'Search Team', 'skil-toolbox' ),
		'not_found'             => esc_html__( 'Not found', 'skil-toolbox' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'skil-toolbox' ),
		'featured_image'        => esc_html__( 'Featured Image', 'skil-toolbox' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'skil-toolbox' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'skil-toolbox' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'skil-toolbox' ),
		'insert_into_item'      => esc_html__( 'Insert into item', 'skil-toolbox' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'skil-toolbox' ),
		'items_list'            => esc_html__( 'Teams list', 'skil-toolbox' ),
		'items_list_navigation' => esc_html__( 'Items list navigation', 'skil-toolbox' ),
		'filter_items_list'     => esc_html__( 'Filter items list', 'skil-toolbox' ),
	);
	$args = array(
		'label'                 => esc_html__( 'Team', 'skil-toolbox' ),
		'description'           => esc_html__( 'Team post type for widget.', 'skil-toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'stb_team_post_type', $args );

}
add_action( 'init', 'stb_team_pt', 0 );