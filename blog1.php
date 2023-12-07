<?php

/**
 * Template Name: Blog 1
 */
if (!defined('ABSPATH')) exit;
get_header(vibe_get_header());
$page_id = get_the_ID();
?>

<section class="blogSectionTop">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h2>Latest News</h2>
                <p>We’re on a mission to deliver engaging, curated courses at a reasonable price.</p>
            </div>
        </div>
    </div>
</section>

<section class="blogSectionMiddle">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col xs-12">
                <div class="theBlogContentBox">
                    <div class="row">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 9,
                            'paged' => $paged
                        );

                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            $blogID = get_the_ID();
                        ?>


                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="theSingleBox">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url($blogID, 'small'); ?>" alt="blogImg"></a>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                            </div>


                        <?php
                        endwhile;
                        wp_reset_postdata();

                        ?>
                    </div>

                    <!-- Pagination -->
                    <div class="paginationadamsblog">
                        <?php
                        echo paginate_links(array(
                            'total' => $loop->max_num_pages,
                            'prev_text' => __('<'),
                            'next_text' => __('>'),
                        ));
                        ?>
                    </div>
                    <!-- End Pagination -->

                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="newSideBarDiv">
                    <div class="blogCategories">
                        <?php
                        $categories = get_categories(array(
                            'post_type' => 'post',
                            'orderby' => 'name',
                            'order'   => 'ASC'
                        ));
                        ?>
                        <h2>Categories</h2>
                        <ul>
                            <?php
                            foreach ($categories as $category) {
                            ?>
                                <li><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>

                    <hr>

                    <div class="recentBlogs">
                        <h2>Recent Posts</h2>
                        <?php
                        $recent_args = array(
                            'post_type' => 'post',
                            "posts_per_page" => 5,
                            "orderby"        => "date",
                            "order"          => "DESC"
                        );
                        $recent_posts = new WP_Query($recent_args);

                        while ($recent_posts->have_posts()) : $recent_posts->the_post();
                            $blogID = get_the_ID();
                        ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url($blogID, 'small'); ?>" alt="recentblogs">
                                <div class="informationdive">
                                    <h6><?php the_title(); ?></h6>
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                            </a>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer(vibe_get_footer());
?>