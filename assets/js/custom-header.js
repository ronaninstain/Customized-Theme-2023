jQuery(document).ready(function() {
    if (location.hash === '#forgotpassword') {
        jQuery('li.tab').hide();

        jQuery('#forgotpassword').show();
    }

    // Fade in when header buttons are clicked
    if (jQuery('.login-modal').length > 0) {
        jQuery('header .login-links > a').click(function(e) {
            e.preventDefault();

            // If mobile then scroll to top to meet the position:absolute container
            if (jQuery(window).width() < 768) {
                jQuery("html, body").animate({
                    scrollTop: 0
                }, 100);
            }

            if (jQuery(this).hasClass('login-mobile')) {
                showLoginTab();
            } else {
                showRegisterTab();
            }
        });
    }

    // Shows the register tab on the login modal
    window.showRegisterTab = function() {
        jQuery('#login.tab').removeClass('active').hide().next().addClass('active').show();
        jQuery('.login-modal').addClass('register').fadeIn();
        jQuery('.login-tab').removeClass('active');
        jQuery('.register-tab').addClass('active');
    }

    // Shows the login tab on the login modal
    window.showLoginTab = function() {
        jQuery('#login.tab').addClass('active').show().next().removeClass('active').hide();
        jQuery('.login-modal').removeClass('register').fadeIn();
        jQuery('.register-tab').removeClass('active');
        jQuery('.login-tab').addClass('active');
    }
});



if (jQuery('.modal-outer').length > 0) {

    jQuery('.close-modal').click(function() {
        jQuery('.login-modal').fadeOut();
    });

    jQuery('.modal-outer .login-modal').click(function(e) {
        var empty = true;

        jQuery('.modal-outer .form-control').each(function() {
            if (jQuery(this).val() !== '') {
                empty = false;
            }
        });

        if (e.target.className === 'login-modal' && empty === true) {
            if (jQuery('.topic-modal').length == 0) {
                jQuery('.login-modal').fadeOut();
            }
        }
    });
}

/**
 * Switch between login and register
 */

jQuery('.login-modal .switch-tab').click(function(e) {
    e.preventDefault();

    jQuery(window).scrollTop(0);

    jQuery('.switch-tab.active').removeClass('active');
    jQuery('.switch-tab a[href="' + jQuery(this).find('a').attr('href') + '"]').parents('.switch-tab').addClass('active');

    if (!jQuery(this).hasClass('login-account')) {
        jQuery('#login.tab').removeClass('active').hide().next().addClass('active.login-left').show();
    } else {
        jQuery('#signup.tab').removeClass('active').hide().prev().addClass('active').show();
    }

    jQuery('.login-modal').toggleClass('register');
});

/**
 * Show modal and switch tab if error
 */

if (jQuery('.login-modal').length > 0) {
    if (jQuery('.inner-modal #login .error-message').length > 0) {
        jQuery('.login-modal').fadeIn(function() {
            jQuery('.inner-modal').fadeIn();
        })
    } else if (jQuery('.inner-modal #signup .error-message').length > 0) {

        jQuery('#signup').addClass('active').show().prev().removeClass('active').hide();

        jQuery('.login-modal').fadeIn(function() {
            jQuery('.inner-modal').fadeIn();
        });

        jQuery('.login-modal').toggleClass('register');
    }
}

/**
 * Close desktop Menus
 *
 */
function closeMenus() {
    jQuery('.activated').removeClass('activated');

    if (jQuery(window).width() > 800) {
        jQuery('.nav__dropdown--visible').fadeOut();
    }

    jQuery('.open').removeClass('open fast');

    jQuery('.coin--active').removeClass('coin--active').parent().find('.a-link').fadeOut();

    jQuery('.nav__dropdown--visible').removeClass('nav__dropdown--visible');
}

/**
 * Close Mobile menus
 *
 */
function closeMobileMenu() {
    jQuery('.nav__dropdown--user-menu.active').removeClass('active');
    jQuery('.icon-nb-menu').removeClass('closemmenu');
    jQuery('.subnav-active').removeClass('subnav-active')
    jQuery('body').removeClass('no-scroll');

    jQuery('.open').removeClass('open fast');

    jQuery('.lms-b__button').removeClass('lms-b__button--active');

    if (jQuery('#mCSB_1').length > 0) {
        setTimeout(function() {
            jQuery(".mCSB_container").css("top", 0);
        }, 500);
    }

    jQuery('.hide-buy-cert').removeClass('hide-buy-cert');
}

jQuery(document).ready(function() {
    // Modify button id if given user is LMS owner
    if (jQuery('.lms-b__menu-inner').length) {
        var userId = "27573143";

        jQuery('.lms-b__menu-inner ul li a').each((index, flms) => {
            if (userId == $(flms).attr('data-owner')) {
                jQuery('.lms-b__button').attr('id', 'lms-b--owner');
                return false;
            }
        });
    }

    // Close menus
    jQuery(document).on('click', '.darken, .activated', function(e) {
        closeMenus()
        closeMobileMenu();

        jQuery('.darken').fadeOut();

        jQuery('.hide-buy-cert').removeClass('hide-buy-cert');
    });

    const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0)

    // If screen height can't fit men
    if ((vh - jQuery('.header__outer').height()) < 670) {
        jQuery('.for-desktop .nav__item--b').find('.nav__children, .nav__dropdown--cats').css('max-height', 'calc(100vh - ' + (jQuery('.header__outer').height() + 30) + 'px)');

        jQuery(".for-desktop .nav__item--b .nav__categories.nav__categories--arrows:not(.nav__categories--careers) .nav__categories-inner").mCustomScrollbar({
            theme: '3d',
            scrollbarPosition: 'inside',
            autoHideScrollbar: false,
            documentTouchScroll: true
        });
    }

    if (jQuery(window).height() < 750) {
        jQuery('.nav__dropdown--career').css('max-height', 'calc(100vh - ' + (jQuery('.header__outer').height() + 30) + 'px)');
    }

    // Fixing height of category menu
    var minus = jQuery('.header__outer').height(),
        menu_height = 113 + minus

    jQuery('.for-mobile .nav__children-inner').css('min-height', 'calc(100vh - ' + minus + 'px)');
    jQuery('.for-mobile .nav__children-sub').css('min-height', 'calc(100vh - ' + menu_height + 'px)');
    jQuery('.for-mobile .nav__children--career .nav__children-sub').css('height', 'calc(100vh - ' + menu_height + 'px)');

    // Cateogry menu submenu
    jQuery('.nav__categories--arrows .nav__parent-categories > a').hover(function(e) {
        if (jQuery('.open').length > 0) {
            if (!jQuery(this).hasClass('open')) {
                jQuery('.open').removeClass('open').removeClass('fast');
            }

            jQuery(this).addClass('open');
            jQuery('.nav__children').addClass('open fast').find("." + jQuery(this).attr('data-child')).addClass('open fast');
        } else {
            jQuery(this).addClass('open');
            jQuery('.nav__children').addClass('open').find("." + jQuery(this).attr('data-child')).addClass('open');
        }

        jQuery('.nav__dropdown--cats').addClass('open');
    });

    jQuery('.nav__item-link--has-child').click(function(e) {
        var parents = jQuery(e.target).parents('.nav__item-inner');

        if (parents.length || jQuery(e.target).hasClass('nav__item-inner') || jQuery(e.target).hasClass('child-nav-back') || jQuery(e.target).hasClass('icon-filter_up')) {
            if (!jQuery(this).hasClass('open')) {
                // Remove other other menu
                jQuery(this).addClass('open').find('.nav__children').addClass('open');
            } else {
                jQuery(this).removeClass('open').find('.nav__children').removeClass('open');
            }
        }
    });

    //Show coin popup
    jQuery(document).ready(function() {
        jQuery('.coin').off('click').on('click', function() {
            if (jQuery('.coin--active').length === 0) {
                jQuery('.aff-over').fadeIn();
                jQuery(this).addClass('coin--active');
                jQuery('.aff__message--not-affiliate').fadeIn();
            } else {
                jQuery('.aff-over').fadeOut();
                jQuery('.coin--active').removeClass('coin--active');
                jQuery('.aff__message--not-affiliate').fadeOut();
            }
        });

        jQuery('.aff-over, .aff__close').click(function() {
            jQuery('.aff-over').fadeOut()
            jQuery('.coin--active').removeClass('coin--active');
            jQuery('.aff__message').fadeOut();
        });
    });

    jQuery('.nav__dropdown-categories-2').on('click', function() {
        jQuery('.nav__dropdown').mCustomScrollbar('scrollTo', 0, {
            // scroll as soon as clicked
            timeout: 0,
            // scroll duration
            scrollInertia: 0,
        });
    });

    // When on mobile
    jQuery('.for-mobile .icon-nb-menu').on('click', function(e) {
        var menu = jQuery('.header__nav > .for-mobile .nav__dropdown--user-menu');

        closeMenus();

        if (menu.hasClass('active')) {
            jQuery('.darken').fadeOut();

            closeMobileMenu();
        } else {
            menu.addClass('active');
            jQuery('.darken').fadeIn();

            // Fade out the hamburger menu and show X
            jQuery(".icon-nb-menu").animate({
                opacity: 0,
            }, 300, function() {
                jQuery('.icon-nb-menu').addClass('closemmenu');

                jQuery(".icon-nb-menu").animate({
                    opacity: 1,
                }, 300);
            });

            jQuery('body').addClass('no-scroll');
        }

        jQuery('.header__search-input').slideUp();
        jQuery('.hide-buy-cert').removeClass('hide-buy-cert');
    });

    // Mobile search
    jQuery('.for-mobile .icon-search').on('click', function(e) {
        jQuery('.header__search-input').slideToggle();
        jQuery('.header__nav > .for-mobile .nav__dropdown--user-menu').removeClass('active');
    });

    // Activate sliding subnav
    jQuery(document).on('click', '.activate-subnav', function(e) {
        console.log(jQuery(e.target).parents('.nav__item--slide').length === 0)
        if (jQuery(e.target).parents('.nav__item--slide').length === 0) {
            jQuery(this).parents('.nav__dropdown--user-menu').toggleClass('subnav-active');
            jQuery(this).parents('.nav__dropdown-level-2').toggleClass('subnav-active');
        }
    });

    // Go back from subnav
    jQuery(document).on('click', '.subnav-back', function() {
        jQuery('.subnav-active').removeClass('subnav-active');
    });

    // Desktop menus
    jQuery(document).on('click', '.lms-b__button', function(e) {
        if (!jQuery(this).hasClass('lms-b__button--active')) {
            closeMobileMenu();
            closeMenus();

            jQuery(this).addClass('lms-b__button--active').next().fadeIn().addClass('nav__dropdown--visible');
            jQuery('.darken').fadeIn();
        } else {
            jQuery(this).removeClass('lms-b__button--active').next().fadeOut().removeClass('nav__dropdown--visible');
            jQuery('.darken').fadeOut();
        }
    });

    // Desktop menus
    jQuery(document).on('click', '.activate-dropdown:not(.activated)', function(e) {
        e.preventDefault();

        closeMobileMenu();

        jQuery('.nav__dropdown--visible').hide();
        jQuery('.activated').removeClass('activated');

        // Remove dark BG
        jQuery('.darken').fadeIn();

        jQuery(this).addClass('activated');

        var parent = jQuery(this).parent().find('.nav__dropdown').first();

        parent.addClass('nav__dropdown--visible');

        if (jQuery(window).width() > 800) {
            parent.fadeIn();
        }

        if (jQuery(this).parent().hasClass('buy-cert')) {
            jQuery(this).parent().addClass('hide-buy-cert');
        }
    });

    jQuery(".nav__dropdown--scroll, .nav__parent-categories").mCustomScrollbar({
        theme: '3d',
        scrollbarPosition: 'inside',
        autoHideScrollbar: false,
        documentTouchScroll: true
    });

    jQuery(".nav__children-sub").mCustomScrollbar({
        theme: '3d',
        scrollbarPosition: 'inside',
        autoHideScrollbar: false,
        documentTouchScroll: true
    });

    if (jQuery(window).width() < 976) {
        jQuery(".nav__dropdown--categories").mCustomScrollbar({
            theme: '3d',
            scrollbarPosition: 'inside',
            autoHideScrollbar: false,
            documentTouchScroll: true
        });
    }
});


jQuery(function() {
    var header = jQuery(".arfixed1");
    var shoNav = jQuery(".shoNav");
    jQuery(window).scroll(function() {
        var scroll = jQuery(window).scrollTop();

        if (scroll >= 5) {
            header.addClass("arfixed");
            shoNav.addClass("arnavmrg");
        } else {
            header.removeClass("arfixed");
            shoNav.removeClass("arnavmrg");
        }
    });
});


console.log('Custom header 2');