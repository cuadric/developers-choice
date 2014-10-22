<?php

define('DB_NAME', 'database_name_here');
define('DB_USER', 'username_here');
define('DB_PASSWORD', 'password_here');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

$table_prefix  = 'wp_';

if ( isset($_GET['debug']) ) {
	define('WP_DEBUG', true);
}

define('WP_POST_REVISIONS', false );
define('AUTOSAVE_INTERVAL', 600);

define('WPCF7_LOAD_CSS', false);
// define('WPCF7_LOAD_JS', false);
define('WPCF7_AUTOP', false);
define('WPCF7_SHOW_DONATION_LINK', false);
define('WPCF7_ADMIN_READ_CAPABILITY', 'activate_plugins');
define('WPCF7_ADMIN_READ_WRITE_CAPABILITY', 'activate_plugins');

// ---------------------------------------------------

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');