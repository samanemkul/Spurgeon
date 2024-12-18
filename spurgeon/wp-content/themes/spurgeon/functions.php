<?php

/**
 * spurgeon_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package spurgeon_theme
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spurgeon_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on spurgeon_theme, use a find and replace
		* to change 'spurgeon' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('spurgeon', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'spurgeon'),
			'category' => esc_html__('Category', 'spurgeon'),
			'site_links' => esc_html__('Site Links', 'spurgeon'),

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
			'spurgeon_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'spurgeon_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spurgeon_content_width()
{
	$GLOBALS['content_width'] = apply_filters('spurgeon_content_width', 640);
}
add_action('after_setup_theme', 'spurgeon_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spurgeon_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'spurgeon'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'spurgeon'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'spurgeon_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function spurgeon_scripts()
{
	wp_enqueue_style('spurgeon-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('spurgeon-style', 'rtl', 'replace');

	wp_enqueue_script('spurgeon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'spurgeon_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
function footer_widget_init()
{
	register_sidebar(array(
		'name' => __('link menu', 'spurgeon'),
		'id' => 'footer-3',
		'description' => __('widgets for the menu is here', 'spurgeon'),
		'before_widget' => '<div class="footer-widget menu-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="footer-widget-title">',
		'after_title' => '</h4>',


	));
	register_sidebar(array(
		'name' => __('main menu', 'spurgeon'),
		'id' => 'footer-2',
		'description' => __('main menu is here', 'spurgeon'),
		'before_widget' => '<div class="footer-widget menu-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="footer-widget-title">',
		'after_title' => '</h4>',

	));
}

add_action('widgets_init', 'footer_widget_init');
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(
		array(
			'page_title' 	=> 'Theme Options',
			'menu_title' 	=> 'Theme Options',
			'menu_slug' 	=> 'theme-options',
			'capability' 	=> 'edit_posts',
			'redirect' 	=> false,
		)
	);
}
function enqueue_slider_scripts()
{
	// Swiper CSS
	wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');

	// Swiper JS
	wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);

	// Custom Slider Script
	wp_enqueue_script('custom-slider', get_template_directory_uri() . '/js/slider.js', array('swiper-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slider_scripts');
function enqueue_masonry_script()
{
	wp_enqueue_script('masonry');
}
add_action('wp_enqueue_scripts', 'enqueue_masonry_script');
function enqueue_font_awesome()
{
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');
