<?php
/**
 * WordpressHealth functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordpressHealth
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wordpresshealth_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on WordpressHealth, use a find and replace
		* to change 'wordpresshealth' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wordpresshealth', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wordpresshealth' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wordpresshealth_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'wordpresshealth_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordpresshealth_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordpresshealth_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordpresshealth_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordpresshealth_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wordpresshealth' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wordpresshealth' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wordpresshealth_widgets_init' );


// ---------css-js-path-start-----------------
/**
* Include CSS files
*/
function theme_enqueue_scripts() {
	wp_enqueue_style( 'font-Plus-Jakarta', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');
    wp_enqueue_style( 'awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css');
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/css/slick.css');
	wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/css/custom.css');
	wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() . '/css/responsive.css');

	wp_enqueue_script( 'jquery-min-js', 'https://code.jquery.com/jquery-2.2.4.min.js');
    wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js', array(), null, true);
	wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/js/slick.js', array(), null, true);
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), null, true);
	wp_enqueue_script( 'chat-loader-js', get_stylesheet_directory_uri() . '/js/chat-loader.js', array(), null, true);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );


//----------------- css-js-path-end -----------------//

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}

function register_resourse_menu() {
 register_nav_menu('resourse-menu',__( 'resourse Menu' ));
}
add_action( 'init', 'register_resourse_menu' );

function register_quicklink_menu() {
	register_nav_menu('quicklink-menu',__( 'quicklink Menu' ));
   }
   add_action( 'init', 'register_quicklink_menu' );

/**
 * Enqueue scripts and styles.
 */
function wordpresshealth_scripts() {
	wp_enqueue_style( 'wordpresshealth-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wordpresshealth-style', 'rtl', 'replace' );

	wp_enqueue_script( 'wordpresshealth-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordpresshealth_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




/*function search_only_titles($search, $wp_query) {
    global $wpdb;

    if (empty($search) || !$wp_query->is_search()) {
        return $search;
    }

    // Ensure it only applies to 'faq-post' post type
    if ($wp_query->query_vars['post_type'] !== 'faq-post') {
        return $search;
    }

    $search_term = esc_sql($wp_query->query_vars['s']);
    $search = " AND {$wpdb->posts}.post_title LIKE '%{$search_term}%' ";
    
    return $search;
}

*/
