<?php

if (!defined('ABSPATH')) exit;

get_header(vibe_get_header());


$blogId = get_the_ID();
$breadcrumbs = get_post_meta($blogId, 'vibe_breadcrumbs', true);
?>
<section class="singleBlogTop">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php if (!isset($breadcrumbs) || !$breadcrumbs || vibe_validate($breadcrumbs)) {
                    vibe_breadcrumbs();
                } ?>
            </div>
        </div>
    </div>
</section>


<section class="blogTitle">
    <div class="row">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h2><?php the_title(); ?></h2>
                <span class="blogPublishDate"><?php echo get_the_date(); ?> | <?php echo get_comments_number(); ?></span>
            </div>
        </div>
    </div>
</section>


<section class="blogSectionMiddle">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="postContent">
                    <div class="theBlogAvatar">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <?php the_content(); ?>
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