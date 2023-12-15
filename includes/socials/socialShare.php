<?php

//Socials share by shoive start 

function social_sharing()
{
    extract(shortcode_atts(array(), $atts));

    return '<a class="social-sharing-icon" target="_new" href="http://www.facebook.com/share.php?u=' . urlencode(get_the_permalink()) . '&title=' . urlencode(get_the_title()) . '">
                <img src="https://adamsfcstg.wpenginepowered.com/wp-content/uploads/2023/12/facebook.svg" alt="fb" />
            </a>
            <a class="social-sharing-icon" target="_new" href="http://twitter.com/home?status=' . urlencode(get_the_title()) . '+' . urlencode(get_the_permalink()) . '">
                <img src="https://adamsfcstg.wpenginepowered.com/wp-content/uploads/2023/12/twitter.svg" alt="tweet" />
            </a>
            <a class="social-sharing-icon" target="_new" href="http://www.linkedin.com/shareArticle?mini=true&url=' . urlencode(get_the_permalink()) . '&title=' . urlencode(get_the_title()) . '&source=' . get_bloginfo("url") . '">
                <img src="https://adamsfcstg.wpenginepowered.com/wp-content/uploads/2023/12/linkedin.svg" alt="linkedin" />
            </a>
            <a class="social-sharing-icon" target="_new" href="https://api.whatsapp.com/send?text=' . urlencode(get_the_permalink()) . '">
                <img src="https://adamsfcstg.wpenginepowered.com/wp-content/uploads/2023/12/whatsapp.svg" alt="whatsapp" />
            </a>';
}
add_shortcode("social_sharing", "social_sharing");

//Socials share by shoive end