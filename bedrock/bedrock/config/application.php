<?php

use Roots\WPConfig\Config;

/**
 * Directory containing all of the site's files
 *
 * @var string
 */
$root_dir = dirname(__DIR__);

/**
 * Document Root
 *
 * @var string
 */
$webroot_dir = $root_dir . '/web';

/**
 * Set up our global environment constant
 */
define('WP_ENV', 'development');

/**
 * URLs
 */
Config::define('WP_HOME', 'http://localhost:8000');
Config::define('WP_SITEURL', 'http://localhost:8000/wp');

/**
 * Custom Content Directory
 */
Config::define('CONTENT_DIR', '/app');
Config::define('WP_CONTENT_DIR', $webroot_dir . Config::get('CONTENT_DIR'));
Config::define('WP_CONTENT_URL', Config::get('WP_HOME') . Config::get('CONTENT_DIR'));

/**
 * DB settings (NO .env)
 */
Config::define('DB_NAME', 'bedrock');
Config::define('DB_USER', 'bedrock');
Config::define('DB_PASSWORD', 'bedrock');
Config::define('DB_HOST', 'db');
Config::define('DB_CHARSET', 'utf8mb4');
Config::define('DB_COLLATE', '');
$table_prefix = 'wp_';

/**
 * Authentication Unique Keys and Salts
 */
Config::define('AUTH_KEY',         'put_your_key_here');
Config::define('SECURE_AUTH_KEY',  'put_your_key_here');
Config::define('LOGGED_IN_KEY',    'put_your_key_here');
Config::define('NONCE_KEY',        'put_your_key_here');
Config::define('AUTH_SALT',        'put_your_key_here');
Config::define('SECURE_AUTH_SALT', 'put_your_key_here');
Config::define('LOGGED_IN_SALT',   'put_your_key_here');
Config::define('NONCE_SALT',       'put_your_key_here');

/**
 * Custom Settings
 */
Config::define('AUTOMATIC_UPDATER_DISABLED', true);
Config::define('DISABLE_WP_CRON', false);
Config::define('DISALLOW_FILE_EDIT', true);
Config::define('DISALLOW_FILE_MODS', true);
Config::define('WP_POST_REVISIONS', true);
Config::define('CONCATENATE_SCRIPTS', false);
Config::define('WP_DEBUG_DISPLAY', false);
Config::define('WP_DEBUG_LOG', false);
Config::define('SCRIPT_DEBUG', false);
ini_set('display_errors', '0');

/**
 * Allow WordPress to detect HTTPS behind reverse proxy
 */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

/**
 * Load environment-specific config if needed
 */
$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';

if (file_exists($env_config)) {
    require_once $env_config;
}

Config::apply();

/**
 * Bootstrap WordPress
 */
if (!defined('ABSPATH')) {
    define('ABSPATH', $webroot_dir . '/wp/');
}
