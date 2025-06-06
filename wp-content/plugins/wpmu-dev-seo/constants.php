<?php
/**
 * The plugin constants.
 *
 * @package    SmartCrawl
 * @subpackage Constants
 */

/**
 * Internal constants, not to be overridden
 */
const SMARTCRAWL_VERSION     = '3.13.1';
const SMARTCRAWL_BUILD       = '1745491728211';
const SMARTCRAWL_BUILD_TYPE  = 'full';
const SMARTCRAWL_SUI_VERSION = '2.12.23';
const SMARTCRAWL_PACKAGE_ID  = 167;
define( 'SMARTCRAWL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) . 'includes/' );
define( 'SMARTCRAWL_PLUGIN_URL', plugin_dir_url( __FILE__ ) . 'includes/' );
define( 'SMARTCRAWL_VENDOR_PREFIXED_DIR', plugin_dir_path( __FILE__ ) . 'vendor_prefixed/' );

/**
 * Plugin configuration constants
 */
// Amount of time for caching SEOmoz results.
if ( ! defined( 'SMARTCRAWL_EXPIRE_TRANSIENT_TIMEOUT' ) ) {
	define( 'SMARTCRAWL_EXPIRE_TRANSIENT_TIMEOUT', 3600 );
}
if ( ! defined( 'SMARTCRAWL_AUTOLINKS_DEFAULT_CHAR_LIMIT' ) ) {
	define( 'SMARTCRAWL_AUTOLINKS_DEFAULT_CHAR_LIMIT', 3 );
}
// Suppress redundant canonicals?.
// if ( ! defined( 'SMARTCRAWL_SUPPRESS_REDUNDANT_CANONICAL' ) ) {
// define( 'SMARTCRAWL_SUPPRESS_REDUNDANT_CANONICAL', false );
// }.
if ( ! defined( 'SMARTCRAWL_SITEMAP_SKIP_IMAGES' ) ) {
	define( 'SMARTCRAWL_SITEMAP_SKIP_IMAGES', false );
}
if ( ! defined( 'SMARTCRAWL_SITEMAP_SKIP_TAXONOMIES' ) ) {
	define( 'SMARTCRAWL_SITEMAP_SKIP_TAXONOMIES', false );
}
if ( ! defined( 'SMARTCRAWL_SITEMAP_SKIP_SE_NOTIFICATION' ) ) {
	define( 'SMARTCRAWL_SITEMAP_SKIP_SE_NOTIFICATION', false );
}
if ( ! defined( 'SMARTCRAWL_EXPERIMENTAL_FEATURES_ON' ) ) {
	define( 'SMARTCRAWL_EXPERIMENTAL_FEATURES_ON', false );
}
if ( ! defined( 'SMARTCRAWL_ENABLE_LOGGING' ) ) {
	define( 'SMARTCRAWL_ENABLE_LOGGING', false );
}
if ( ! defined( 'SMARTCRAWL_WHITELABEL_ON' ) ) {
	define( 'SMARTCRAWL_WHITELABEL_ON', false );
}
if ( ! defined( 'SMARTCRAWL_OMIT_PORT_MATCHES' ) ) {
	define( 'SMARTCRAWL_OMIT_PORT_MATCHES', true );
}
if ( ! defined( 'SMARTCRAWL_ANALYSIS_REQUEST_TIMEOUT' ) ) {
	define( 'SMARTCRAWL_ANALYSIS_REQUEST_TIMEOUT', 5 );
}
if ( ! defined( 'SMARTCRAWL_SERVICE_REQUEST_TIMEOUT' ) ) {
	define( 'SMARTCRAWL_SERVICE_REQUEST_TIMEOUT', 5 );
}
if ( ! defined( 'SMARTCRAWL_SHOW_GUTENBERG_LINK_FORMAT_BUTTON' ) ) {
	define( 'SMARTCRAWL_SHOW_GUTENBERG_LINK_FORMAT_BUTTON', true );
}
if ( ! defined( 'SMARTCRAWL_TITLE_DEFAULT_MIN_LENGTH' ) ) {
	define( 'SMARTCRAWL_TITLE_DEFAULT_MIN_LENGTH', 50 );
}
if ( ! defined( 'SMARTCRAWL_TITLE_DEFAULT_MAX_LENGTH' ) ) {
	define( 'SMARTCRAWL_TITLE_DEFAULT_MAX_LENGTH', 65 );
}
if ( ! defined( 'SMARTCRAWL_METADESC_DEFAULT_MIN_LENGTH' ) ) {
	define( 'SMARTCRAWL_METADESC_DEFAULT_MIN_LENGTH', 120 );
}
if ( ! defined( 'SMARTCRAWL_METADESC_DEFAULT_MAX_LENGTH' ) ) {
	define( 'SMARTCRAWL_METADESC_DEFAULT_MAX_LENGTH', 160 );
}
if ( ! defined( 'SMARTCRAWL_PROJECT_TITLE' ) ) {
	define( 'SMARTCRAWL_PROJECT_TITLE', 'SmartCrawl https://wpmudev.com/project/smartcrawl-wordpress-seo/' );
}