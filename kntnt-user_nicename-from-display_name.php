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

/*
 * We cannot use the `pre_user_nicename` filter because we need to get
 * the display name and cannot use `get_user_by('slug', $user_nicename)`
 * on not yet created users (only on updates). Thus this filter instead.
 */
add_filter('wp_pre_insert_user_data', function ($data, $update, $id) {

    $user_nicename = $data['display_name'];

    // Create`user_nicename` from `display_name` by removing diacritics  and
    // replacing other "offending" characters with dashes.
    $user_nicename = sanitize_user($user_nicename);
    $user_nicename = sanitize_title_with_dashes($user_nicename);

    // Make the slug unique.
    $n = 0;
    $base = $user_nicename;
    while (($test = get_user_by('slug', $user_nicename)) && $test->ID != $id) {
        $n += 1;
        $user_nicename = "$base-$n";
    }

    $data['user_nicename'] = $user_nicename;

    return $data;

}, 10, 3);
