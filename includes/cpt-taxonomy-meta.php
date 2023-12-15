<?php 


function custom_taxonomy_course_type()
{
    $labels = array(
        'name'              => _x('Course Types', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Course Type', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Course Types', 'textdomain'),
        'all_items'         => __('All Course Types', 'textdomain'),
        'parent_item'       => __('Parent Course Type', 'textdomain'),
        'parent_item_colon' => __('Parent Course Type:', 'textdomain'),
        'edit_item'         => __('Edit Course Type', 'textdomain'),
        'update_item'       => __('Update Course Type', 'textdomain'),
        'add_new_item'      => __('Add New Course Type', 'textdomain'),
        'new_item_name'     => __('New Course Type Name', 'textdomain'),
        'menu_name'         => __('Course Type', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true, // Set to true if you want it to behave like categories, false for tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'course-type'),
        'show_in_menu'      => true,
    );

    // Replace 'course' with the name of your custom post type
    register_taxonomy('course-type', 'course', $args);
}

add_action('init', 'custom_taxonomy_course_type');




// Add this code to your theme's functions.php file or in a custom plugin

function custom_taxonomy_course_language()
{
    $labels = array(
        'name'              => _x('Course Languages', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Course Language', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Course Languages', 'textdomain'),
        'all_items'         => __('All Course Languages', 'textdomain'),
        'parent_item'       => __('Parent Course Language', 'textdomain'),
        'parent_item_colon' => __('Parent Course Language:', 'textdomain'),
        'edit_item'         => __('Edit Course Language', 'textdomain'),
        'update_item'       => __('Update Course Language', 'textdomain'),
        'add_new_item'      => __('Add New Course Language', 'textdomain'),
        'new_item_name'     => __('New Course Language Name', 'textdomain'),
        'menu_name'         => __('Course Language', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true, // Set to true if you want it to behave like categories, false for tags
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'course-language'),
        'show_in_menu'      => true,
    );

    // Replace 'course' with the name of your custom post type
    register_taxonomy('course-language', 'course', $args);
}

add_action('init', 'custom_taxonomy_course_language');






// Register Careers Custom Post Type
function custom_post_type_careers() {

    $labels = array(
        'name'                  => _x( 'Careers', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Career', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Careers', 'text_domain' ),
        'name_admin_bar'        => __( 'Career', 'text_domain' ),
        'archives'              => __( 'Career Archives', 'text_domain' ),
        'attributes'            => __( 'Career Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Career:', 'text_domain' ),
        'all_items'             => __( 'All Careers', 'text_domain' ),
        'add_new_item'          => __( 'Add New Career', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Career', 'text_domain' ),
        'edit_item'             => __( 'Edit Career', 'text_domain' ),
        'update_item'           => __( 'Update Career', 'text_domain' ),
        'view_item'             => __( 'View Career', 'text_domain' ),
        'view_items'            => __( 'View Careers', 'text_domain' ),
        'search_items'          => __( 'Search Career', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into Career', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Career', 'text_domain' ),
        'items_list'            => __( 'Careers list', 'text_domain' ),
        'items_list_navigation' => __( 'Careers list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter Careers list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Career', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'career-cat' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'careers', $args );

}
add_action( 'init', 'custom_post_type_careers', 0 );

// Register Careers Custom Taxonomy
function custom_taxonomy_career_categories() {

    $labels = array(
        'name'                       => _x( 'Career Categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Career Category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Career Category', 'text_domain' ),
        'all_items'                  => __( 'All Career Categories', 'text_domain' ),
        'parent_item'                => __( 'Parent Career Category', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Career Category:', 'text_domain' ),
        'new_item_name'              => __( 'New Career Category Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Career Category', 'text_domain' ),
        'edit_item'                  => __( 'Edit Career Category', 'text_domain' ),
        'update_item'                => __( 'Update Career Category', 'text_domain' ),
        'view_item'                  => __( 'View Career Category', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Career Categories with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Career Categories', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Career Categories', 'text_domain' ),
        'search_items'               => __( 'Search Career Categories', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Career Categories list', 'text_domain' ),
        'items_list_navigation'      => __( 'Career Categories list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'career-cat', array( 'careers' ), $args );

}
add_action( 'init', 'custom_taxonomy_career_categories', 0 );