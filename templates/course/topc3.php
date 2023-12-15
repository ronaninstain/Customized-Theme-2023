<section class="admstopsingle23">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-sm-offset-4 col-md-8 col-sm-8 col-xs-12">
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
				?>
				<div class="top-content">
					<div class="bred">
						<?php vibe_breadcrumbs(); ?>
					</div>
					<h2 class="course-title">
						<?php bp_course_name(); ?>
					</h2>
					<div class="courseStds">
						<?php echo '(' . $courseStudents . ' students' . ')'; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="admsmiddlesingle23">
	<?php
	$user_id = get_current_user_id();
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<div class="side-content sh-fixed-23-single">
					<div class="course-image">
						<?php bp_course_avatar(); ?>
					</div>
					<div class="coursebtnfree">
						<?php the_course_button(); ?>
					</div>
					<div class="the-course-features">
						<h2>This course includes:</h2>
						<ul>
							<li>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/singleCourseImg/duration.svg' ?>" alt="list-favs"><?php echo $courseDuration; ?>
							</li>
							<li>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/singleCourseImg/tick.svg' ?>" alt="list-favs">CPD Accreditation
							</li>
							<li>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/singleCourseImg/units.svg' ?>" alt="list-favs"><?php echo count($units); ?> units
							</li>
							<li>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/singleCourseImg/tick.svg' ?>" alt="list-favs">Full lifetime access
							</li>
							<li>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/singleCourseImg/device.svg' ?>" alt="list-favs">Access on mobile and TV
							</li>
							<li>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/singleCourseImg/cert.svg' ?>" alt="list-favs">Certificate of completion
							</li>
						</ul>
					</div>
					<div class="share-div">
						<p>Share: <?php echo do_shortcode('[social_sharing]') ?></p>
					</div>
					<div class="coursePlulisher">
						<?php
						$field = get_field_object('course_publisher_');
						$value = $field['value'];
						$label = $field['choices'][$value];

						?>
						<div class="logoBox">
							<?php
							if (get_field('course_publisher_') == 'janets') {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/janets.svg' ?>" alt="publisher">
							<?php

							} elseif (get_field('course_publisher_') == 'one education') {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/OneEducation.png'; ?>" alt="publisher">
							<?php

							} elseif (get_field('course_publisher_') == 'john academy') {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/JohnAcademy.svg'; ?>" alt="publisher">
							<?php

							} elseif (get_field('course_publisher_') == 'course gate') {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/courseGate.svg'; ?>" alt="publisher">
							<?php

							} elseif (get_field('course_publisher_') == 'alpha academy') {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/alphaAcademy.svg'; ?>" alt="publisher">
							<?php

							} else {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/placeholder.svg' ?>" alt="placeholder">
							<?php
							}
							?>
						</div>
						<div class="publisherInfo">
							<h5>course plublisher</h5>
							<span><?php echo $label = ($label) ? esc_html($label) : 'N/A'; ?></span>
						</div>

					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="thepubscontent">
					<?php the_content(); ?>
				</div>
				<div class="courseContentCriculumn">
					<h2 class="singleCoursePageHeading">Course content</h2>

					<?php
					function createMultidimensionalArray()
					{

						$curriculums = bp_course_get_curriculum(get_the_ID());
						$resultArray = array();
						$currentParent = null;

						foreach ($curriculums as $item) {
							if (get_post_type($item) != 'unit') {
								$currentParent = $item;
								$resultArray[$currentParent] = array();
							} elseif ($currentParent !== null) {
								$resultArray[$currentParent][] = $item;
							}
						}
						return $resultArray;
					}

					// Example usage
					$multidimensionalArray = createMultidimensionalArray();

					$id = 1;
					foreach ($multidimensionalArray as $key => $item) {
						if (!is_int($key)) {
					?>
							<div class="panel-group" id="accordion"> <!-- Start Div 1 -->
								<div class="panel panel-default"> <!-- Start Div 2 -->

									<div class="panel-heading">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $id; ?>" aria-expanded="<?php echo $position = ($id == 1) ? "true" : "false"; ?>" class="<?php echo $position = ($id == 1) ? "" : "collapsed"; ?>">

											<h4 class="panel-title">
												<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/singleCourseImg/arrow-right.svg' ?>" alt="cirrtitle">
												<?php
												if (count($multidimensionalArray) > 1) {
													echo get_the_title($item[0]);
												} else {
													bp_course_name();
												}
												?>
											</h4>
										</a>
									</div>
								<?php
							}

								?>
								<div id="collapse<?php echo $id; ?>" class="panel-collapse <?php echo $position = ($id == 1) ? "collapse in" : "collapse"; ?>" aria-expanded="<?php echo $position = ($id == 1) ? "true" : "false"; ?>">


									<div class="panel-body">
										<ul>
											<?php
											foreach ($item as $i) { ?>
												<li>
													<div class="videoTitle">
														<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/singleCourseImg/video.svg' ?>" alt="video">
														<?php echo get_the_title($i); ?>
													</div>
													<div class="videoDuration">
														<?php
														$curriculumnDuration = get_post_meta($i, 'vibe_duration', true);
														if (!empty($curriculumnDuration)) {
															$seconds = $curriculumnDuration * 60;
															$datetime = new DateTime("@$seconds");
															$timeFormat = $datetime->format('H:i:s');
															echo $timeFormat; // Output: 02:15:00
														}
														?>
													</div>
												</li>
											<?php
											}
											?>

										</ul>
									</div>
								</div>

								<?php

								if (!is_int($key)) {
								?>
								</div><!-- Closing DIV 1 -->
							</div><!-- Closing DIV 2 -->
					<?php
								}
								$id++;
							}
					?>

				</div>

				<div class="cusCertAdms">
					<div class="a2n_certificate-container">
						<div class="certificate-content">
							<div class="certicate_items">
								<div class="certificate-inner_items">
									<div class="certificate_icons">
										<img src="https://adamsfcstg.wpenginepowered.com/wp-content/uploads/2023/12/svgviewer-png-output-3.png" alt="" />
									</div>
									<div class="certificate_text">
										<h3>Certify Your Skills</h3>
										<p>A CPD accredited Adams Diploma/Certificate certifies the skills
											you’ve learned.</p>
									</div>
								</div>
								<div class="certificate-inner_items">
									<div class="certificate_icons">
										<img src="https://adamsfcstg.wpenginepowered.com/wp-content/uploads/2023/12/svgviewer-png-output-4.png" alt="" />
									</div>
									<div class="certificate_text">
										<h3>Stand Out From The Crowd</h3>
										<p>Add your Adams Certification to your resume and stay ahead of
											the competition.</p>
									</div>
								</div>
								<div class="certificate-inner_items">
									<div class="certificate_icons">
										<img src="https://adamsfcstg.wpenginepowered.com/wp-content/uploads/2023/12/svgviewer-png-output-5.png" alt="" />
									</div>
									<div class="certificate_text">
										<h3>Advance in Your Career</h3>
										<p>Share your Adams Certification with potential employers to show
											off your skills and capabilities.</p>
									</div>
								</div>
							</div>

							<div class="certificate_img">
								<img src="https://adamsfcstg.wpenginepowered.com/wp-content/uploads/2023/12/cirtificate-2-1.png" alt="" />
							</div>
						</div>
					</div>

					<!-- Certificate section end  -->
				</div>

				<!-- Publisher's about -->
				<div class="publisherInfo">
					<h2 class="singleCoursePageHeading">About Course Publisher</h2>
					<div class="publisherTitle">
						<span><?php echo $label = ($label) ? esc_html($label) : 'N/A'; ?></span>
					</div>
					<div class="courseAndTitle">
						<div class="publisherlogo">
							<?php
							if (get_field('course_publisher_') == 'janets') {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/janets.svg' ?>" alt="publisher">
							<?php

							} elseif (get_field('course_publisher_') == 'one education') {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/OneEducation.png'; ?>" alt="publisher">
							<?php

							} elseif (get_field('course_publisher_') == 'john academy') {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/JohnAcademy.svg'; ?>" alt="publisher">
							<?php

							} elseif (get_field('course_publisher_') == 'course gate') {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/courseGate.svg'; ?>" alt="publisher">
							<?php

							} elseif (get_field('course_publisher_') == 'alpha academy') {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/alphaAcademy.svg'; ?>" alt="publisher">
							<?php

							} else {
							?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/brandImg/placeholder.svg' ?>" alt="placeholder">
							<?php
							}
							?>
						</div>
						<div class="courseCount">
							<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/singleCourseImg/coursecount.svg'; ?>" alt="courseCount"> Courses
						</div>
					</div>
					<div class="publisherAbout">
						<p>
							<?php
							$about = get_field("about_course_publisher");
							if (!empty($about)) {
								echo $about;
							}
							?>
						</p>
					</div>
				</div>
				<!-- End Publisher's about -->

				<!-- Related Course -->
				<div class="relatedCourse">
					<h2 class="singleCoursePageHeading">More Free Online Courses by This Publisher</h2>
					<!-- there should be a slider -->
					<?php echo do_shortcode('[related_course]'); ?>
				</div>
				<!-- End Related Course -->


			</div>
			<div class="col-md-2 col-sm-2">
				<?php
				$productBought = hasUserBought($user_id);
				$subscribe = userHasActiveSubscription($user_id);
				if ((!$productBought) and (!$subscribe)) {
				?>
					<div class="forAds">
						<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/singleCourseImg/adsexample/singlecourseads1.png' ?>" alt="ads">
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</section>

<!-- Admin Nav bar start -->

<?php
// $user = wp_get_current_user();
$roles = (array) $user->roles;

// var_dump($roles );
$notAllowedRoles = array('Subscriber', 'Student');

if (is_user_logged_in()) {
	if (!in_array($user->roles, $notAllowedRoles)) {
?>
		<section class="adminbar-23-adms">
			<div class="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<div id="item-body">
						<!-- Admin nav start -->
						<?php bp_get_options_nav(); ?>
						<?php
						if (function_exists('bp_course_nav_menu'))
							bp_course_nav_menu();
						?>
						<?php do_action('bp_course_options_nav'); ?>
						<!-- Admin nav end -->
					</div>
				</div>
			</div>
		</section>
<?php
	}
}
?>

<!-- Admin Nav bar end -->


<script>
	// Step 1: Identify the div elements
	const courseSingleBottom = document.querySelector('.relatedCourse');
	const tabFunctionalSide = document.querySelector('.side-content');

	// Step 2: Add a scroll event listener to the window
	window.addEventListener('scroll', () => {
		// Step 3: Get the scroll position
		const scrollPosition = window.scrollY;

		// Step 4: Get the position of the courseSingleBottom div
		// Step 4: Get the offsetTop of the courseSingleBottom div
		const coursePosition = courseSingleBottom.offsetTop - 600;

		console.log(coursePosition);


		// Step 5: Check if scroll position is below the courseSingleBottom div
		if (scrollPosition > coursePosition) {
			tabFunctionalSide.style.display = 'none';
		} else {
			tabFunctionalSide.style.display = 'block'; // You can use 'initial' if that's the default display value
		}
	});
</script>