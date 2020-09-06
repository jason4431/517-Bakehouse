<?php
/**
 * Bakehouse functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bakehouse
 */

if ( ! function_exists( 'bakehouse_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	/**
 * Register support for Gutenberg wide images in your theme
 */
	

  
add_filter( 'enter_title_here', 'wpb_change_title_text' );
	
	function bakehouse_setup() {

		//This is the code for removing all dashboard widgets, adding some new ones, removing the “Posts” menu item, renaming the “Pages” menu item to “Portfolio” and reordering the menu items 😊
		function wporg_remove_all_dashboard_metaboxes() {
			// Remove Welcome panel
			remove_action( 'welcome_panel', 'wp_welcome_panel' );
			// Remove the rest of the dashboard widgets
			remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
			remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
			remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
			remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
			remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
		}
		add_action( 'wp_dashboard_setup', 'wporg_remove_all_dashboard_metaboxes' );

		/**
		 * Add a new dashboard widget.
		 */
		function wpdocs_add_more_dashboard_widgets() {
			wp_add_dashboard_widget( 'another_dashboard_widget', 'Tutorial', 'another_dashboard_widget_function' );
		}
		add_action( 'wp_dashboard_setup', 'wpdocs_add_more_dashboard_widgets' );
		
		/**
		 * Output the contents of the dashboard widget
		 */
		function another_dashboard_widget_function( $post, $callback_args ) {
			echo '<p>Hi there!  Below is a video showing you how to log into youer account with your password and ID (go to <a href="517bakehouse.bcitwebdeveloper.ca/wp-admin">517bakehouse.bcitwebdeveloper.ca/wp-admin</a>), and how to add products to your Woocommerce store.  If you have any questions feel free to reach out!</p>';
			echo '<iframe src="http://517bakehouse.bcitwebdeveloper.ca/wp-content/uploads/2020/03/tutorial-1.mp4"';
			echo 'width="560" height="315" frameborder="0" allowfullscreen></iframe>';
		}



		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bakehouse, use a find and replace
		 * to change 'bakehouse' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bakehouse', get_template_directory() . '/languages' );

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

		add_theme_support( 'align-wide' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bakehouse' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bakehouse_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bakehouse_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bakehouse_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bakehouse_content_width', 640 );
}
add_action( 'after_setup_theme', 'bakehouse_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bakehouse_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bakehouse' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bakehouse' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bakehouse_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function wpb_add_google_fonts() {
   wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Bellota:400,400i|Crimson+Text:400,700&display=swap', false );
   }
   
   add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


function bakehouse_scripts() {
	wp_enqueue_style( 'bakehouse-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bakehouse-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bakehouse-scroll', get_template_directory_uri() . '/js/scroll.js', array('jquery'), '1.0');

	wp_enqueue_script( 'bakehouse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDrPxlYB7npHr8GWZN5yyh-pwozrKXQeaY'	);

	wp_enqueue_script( 'google-map-settings', get_template_directory_uri() . '/js/map.js', array('jquery'), '20200225', false  );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	wp_enqueue_script( 'smoothup', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), "", true );

	// Load Slick Slider only on Home page
	if ( is_front_page() ) {
		// Call in JS files
		wp_enqueue_script(
			'bakehouse-slickslider',
			get_template_directory_uri() .'/js/slick.min.js',
			array( 'jquery' ),
			'20200120',
			true
		);

		wp_enqueue_script(
			'bakehouse-slickslider-settings',
			get_template_directory_uri() .'/js/slick-settings.js',
			array( 'jquery', 'bakehouse-slickslider' ),
			'20200120',
			true
		);

		// Call in CSS files
		wp_enqueue_style(
			'bakehouse-slicktheme',
			get_template_directory_uri() .'/sass/_slickTheme.scss'
		);

		wp_enqueue_style(
			'bakehouse-slick',
			get_template_directory_uri() .'/sass/_slick.scss'
		);

	}

	

}
add_action( 'wp_enqueue_scripts', 'bakehouse_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * custom Post type & taxnomoines
 */
require get_template_directory() .'/inc/register-cpt-tax.php';

// Google Maps
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyDrPxlYB7npHr8GWZN5yyh-pwozrKXQeaY');
}
add_action('acf/init', 'my_acf_init');



// Changing the title of CPT
// Change 'your-cpt-name' to whatever the name of your cpt is
// $title should be renamed as what you want to output in the title box.
function wpb_change_title_text( $title ){
	$screen = get_current_screen();
 
	if  ( 'bakehouse-baker' == $screen->post_type ) {
		 $title = 'Enter bakers name';
	}
 
	return $title;
}
 
add_filter( 'enter_title_here', 'wpb_change_title_text' );


// Removing the 'Archive:' on archive page
add_filter( 'get_the_archive_title', 'tu_archive_title_remove_prefix' );function tu_archive_title_remove_prefix( $title ){if ( is_post_type_archive() ) {$title = post_type_archive_title( '', false );    }return $title;}