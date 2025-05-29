<?php
/**
 * FluidCommerce functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FluidCommerce
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'fluidcommerce_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fluidcommerce_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on FluidCommerce, use a find and replace
		 * to change 'fluidcommerce' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fluidcommerce', get_template_directory() . '/languages' );

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
				'primary' => esc_html__( 'Primary Menu', 'fluidcommerce' ),
				// Add other menu locations here if needed, e.g., 'footer' => esc_html__( 'Footer Menu', 'fluidcommerce' ),
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
				'fluidcommerce_custom_background_args',
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

		/**
		 * Add support for WooCommerce.
		 */
		add_theme_support( 'woocommerce' );
		// add_theme_support( 'wc-product-gallery-zoom' ); // Optional: if you want zoom
		// add_theme_support( 'wc-product-gallery-lightbox' ); // Optional: if you want lightbox
		// add_theme_support( 'wc-product-gallery-slider' ); // Optional: if you want slider

	}
endif;
add_action( 'after_setup_theme', 'fluidcommerce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fluidcommerce_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fluidcommerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'fluidcommerce_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function fluidcommerce_scripts() {
	wp_enqueue_style( 'fluidcommerce-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'fluidcommerce-style', 'rtl', 'replace' ); // If supporting RTL

	// Add additional stylesheets here, e.g., Google Fonts
    // wp_enqueue_style( 'fluidcommerce-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap', array(), null );


	// Add additional scripts here
	// Example: wp_enqueue_script( 'fluidcommerce-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fluidcommerce_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fluidcommerce_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Main Sidebar', 'fluidcommerce' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'fluidcommerce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fluidcommerce_widgets_init' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php'; // Example if you have custom header functionality

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php'; // Example for custom template tags

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php'; // Example for additional theme functions

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php'; // Example for theme customizer options

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	// require get_template_directory() . '/inc/woocommerce.php'; // Example for WooCommerce specific tweaks
}

?>
