<?php get_header(); ?>

<?php if (is_shop()) : ?>
    <section class=" px-5 md:max-2xl:px-[36px] w-full">
        <div class="w-full h-[250px] md:max-2xl:h-[450px] bg-shop-img flex justify-center items-center bg-cover bg-black/40 bg-blend-overlay md:max-2xl:rounded-3xl relative">
            <div class="w-full md:max-2xl:w-[837px] md:max-2xl:h-[175px] flex flex-col gap-2 md:max-2xl:gap-6 ">
                <!-- <div class="flex gap-3 place-content-center">
                  <h3 class="text-white">Home</h3>
                  <span class="text-white">
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
    
                  <h3 class="text-white">Shop</h3>
                </div> -->
                <?php echo woocommerce_breadcrumb(); ?>

                <h2 class=" text-[32px] md:max-2xl:text-[60px] text-white text-center">Shop</h2>
                <p class="text-white text-center">
                  It's never to late to buy something new.
                </p>
            </div>
        </div>
      </section>
<?php endif; ?>

<section class="px-5 md:max-2xl:px-20 w-full flex flex-col gap-[32px]">

<?php woocommerce_content(); ?>
</section>
<?php get_footer(); ?>
