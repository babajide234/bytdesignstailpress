<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="text-zinc-600 text-[32px] font-normal font-dm-sans leading-loose">
    <?php
    $regular_price = $product->get_regular_price();
    $sale_price    = $product->get_sale_price();

    if ( $product->is_on_sale() && $sale_price && $regular_price ) {
        // Sale price with regular price strikethrough
        echo '<del>' . wc_price( $regular_price ) . '</del> <ins>' . wc_price( $sale_price ) . '</ins>';
    } else {
        // Regular price
        echo $product->get_price_html();
    }
    ?>
</p>