<?php
//dashboard custom functions included 
require get_stylesheet_directory() . '/classes/AjaxHandler.php';

require_once get_stylesheet_directory() . '/dashboard/dashboard-functions.php';

// Custom post type, taxonomy and metabox
include_once 'includes/cpt-taxonomy-meta.php';

//Sliders
include_once 'includes/sliders/customCarousels.php';

//Social Shares
include_once 'includes/socials/socialShare.php';

// to Display ads or not
include_once 'includes/subscriptionAndPurchase/subscriptionAndPurchaseCheck.php';

if (!defined('VIBE_URL'))
    define('VIBE_URL', get_template_directory_uri());



function enqueue_child_theme_styles()
{
    // Enqueue parent theme stylesheet
    wp_enqueue_style('common-style', get_stylesheet_directory_uri() . '/assets/css/common.css', array(), time());
    wp_enqueue_style('custom-header-style', get_stylesheet_directory_uri() . '/assets/css/custom-header.css', array(), time());
    wp_enqueue_style('adam-blog-style', get_stylesheet_directory_uri() . '/assets/css/blog-archive-singleblog.css', array(), time());
    wp_enqueue_style('adam-singleCourse-style', get_stylesheet_directory_uri() . '/assets/css/singleCourseCss.css', array(), time());

    wp_enqueue_style('adam-singleCareer-style', get_stylesheet_directory_uri() . '/assets/css/careerSingle.css', array(), time());
    wp_enqueue_style('adam-catCareer-style', get_stylesheet_directory_uri() . '/assets/css/careerCat.css', array(), time());
    wp_enqueue_style('adam-allCareers-style', get_stylesheet_directory_uri() . '/assets/css/allCareers.css', array(), time());
    wp_enqueue_style('adam-checkout-style', get_stylesheet_directory_uri() . '/assets/css/checkout.css', array(), time());

    wp_enqueue_style('owl.theme.default', get_stylesheet_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), time());
    wp_enqueue_style('owl.carousel.min', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), time());

    wp_enqueue_script('jquery-min-custom', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', array(), '3.3', true);
    wp_enqueue_script('custom-header', get_stylesheet_directory_uri() . '/assets/js/custom-header.js', array('jquery', 'mCustomScrollbar'),  '1.1', true);

    //by Shoive start
    wp_enqueue_script('owl-carousle-js', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '3.7', true);
    wp_enqueue_script('course-single-page-js', get_stylesheet_directory_uri() . '/assets/js/singleCourseOwlCarousel.js', array('jquery', 'owl-carousle-js'), '1.25', true);

    if (is_post_type_archive('careers') || is_tax('career-cat')) {
        wp_enqueue_script('allCareer-page-js', get_stylesheet_directory_uri() . '/assets/js/attributeSearchAllCareer.js', array('jquery', 'owl-carousle-js'), '1.23', true);

        if (is_tax('career-cat')) {
            wp_enqueue_script('CareerTax-page-js', get_stylesheet_directory_uri() . '/assets/js/attributeSearchCareersTax.js', array('jquery', 'owl-carousle-js'), '1.23', true);
        }
    }
    //by Shoive end
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_child_theme_styles');





//add_action('wp_ajax_get_courses_ajax', 'get_courses_ajax');
//add_action('wp_ajax_nopriv_get_courses_ajax', 'get_courses_ajax');
//function get_courses_ajax() {
//	$data = $_POST;
//	// Assuming you have a class called AllCourse with a GetAjaxData method
//	require_once get_stylesheet_directory().'/classes/AllCourse.php';
//	$all_course = new AllCourse();
//	$output = $all_course->GetAjaxData($data);
//	echo $output;
//	wp_die();
//}

// Add this code to your theme's functions.php file or in a custom plugin
// Add this code to your theme's functions.php file or in a custom plugin




// Add custom product field with pricing to Gravity Form
function add_custom_product_field($form)
{
    // Check if the form has the product field
    $has_product_field = false;

    foreach ($form['fields'] as $field) {
        if ($field['type'] == 'product') {
            $has_product_field = true;
            break;
        }
    }

    // If the form has a product field, add the custom field with pricing
    if ($has_product_field) {
        $form['fields'][] = array(
            'id'          => 1000, // Choose a unique field ID
            'label'       => 'Certificate Type',
            'type'        => 'radio', // Change the field type as needed
            'choices'     => array(
                array(
                    'text'  => 'Digital Certificate',
                    'value' => 'digital',
                    'price' => 11.99,
                ),
                array(
                    'text'  => 'Framed Certificate',
                    'value' => 'framed',
                    'price' => 47.99,
                ),
                array(
                    'text'  => 'Hardcopy Certificate',
                    'value' => 'hardcopy',
                    'price' => 29.99,
                ),
            ),
            'formId'      => $form['id'],
            'pageNumber'  => 1,
            'isRequired'  => true,
        );
    }

    return $form;
}
add_filter('gform_pre_render', 'add_custom_product_field');

// Save selected certificate type and price after form submission
function save_certificate_type_and_price($entry, $form)
{
    $certificate_type = rgar($entry, '1000'); // Use the ID assigned to the custom product field
    $certificate_price = gform_get_meta($entry['id'], 'certificate_price');

    // Perform actions with the certificate type and price (e.g., save to database)
    // Example: update_post_meta($entry['post_id'], '_certificate_type', $certificate_type);
    // Example: update_post_meta($entry['post_id'], '_certificate_price', $certificate_price);
}
add_action('gform_after_submission', 'save_certificate_type_and_price', 10, 2);

// Calculate and set the price for the selected certificate type
function set_certificate_price($price, $form, $field, $entry, $product_id)
{
    $certificate_type = rgpost("input_{$field['id']}");

    // Set the price based on the selected certificate type
    switch ($certificate_type) {
        case 'digital':
            $price = 11.99;
            break;
        case 'framed':
            $price = 47.99;
            break;
        case 'hardcopy':
            $price = 29.99;
            break;
        default:
            $price = 0.00;
    }

    // Save the price as entry meta for later use (e.g., in the confirmation email)
    gform_update_meta($entry['id'], 'certificate_price', $price);

    return $price;
}
add_filter('gform_product_info_1', 'set_certificate_price', 10, 5);
