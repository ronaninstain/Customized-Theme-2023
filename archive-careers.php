<?php get_header(vibe_get_header()); ?>

<h1><?php single_term_title(); ?></h1>



<div class="srs_parent_body">

    <div class="srs_free_Career_courses">
        <h4>Free Online Career Courses</h4>
        <div class="srs_first_inner_box">
            <button><a href="">Enroll Today</a></button>
            <div class="srs_share_container">
                <p>Share:</p>
                <?php echo do_shortcode('[social_sharing]'); ?>
            </div>
        </div>

    </div>

    <div class="srs_input_of_view_courses">
        <div class="srs_input_icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 7H21" stroke="#002333" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M6 12H18" stroke="#002333" stroke-width="1.5" stroke-linecap="round"></path>
                <path d="M10 17H14" stroke="#002333" stroke-width="1.5" stroke-linecap="round"></path>
            </svg>
            <span>Explore</span>
        </div>
        <form>
            <input class="srs_input_field" type="text">
            <button class="srs_input_btn">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M22 22L20 20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </button>
        </form>
    </div>

    <div>
        <div class="srs_bottom_container">
            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                    $imageLink = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            ?>
                    <div class="srs_similar-card">
                        <div style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(<?php echo esc_url($imageLink); ?>); " class="a2n_sm-img">
                            <h6><?php the_title() ?></h6>
                        </div>

                        <a href="<?php the_permalink(); ?>">
                            <div class="a2n_sub-category-hover">

                                <h4><?php the_title(); ?></h4>
                                <article>
                                    <?php the_content(); ?>
                                </article>

                                <div class="a2n_sub-bottom">
                                    <h6>View Careers</h6>
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.43 5.92999L20.5 12L14.43 18.07" stroke="#002333" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M3.5 12H20.33" stroke="#002333" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>



    </div>
</div>




<?php get_footer(vibe_get_footer()); ?>