<?php
// loading styles and scripts
function load_style_script(){
    wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Lato:400,700,900|Poppins:400,500,600,700', array(), null);
    wp_enqueue_style('font-awesome-5', '//use.fontawesome.com/releases/v5.5.0/css/all.css', array(), '5.5.0');
    wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/screen.css', array(), '1.4.2' );
    wp_enqueue_style('style', get_stylesheet_uri(), array(), null );

    wp_enqueue_script('modernizr.min', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.8.3', false );
    if ( !wp_script_is( 'jquery' ) ) {
        wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4', false  );
    }
    wp_enqueue_script('smooth-scroll.polyfills.min', '//cdnjs.cloudflare.com/ajax/libs/smooth-scroll/15.1.0/smooth-scroll.polyfills.min.js', array(), '15.1.0', true );
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/custom/scripts.js', array('jquery'), null, true );
}
add_action('wp_enqueue_scripts', 'load_style_script');


// loading styles and scripts for admin panel
//function load_admin_style_script(){
//    wp_enqueue_style('custom-wp-admin-style', get_template_directory_uri() . '/css/custom-wp-admin-style.css', array('acf-input') );
//    wp_enqueue_script('custom-wp-admin-script', get_template_directory_uri() . '/js/custom-wp-admin-script.js', array('jquery'), null, true );
//}
//add_action('admin_enqueue_scripts', 'load_admin_style_script');


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
    h1 a {height:142px !important; width:190px !important; background-size:contain !important; background-image:url('.get_bloginfo("template_url").'/img/logo.png) !important;}
    </style>';
}
add_action('login_head', 'my_custom_login_logo');

add_filter( 'login_headerurl', create_function('', 'return get_home_url();') );
add_filter( 'login_headertitle', create_function('', 'return false;') );


// no information explaining the situation will appear when an incorrect login or password is entered
add_filter('login_errors',create_function('$a', "return null;"));


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


// support menus
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(array(
        'main-menu'     => 'Main Menu',
        'footer-menu'   => 'Footer Menu'
    ));
}


// for excerpts
//function new_excerpt_more( $more ) {
//    return '&nbsp;&hellip;';
//}
//add_filter( 'excerpt_more', 'new_excerpt_more' );


//function new_excerpt_length($length) {
//  return 30;
//}
//add_filter('excerpt_length', 'new_excerpt_length');

/* Hack on overwriting the guid parameter when publishing or updating a post in the admin panel (the permalink in the current structure is written)
--------------------------------------------------------------------------------------------------------------------------------- */
//function guid_write( $id ){
//    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
//
//    global $wpdb;
//
//    if( $id = (int) $id )
//        $wpdb->query("UPDATE $wpdb->posts SET guid='". get_permalink($id) ."' WHERE ID=$id LIMIT 1");
//}
//add_action ('save_post', 'guid_write', 100);



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


//// for 2x image resize
//function image_style_2x( $url ) {
//    if ( strpos($url, '@2x') !== false ) {
//        $attrs  = getimagesize(esc_url($url));
//        $output = 'width:'. floor($attrs[0] / 2) .'px; height:'. floor($attrs[1] / 2) .'px;';
//    } else {
//        $output = '';
//    }
//
//    return $output;
//}


// get current URL
//function current_url() {
//    global $wp;
//    if(!$wp->did_permalink){
//        $output = home_url(add_query_arg($wp->query_string));
//    } else {
//        $output = home_url(add_query_arg(array(),$wp->request).'/');
//    }
//
//    return $output;
//}
