
    <div id="cartmodal" class="hidden modal fixed bg-black/20 w-full h-screen top-0 left-0 flex justify-end">
        <div class="exclude-click w-[460px] h-screen bg-white flex flex-col ">
            <div class="w-full p-2.5 flex-col justify-end items-center gap-2.5 inline-flex">
                <div class="w-full px-5 justify-between items-center inline-flex">
                    <h2 class="text-black text-[32px] font-normal font-dm-sans leading-loose">Cart</h2>
                    <button type="button" class=" cart_btn_trigger p-1 bg-white rounded-sm justify-center items-start gap-2.5 flex">
                        <span class="sr-only">close</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[18px] h-[18px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="w-full pt-[22px] flex-col justify-center items-center gap-3 flex">
                    <?php 
                        woocommerce_mini_cart();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div id="signupmodal" class=" hidden modal fixed bg-black/20 w-full h-screen top-0 left-0 flex z-50 justify-center items-center">
        <div class="exclude-click w-[80%] h-[95%] py-2.5 px-2.5 bg-white rounded-[10px] z-[1000px] gap-[60px] flex justify-between">
            <div class=" flex-grow flex-col px-6 pt-10 justify-start items-start gap-[35px] inline-flex">
                <div class="text-zinc-950 text-[28px] font-normal font-dm-sans leading-7">Sign up</div>
                <div class="w-full flex-col justify-start items-start gap-[21px] flex">
                    
                    <?php woocommerce_login_form(); ?>

                    <div class=" w-full flex-col justify-start items-start gap-[18px] flex">
                    </div>
                    <!-- <div class=" w-full flex-col justify-start items-start gap-[18px] flex">
                        <div class="w-full flex flex-col gap-2">
                            <label for="" class="">Full name</label>
                            <input class="w-full py-2.5 bg-faded relative rounded-lg border border-black border-opacity-20"/>
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <label for="" class="">Email address</label>
                            <input class="w-full py-2.5 bg-faded relative rounded-lg border border-black border-opacity-20"/>
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <label for="" class="">Password</label>
                            <input class="w-full py-2.5 bg-faded relative rounded-lg border border-black border-opacity-20"/>
                        </div>
                    </div> -->
                    
                </div>
            </div>
            <div class=" bg-signup-img bg-cover bg-center  w-[450px] h-full rounded-[10px]"></div>
        </div>
    </div>
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<!-- <footer id="colophon" class="site-footer bg-gray-50 py-12" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container mx-auto text-center text-gray-500">
		&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' );?>
	</div>
</footer> -->

  
<footer class="w-full min-h-[449px] md:max-2xl:h-[881px] relative overflow-hidden">
    <?php if ( is_front_page() ) { ?>
        <div class="bg-footer-img bg-blend-overlay bg-black/20 bg-cover hidden md:max-2xl:flex w-full h-[632px] left-0 top-0 absolute">
            <div class="w-full h-[270px] left-[3px] top-[181px] absolute justify-end items-center inline-flex">
                <div class=" text-white text-[14rem] font-normal font-space-grotesk leading-[250px] uppercase"> <?php echo get_bloginfo( 'name' );?></div>    
            </div>
        </div>
    <?php }?>
  <div class=" px-[21px] py-[21px] md:max-2xl:px-[100px] md:max-2xl:py-[45px] w-full min-h-[500px] flex flex-col gap-[24px] md:max-2xl:gap-[54px] md:max-2xl:left-0 md:max-2xl:top-[311px] md:max-2xl:absolute bg-slate-50">
        <div class=" justify-between items-center flex flex-col  gap-[35px] md:max-2xl:flex-row">
            <h2 class=" w-full md:max-2xl:w-[364px] text-neutral-500 text-center md:max-2xl:text-start text-sm md:max-2xl:text-lg font-normal font-dm-sans">Join our newsletter to keep up to date with our exclusive discounts, newest items and more</h2>
            <div class="justify-start items-start gap-4 inline-flex">
                <div class=" w-[251px] h-11 md:max-2xl:w-[380px] md:max-2xl:h-[58px] px-5 overflow-hidden rounded-[100px] border border-neutral-500 justify-start items-center gap-2 md:max-2xl:gap-6 flex">
                    <div class="w-6 h-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                          </svg>                                  
                    </div>
                    <input type="text" class="h-full bg-faded flex-grow outline-none border-none placeholder:text-neutral-500 text-sm md:max-2xl:text-base font-normal font-dm-sans leading-none" placeholder="Enter your email address">
                </div>
                <div class=" w-[109px] md:max-2xl:w-[154px] h-11 md:max-2xl:h-[58px] p-2.5 bg-slate-600 rounded-[100px] justify-center items-center gap-2.5 flex">
                    <div class="text-white text-[10px] text-base font-normal font-dm-sans leading-none">Subscribe</div>
                </div>
            </div>
        </div>
        <div class=" w-full border-b border-solid border-slate-200 block "></div>
        <div class="w-full justify-between items-start inline-flex">
            <div class=" hidden flex-col justify-start items-start gap-5 md:max-2xl:inline-flex">
                <div class="flex-col justify-start items-start gap-2 flex">
                    <h2 class="text-zinc-950 text-base font-medium font-space-grotesk"><?php echo get_bloginfo( 'name' );?></h2>
                </div>
                <h2 class="w-[440px] text-neutral-500 text-sm font-normal font-dm-sans leading-[14px]">Shop with confidence and adorn yourself with the finest treasures, or find the perfect gift for your loved ones.</h2>
            </div>
            <div class="justify-start items-start gap-[24px] md:max-2xl:gap-[54px] flex">
                <div class="flex-col justify-start items-start gap-2 inline-flex">
                    <div class="px-0.5 justify-start items-start gap-2.5 inline-flex">
                        <h2 class="text-black text-base font-medium font-dm-sans leading-none"><?php echo get_bloginfo( 'name' );?></h2>
                    </div>
                    <div class="py-2.5 flex-col justify-start items-start gap-2 flex">
                        <a class="px-0.5 py-1  text-zinc-950 text-sm font-normal font-dm-sans">
                            Contact us
                        </a>
                        <a class="px-0.5 py-1  text-zinc-950 text-sm font-normal font-dm-sans">
                            Vintage watches
                        </a>
                        <a class="px-0.5 py-1  text-zinc-950 text-sm font-normal font-dm-sans">
                            About
                        </a>
                    </div>
                </div>
                <div class="flex-col justify-start items-start gap-2 inline-flex">
                    <div class="px-0.5 justify-start items-start gap-2.5 inline-flex">
                        <h2 class="text-black text-base font-medium font-dm-sans leading-none">Socials</h2>
                    </div>
                    <div class="py-2.5 flex-col justify-start items-start gap-2 flex">
                        <a class="px-0.5 py-1  text-zinc-950 text-sm font-normal font-dm-sans">
                            Instagram
                        </a>
                        <a class="px-0.5 py-1  text-zinc-950 text-sm font-normal font-dm-sans">
                            Pinterest
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class=" w-full border-b border-solid border-slate-200 block "></div>

        <div class=" flex-col justify-start items-start gap-6 inline-flex">
            <div class=" flex items-center gap-2">
                <div class="w-3.5 h-3.5 p-3 rounded-[100px] border font-dm-sans text-lg border-neutral-500 flex justify-center items-center gap-2.5 ">C</div>
                <h2 class="text-neutral-500 text-lg font-normal font-dm-sans leading-[18px]"><?php echo date_i18n( 'Y' );?>  <?php echo get_bloginfo( 'name' );?> Inc</h2>
            </div>
        </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
