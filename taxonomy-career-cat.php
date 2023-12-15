<?php get_header(vibe_get_header()); ?>
<!-- breadcrumbs section start  -->
<div class="a2n-breadcrumbs_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="a2n-breadcrumbs_head">
                    <li><a class="active" href="<?php echo home_url(); ?>">Back to Home Page</a></li>
                    <li class="a2n-svg_icon"><svg class="a2nSvgIcon" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="NavigateNextIcon">
                            <path d="M10 6 8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                        </svg></li>
                    <li><a href="<?php echo home_url(); ?>/careers">Careers</a></li>
                    <li class="a2n-svg_icon"><svg class="a2nSvgIcon" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="NavigateNextIcon">
                            <path d="M10 6 8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                        </svg></li>
                    <li><a><?php single_term_title(); ?></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs section end  -->

<main class="a2n_sec-space">
    <div class="a2n_left-side">
        <!-- a2n Category slider section start  -->
        <div class="a2n_slider-sec">
            <!-- a2n similar card slider  -->
            <div class="a2n_cat-head">
                <div class="owl-carousel a2n-cat-card_slider owl-theme">
                    <?php
                    $taxonomy = 'career-cat';
                    $tax_terms = get_terms($taxonomy, array('hide_empty' => false));

                    foreach ($tax_terms as $term_single) {
                        $image_id = get_term_meta($term_single->term_id, 'image', true);
                        $image_url =  wp_get_attachment_image_url($image_id, 'medium');
                    ?>
                        <div class="item">
                            <!-- Category card start  -->
                            <a href="<?php echo esc_url(get_term_link($term_single)); ?>">
                                <div style="background-image: url(<?php echo esc_url($image_url); ?>);" class="a2n_cat-card">
                                    <div class="a2n_overlay-1"></div>
                                    <h6><?php echo esc_html($term_single->name); ?></h6>
                                </div>
                            </a>
                            <!-- Category card end  -->
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- a2n Category slider section end  -->

        <!-- search section start  -->
        <div class="a2n_search-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="a2n_search-content">
                            <h5><?php single_term_title(); ?></h5>
                            <p><?php the_content(); ?></p>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- search section end  -->

        <!-- Tab section start  -->
        <div class="a2n_tab-sec">
            <div class="container-fluid">
                <div class="a2n_tab-header">
                    <div class="a2n_tab-nav">
                        <span>View By:</span>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#home"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.00001 14.6667H10C13.3333 14.6667 14.6667 13.3333 14.6667 10V6.00001C14.6667 2.66668 13.3333 1.33334 10 1.33334H6.00001C2.66668 1.33334 1.33334 2.66668 1.33334 6.00001V10C1.33334 13.3333 2.66668 14.6667 6.00001 14.6667Z" stroke="#3C3F45" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M1.35333 5.66666H14.6667" stroke="#3C3F45" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M1.35333 10.3333H14.6667" stroke="#3C3F45" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5.67334 14.66V1.34" stroke="#3C3F45" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path d="M10.34 14.66V1.34" stroke="#3C3F45" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg></a>
                            </li>
                            <li><a data-toggle="tab" href="#menu1">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 3H14" stroke="#3C3F45" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M2 6.33334H14" stroke="#3C3F45" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path d="M2 9.66666H14" stroke="#3C3F45" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                        <path d="M2 13H14" stroke="#3C3F45" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a></li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="a2n_tab-container">
                            <?php if (have_posts()) : while (have_posts()) : the_post();
                            ?>
                                    <div class="a2n_tab-inner_card">
                                        <div class="a2n_similar-card">
                                            <div class="a2n_sm-img">
                                                <img alt="Picture of the author" sizes="100vw" src="<?php the_post_thumbnail(); ?>" />
                                            </div>
                                            <div class="a2n_card-bottom">
                                                <span class="a2n_sm-text"><?php the_title(); ?></span>
                                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.43 5.92999L20.5 12L14.43 18.07" stroke="#3C3F45" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M3.5 12H20.33" stroke="#3C3F45" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="a2n_sub-category-hover">
                                                    <div class="a2n_sub-items">
                                                        <h4><?php the_title(); ?></h4>
                                                        <article>
                                                            <?php the_content(); ?>
                                                        </article>
                                                    </div>
                                                    <div class="a2n_sub-bottom">
                                                        <h6>Read more</h6>
                                                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.43 5.92999L20.5 12L14.43 18.07" stroke="#002333" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M3.5 12H20.33" stroke="#002333" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                            endif; ?>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="a2n_tab-container">
                            <?php if (have_posts()) : while (have_posts()) : the_post();
                            ?>
                                    <div class="a2n_tab-inner_card_2">
                                        <div class="a2n_list-card">
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="a2n_list-card_container">
                                                    <div class="a2n_list-card_img">
                                                        <div class="a2n_overlay"></div>
                                                        <img sizes="100vw" src="<?php the_post_thumbnail(); ?>" />
                                                    </div>
                                                    <div class="a2n_tab-content">
                                                        <h6><?php the_title(); ?></h6>
                                                        <div class="a2n_tab-icon"><svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.43 5.92999L20.5 12L14.43 18.07" stroke="#3C3F45" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M3.5 12H20.33" stroke="#3C3F45" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab section end  -->
    </div>

    <div class="a2n_right-side"></div>
</main>

<?php get_footer(vibe_get_footer()); ?>