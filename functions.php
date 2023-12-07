<?php

//Sliders
include_once 'includes/sliders/customCarousels.php';

if (!defined('VIBE_URL'))
    define('VIBE_URL', get_template_directory_uri());



function enqueue_child_theme_styles()
{
    // Enqueue parent theme stylesheet
    wp_enqueue_style('common-style', get_stylesheet_directory_uri() . '/assets/css/common.css', array(), time());
    wp_enqueue_style('custom-header-style', get_stylesheet_directory_uri() . '/assets/css/custom-header.css', array(), time());
    wp_enqueue_style('adam-blog-style', get_stylesheet_directory_uri() . '/assets/css/blog-archive-singleblog.css', array(), time());
    wp_enqueue_style('adam-singleCourse-style', get_stylesheet_directory_uri() . '/assets/css/singleCourseCss.css', array(), time());

    wp_enqueue_style('owl.theme.default', get_stylesheet_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), time());
    wp_enqueue_style('owl.carousel.min', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), time());


    wp_enqueue_script('jquery');



    wp_enqueue_script('jquery-min-custom', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', array(), '3.3');


    wp_enqueue_script('owl-carousle-js', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '3.7');
    wp_enqueue_script('course-single-page-js', get_stylesheet_directory_uri() . '/assets/js/singleCourseOwlCarousel.js', array('jquery', 'owl-carousle-js'), time());
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
