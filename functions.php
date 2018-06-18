<?php

/** Tell WordPress to run theme_setup() when the 'after_setup_theme' hook is run. */

if ( ! function_exists( 'theme_setup' ) ):

function theme_setup() {

	/* This theme uses post thumbnails (aka "featured images")
	*  all images will be cropped to thumbnail size (below), as well as
	*  a square size (also below). You can add more of your own crop
	*  sizes with add_image_size. */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(120, 90, true);
	add_image_size('square', 150, 150, true);


	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/* This theme uses wp_nav_menu() in one location.
	* You can allow clients to create multiple menus by
  * adding additional menus to the array. */
	function register_my_menus() {
	  register_nav_menus(
	    array(
	      'loggedout-menu' => __( 'Logged Out Menu' ),
	      'loggedintrainee-menu' => __( 'Logged In Trainee Menu' ),
	      'loggedinclinician-menu' => __( 'Logged In Clinician Menu' )
	    )
	  );
	}
	add_action( 'init', 'register_my_menus' );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

}
endif;

add_action( 'after_setup_theme', 'theme_setup' );


/* Add all our JavaScript files here.
We'll let WordPress add them to our templates automatically instead
of writing our own script tags in the header and footer. */

function hackeryou_scripts() {

	//Don't use WordPress' local copy of jquery, load our own version from a CDN instead
	wp_deregister_script('jquery');
  wp_enqueue_script(
  	'jquery',
  	"http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js",
  	false, //dependencies
  	null, //version number
  	true //load in footer
  );

  wp_enqueue_script(
    'plugins', //handle
    get_template_directory_uri() . '/js/plugins.js', //source
    false, //dependencies
    null, // version number
    true //load in footer
  );

  wp_enqueue_script(
    'swiper', //handle
    get_template_directory_uri() . '/js/swiper.min.js', //source
    array( 'jquery'), //dependencies
    null, // version number
    true //load in footer
  );

// bxslider.
  wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array( 'jquery' ), null, true );

  // Smooth Scroll.
    wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.min.js', array( 'jquery' ), null, true );

  wp_enqueue_script(
    'scripts', //handle
    get_template_directory_uri() . '/js/main.min.js', //source
    array( 'jquery', 'plugins', 'swiper', 'smooth-scroll' ), //dependencies
    null, // version number
    true //load in footer
  );

  // STYLES.
  wp_enqueue_style( 'bxslider-style', get_template_directory_uri() . '/jquery.bxslider.css' );
}

add_action( 'wp_enqueue_scripts', 'hackeryou_scripts' );


/* Custom Title Tags */

function hackeryou_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'hackeryou' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'hackeryou_wp_title', 10, 2 );

/*
  Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function hackeryou_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'hackeryou_page_menu_args' );


/*
 * Sets the post excerpt length to 40 characters.
 */
function hackeryou_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'hackeryou_excerpt_length' );

/*
 * Returns a "Continue Reading" link for excerpts
 */
function hackeryou_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">Continue reading <span class="meta-nav">&rarr;</span></a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and hackeryou_continue_reading_link().
 */
function hackeryou_auto_excerpt_more( $more ) {
	return ' &hellip;' . hackeryou_continue_reading_link();
}
add_filter( 'excerpt_more', 'hackeryou_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function hackeryou_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= hackeryou_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'hackeryou_custom_excerpt_more' );


/*
 * Register a single widget area.
 * You can register additional widget areas by using register_sidebar again
 * within hackeryou_widgets_init.
 * Display in your template with dynamic_sidebar()
 */
function hackeryou_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => 'Primary Widget Area',
		'id' => 'primary-widget-area',
		'description' => 'The primary widget area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}

add_action( 'widgets_init', 'hackeryou_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 */
function hackeryou_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'hackeryou_remove_recent_comments_style' );


if ( ! function_exists( 'hackeryou_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 */
function hackeryou_posted_on() {
	printf('<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s',
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr( 'View all posts by %s'), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'hackeryou_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 */
function hackeryou_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	} else {
		$posted_in = 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.';
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/* Get rid of junk! - Gets rid of all the crap in the header that you dont need */

function clean_stuff_up() {
	// windows live
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	// wordpress gen tag
	remove_action('wp_head', 'wp_generator');
	// comments RSS
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 3 );
}

add_action('init', 'clean_stuff_up');


/* Here are some utility helper functions for use in your templates! */

/* pre_r() - makes for easy debugging. <?php pre_r($post); ?> */
function pre_r($obj) {
	echo "<pre>";
	print_r($obj);
	echo "</pre>";
}

/* is_blog() - checks various conditionals to figure out if you are currently within a blog page */
function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

/* get_post_parent() - Returns the current posts parent, if current post if top level, returns itself */
function get_post_parent($post) {
	if ($post->post_parent) {
		return $post->post_parent;
	}
	else {
		return $post->ID;
	}
}


//REGISTER SIDEBAR
function child_register_sidebar(){
    register_sidebar(array(
        'name'           => 'Login',
        'id'             => 'login',
        'before_widget'  => '<div id="%1$s" class="widget %2$s">',
        'after_widget'   => '</div>',
        'before_title'   => '<h4 class="widgettitle">',
        'after_title'    => '</h4>',
    ));
}
add_action( 'widgets_init', 'child_register_sidebar' );

// Prevent non-admin users from seeing wp-admin bar.
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}


function add_login_to_nav( $loggon, $args ) {

	$logout = wp_logout_url( home_url('/login/') );

	if(is_user_logged_in()) {
	    $loggon .=  '<li><a href="' . $logout . '" class="login-button">logout <i class="fa fa-sign-in"></i> </a></li>';
	} else {
	    $loggon .= '<li><a href="' . home_url('/login/') . '" class="login-button">login <i class="fa fa-sign-in"></i> </a></li>';
	}
    return $loggon;
}
add_filter( 'wp_nav_menu_items', 'add_login_to_nav', 10, 2 );



// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Trainee Resources', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Trainee Resource', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Trainee Resources', 'text_domain' ),
		'name_admin_bar'        => __( 'Trainee Resource', 'text_domain' ),
		'archives'              => __( 'Trainee Resource Archives', 'text_domain' ),
		'attributes'            => __( 'Trainee Resource Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Trainee Resource:', 'text_domain' ),
		'all_items'             => __( 'All Trainee Resources', 'text_domain' ),
		'add_new_item'          => __( 'Add New Trainee Resource', 'text_domain' ),
		'add_new'               => __( 'Add New Trainee Resource', 'text_domain' ),
		'new_item'              => __( 'New Trainee Resource', 'text_domain' ),
		'edit_item'             => __( 'Edit Trainee Resource', 'text_domain' ),
		'update_item'           => __( 'Update Trainee Resource', 'text_domain' ),
		'view_item'             => __( 'View Trainee Resource', 'text_domain' ),
		'view_items'            => __( 'View Trainee Resources', 'text_domain' ),
		'search_items'          => __( 'Search Trainee Resource', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Trainee Resource', 'text_domain' ),
		'description'           => __( 'Trainee Resource Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'           	=> array( 'title', 'editor', 'custom-fields'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'trainee-resource', $args );

}
add_action( 'init', 'custom_post_type', 0 );

// ADD SUPERSCRIPT BUTTON TO VISUAL EDITOR
function my_mce_buttons_2($buttons) {	
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'sup';
	$buttons[] = 'sub';

	return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');


