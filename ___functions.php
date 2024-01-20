<?php
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);
	add_theme_support( 'woocommerce' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	// add_theme_support( 'post-thumbnails' );

	// add_theme_support( 'align-wide' );
	// add_theme_support( 'wp-block-styles' );

	// add_theme_support( 'editor-styles' );
	// add_editor_style( 'css/editor-style.css' );

}

add_action( 'after_setup_theme', 'tailpress_setup' );


/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array('jquery'), $theme->get( 'Version' ),true );
	
	wp_localize_script('tailpress', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));

}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );


function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

// custom menu
function woocommerce_custom_menu(){
    register_nav_menu('top-menu', __('Woocommerce Custom Menu', 'woocommercecustommenu'));
}

add_action( 'init', 'woocommerce_custom_menu' );


// woocommerce support initaialization

if(class_exists('WooCommerce')){
    // WooCommerce Support 
    
    function bytdesigns_add_woocommerce_support(){
        add_theme_support( 'woocommerce' );
    }

    add_action('after_setup_theme','bytdesigns_add_woocommerce_support');


    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );

}

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/**
 * Change several of the breadcrumb defaults
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '<span class="text-white">
			<svg
			  xmlns="http://www.w3.org/2000/svg"
			  fill="none"
			  viewBox="0 0 24 24"
			  stroke-width="1.5"
			  stroke="currentColor"
			  data-slot="icon"
			  class="w-6 h-6"
			>
			  <path
				stroke-linecap="round"
				stroke-linejoin="round"
				d="m8.25 4.5 7.5 7.5-7.5 7.5"
			  />
			</svg>
		  </span> ',
            'wrap_before' => '<nav class="flex gap-3 place-content-center text-white text-normal text-md font-dm-sans" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
// product category 

// add_filter( 'product_cat_class', 'filter_product_cat_class', 10, 3 );
// function filter_product_cat_class( $classes, $class, $category ){
//     $classes[] = 'custom_cat';

//     return $classes;
// }





 

add_filter( 'woocommerce_show_page_title', '__return_false' );
