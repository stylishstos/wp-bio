<?php

require_once(get_template_directory().'./inc/nav-walker.php');
require_once(get_template_directory().'./inc/header-nav-walker.php');
require_once(get_template_directory().'./inc/wp-eco-extentions.php');

if ( ! function_exists( 'ecomaster_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function ecomaster_setup() {
        // This theme uses wp_nav_menu() in locations.
        register_nav_menus(
            array(
                'main' => __( 'Main', 'ecomaster' ),
                'header' => __( 'Header', 'ecomaster' )
            )
        );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // add_theme_support( 'custom-header' );

        add_theme_support(
            'custom-logo',
            array(
                'flex-width' => true,
            )
        );
    }
endif;

add_action( 'after_setup_theme', 'ecomaster_setup');

function eco_nav_menu_css_class ($classes, $item, $args, $depth) {
    if ("menu" === strtolower($args->theme_location)):
        return array_merge($classes, array("col", "text-center", "flex-grow-0"));
    endif;

    return $classes;
}

add_filter('nav_menu_css_class', 'eco_nav_menu_css_class', 10 , 4 );

function eco_nav_menu_link_attributes($atts, $item, $args, $depth) {
    if ("menu" === strtolower($args->theme_location)):
        $atts["class"] = "link nav-link";
        $atts["href"] = "/#".str_replace('/', '', parse_url($atts["href"])["path"]);
    endif;

    return $atts;
}

add_filter('nav_menu_link_attributes', 'eco_nav_menu_link_attributes', 10 , 4 );

function eco_nav_menu_item_title ($title, $item, $args, $depth) {
    if ("menu" === strtolower($args->theme_location)):
        return array_shift(explode(' ', $title));
    endif;

    return $title;
}

add_filter('nav_menu_item_title', 'eco_nav_menu_item_title', 10 , 4 );

/**
 * Enqueue scripts and styles.
 */

function ecomaster_scripts() {
    wp_enqueue_style( 'ecomaster-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'ecomaster_scripts' );