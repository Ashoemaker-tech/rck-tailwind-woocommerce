<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;  

/**  
* Setup common theme functions
* !Styles and JS are injected by Main.js no need to enqueue them here
**/

function rck_setup() {

    /** 
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    **/

	add_theme_support( 'title-tag' );

	/**
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    **/

	add_theme_support( 'post-thumbnails' );

	// Create menu locations for theme
    $locations = array(
        'primary' => 'Primary Navbar Menu',
        'footer' => 'Footer Menu',
        'mobile' => 'Mobile Menu',
    );
	register_nav_menus($locations);


	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 **/

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
     * Add WooCommerce support
     **/
    if (class_exists( 'wooCommerce' ) ) {
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        /**
         * Remove WooCommerce Default Styles
         **/
        // add_filter( 'woocommerce_enqueue_styles', '__return_false' );
        add_filter('woocommerce_show_page_title', '__return_false');
    }
}

add_action( 'after_setup_theme', 'rck_setup' );


// Add Laravel Blade template engine to WordPress
require_once get_template_directory() . '/blade.php';

/** 
 * Main switch to get fontend assets from a Vite dev server OR from production built folder
 * It is recommeded to move it into wp-config.php
 **/ 

 define('IS_VITE_DEVELOPMENT', true);


include "inc/inc.vite.php";


