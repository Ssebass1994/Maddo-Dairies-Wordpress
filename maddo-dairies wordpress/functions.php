<?php
if (!defined('ABSPATH')) exit;

function maddo_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menus(array('primary'=>'Main Navigation'));
}
add_action('after_setup_theme','maddo_setup');

function maddo_page_definitions(){
    return array(
        'home' => 'Home',
        'about-us' => 'About Us',
        'our-products' => 'Our Products',
        'partnership-logistics' => 'Partnership Logistics',
        'contact-us-feedback' => 'Contact Us & Feedback',
        'login' => 'Login',
        'order-products' => 'Order Products',
        'send-suggestions' => 'Send Suggestions',
    );
}

function maddo_current_slug(){
    if (is_front_page()) return 'home';
    if (is_page()) return get_post_field('post_name', get_queried_object_id());
    return '';
}

function maddo_body_class($classes){
    $slug = maddo_current_slug();
    if ($slug) $classes[] = 'maddo-page-' . sanitize_html_class($slug);
    return $classes;
}
add_filter('body_class','maddo_body_class');

/** Return the real WordPress permalink, including on sites using plain permalinks. */
function maddo_page_url($slug){
    $page = get_page_by_path($slug, OBJECT, 'page');
    if ($page) return get_permalink($page->ID);
    return home_url('/' . trim($slug, '/') . '/');
}

function maddo_assets(){
    $css_dir = get_theme_file_path('/assets/css/');
    $main_file = $css_dir . 'maddo.css';
    if (file_exists($main_file)) {
        wp_enqueue_style('maddo-main', get_theme_file_uri('/assets/css/maddo.css'), array(), filemtime($main_file));
    }

    // Enqueue every stylesheet shipped in assets/css, in addition to the base stylesheet.
    foreach ((array) glob($css_dir . '*.css') as $file){
        $name = basename($file, '.css');
        if ($name === 'maddo' || $name === 'login-original') continue;
        wp_enqueue_style('maddo-' . sanitize_key($name), get_theme_file_uri('/assets/css/' . basename($file)), array('maddo-main'), filemtime($file));
    }

    $js_file = get_theme_file_path('/assets/js/maddo.js');
    if (file_exists($js_file)) {
        wp_enqueue_script('maddo-js', get_theme_file_uri('/assets/js/maddo.js'), array(), filemtime($js_file), true);
    }

    if (is_page('login') || maddo_current_slug() === 'login') {
        $login_css = $css_dir . 'login-original.css';
        if (file_exists($login_css)) {
            wp_enqueue_style('maddo-login-original', get_theme_file_uri('/assets/css/login-original.css'), array('maddo-login'), filemtime($login_css));
        }
        $portal_js = get_theme_file_path('/assets/js/login-portal.js');
        if (file_exists($portal_js)) {
            wp_enqueue_script('maddo-login-portal', get_theme_file_uri('/assets/js/login-portal.js'), array(), filemtime($portal_js), true);
        }
    }
}
add_action('wp_enqueue_scripts','maddo_assets');

/** Ensure dropdown destinations exist even when the theme was already activated. */
function maddo_ensure_pages(){
    if (!current_user_can('edit_pages')) return;
    $changed = false;
    foreach (maddo_page_definitions() as $slug => $title){
        $page = get_page_by_path($slug, OBJECT, 'page');
        if (!$page){
            $existing = get_page_by_title($title, OBJECT, 'page');
            if ($existing){
                // Preserve an existing page and repair its expected slug.
                $updated = wp_update_post(array('ID'=>$existing->ID, 'post_name'=>$slug), true);
                if (!is_wp_error($updated)) $changed = true;
            } else {
                $created = wp_insert_post(array(
                    'post_title'=>$title,
                    'post_name'=>$slug,
                    'post_status'=>'publish',
                    'post_type'=>'page'
                ), true);
                if (!is_wp_error($created) && $created) $changed = true;
            }
        }
    }
    if ($changed || get_option('maddo_rewrite_version') !== '2'){
        flush_rewrite_rules(false);
        update_option('maddo_rewrite_version', '2');
    }
}
add_action('admin_init','maddo_ensure_pages',20);
add_action('after_switch_theme', function(){ maddo_ensure_pages(); flush_rewrite_rules(); });
