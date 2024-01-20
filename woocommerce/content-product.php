<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 */
    defined( 'ABSPATH' ) || exit;

    global $product;


    // Ensure visibility.
    if ( empty( $product ) || ! $product->is_visible() ) {
        return;
    }

?>       
<div class="w-full h-[312px] flex-shrink-0 flex-grow-0  md:max-2xl:h-[354px] group p-2.5 bg-gradient-to-b from-slate-50 to-green-200 rounded-[10px] md:max-2xl:rounded-[30px] border border-black/50 ">
    <div class="flex-col px-2 justify-center items-center gap-6 inline-flex w-full h-full">
        <div class="product-image-container md:max-2xl:w-full overflow-hidden relative rounded-[10px] justify-center items-center inline-flex bg-slate-300 w-[170px] h-[187px] md:max-2xl:h-[158px]">
            <?php echo $product->get_image(); ?>
            <div class="badge w-[55px] absolute top-4 right-4 py-2  text-white text-[8px] font-medium font-dm-sans leading-[8px] bg-primary rounded-sm justify-center items-center  inline-flex">
                Best selling
            </div>
            <?php
                $badge_text = 'Best selling'; // Change this to the actual badge text
                if ( ! empty( $badge_text ) ) :
            ?>
                <div class="badge absolute top-4 right-4 py-2 text-white text-[8px] font-medium font-dm-sans leading-[8px] bg-primary rounded-sm justify-center items-center inline-flex">
                    <?php echo esc_html( $badge_text ); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="w-full justify-between items-center flex md:max-2xl:flex-row flex-col-reverse " >
            <div class="flex-col justify-start items-start gap-3 inline-flex">
                <a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="product-title w-[149px] text-zinc-950 text-sm md:max-2xl:text-lg font-normal font-dm-sans leading-[14px] md:max-2xl:leading-[18px]">
                    <?php echo $product->get_title(); ?>
                </a>
                <h3 class="product-price text-zinc-950 text-sm md:max-2xl:text-base font-normal font-dm-sans leading-none">
                    <?php echo $product->get_price_html(); ?>
                </h3>
            </div>
            <div class=" flex-row w-full  md:max-2xl:flex-col justify-between items-center md:max-2xl:justify-center md:max-2xl:items-end gap-4 flex">
                <div class="justify-start items-start gap-0.5 inline-flex">
                    
                    <?php
                        $rating = $product->get_average_rating();

                        for ( $i = 1; $i <= 5; $i++ ) {
                            echo '<span class="star ' . ( $i <= $rating ? 'text-primary' : 'text-gray-400' ) . '">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon" class="w-[14px] h-[14px] md:max-2xl:w-3 md:max-2xl:h-3">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                    </svg>
                                </span>';
                        }
                    ?>
                </div>
                <div class="wishlist-icon w-6 h-6 relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                </div>
            </div>
        </div>
        <button class="add-to-cart-button w-full py-2 rounded-[100px] border border-primary justify-center items-center flex text-primary text-[10px] md:max-2xl:text-sm font-normal font-dm-sans leading-[14px] hover:bg-primary hover:text-white transition duration-300 ease-in-out ">
            Add to cart
        </button>
    </div>
</div>  