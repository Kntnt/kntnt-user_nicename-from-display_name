# Kntnt user_nicname from display_name

WordPress mu-plugin that generates user_nicename, which is used as slug for author archives, from user's display name instead of their login name.

## Description

The user_nicename is used as a slug for author pages. Wordpress generates it automatically from the user_login. Since people can have the most bizarre login names, this results at best in just inconsistent URL structure for the author pages and in the worst case embarrassing URLs. This "must use" plugin takes care of this by using the display name to ceate user_nicename.

## Installation

1. In your `wp-content` directory, create a `mu-plugin` directory if it not already exists.
2. Copy `kntnt-user_nicename-from-display_name.php` into `mu-plugin`. Only the file. Not this directory or the other files within it.
3. Visit each user's profile and save it again to update the user_nicename. Don't forget your own profile. :-)

## Changelog

### 1.0.0

Initial release.