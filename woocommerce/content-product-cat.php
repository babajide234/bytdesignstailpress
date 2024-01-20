<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_a( $category, 'WP_Term' ) ) {
    $category_name = $category->name;
    $category_link = get_term_link( $category );

    // Check if the category has a valid name and link
    if ( $category_name && ! is_wp_error( $category_link ) ) {
        ?>
        <a href="<?php echo esc_url( $category_link ); ?>" class="w-[274px] h-[336px] md:max-2xl:w-full md:max-2xl:h-[230px] md:max-2xl:p-[18px] rounded-[10px] flex-col justify-start items-center gap-[18px] flex flex-grow-0 flex-shrink-0">
            <h2><?php echo esc_html( $category_name ); ?></h2>
            <!-- Add any additional content you want to display for each category -->
        </a>
        <?php
    }
}

?>