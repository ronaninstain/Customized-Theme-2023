<?php

/* Check if user has subsription and purchased a specific product by Shoive start */

function userHasActiveSubscription($user_id = '')
{
    if (function_exists('wcs_user_has_subscription')) {
        // When a $user_id is not specified, get the current user Id
        if ('' == $user_id && is_user_logged_in()) {
            $user_id = get_current_user_id();
        }

        // User not logged in we return false
        if ($user_id == 0) {
            return false;
        }

        return wcs_user_has_subscription($user_id, '', 'active');
    }

    return false;
}

function hasUserBought($user_id = '')
{
    if (function_exists('wc_customer_bought_product')) {
        // When a $user_id is not specified, get the current user Id
        if ('' == $user_id && is_user_logged_in()) {
            $user_id = get_current_user_id();
        }

        // User not logged in we return false
        if ($user_id == 0) {
            return false;
        }
        return wc_customer_bought_product('', $user_id, 223946);
    }

    return false;
}


/* Check if user has subsription and purchased a specific product by Shoive end */