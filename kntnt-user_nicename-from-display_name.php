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

    // Get user's display name
    $name = get_user_by('slug', $user_nicename)->get('display_name');

    // Convert display name into a slug (a.k.a. user_nicename) by removing
    // diacritics and replacing other "offending" characters with dashes.
    $name = sanitize_user($name);
    $name = sanitize_title_with_dashes($name);

    return $name;

});
