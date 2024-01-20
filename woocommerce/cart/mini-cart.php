<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<ul class=" w-full pt-[22px] flex-col justify-center items-center gap-3 flex woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				/**
				 * This filter is documented in woocommerce/templates/cart/cart.php.
				 *
				 * @since 2.1.0
				 */
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<!-- <li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<?php
					echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							/* translators: %s is the product name */
							esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						),
						$cart_item_key
					);
					?>
					<?php if ( empty( $product_permalink ) ) : ?>
						<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php else : ?>
						<a href="<?php echo esc_url( $product_permalink ); ?>">
							<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</a>
					<?php endif; ?>
					<?php //echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</li> -->

				<div class="w-full px-5 justify-between items-center inline-flex">
					<div class="w-20 bg-gray-300 rounded flex-col justify-center items-center flex">
						<?php echo $thumbnail ?>
					</div>
					<div class="w-[315px] flex-col justify-start items-start gap-[18px] inline-flex">
						<div class="self-stretch h-[38px] flex-col justify-start items-start gap-3 flex">
							<div class="self-stretch h-3.5 flex-col justify-center items-center gap-2.5 flex">
								<div class="self-stretch justify-between items-start inline-flex">
									<a href="<?php echo $product_permalink ?>" class="text-black text-sm font-normal font-dm-sans leading-[14px]"><?php echo $product_name ?></a>
									<div class="text-black text-sm font-normal font-dm-sans leading-[14px]"><?php echo $product_price ?></div>
								</div>
							</div>
							<div class="w-[226px] pr-2 justify-start items-center gap-6 inline-flex">
								<div class="w-[170px] flex-col justify-start items-start gap-2 inline-flex">
									<div class="text-black text-opacity-50 text-xs font-normal font-dm-sans leading-3">Size, small</div>
								</div>
							</div>
						</div>
						<div class="self-stretch justify-between items-start inline-flex">
							<div class="px-1 py-0.5 rounded border border-black border-opacity-10 justify-center items-center gap-[15px] flex">
								<button class="w-5 h-5 p-[4.55px] rounded-[0.91px] justify-center items-center gap-[4.55px] flex">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
										<path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
									</svg>                                          
								</button>
								<input type="number" class="w-5 text-zinc-950 text-[10px] font-normal font-dm-sans leading-[10px] outline-none border-none"/>
								<button class="w-5 h-5 p-[4.55px] rounded-[0.91px] justify-center items-center gap-[4.55px] flex">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
										<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
									</svg>
								</button>
							</div>
							<div class="p-1 bg-white rounded-sm justify-center items-start gap-2.5 flex">
								<div class="w-[18px] h-[18px] relative">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[18px] h-[18px]">
										<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
									</svg>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
	</ul>



	<p class="woocommerce-mini-cart__total total">
		<?php
		/**
		 * Hook: woocommerce_widget_shopping_cart_total.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action( 'woocommerce_widget_shopping_cart_total' );
		?>
	</p>
	<div class="flex justify-between items-center gap-4">
		<div class="woocommerce-mini-cart__buttons buttons">
			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="button wc-forward">
				<?php esc_html_e( 'View Cart', 'woocommerce' ); ?>
			</a>
			<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout wc-forward">
				<?php esc_html_e( 'Checkout', 'woocommerce' ); ?>
			</a>
		</div>
	</div>
	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
