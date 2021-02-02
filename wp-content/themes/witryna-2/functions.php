<?php
/**
 * Witryna #2 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Witryna_#2
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'witryna_2_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function witryna_2_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Witryna #2, use a find and replace
		 * to change 'witryna-2' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'witryna-2', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'witryna-2' ),
                'footer_menu' => 'Menu Footer',
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
				'witryna_2_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'witryna_2_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function witryna_2_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'witryna_2_content_width', 640 );
}
add_action( 'after_setup_theme', 'witryna_2_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function witryna_2_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'witryna-2' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'witryna-2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'witryna_2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function witryna_2_scripts() {
	wp_enqueue_style( 'witryna-2-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'witryna-2-style', 'rtl', 'replace' );

	wp_enqueue_script( 'witryna-2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'witryna_2_scripts' );

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
 * Enqueues styles for front-end.
 */
function witryna_theme_styles() {

    /*
     * Loads our main stylesheet.
     */
    wp_enqueue_style( 'witryna-theme-style', get_stylesheet_directory_uri() . '/base.css' );
}
add_action( 'wp_enqueue_scripts', 'witryna_theme_styles' );


/**
 * Enqueues scripts for front-end.
 */

function witryna_theme_scripts() {

    /*
    * Load our main theme JavaScript file
    */
    wp_enqueue_script( 'witryna_theme_js', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'witryna_theme_scripts' );

function misha_my_load_more_scripts() {

    global $wp_query;
    // register our main script but do not enqueue it yet
    wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
    wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){
    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $other = new WP_Query($args);
    if( $other->have_posts() ) :?>
        <?php
            $maxCount = $other->post_count;
            $i = 0;
        ?>
        <section class="section section-bg">
            <div class="center-wrapper">
                <?php if($i+3 < $maxCount):?>
                    <div class="line line_of-3">
                        <?php set_query_var( 'date', true );?>
                        <?php for ($i; $i < 3; $i++){
                            set_query_var( 'buf', $other->posts[$i] );
                            get_template_part('template-parts/card');
                        }?>
                    </div>
                <?php endif;?>
                <?php if($i+6 <= $maxCount):?>
                    <div class="column_of-6">
                        <?php set_query_var( 'date', false );?>
                        <?php for ($i; $i < 9; $i++){
                            set_query_var( 'buf', $other->posts[$i] );
                            get_template_part('template-parts/card');
                        }?>
                    </div>
                <?php endif;?>
            </div>
        </section>
        <section class="section decorated-bottom">
            <div class="center-wrapper">
                <?php if($i + 4 < $maxCount):?>
                    <div class="line line_of-4">
                        <?php set_query_var( 'date', true );?>
                        <?php for ($i; $i < 13; $i++){
                            set_query_var( 'buf', $other->posts[$i] );
                            get_template_part('template-parts/card');
                        }?>
                    </div>
                <?php endif;?>
            </div>
        </section>
        <section class="section section-bg">
            <div class="center-wrapper">
                <?php if($i + 3 < $maxCount):?>
                    <div class="line line_of-3">
                        <?php set_query_var( 'date', true );?>
                        <?php for ($i; $i < 16; $i++){
                            set_query_var( 'buf', $other->posts[$i] );
                            get_template_part('template-parts/card');
                        }?>
                    </div>
                <?php endif;?>
                <?php if($i + 6 <= $maxCount):?>
                    <div class="column_of-6">
                        <?php set_query_var( 'date', false );?>
                        <?php for ($i; $i < 22; $i++){
                            set_query_var( 'buf', $other->posts[$i] );
                            get_template_part('template-parts/card');
                        }?>
                    </div>
                <?php endif;?>
            </div>
        </section>
        <?php if($i + 4 <= $maxCount):?>
            <section class="section decorated-bottom">
                <div class="center-wrapper">
                    <div class="line line_of-4">
                        <?php set_query_var( 'date', true );?>
                        <?php for ($i; $i < 26; $i++){
                            set_query_var( 'buf', $other->posts[$i] );
                            get_template_part('template-parts/card');
                        }?>
                    </div>
                </div>
            </section>
        <?php endif;?>
    <?php endif;
    die();
}



add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}