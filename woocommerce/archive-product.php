<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 */

defined( 'ABSPATH' ) || exit;
global $product;

// var_dump($product)
?>
<section class="px-5 md:max-2xl:px-20 w-full flex flex-col gap-[32px]">

<?php
if ( woocommerce_product_loop() ) {


	do_action( 'woocommerce_before_shop_loop' );
	
	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

    do_action( 'woocommerce_after_shop_loop' );

    
} else {
    do_action( 'woocommerce_no_products_found' );
}


?>

</section>


