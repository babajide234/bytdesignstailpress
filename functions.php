<?php

/**
 * Theme setup.
 */

define( 'WPEXPLORER_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );

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
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );

}

add_action( 'after_setup_theme', 'tailpress_setup' );


// removes woocormerce styling
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// adds support for zoom, lightbox and gallery-slider
add_action( 'after_setup_theme', function() {
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
} );

// removes page title from woocormmerce
add_filter( 'woocommerce_show_page_title', '__return_false' );


// Add content before each product in the shop loop
// function custom_before_shop_loop_item_content() {
//     echo '<div class="custom-content-before-product">This is content before the product.</div>';
// }

// add_action('woocommerce_before_shop_loop_item', 'custom_before_shop_loop_item_content');


// chnage the pagination next and prv icon 
function wpexplorer_woo_pagination_args( $args ) {
    $args['prev_text'] = '<i class="fa fa-angle-left"></i>';
    $args['next_text'] = '<i class="fa fa-angle-right"></i>';
    return $args;
}
add_filter( 'woocommerce_pagination_args', 'wpexplorer_woo_pagination_args' );

// onsale bage change
function wpexplorer_woo_sale_flash() {
	return '<span class="onsale">' . esc_html__( 'Sale', 'text_domain' ) . '</span>';
}
add_filter( 'woocommerce_sale_flash', 'wpexplorer_woo_sale_flash' );




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


// product card edit 
function my_custom_function_after_shop_loop_item_title() {
    // Your custom content goes here

    echo '<p>This is my custom content after the shop loop item title.</p>';
}

add_action('woocommerce_after_shop_loop_item_title','my_custom_function_after_shop_loop_item_title');

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





function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );


add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );

function wpse156165_menu_add_class( $classes, $item, $args ) {
    if(isset($args->add_link_class)) {
        $classes['class'] = $args->add_link_class;
    }
    return $classes;
}


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
// Remove default actions

/**
 * Snippet Name:     WooCommerce Custom Product Data Metabox For Custom Loop Item Text
 * Snippet Author:   ecommercehints.com
*/

add_action ('woocommerce_product_options_advanced', 'ecommercehints_product_data_metabox');
function ecommercehints_product_data_metabox() {
   echo '<div class="options_group">';
   woocommerce_wp_text_input (array (
      'id'                => 'custom_loop_content',
      'value'             => get_post_meta (get_the_ID(), 'custom_loop_content', true),
      'label'             => 'Custom Loop Content',
	  'desc_tip'		  => true,
      'description'       => 'Text to appear on the product loop item'
  ));
   echo '</div>';
}

add_action ('woocommerce_process_product_meta', 'ecommercehints_save_field_on_update', 10, 2);
function ecommercehints_save_field_on_update ($id, $post) {
      update_post_meta ($id, 'custom_loop_content', $_POST['custom_loop_content']);
}

add_action( 'woocommerce_after_shop_loop_item', 'ecommercehints_woocommerce_after_shop_loop_item', 1, 0 );
function ecommercehints_woocommerce_after_shop_loop_item() {
global $product;
$custom_loop_content = $product->get_meta ('custom_loop_content');
echo $custom_loop_content . '<br><br>';
};



function add_to_cart_ajax_handler() {
    $product_id = intval($_POST['product_id']);

    if ($product_id > 0) {
        $result = WC()->cart->add_to_cart($product_id);

        if ($result) {
            // Trigger the added_to_cart event
            do_action('added_to_cart');
            wp_send_json_success();
        } else {
            wp_send_json_error();
        }
    } else {
        wp_send_json_error();
    }
}

add_action('wp_ajax_add_to_cart', 'add_to_cart_ajax_handler');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart_ajax_handler');


// Add styles for quantity input field
// add_action('woocommerce_before_add_to_cart_quantity', 'custom_quantity_input_styles_start', 10);
// add_action('woocommerce_after_add_to_cart_quantity', 'custom_quantity_input_styles_end', 10);

// function custom_quantity_input_styles_start() {
//     echo '<div class=" w-full pl-[25px] pr-[5px] py-2 md:max-2xl:py-3.5 bg-neutral-100 rounded-[10px] justify-center items-center inline-flex">';
// }

// function custom_quantity_input_styles_end() {
//     echo '</div>';
// }

// Remove default quantity field
// remove_action('woocommerce_before_add_to_cart_quantity', 'woocommerce_quantity_input', 10);
// remove_action('woocommerce_after_add_to_cart_quantity', 'woocommerce_quantity_input', 10);

// Add custom quantity input field
// add_action('woocommerce_before_add_to_cart_quantity', 'custom_quantity_input', 10);

// function custom_quantity_input() {
//     global $product;

//     if ($product && $product->is_sold_individually()) {
//         return;
//     }

//     $defaults = array(
//         'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
//         'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
//         'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
//     );

//     woocommerce_quantity_input($defaults);
// }


// 	add_action( 'woocommerce_after_add_to_cart_quantity', 'ts_quantity_plus_sign' );

// 	function ts_quantity_plus_sign() {
// 		$html = '</div>'; // Close the div here
// 		$html .= '<button type="button" class="minus  md:max-2xl:h-11 p-2.5 rounded-sm justify-center items-center gap-2.5 flex">
// 				<div class="w-5 h-5 relative rounded-sm">
// 				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
// 					<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
// 				</svg>
// 				</div>
// 			</button>
// 		';
// 		$html .= '</div>'; 
// 		$html .= '</div>'; 
// 		// Move this line to close the div

// 		echo $html;
// 	}

// 	add_action( 'woocommerce_before_add_to_cart_quantity', 'ts_quantity_minus_sign' );

// 	function ts_quantity_minus_sign() {
		
// 		$html = '<div class="w-full py-2 md:max-2xl:py-3.5 bg-neutral-100 rounded-[10px] justify-center items-center inline-flex">';
// 		$html .= '<div class="w-full justify-between items-center  inline-flex">';
// 		$html .= '
// 			<button type="button" class="plus w-11 md:max-2xl:h-11 p-2.5 rounded-sm justify-center items-center gap-2.5 flex">
// 				<div class="w-5 h-5 relative rounded-sm">
// 				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
// 					<path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
// 				</svg>                              
// 				</div>
// 			</button>
// 		';
// 		$html .= '<div class="md:max-2xl:w-[46px] md:max-2xl:h-[46px] p-2.5 flex-col justify-center items-center gap-2.5 inline-flex">';
// 		echo $html;
// 	}

// 	add_action( 'wp_footer', 'ts_quantity_plus_minus' );

// 	function ts_quantity_plus_minus() {
// 	// To run this on the single product page
// 		if ( ! is_product() ) return;
// ?>	<script type="text/javascript">

// 		jQuery(document).ready(function($){

// 			$('form.cart').on( 'click', 'button.plus, button.minus', function() {

// 					// Get current quantity values
// 					var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
// 					var val = parseFloat(qty.val());
// 					var max = parseFloat(qty.attr( 'max' ));
// 					var min = parseFloat(qty.attr( 'min' ));
// 					var step = parseFloat(qty.attr( 'step' ));

// 					// Change the value if plus or minus
// 					if ( $( this ).is( '.plus' ) ) {
// 						if ( max && ( max <= val ) ) {
// 							qty.val( max );
// 						}else {
// 							qty.val( val + step );
// 						}
// 					}else {
// 						if ( min && ( min >= val ) ) {
// 							qty.val( min );
// 						}else if ( val > 1 ) {
// 							qty.val( val - step );
// 						}
// 					}

// 			});

// 		});

// 	</script>
<?php
// 	}


// Remove the default result count and ordering output
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// add_action('woocommerce_before_shop_loop', 'custom_woocommerce_catalog_ordering', 30);

// function custom_woocommerce_catalog_ordering() {
//     if (woocommerce_products_will_display()) {
//         // Customize the ordering options as needed
//         $ordering_options = array(
//             'menu_order' => __('Default Sorting', 'woocommerce'),
//             'popularity' => __('Sort by Popularity', 'woocommerce'),
//             'rating'     => __('Sort by Average Rating', 'woocommerce'),
//             'date'       => __('Sort by Newness', 'woocommerce'),
//             'price'      => __('Sort by Price: Low to High', 'woocommerce'),
//             'price-desc' => __('Sort by Price: High to Low', 'woocommerce'),
//         );

//         // Get the current selected value
//         $current_value = isset($_GET['orderby']) ? wc_clean($_GET['orderby']) : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));

//         // Output the custom ordering dropdown
//         echo '<form class="woocommerce-ordering" method="get">';
//         echo '<select name="orderby" class="orderby">';

//         foreach ($ordering_options as $key => $label) {
//             echo '<option value="' . esc_attr($key) . '" ' . selected($current_value, $key, false) . '>' . esc_html($label) . '</option>';
//         }

//         echo '</select>';
//         echo '<input type="hidden" name="paged" value="1" />';
//         echo wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page'));

//         echo '</form>';
//     }
// }
// Add a custom wrapper and result count and ordering output
add_action('woocommerce_before_shop_loop', 'custom_result_count_and_ordering', 20);

function custom_result_count_and_ordering() {
    if (woocommerce_products_will_display()) {
        $total_products    = wc_get_loop_prop('total');
        $per_page           = wc_get_loop_prop('per_page');

        if ($total_products <= 0) {
            return;
        }

        

		$result_count = sprintf(
			_n('%1$s Product', '%1$s Products', $total_products, 'woocommerce'),
			'<span class="woocommerce-result-count__total">' . esc_html($total_products) . '</span>'
		);
			
        $result_count .= ' ';


        // Output the wrapper and result count and ordering
        echo '<div class="woocommerce-result-wrapper w-full flex item-center justify-between">';
        echo '<p class="woocommerce-result-count font-dm-sans text-base text-zinc-600">' . $result_count . '</p>';
        
        // Output the ordering dropdown manually
        echo '<div class="woocommerce-catalog-ordering">';
        woocommerce_catalog_ordering();
        echo '</div>';

        echo '</div>';
    }
}



// Remove default pagination output
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

// Add custom pagination output
add_action('woocommerce_after_shop_loop', 'custom_woocommerce_pagination', 10);

function custom_woocommerce_pagination() {
    if (woocommerce_products_will_display()) {
        echo '<div class="woocommerce-pagination-wrapper w-full inline-flex place-content-center gap-6 py-20">';
        echo '<nav class="woocommerce-pagination">';
        $current_page = max(1, get_query_var('paged'));

        $pagination_links = paginate_links(
            array(
                'base'      => esc_url_raw(str_replace(999999999, '%#%', get_pagenum_link(999999999))),
                'format'    => '?paged=%#%',
                'current'   => $current_page ,
                'total'     => wc_get_loop_prop('total_pages'),
                'prev_text' => '
				<button class="w-[40px] h-[40px] rounded flex justify-center items-center border border-solid border-b-gray-300 text-gray-300">
				<span class="">
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
					  d="M15.75 19.5 8.25 12l7.5-7.5"
					/>
				  </svg>
				</span>
			  </button>
				',
                'next_text' => '<button class="w-[40px] h-[40px] rounded flex justify-center items-center border border-solid border-primary text-primary">
				<span>
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
				</span>
			  </button>',
                'type'      => 'custom',
                'end_size'  => 3,
                'mid_size'  => 3,
                'before_page_number' => '<button class=" w-[40px] h-[40px] rounded flex justify-center items-center border border-solid ' . (is_page() ? ' border-b-gray-300 bg-primary text-white' : 'border-primary text-primary') . '">',
                'after_page_number'  => '</button>',
            )
        );

        // Your custom pagination structure
        echo '<div class="custom-pagination flex items-center gap-3">';
        echo $pagination_links;
        echo '</div>';

        echo '</nav>';
        echo '</div>';
    }
}



remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
// Add your custom actions
add_action('woocommerce_single_product_summary', 'custom_template_single_title', 5);
add_action('woocommerce_single_product_summary', 'custom_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'custom_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'custom_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'custom_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'custom_template_single_sharing', 50);

// Define your custom functions
function custom_template_single_title() {
    echo '<h1 class="text-zinc-950 text-[32px] md:max-2xl:text-[52px] font-normal font-dm-sans leading-[52px]">' . get_the_title() . '</h1>';
}

function custom_template_single_rating() {
    echo wc_get_rating_html(get_the_ID());
}

function custom_template_single_price() {
    wc_get_template('single-product/price.php');
}

function custom_template_single_excerpt() {
    echo '<div class="text-[14px] md:max-2xl:text-base">' . get_the_excerpt() . '</div>';
}

function custom_template_single_meta() {
    wc_get_template('single-product/meta.php');
}

function add_to_wishlist() {
    if (isset($_POST['product_id'])) {
        $product_id = intval($_POST['product_id']);

        // Ensure the product ID is valid
        if ($product_id > 0) {
            // Get current user ID
            $user_id = get_current_user_id();

            // Get current wishlist items
            $wishlist_items = get_user_meta($user_id, 'wishlist_items', true);

            // Add the product to the wishlist
            $wishlist_items[] = $product_id;

            // Update user meta with the new wishlist items
            update_user_meta($user_id, 'wishlist_items', $wishlist_items);

            // Output a success message or perform any other action
            echo json_encode(array('status' => 'success', 'message' => 'Product added to wishlist.'));
            die();
        }
    }

    // Output a failure message or perform any other action
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
    die();
}

add_action('wp_ajax_add_to_wishlist', 'add_to_wishlist');
add_action('wp_ajax_nopriv_add_to_wishlist', 'add_to_wishlist');

function custom_template_single_sharing() {
    // Output your custom sharing section content here

    echo '<div class="w-full md:max-2xl:w-[560px] justify-start items-center gap-[11px] inline-flex">';
    echo '<div class="h-8 gap-10 justify-between items-end flex">';
    echo '<button class=" add-to-wishlist-btn justify-start items-center gap-3 flex">';
    echo '<div class="w-8 h-8 relative">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">';
    echo '<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />';
    echo '</svg>';
    echo '</div>';
    echo '<div class="text-zinc-950 text-xl font-normal font-dm-sans leading-tight">Add to wishlist</div>';
    echo '</button>';
    echo '<button class="justify-start items-center gap-3 flex">';
    echo '<div class="w-8 h-8 relative">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">';
    echo '<path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />';
    echo '</svg>';
    echo '</div>';
    echo '<div class="text-black text-xl font-normal font-dm-sans leading-tight">Share</div>';
    echo '</button>';
    echo '</div>';
    echo '</div>';

    echo '</div></div>'; // Close the custom-sharing div and the outer div
}


add_filter('woocommerce_sale_flash', 'avada_hide_sale_flash');
function avada_hide_sale_flash()
{
return false;
}
// Remove the default quantity field
// Add this code in your theme's functions.php file

function remove_default_quantity_input() {
    remove_action('woocommerce_before_add_to_cart_quantity', 'woocommerce_quantity_input_field');
}

// Ensure the priority (third parameter) is high enough to be executed after the WooCommerce action is added
add_action('init', 'remove_default_quantity_input', 20);


// Add your custom quantity input
function custom_quantity_input() {

	global $product;

    echo '<div class=" quantity pl-[25px] pr-[5px] py-2 md:max-2xl:py-3.5 bg-neutral-100 rounded-[10px] justify-center items-center inline-flex">';
    echo '<div class="self-stretch justify-start items-center md:max-2xl:gap-[198px] inline-flex">';
    echo '<button type="button" class=" minus w-11 md:max-2xl:h-11 p-2.5 rounded-sm justify-center items-center gap-2.5 flex">';
    echo '<div class="w-5 h-5 relative rounded-sm">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">';
    echo '<path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />';
    echo '</svg>';
    echo '</div>';
    echo '</button>';
    echo '<div class="md:max-2xl:w-[46px] md:max-2xl:h-[46px] p-2.5 flex-col justify-center items-center gap-2.5 inline-flex">';
	echo '<input type="number" class="input-text qty text bg-neutral-100 outline-none border-none w-full text-black text-2xl font-normal font-dm-sans leading-normal" step="1" min="1" name="quantity" value="' . esc_attr( isset( $_POST['quantity'] ) ? wc_stock_amount( wc_clean( wp_unslash( $_POST['quantity'] ) ) ) : 1 ) . '" title="Qty"  size="4" pattern="[0-9]*" inputmode="numeric">';
    echo '</div>';
    echo '<button type="button" class=" plus w-11 md:max-2xl:h-11 p-2.5 rounded-sm justify-center items-center gap-2.5 flex">';
    echo '<div class="w-5 h-5 relative rounded-sm">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">';
    echo '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />';
    echo '</svg>';
    echo '</div>';
    echo '</button>';
    echo '</div>';
    echo '</div>';
}

add_action('woocommerce_before_add_to_cart_quantity', 'custom_quantity_input');



// Add JavaScript to handle quantity increment and decrement
function custom_quantity_input_script() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('body').on('click', '.plus, .minus', function() {
                // Get current quantity
                var qty = $(this).closest('.quantity').find('.qty');

                // Get step value
                var step = parseFloat(qty.attr('step'));

                // Get current value
                var currentVal = parseFloat(qty.val());

                // Check if button is plus or minus
                if ($(this).is('.plus')) {
                    // Increment quantity
                    qty.val(currentVal + step);
                } else {
                    // Decrement quantity, but not below the minimum value
                    qty.val(Math.max(currentVal - step, 1));
                }

                // Trigger change event
                qty.trigger('change');
            });
        });
    </script>
    <?php
}

add_action('wp_footer', 'custom_quantity_input_script');
// Remove the default quantity field

// function enqueue_custom_quantity_script() {
//     if (is_product()) {
//         wp_enqueue_script('custom-quantity-script', get_template_directory_uri() . '/js/custom-quantity-script.js', array('jquery'), null, true);
//     }
// }

// add_action('wp_enqueue_scripts', 'enqueue_custom_quantity_script');
