<?php

/* Related Courses short-code by Shoive Start */

function sh_23_singleCourse_add_related_course_for_single_course()
{
    $currentID = get_queried_object_id();

    $current_course_terms = get_the_terms($currentID, 'course-cat');

    $current_course_term_ids = array();

    if ($current_course_terms) {
        foreach ($current_course_terms as $term) {
            $current_course_term_ids[] = $term->term_id;
        }
    }

    $args = array(
        'post_type' => 'course',
        'posts_per_page' => 5,
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
            array(
                'taxonomy' => 'course-cat',
                'field' => 'id',
                'terms' => $current_course_term_ids,
            ),
        ),
    );

    $related_courses_query = new WP_Query($args);

    if ($related_courses_query->have_posts()) {
        echo '<div class="srs_slider_parent">';
        echo '<div class="owl-carousel srs_trending_course_sliderSingleCourse owl-theme">';
        while ($related_courses_query->have_posts()) {
            $related_courses_query->the_post();
?>
            <?php
            $courseID = get_the_ID();
            $courseStudents = get_post_meta($courseID, 'vibe_students', true);
            $units = bp_course_get_curriculum_units($courseID);
            $courseImage = get_the_post_thumbnail_url($courseID, 'medium');
            $courseLink = get_the_permalink($courseID);
            ?>
            <div class="item">
                <div style="background-image: url(<?php echo $courseImage; ?>);" class="srs_first_parent_div">
                    <div class="srs_badge">
                        <span>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/all-course/certificate.png' ?>" alt="cert">
                        </span>
                        <p>Certificate</p>
                    </div>
                    <div class="srs_second-parent_div">
                        <div class="srs_content_div_parent">
                            <div></div>
                            <div class="srs_content_div">
                                <div class="srs_content_line"></div>
                                <h6><a href="<?php echo $courseLink; ?>"><?php bp_course_name(); ?></a></h6>
                                <div class="srs_content_div_last">
                                    <span>
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/all-course/book.png' ?>" alt="book">
                                        <span><?php echo count($units); ?></span>
                                        <span>Lessons</span>
                                    </span>
                                    <span>
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/all-course/students.png' ?>" alt="std">
                                        <span><?php echo $courseStudents; ?></span>
                                        <span>Students</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        echo '</div>';
        echo '</div>';
        wp_reset_query();
    } else {
        echo 'No course found';
    }
}
add_shortcode('related_course', 'sh_23_singleCourse_add_related_course_for_single_course');

/* Related Courses short-code by Shoive End */

/* Tabs course slider start shoive */

function sh_23_tabSlider_course($atts)
{
    $course_id = $atts['courseid'];

    $currentID = get_queried_object_id();

    $current_course_terms = get_the_terms($currentID, 'course-cat');

    $current_course_term_ids = array();

    if ($current_course_terms) {
        foreach ($current_course_terms as $term) {
            $current_course_term_ids[] = $term->term_id;
        }
    }

    if (!empty($course_id)) {
        $course_ids = $course_id;
        $course_ids = (explode(",", $course_ids));

        $c_id = array();

        if ($course_ids) {
            foreach ($course_ids as $course_id) {
                $c_id[] = $course_id;
            }
        }

        $args = array(
            'post_type' => 'course',
            'posts_per_page' => 3,
            'post__in' => $c_id
        );
    } else {
        $args = array(
            'post_type' => 'course',
            'posts_per_page' => 5,
            'post__not_in' => array(get_the_ID()),
            'tax_query' => array(
                array(
                    'taxonomy' => 'course-cat',
                    'field' => 'id',
                    'terms' => $current_course_term_ids,
                ),
            ),
        );
    }

    $related_courses_query = new WP_Query($args);

    if ($related_courses_query->have_posts()) {
        echo '<div class="srs_slider_parent">';
        echo '<div class="owl-carousel srs_trending_course_slider owl-theme">';
        while ($related_courses_query->have_posts()) {
            $related_courses_query->the_post();
        ?>
            <?php
            $courseID = get_the_ID();
            $courseStudents = get_post_meta($courseID, 'vibe_students', true);
            $units = bp_course_get_curriculum_units($courseID);
            $courseImage = get_the_post_thumbnail_url($courseID, 'medium');
            $courseLink = get_the_permalink($courseID);
            ?>
            <div class="item">
                <div style="background-image: url(<?php echo $courseImage; ?>);" class="srs_first_parent_div">
                    <div class="srs_badge">
                        <span>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/all-course/certificate.png' ?>" alt="cert">
                        </span>
                        <p>Certificate</p>
                    </div>
                    <div class="srs_second-parent_div">
                        <div class="srs_content_div_parent">
                            <div></div>
                            <div class="srs_content_div">
                                <div class="srs_content_line"></div>
                                <h6><a href="<?php echo $courseLink; ?>"><?php bp_course_name(); ?></a></h6>
                                <div class="srs_content_div_last">
                                    <span>
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/all-course/book.png' ?>" alt="book">
                                        <span><?php echo count($units); ?></span>
                                        <span>Lessons</span>
                                    </span>
                                    <span>
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/all-course/students.png' ?>" alt="std">
                                        <span><?php echo $courseStudents; ?></span>
                                        <span>Students</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        echo '</div>';
        echo '</div>';
        wp_reset_query();
    } else {
        echo 'No course found';
    }
}
add_shortcode('tabSliderCourses', 'sh_23_tabSlider_course');

/* Tabs course slider end shoive */

/* review courses slider start shoive */

function sh_23_reviewSlider_course($atts)
{
    $course_id = $atts['courseid'];

    $currentID = get_queried_object_id();

    $current_course_terms = get_the_terms($currentID, 'course-cat');

    $current_course_term_ids = array();

    if ($current_course_terms) {
        foreach ($current_course_terms as $term) {
            $current_course_term_ids[] = $term->term_id;
        }
    }

    if (!empty($course_id)) {
        $course_ids = $course_id;
        $course_ids = (explode(",", $course_ids));

        $c_id = array();

        if ($course_ids) {
            foreach ($course_ids as $course_id) {
                $c_id[] = $course_id;
            }
        }

        $args = array(
            'post_type' => 'course',
            'posts_per_page' => 3,
            'post__in' => $c_id
        );
    } else {
        $args = array(
            'post_type' => 'course',
            'posts_per_page' => 5,
            'post__not_in' => array(get_the_ID()),
            'tax_query' => array(
                array(
                    'taxonomy' => 'course-cat',
                    'field' => 'id',
                    'terms' => $current_course_term_ids,
                ),
            ),
        );
    }

    $related_courses_query = new WP_Query($args);

    if ($related_courses_query->have_posts()) {
        ?>
        <?php
        echo '<div class="srs_best_reviewed_slider">';
        echo '<div class="owl-carousel srs_best_review_owl-carousel owl-theme">';

        while ($related_courses_query->have_posts()) {
            $related_courses_query->the_post();
        ?>
            <?php
            $courseID = get_the_ID();
            $courseStudents = get_post_meta($courseID, 'vibe_students', true);
            $units = bp_course_get_curriculum_units($courseID);
            $duration = $total_duration = 0;
            $curriculums = bp_course_get_curriculum($courseID);

            foreach ($units as $unit) {

                $duration = get_post_meta($unit, 'vibe_duration', true);

                if (empty($duration)) {
                    $duration = 0;
                }

                if (get_post_type($unit) == 'unit') {
                    $unit_duration_parameter = apply_filters('vibe_unit_duration_parameter', 60, $unit);
                } elseif (get_post_type($unit) == 'quiz') {

                    $unit_duration_parameter = apply_filters('vibe_quiz_duration_parameter', 60, $unit);
                }
                $total_duration =  $total_duration + $duration * $unit_duration_parameter;
            }

            $courseDuration =  tofriendlytime(($total_duration));
            $average_rating = get_post_meta($courseID, 'average_rating', true);
            $countRating = get_post_meta($courseID, 'rating_count', true);
            $courseImage = get_the_post_thumbnail_url($courseID, 'medium');
            $courseLink = get_the_permalink($courseID);
            ?>


            <div class="item">
                <div style="background-image: url(<?php echo $courseImage; ?>);" class="srs_first_parent_div">

                    <div class="srs_badge">
                        <span>
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/all-course/certificate.png' ?>" alt="" />
                        </span>
                        <p>Certificate</p>
                    </div>
                    <div class="srs_second-parent_div">
                        <div class="srs_content_div_parent">
                            <div></div>
                            <div class="srs_content_div">
                                <div class="rating_sh_content">
                                    <div class="theStars">
                                        <div class="sh_rating">
                                            <div class="sh_rating-upper" style="width:<?php echo $average_rating ? 20 * $average_rating : 0; ?>%">
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                            </div>
                                            <div class="sh_rating-lower">
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                                <span>★</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="theCounts">
                                        <span>(<?php echo $countRating . ' Reviews'; ?>)</span>
                                    </div>
                                </div>
                                <h6><a href="<?php echo $courseLink; ?>"><?php bp_course_name(); ?></a></h6>
                                <div class="srs_content_div_last">
                                    <span>
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/all-course/book.png' ?>" alt="lesson" />
                                        <span><?php echo count($units); ?></span>
                                        <span>Lessons</span>
                                    </span>
                                    <span>
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/all-course/time.png' ?>" alt="time" />
                                        <span>
                                            <?php echo $courseDuration; ?>
                                        </span>
                                    </span>
                                    <span>
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/all-course/students.png' ?>" alt="std" />
                                        <span><?php echo $courseStudents; ?></span>
                                        <span>Students</span>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
        echo '</div>';
        echo '</div>';
        wp_reset_query();
    } else {
        echo 'No course found';
    }
}
add_shortcode('reviewSliderCourses', 'sh_23_reviewSlider_course');

/* review courses slider end shoive */
