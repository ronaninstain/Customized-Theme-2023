<?php
get_header(vibe_get_header());
?>

<main class="a2n_sec-space">
    <div class="a2n_left-side">
        <!-- hero section start  -->
        <div class="a2n_hero-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row a2n_bg">
                            <div class="col-md-7">
                                <h3><?php the_title(); ?></h3>
                                <p>
                                    <?php the_content(); ?>
                                </p>
                                <div class="icon_container">
                                    <?php echo do_shortcode('[social_sharing]'); ?>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="a2n-hero_img">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail();
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero section end  -->

        <!-- salary section start  -->
        <div class="a2n_salary-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="a2n_salary-container col-md-5">
                        <h4>
                            What is the Average Annual Salary of '<?php the_title(); ?>'?
                        </h4><?php
                                if (!empty(get_field('usa_annual_salary')) && !empty(get_field('usa_annual_salary'))) {
                                ?>
                            <div class="a2n_salary-contents">
                                <div class="a2n_salary-items">
                                    <?php
                                    if (!empty(get_field('usa_annual_salary'))) {
                                    ?>
                                        <h5><?php echo esc_html(get_field('usa_annual_salary')); ?></h5>
                                        <div class="a2n_salary-inner_items">
                                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/countries/usa.webp' ?>" alt="usa" />
                                            <h5>USA</h5>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <?php
                                    if (!empty(get_field('uk_annual_salary'))) {
                                ?>
                                    <div class="a2n_salary-items">
                                        <h5><?php echo esc_html(get_field('uk_annual_salary')); ?></h5>
                                        <div class="a2n_salary-inner_items">
                                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/countries/uk.webp' ?>" alt="usa" />
                                            <h5>UK</h5>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                        <?php
                                }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- salary section end  -->

        <!-- srs slider section start  -->
        <div class="srs_slider-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="a2n_sec-title">
                            Interested in this Career? Enrol in these free courses and get
                            certifications!
                        </h4>
                        <?php
                        $courseIDS = get_field('courseid');
                        echo do_shortcode('[tabSliderCourses courseid=' . $courseIDS . ']');
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- srs slider section end  -->

        <!-- Tab section start  -->
        <div class="a2n-main_tab-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Explore Career</h3>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#tab1">Introduction</a>
                            </li>
                            <li><a data-toggle="tab" href="#tab2">Typical Job Responsibilities</a></li>
                            <li><a data-toggle="tab" href="#tab3">Standard Work Environment</a></li>
                            <li><a data-toggle="tab" href="#tab4">Projected Career Map</a></li>
                            <li><a data-toggle="tab" href="#tab5">Beneficial Professional Development</a></li>
                            <li><a data-toggle="tab" href="#tab6">Conclusion</a></li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content">
                            <?php

                            $intro =  get_field('introduction');
                            $typicalJobs =  get_field('typical_job_responsibilities');
                            $standardEnv =  get_field('standard_work_environment');
                            $projectCareerMap =  get_field('projected_career_map');
                            $BeneficaialProDev =  get_field('beneficial_professional_development');
                            $conclusion =  get_field('conclusion');

                            ?>
                            <div id="tab1" class="tab-pane fade in active">
                                <h3>Introduction</h3>
                                <div class="a2n-tab_container">
                                    <p class="a2n-tab_content">
                                    <div>
                                        <?php echo wp_kses_post($intro['content']); ?>
                                    </div>
                                    <div class="a2n-tab_bottom"><?php echo esc_attr($intro['highlighted_content_']); ?></div>
                                    </p>
                                </div>
                            </div>
                            <div id="tab2" class="tab-pane fade">
                                <h3>Typical Job Responsibilities</h3>
                                <div class="a2n-tab_container">
                                    <p class="a2n-tab_content">
                                    <div>
                                        <?php echo wp_kses_post($typicalJobs); ?>
                                    </div>
                                    </p>
                                </div>
                            </div>
                            <div id="tab3" class="tab-pane fade">
                                <h3>Standard Work Environment</h3>
                                <div class="a2n-tab_container">
                                    <p class="a2n-tab_content">
                                    <div>
                                        <?php echo wp_kses_post($standardEnv); ?>
                                    </div>
                                    </p>
                                </div>
                            </div>
                            <div id="tab4" class="tab-pane fade">
                                <h3>Projected Career Map</h3>
                                <div class="a2n-tab_container">
                                    <p class="a2n-tab_content">
                                    <div>
                                        <?php echo wp_kses_post($projectCareerMap); ?>
                                    </div>
                                    </p>
                                </div>
                            </div>
                            <div id="tab5" class="tab-pane fade">
                                <h3>Beneficial Professional Development</h3>
                                <div class="a2n-tab_container">
                                    <p class="a2n-tab_content">
                                    <div>
                                        <?php echo wp_kses_post($BeneficaialProDev); ?>
                                    </div>
                                    </p>
                                </div>
                            </div>
                            <div id="tab6" class="tab-pane fade">
                                <h3>Conclusion</h3>
                                <div class="a2n-tab_container">
                                    <p class="a2n-tab_content">
                                    <div>
                                        <?php echo wp_kses_post($conclusion); ?>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab section end  -->

        <!-- career section start  -->
        <div class="a2n_career-section">
            <div class="container-fluid">
                <?php
                $checkboxField = get_field_object('holland_codes');
                $holland_codes = $checkboxField['value'];
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="a2n_career-container">
                            <p><b>Holland Codes</b>, people in this career generally possess the following traits</p>
                            <div class="a2n_career-items">

                                <div class="a2n_career-inner_items">
                                    <div class="a2n_n-box <?php echo $result = in_array("realistic", $holland_codes) ? 'realisticL' : ''; ?>">R</div>
                                    <h4 class="<?php echo $result = in_array("realistic", $holland_codes) ? 'realisticW' : ''; ?>">Realistic</h4>
                                </div>

                                <div class="a2n_career-inner_items ">
                                    <div class="a2n_n-box <?php echo $result = in_array("investigative", $holland_codes) ? 'investigativeL' : ''; ?>">I</div>
                                    <h4 class="<?php echo $result = in_array("investigative", $holland_codes) ? 'investigativeW' : ''; ?>">Investigative</h4>
                                </div>

                                <div class="a2n_career-inner_items">
                                    <div class="a2n_n-box <?php echo $result = in_array("artistic", $holland_codes) ? 'artisticL' : ''; ?>">A</div>
                                    <h4 class="<?php echo $result = in_array("artistic", $holland_codes) ? 'artisticW' : ''; ?>">Artistic</h4>
                                </div>

                                <div class="a2n_career-inner_items">
                                    <div class="a2n_n-box <?php echo $result = in_array("social", $holland_codes) ? 'socialL' : ''; ?>">S</div>
                                    <h4 class="<?php echo $result = in_array("social", $holland_codes) ? 'socialW' : ''; ?>">Social</h4>
                                </div>

                                <div class="a2n_career-inner_items">
                                    <div class="a2n_n-box <?php echo $result = in_array("enterprising", $holland_codes) ? 'enterprisingL' : ''; ?>">E</div>
                                    <h4 class="<?php echo $result = in_array("enterprising", $holland_codes) ? 'enterprisingW' : ''; ?>">Enterprising</h4>
                                </div>

                                <div class="a2n_career-inner_items">
                                    <div class="a2n_n-box <?php echo $result = in_array("conventional", $holland_codes) ? 'conventionalL' : ''; ?>">C</div>
                                    <h4 class="<?php echo $result = in_array("conventional", $holland_codes) ? 'conventionalW' : ''; ?>">Conventional</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="a2n_career-container">
                            <?php
                            $checkboxFieldSDG = get_field('un_sdg');
                            ?>
                            <p><b>United Nations' Sustainable Development</b> Goals that this career profile addresses</p>
                            <div class="a2n_career-contents">
                                <?php
                                if ($checkboxFieldSDG && in_array('climate action', $checkboxFieldSDG)) {
                                ?>
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/unSDG/climate.svg' ?>" alt="climate" />
                                <?php
                                }
                                if ($checkboxFieldSDG && in_array('peace and justice strong institutions', $checkboxFieldSDG)) {
                                ?>
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/unSDG/peace.svg' ?>" alt="peace" />
                                <?php
                                }
                                if ($checkboxFieldSDG && in_array('partnerships to achieve the goal', $checkboxFieldSDG)) {
                                ?>
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/unSDG/partnership.svg' ?>" alt="partnership" />
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- career section end  -->
        <!-- career similar section start  -->
        <div class="a2n_similar-sec">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Careers similar to '<?php the_title(); ?>' that you might be interested in</h3>
                        <!-- a2n similar card slider  -->
                        <?php echo do_shortcode('[Related_Careers]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- career similar section end  -->
    </div>
    <div class="a2n_right-side"></div>
</main>

<?php

get_footer(vibe_get_footer());
