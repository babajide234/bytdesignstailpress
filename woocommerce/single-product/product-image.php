<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 */

    defined( 'ABSPATH' ) || exit;

    if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
        return;
    }

    global $product;

    $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
    $post_thumbnail_id = $product->get_image_id();
    $wrapper_classes   = apply_filters(
        'woocommerce_single_product_image_gallery_classes',
        array(
            'woocommerce-product-gallery',
            'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
            'woocommerce-product-gallery--columns-' . absint( $columns ),
            'images',
        )
    );
?>
<div class=" w-full flex flex-col gap-[24px] <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>">
  <div class="w-full flex-col justify-center items-center inline-flex overflow-hidden">
    <?php
		if ( $post_thumbnail_id ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image w-full h-full md:max-2xl:h-[740px] object-cover" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
            
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		do_action( 'woocommerce_product_thumbnails' );
	?>
  </div>
</div>
<!-- <div class="   <?php echo esc_attr( implode( ' ', array_map( '', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="w-full h-[532px] md:max-2xl:h-[640px] flex-col justify-center items-center inline-flex overflow-hidden">
		<?php
		// if ( $post_thumbnail_id ) {
		// 	$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		// } else {
		// 	$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
		// 	$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
		// 	$html .= '</div>';
		// }

		// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		// do_action( 'woocommerce_product_thumbnails' );
		?>
	</div>
</div> -->