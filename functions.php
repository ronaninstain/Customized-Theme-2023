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


    wp_enqueue_script('jquery');

    // added by fayez ali
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'),  time());

    wp_enqueue_script('mCustomScrollbar', get_stylesheet_directory_uri() . '/assets/js/mCustomScrollbar.concat.min.js', array('jquery'), '1.0', true);



    wp_enqueue_script('custom-header', get_stylesheet_directory_uri() . '/assets/js/custom-header.js', array('jquery', 'mCustomScrollbar'),  '1.1', true);

    wp_enqueue_script('jquery-min-custom', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', array(), '3.3');


    wp_enqueue_script('owl-carousle-js', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '3.7');
    wp_enqueue_script('course-single-page-js', get_stylesheet_directory_uri() . '/assets/js/singleCourseOwlCarousel.js', array('jquery', 'owl-carousle-js'), time());
    wp_enqueue_script('allCareer-page-js', get_stylesheet_directory_uri() . '/assets/js/attributeSearchAllCareer.js', array('jquery', 'owl-carousle-js'), time());
}
add_action('wp_enqueue_scripts', 'enqueue_child_theme_styles');