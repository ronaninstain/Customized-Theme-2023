/* Course slider js */

//single course start

jQuery(function () {
  // Owl Carousel
  const owl = $(".srs_trending_course_sliderSingleCourse");
  owl.owlCarousel({
    margin: 10,
    loop: true,
    nav: true,
    dots: true,
    navText: [
      "<i aria-hidden='true' class='fa fa-chevron-left'></i>",
      "<i aria-hidden='true' class='fa fa-chevron-right'></i>",
    ],
    responsive: {
      0: {
        items: 1,
      },

      600: {
        items: 2,
      },

      1024: {
        items: 2.5,
      },

      1366: {
        items: 3,
      },
    },
  });
});

//single course end

//tab course sliders start

jQuery(function () {
  // Owl Carousel
  const owl = $(".srs_trending_course_slider");
  owl.owlCarousel({
    margin: 10,
    loop: true,
    nav: true,
    dots: true,
    navText: [
      "<i aria-hidden='true' class='fa fa-chevron-left'></i>",
      "<i aria-hidden='true' class='fa fa-chevron-right'></i>",
    ],
    responsive: {
      0: {
        items: 2,
      },

      600: {
        items: 2,
      },

      1024: {
        items: 3,
      },

      1366: {
        items: 4.3,
      },
    },
  });
});

//tab course sliders end

//reviewed course sliders start

jQuery(function () {
  // Owl Carousel
  var owl = $(".srs_best_review_owl-carousel");
  owl.owlCarousel({
    margin: 10,
    loop: true,
    nav: true,
    dots: true,
    navText: [
      "<i aria-hidden='true' class='fa fa-chevron-left'></i>",
      "<i aria-hidden='true' class='fa fa-chevron-right'></i>",
    ],
    responsive: {
      0: {
        items: 1,
      },

      600: {
        items: 1.5,
      },

      1024: {
        items: 2.2,
      },

      1366: {
        items: 2.2,
      },
    },
  });
});

//reviewed course sliders end
