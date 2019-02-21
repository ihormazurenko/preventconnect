<?php
// loading styles and scripts
function load_style_script(){
    wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Lato:400,700,900|Poppins:400,500,600,700', array(), null);
    wp_enqueue_style('font-awesome-5', '//use.fontawesome.com/releases/v5.5.0/css/all.css', array(), '5.5.0');
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/assets/css/screen.css', array(), null );
    wp_enqueue_style('style', get_stylesheet_uri(), array(), null );

    wp_enqueue_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.8.3', false );
    if ( !wp_script_is( 'jquery' ) ) {
        wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4', false  );
    }
    wp_enqueue_script('smooth-scroll.polyfills', '//cdnjs.cloudflare.com/ajax/libs/smooth-scroll/15.1.0/smooth-scroll.polyfills.min.js', array(), '15.1.0', true );
    wp_enqueue_script('signup-form-widget', '//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js', array('jquery'), null, true );
    wp_enqueue_script('magnific', get_template_directory_uri() . '/assets/js/magnific.js', array(), '1.1.0', true );
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/assets/js/custom/scripts.js', array('jquery'), null, true );
}
add_action('wp_enqueue_scripts', 'load_style_script');


add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
function load_custom_wp_admin_style() {
    
    wp_enqueue_script( 'custom_wp_admin_js', get_stylesheet_directory_uri() . '/assets/js/custom/custom_wp_admin_scripts.js', array( 'jquery' ) );
    
   
}


// add ie conditional html5 shiv to header
function add_ie_html5_shiv () {
    global $is_IE;
    if ($is_IE) {
        echo '<!--[if lt IE 9]>';
        echo '<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>';
        echo '<![endif]-->';
    }
}
add_action('wp_head', 'add_ie_html5_shiv');


// logo at the entrance to the admin panel
function my_custom_login_logo(){
    echo '<style type="text/css">
    h1 a {height:51px !important; width:300px !important; background-size:contain !important; background-image:url('.get_bloginfo("template_url").'/img/PC_logo.png) !important;}
    </style>';
}
add_action('login_head', 'my_custom_login_logo');

add_filter( 'login_headerurl', function() { return get_home_url(); } );
add_filter( 'login_headertitle', function() { return false; } );

// no information explaining the situation will appear when an incorrect login or password is entered
add_filter('login_errors', function() { return null; } );


// delete unnecessary items in wp_head
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );


// remove the wrapped <p> tag from images in the content
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');


// automatic generation of the tag <title>
add_theme_support( 'title-tag' );
// adding html5 markup
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

// support custom logo
add_theme_support( 'custom-logo', array(
    'flex-height' => true,
    'flex-width'  => true
) );
add_theme_support( 'custom-logo' );


// support thumbnails
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

add_image_size( 'archive-thumb', 600, 383, true ); // Hard Crop Mode
add_image_size( 'featured-thumb', 900, 575, true ); // Hard Crop Mode

// Register the three useful image sizes for use in Add Media modal



// support menus
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(array(
        'main-menu'     => 'Main Menu',
        'footer-menu'   => 'Footer Menu'
    ));
}


// for excerpts
function new_excerpt_more( $more ) {
    return '&nbsp;&hellip;';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


function new_excerpt_length($length) {
	if (is_front_page()) {
		return 100;
	} else {
		return 20;
	}
}
add_filter('excerpt_length', 'new_excerpt_length');



/* Hack on overwriting the guid parameter when publishing or updating a post in the admin panel (the permalink in the current structure is written)
--------------------------------------------------------------------------------------------------------------------------------- */
function guid_write( $id ){
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  )
        return false;

    global $wpdb;

    if( $id = (int) $id )
        $wpdb->query("UPDATE $wpdb->posts SET guid='". get_permalink($id) ."' WHERE ID=$id LIMIT 1");
}
add_action ('save_post', 'guid_write', 100);



// Prohibit access to the file editor by a direct link wp-admin/theme-editor.php:
function disable_editing_theme() {
    if (stripos($_SERVER['PHP_SELF'], '/wp-admin/theme-editor.php')) :
        wp_redirect(admin_url());
        exit;
    endif;
}
add_action('admin_init', 'disable_editing_theme', 999);

// Delete the menu item Editor from the admin menu:
function remove_theme_editor_page() {
    remove_submenu_page('themes.php', 'theme-editor.php');
}
add_action('admin_menu', 'remove_theme_editor_page', 999);


// for Options Page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page('Theme Options');
}


// for conferences date field
function before_save_conference($post_id) {

    // if revision or post autosave or insufficient editing permissions
    if ( wp_is_post_revision($post_id) || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || !current_user_can( 'edit_post', $post_id ) )
        return;

    if (empty($_POST['acf']))
        return;


    if ( $_POST['acf']['field_5c5b4e74a0a9f']['field_5c5ae765e5e1f'] || $_POST['acf']['field_5c5b4e74a0a9f']['field_5c5b4e93a0aa0'] ) :
        $start  = $_POST['acf']['field_5c5b4e74a0a9f']['field_5c5ae765e5e1f'] ? strtotime($_POST['acf']['field_5c5b4e74a0a9f']['field_5c5ae765e5e1f']) : '';

        if ( $_POST['acf']['field_5c5b4e74a0a9f']['field_5c5b4e93a0aa0'] ) {
            $end = strtotime($_POST['acf']['field_5c5b4e74a0a9f']['field_5c5b4e93a0aa0']);
        } elseif ( $_POST['acf']['field_5c5b4e74a0a9f']['field_5c5ae765e5e1f'] ) {
            $end = strtotime($_POST['acf']['field_5c5b4e74a0a9f']['field_5c5ae765e5e1f']);
        }
        $end = $end ? $end+86400 : '';

        // file_put_contents(get_theme_file_path().'/test.txt', $end);
        // delete_post_meta($post_id, 'percentage');
        update_post_meta($post_id, 'dates_start_U', $start);
        update_post_meta($post_id, 'dates_end_U', $end);
    endif;

    return $post_id;

}
add_action('save_post', 'before_save_conference', -1);