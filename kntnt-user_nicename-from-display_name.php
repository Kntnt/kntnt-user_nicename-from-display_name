<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt user_nicname from display_name
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Generates user_nicename, which is used as slug for author archives, from user's display name instead of their login name.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */


defined('ABSPATH') || die;

add_filter('pre_user_nicename', function ($user_nicename) {

    // Convert display name into a slug (a.k.a. user_nicename) by removing
    // diacritics and replacing othe "offending" characters with dashes.
    if ($user = get_user_by('slug', $user_nicename)) {
        $user_nicename = $user->get('display_name');
        $user_nicename = sanitize_user($user_nicename);
        $user_nicename = sanitize_title_with_dashes($user_nicename);
    }

    return $user_nicename;

});
