<?php
/*
===========================
  [[[ Custom Post Types ]]]
===========================
*/

// Clear Rewrite Rules for CPT's
function ex_theme_terlet() {
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'ex_theme_terlet');


// TYPE: 52 Club
function cpt_52club() {

	$labels = array(
		'name'                  => _x( '52 Club Years', 'Post Type General Name', 'exonym' ),
		'singular_name'         => _x( '52 Club Year', 'Post Type Singular Name', 'exonym' ),
		'menu_name'             => __( '52 Club', 'exonym' ),
		'name_admin_bar'        => __( '52 Club', 'exonym' ),
		'archives'              => __( '52 Club Archives', 'exonym' ),
		'attributes'            => __( '52 Club Attributes', 'exonym' ),
		'parent_item_colon'     => __( 'Parent 52 Club:', 'exonym' ),
		'all_items'             => __( 'All 52 Clubs', 'exonym' ),
		'add_new_item'          => __( 'Add New 52 Club', 'exonym' ),
		'add_new'               => __( 'Add New', 'exonym' ),
		'new_item'              => __( 'New 52 Club', 'exonym' ),
		'edit_item'             => __( 'Edit 52 Club', 'exonym' ),
		'update_item'           => __( 'Update 52 Club', 'exonym' ),
		'view_item'             => __( 'View 52 Club', 'exonym' ),
		'view_items'            => __( 'View 52 Clubs', 'exonym' ),
		'search_items'          => __( 'Search 52 Club', 'exonym' ),
		'not_found'             => __( 'Not found', 'exonym' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'exonym' ),
		'featured_image'        => __( 'Featured Image', 'exonym' ),
		'set_featured_image'    => __( 'Set featured image', 'exonym' ),
		'remove_featured_image' => __( 'Remove featured image', 'exonym' ),
		'use_featured_image'    => __( 'Use as featured image', 'exonym' ),
		'insert_into_item'      => __( 'Insert into item', 'exonym' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'exonym' ),
		'items_list'            => __( 'Items list', 'exonym' ),
		'items_list_navigation' => __( 'Items list navigation', 'exonym' ),
		'filter_items_list'     => __( 'Filter items list', 'exonym' ),
	);
	$args = array(
		'label'                 => __( '52 Club Year', 'exonym' ),
		'labels'                => $labels,
		'supports'              => false,
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => '52-club',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => true,
		'capability_type'       => 'page',
	);
	register_post_type( '52club', $args );

}
add_action( 'init', 'cpt_52club', 0 );


// TYPE: Resources
function cpt_resources() {

	$labels = array(
		'name'                  => _x( 'Resources', 'Post Type General Name', 'exonym' ),
		'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'exonym' ),
		'menu_name'             => __( 'Resources', 'exonym' ),
		'name_admin_bar'        => __( 'Resource', 'exonym' ),
		'archives'              => __( 'Resource Archives', 'exonym' ),
		'attributes'            => __( 'Resource Attributes', 'exonym' ),
		'parent_item_colon'     => __( 'Parent Resource:', 'exonym' ),
		'all_items'             => __( 'All Resources', 'exonym' ),
		'add_new_item'          => __( 'Add New Resource', 'exonym' ),
		'add_new'               => __( 'Add New', 'exonym' ),
		'new_item'              => __( 'New Resource', 'exonym' ),
		'edit_item'             => __( 'Edit Resource', 'exonym' ),
		'update_item'           => __( 'Update Resource', 'exonym' ),
		'view_item'             => __( 'View Resource', 'exonym' ),
		'view_items'            => __( 'View Resource', 'exonym' ),
		'search_items'          => __( 'Search Resource', 'exonym' ),
		'not_found'             => __( 'Not found', 'exonym' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'exonym' ),
		'featured_image'        => __( 'Featured Image', 'exonym' ),
		'set_featured_image'    => __( 'Set featured image', 'exonym' ),
		'remove_featured_image' => __( 'Remove featured image', 'exonym' ),
		'use_featured_image'    => __( 'Use as featured image', 'exonym' ),
		'insert_into_item'      => __( 'Insert into Resource', 'exonym' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Resource', 'exonym' ),
		'items_list'            => __( 'Resources list', 'exonym' ),
		'items_list_navigation' => __( 'Resources list navigation', 'exonym' ),
		'filter_items_list'     => __( 'Filter Resources list', 'exonym' ),
	);
	$args = array(
		'label'                 => __( 'Resource', 'exonym' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array( 'resource_categories' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => '52-club',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'resource', $args );

}
add_action( 'init', 'cpt_resources', 0 );


// TAXONOMY: Resource Categories
function ctax_resources() {

	$labels = array(
		'name'                       => _x( 'Resource Categories', 'Taxonomy General Name', 'exonym' ),
		'singular_name'              => _x( 'Resource Category', 'Taxonomy Singular Name', 'exonym' ),
		'menu_name'                  => __( 'Resource Categories', 'exonym' ),
		'all_items'                  => __( 'All Resource Categories', 'exonym' ),
		'parent_item'                => __( 'Parent Resource Category', 'exonym' ),
		'parent_item_colon'          => __( 'Parent Resource Category:', 'exonym' ),
		'new_item_name'              => __( 'New Resource Category Name', 'exonym' ),
		'add_new_item'               => __( 'Add New Resource Category', 'exonym' ),
		'edit_item'                  => __( 'Edit Resource Category', 'exonym' ),
		'update_item'                => __( 'Update Resource Category', 'exonym' ),
		'view_item'                  => __( 'View Resource Category', 'exonym' ),
		'separate_items_with_commas' => __( 'Separate Resource Categories with commas', 'exonym' ),
		'add_or_remove_items'        => __( 'Add or remove Resource Categories', 'exonym' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'exonym' ),
		'popular_items'              => __( 'Popular Resource Categories', 'exonym' ),
		'search_items'               => __( 'Search Resource Categories', 'exonym' ),
		'not_found'                  => __( 'Not Found', 'exonym' ),
		'no_terms'                   => __( 'No Resource Categories', 'exonym' ),
		'items_list'                 => __( 'Resource Categories list', 'exonym' ),
		'items_list_navigation'      => __( 'Resource Categories list navigation', 'exonym' ),
	);
	$rewrite = array(
		'slug'                       => 'resources',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'resource_categories', array( 'resource', 'post' ), $args );

}
add_action( 'init', 'ctax_resources', 0 );


// TYPE: Events
function cpt_events() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'exonym' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'exonym' ),
		'menu_name'             => __( 'Events', 'exonym' ),
		'name_admin_bar'        => __( 'Event', 'exonym' ),
		'archives'              => __( 'Event Archives', 'exonym' ),
		'attributes'            => __( 'Event Attributes', 'exonym' ),
		'parent_item_colon'     => __( 'Parent Event:', 'exonym' ),
		'all_items'             => __( 'All Events', 'exonym' ),
		'add_new_item'          => __( 'Add New Event', 'exonym' ),
		'add_new'               => __( 'Add New', 'exonym' ),
		'new_item'              => __( 'New Event', 'exonym' ),
		'edit_item'             => __( 'Edit Event', 'exonym' ),
		'update_item'           => __( 'Update Event', 'exonym' ),
		'view_item'             => __( 'View Event', 'exonym' ),
		'view_items'            => __( 'View Event', 'exonym' ),
		'search_items'          => __( 'Search Event', 'exonym' ),
		'not_found'             => __( 'Not found', 'exonym' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'exonym' ),
		'featured_image'        => __( 'Flyer', 'exonym' ),
		'set_featured_image'    => __( 'Set flyer', 'exonym' ),
		'remove_featured_image' => __( 'Remove flyer', 'exonym' ),
		'use_featured_image'    => __( 'Use as flyer', 'exonym' ),
		'insert_into_item'      => __( 'Insert into Event', 'exonym' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Event', 'exonym' ),
		'items_list'            => __( 'Events list', 'exonym' ),
		'items_list_navigation' => __( 'Events list navigation', 'exonym' ),
		'filter_items_list'     => __( 'Filter Events list', 'exonym' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'exonym' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-tickets-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => 'events',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'cpt_events', 0 );


// TYPE: The Fallen
function cpt_fallen() {

	$labels = array(
		'name'                  => _x( 'The Fallen', 'Post Type General Name', 'exonym' ),
		'singular_name'         => _x( 'Fallen', 'Post Type Singular Name', 'exonym' ),
		'menu_name'             => __( 'The Fallen', 'exonym' ),
		'name_admin_bar'        => __( 'Fallen', 'exonym' ),
		'archives'              => __( 'The Fallen Archives', 'exonym' ),
		'attributes'            => __( 'Fallen Attributes', 'exonym' ),
		'parent_item_colon'     => __( 'Parent Fallen:', 'exonym' ),
		'all_items'             => __( 'All Fallen Firefighters', 'exonym' ),
		'add_new_item'          => __( 'Add New Fallen', 'exonym' ),
		'add_new'               => __( 'Add New', 'exonym' ),
		'new_item'              => __( 'New Fallen', 'exonym' ),
		'edit_item'             => __( 'Edit Firefighter', 'exonym' ),
		'update_item'           => __( 'Update Event', 'exonym' ),
		'view_item'             => __( 'View Fallen', 'exonym' ),
		'view_items'            => __( 'View The Fallen', 'exonym' ),
		'search_items'          => __( 'Search Fallen', 'exonym' ),
		'not_found'             => __( 'Not found', 'exonym' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'exonym' ),
		'featured_image'        => __( 'Photo', 'exonym' ),
		'set_featured_image'    => __( 'Set photo', 'exonym' ),
		'remove_featured_image' => __( 'Remove photo', 'exonym' ),
		'use_featured_image'    => __( 'Use as photo', 'exonym' ),
		'insert_into_item'      => __( 'Insert into Fallen', 'exonym' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Firefighter', 'exonym' ),
		'items_list'            => __( 'The Fallen list', 'exonym' ),
		'items_list_navigation' => __( 'The Fallen list navigation', 'exonym' ),
		'filter_items_list'     => __( 'Filter The Fallen list', 'exonym' ),
	);
	$args = array(
		'label'                 => __( 'Fallen', 'exonym' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-heart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => 'the-fallen',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'fallen', $args );

}
add_action( 'init', 'cpt_fallen', 0 );


// TYPE: Sponsors
function cpt_sponsor() {

	$labels = array(
		'name'                  => _x( 'Sponsors', 'Post Type General Name', 'exonym' ),
		'singular_name'         => _x( 'Sponsor', 'Post Type Singular Name', 'exonym' ),
		'menu_name'             => __( 'Sponsors', 'exonym' ),
		'name_admin_bar'        => __( 'Sponsor', 'exonym' ),
		'archives'              => __( 'Sponsors Archives', 'exonym' ),
		'attributes'            => __( 'Sponsor Attributes', 'exonym' ),
		'parent_item_colon'     => __( 'Parent Sponsor:', 'exonym' ),
		'all_items'             => __( 'All Sponsors', 'exonym' ),
		'add_new_item'          => __( 'Add New Sponsor', 'exonym' ),
		'add_new'               => __( 'Add New', 'exonym' ),
		'new_item'              => __( 'New Sponsor', 'exonym' ),
		'edit_item'             => __( 'Edit Sponsor', 'exonym' ),
		'update_item'           => __( 'Update Sponsor', 'exonym' ),
		'view_item'             => __( 'View Sponsor', 'exonym' ),
		'view_items'            => __( 'View Sponsors', 'exonym' ),
		'search_items'          => __( 'Search Sponsor', 'exonym' ),
		'not_found'             => __( 'Not found', 'exonym' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'exonym' ),
		'featured_image'        => __( 'Logo', 'exonym' ),
		'set_featured_image'    => __( 'Set logo', 'exonym' ),
		'remove_featured_image' => __( 'Remove logo', 'exonym' ),
		'use_featured_image'    => __( 'Use as logo', 'exonym' ),
		'insert_into_item'      => __( 'Insert into Sponsor', 'exonym' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Sponsor', 'exonym' ),
		'items_list'            => __( 'Sponsors list', 'exonym' ),
		'items_list_navigation' => __( 'Sponsors list navigation', 'exonym' ),
		'filter_items_list'     => __( 'Filter Sponsors list', 'exonym' ),
	);
	$args = array(
		'label'                 => __( 'Sponsor', 'exonym' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'sponsor', $args );

}
add_action( 'init', 'cpt_sponsor', 0 );


// TYPE: Staff
function cpt_staff() {

	$labels = array(
		'name'                  => _x( 'Staff', 'Post Type General Name', 'exonym' ),
		'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'exonym' ),
		'menu_name'             => __( 'Staff', 'exonym' ),
		'name_admin_bar'        => __( 'Staff', 'exonym' ),
		'archives'              => __( 'Staff Archives', 'exonym' ),
		'attributes'            => __( 'Staff Attributes', 'exonym' ),
		'parent_item_colon'     => __( 'Parent Staff:', 'exonym' ),
		'all_items'             => __( 'All Staff', 'exonym' ),
		'add_new_item'          => __( 'Add New Staff', 'exonym' ),
		'add_new'               => __( 'Add New', 'exonym' ),
		'new_item'              => __( 'New Staff', 'exonym' ),
		'edit_item'             => __( 'Edit Staff', 'exonym' ),
		'update_item'           => __( 'Update Staff', 'exonym' ),
		'view_item'             => __( 'View Staff', 'exonym' ),
		'view_items'            => __( 'View Staff', 'exonym' ),
		'search_items'          => __( 'Search Staff', 'exonym' ),
		'not_found'             => __( 'Not found', 'exonym' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'exonym' ),
		'featured_image'        => __( 'Photo', 'exonym' ),
		'set_featured_image'    => __( 'Set photo', 'exonym' ),
		'remove_featured_image' => __( 'Remove photo', 'exonym' ),
		'use_featured_image'    => __( 'Use as photo', 'exonym' ),
		'insert_into_item'      => __( 'Insert into Staff', 'exonym' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Staff', 'exonym' ),
		'items_list'            => __( 'Staff list', 'exonym' ),
		'items_list_navigation' => __( 'Staff list navigation', 'exonym' ),
		'filter_items_list'     => __( 'Filter Staff list', 'exonym' ),
	);
	$args = array(
		'label'                 => __( 'Staff', 'exonym' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array( 'staff_types' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'staff', $args );

}
add_action( 'init', 'cpt_staff', 0 );


// TAXONOMY: Staff Types
function ctax_staff() {

	$labels = array(
		'name'                       => _x( 'Staff Types', 'Taxonomy General Name', 'exonym' ),
		'singular_name'              => _x( 'Staff Type', 'Taxonomy Singular Name', 'exonym' ),
		'menu_name'                  => __( 'Staff Types', 'exonym' ),
		'all_items'                  => __( 'All Staff Types', 'exonym' ),
		'parent_item'                => __( 'Parent Staff Type', 'exonym' ),
		'parent_item_colon'          => __( 'Parent Staff Type:', 'exonym' ),
		'new_item_name'              => __( 'New Staff Type Name', 'exonym' ),
		'add_new_item'               => __( 'Add New Staff Type', 'exonym' ),
		'edit_item'                  => __( 'Edit Staff Type', 'exonym' ),
		'update_item'                => __( 'Update Staff Type', 'exonym' ),
		'view_item'                  => __( 'View Staff Type', 'exonym' ),
		'separate_items_with_commas' => __( 'Separate Staff Type with commas', 'exonym' ),
		'add_or_remove_items'        => __( 'Add or remove Staff Types', 'exonym' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'exonym' ),
		'popular_items'              => __( 'Popular Staff Types', 'exonym' ),
		'search_items'               => __( 'Search Staff Types', 'exonym' ),
		'not_found'                  => __( 'Not Found', 'exonym' ),
		'no_terms'                   => __( 'No Staff Types', 'exonym' ),
		'items_list'                 => __( 'Staff Types list', 'exonym' ),
		'items_list_navigation'      => __( 'Staff Types list navigation', 'exonym' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => false,
	);
	register_taxonomy( 'staff_types', array( 'staff' ), $args );

}
add_action( 'init', 'ctax_staff', 0 );


// ADMIN: Change "Enter Title Here" text for each post type
function ex_change_title_text($title) {
  $screen = get_current_screen();
  if('resource' == $screen->post_type) {
    $title = 'Enter program name or reference topic';
  } elseif('event' == $screen->post_type) {
    $title = 'Enter the name of the event';
  } elseif('fallen' == $screen->post_type) {
    $title = 'Enter the name of the fallen firefighter';
  } elseif('sponsor' == $screen->post_type) {
    $title = 'Enter the name of the sponsor';
  } elseif('staff' == $screen->post_type) {
    $title = 'Enter the name of the staff member';
  }
  return $title;
}
add_filter('enter_title_here', 'ex_change_title_text');


// ADMIN: 52 Club - Custom Columns
add_filter('manage_52club_posts_columns', 'set_custom_edit_52club_columns');
function set_custom_edit_52club_columns($columns) {
  unset($columns['title']);
  unset($columns['date']);
  $columns['year'] = __('Year', 'exonym');
  $columns['type'] = __('Type', 'exonym');
  $columns['entries'] = __('Entry Count', 'exonym');
  return $columns;
}
add_action('manage_52club_posts_custom_column' , 'custom_52club_column', 10, 2);
function custom_52club_column($column, $post_id) {
  switch($column) {
    case 'year':
      echo '<a href="' . get_edit_post_link($post_id) . '"><strong>' . get_field('year', $post_id) . '</strong></a>';
      break;
    case 'type':
      the_field('type', $post_id);
      break;
    case 'entries':
      $list = get_field('list', $post_id);
      echo (substr_count($list, '<br />') + 1);
      break;
  }
}


// ADMIN: Events - Custom Columns
add_filter('manage_event_posts_columns', 'set_custom_edit_event_columns');
function set_custom_edit_event_columns($columns) {
  unset($columns['date']);
  $columns['event_date'] = __('Event Date', 'exonym');
  $columns['flyer'] = __('Flyer', 'exonym');
  return $columns;
}
add_action('manage_event_posts_custom_column' , 'custom_event_column', 10, 2);
function custom_event_column($column, $post_id) {
  switch($column) {
    case 'event_date':
      $date = new DateTime(get_field('event_date', false));
      echo $date->format('M jS, Y - g:ia');
      break;
    case 'flyer':
      the_post_thumbnail('thumbnail');
      break;
  }
}

function change_order_for_events( $query ) {
  if ( $query->is_main_query() && is_post_type_archive('event') ) {
    $query->set( 'meta_key', 'event_date' );
    $query->set( 'meta_type', 'DATETIME' );
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'order', 'DESC' );
  }
}
add_action('pre_get_posts', 'change_order_for_events');


// ADMIN: Staff - Custom Columns
add_filter('manage_staff_posts_columns', 'set_custom_edit_staff_columns');
function set_custom_edit_staff_columns($columns) {
  unset($columns['date']);
  $columns['position'] = __('Position', 'exonym');
  $columns['photo'] = __('Photo', 'exonym');
  return $columns;
}
add_action('manage_staff_posts_custom_column' , 'custom_staff_column', 10, 2);
function custom_staff_column($column, $post_id) {
  switch($column) {
    case 'photo':
      if(has_post_thumbnail()) {
        the_post_thumbnail('thumbnail');
      } else {
        echo '<em>No Photo</em>';
      }
      break;
    case 'position':
      the_field('position');
      break;
  }
}


// ADMIN: Sponsors - Custom Columns
add_filter('manage_sponsor_posts_columns', 'set_custom_edit_sponsor_columns');
function set_custom_edit_sponsor_columns($columns) {
  unset($columns['date']);
  $columns['logo'] = __('Logo', 'exonym');
  $columns['status'] = __('Status', 'exonym');
  return $columns;
}
add_action('manage_sponsor_posts_custom_column' , 'custom_sponsor_column', 10, 2);
function custom_sponsor_column($column, $post_id) {
  switch($column) {
    case 'logo':
      the_post_thumbnail('small');
      break;
    case 'status':
      if(get_field('active')) {
        echo '<strong>Active Sponsor</strong>';
      } else {
        echo '<em>Inactive></em>';
      }
  }
}
