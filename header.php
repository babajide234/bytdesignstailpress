<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<header class="">
    <nav class="flex items-center w-full justify-between bg-faded px-5 md:px-20 h-[50px] md:max-2xl:h-[100px] gap-[28px] border-b border-gray-300">
        <div class=" w-[46px] h-[46px] md:max-2xl:w-[76px] md:max-2xl:h-[76px]">
			<?php if ( has_custom_logo() ) { ?>
                        <?php the_custom_logo(); ?>
					<?php } else { ?>
						<a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-lg uppercase">
							<?php echo get_bloginfo( 'name' ); ?>
						</a>
			<?php } ?>
        </div>
			<?php
				wp_nav_menu(
					array(
						'container_id'    => 'primary-menu',
						'container_class' => 'hidden md:flex md:items-center',
						'menu_class'      => 'flex p-2.5 gap-6',
						'theme_location'  => 'primary',
						'li_class'        => '',
						'add_link_class ' => 'capitalize text-neutral-600 text-md font-normal font-dm-sans hover:cursor-pointer relative after:content-[""] after:absolute after:bottom-0 after:left-0 after:w-0 after:bg-slate-900 after:h-px hover:after:w-full animate-borderAnimation duration-500',
						'fallback_cb'     => false,
						)
				);
			?>
        <!-- </div> -->
        <div class="hidden md:flex md:items-center md:gap-1">
            <div class=" w-[95px]"></div>
            <!-- <div class=" w-[275px] h-[38px] rounded-[100px] pl-[19px] border border-neutral-300 overflow-hidden justify-start items-center inline-flex">
                <span class="w-[22px] h-[22px] relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                      </svg>                      
                </span>
                <input type="text" class=" pl-[19px]  py-2 flex-grow inline-flex outline-none border-none placeholder:text-gray-400 placeholder:capitalize bg-faded" placeholder="search products">
            </div> -->
			<?php echo do_shortcode('[fibosearch]'); ?>

            <div class="justify-center items-center gap-1 flex">
                <button type="button" class="cart_btn_trigger w-9 h-9 md:max-2xl:w-10 md:max-2xl:h-10 p-2.5 relative">
                    <span class="sr-only">cart</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>       
                    <?php
                        // Get cart item count
                        $cart_count = WC()->cart->get_cart_contents_count();

                        // Display cart quantity if not empty
                        if ($cart_count > 0) {
                            echo '<span class="cart-quantity absolute w-5 h-5 text-xs p-1 rounded-full top-0 right-0 bg-primary text-white flex justify-center items-center">' . esc_html($cart_count) . '</span>';
                        }
                    ?>           
                </button>
                <button class="w-9 h-9 md:max-2xl:w-10 md:max-2xl:h-10 p-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>                  
                </button>
                <button class="auth_btn_trigger w-9 h-9 md:max-2xl:w-10 md:max-2xl:h-10 p-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>                  
                </button>
            </div>
        </div>
        <div class=" flex items-center md:max-2xl:hidden ">
            <div class=" w-[95px]"></div>
            <div class="md:justify-center md:items-center md:gap-1 md:flex">
                <button class="w-9 h-9 md:max-2xl:w-10 md:max-2xl:h-10 p-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                      </svg>                                                            
                </button>
                <button class="w-9 h-9 md:max-2xl:w-10 md:max-2xl:h-10 p-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                    </svg>                                        
                </button>

            </div>
        </div>
    </nav>
	<?php if ( is_front_page() ) { ?>
		<div class="bg-hero-img  bg-cover bg-center w-full h-[541.57px] md:max-2xl:h-[1024px] relative bg-black/20 bg-blend-overlay ">
				<div class="right-20 top-[87px] absolute origin-top-left rotate-90 text-white text-opacity-20 text-[200px] font-bold font-dm-sans capitalize">BYTDESIGNS</div>
				<div class=" w-full pt-[31px] px-[31px] md:max-2xl:pt-[31px] md:max-2xl:px-[31px] z-10 md:max-2xl:w-[583px] md:max-2xl:absolute md:max-2xl:left-[102px] md:max-2xl:top-[106px] flex-col justify-start items-start gap-[30px] flex">
					<h1 class=" text-white text-[32px] md:max-2xl:text-[64px] font-normal font-space-mono leading-10 md:max-2xl:leading-[82px]">Every watch has a unique story</h1>
					<p class=" text-white text-opacity-90 text-base md:max-2xl:text-2xl font-normal font-dm-sans leading-[17px] md:max-2xl:leading-[29px]">Jewelry is not just an adornment; it's a treasure that captures moments and memories</p>
					<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class=" w-[158px] md:max-2xl:w-[250px] p-2.5 rounded-[10px] shadow border border-white justify-center items-center gap-2.5 inline-flex text-white text-sm md:max-2xl:text-xl font-normal font-dm-sans">
						Go to shop
						<span class="">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
							  </svg>                      
						</span>
					</a>
				</div>
				<h3 class=" w-[247px] md:max-2xl:w-[329px] md:max-2xl:left-[916px] bottom-5 right-5 md:max-2xl:top-[827px] absolute text-right text-white text-opacity-90 text-base md:max-2xl:text-2xl font-normal font-dm-sans leading-[17px] md:max-2xl:leading-[29px]">Jewelry is more than ornamentation; it's a timeless story of elegance and emotion</h3>
		</div>
	<?php } ?>
</header>

<main class="flex flex-col py-[41px] md:max-2xl:py-[79px] gap-[70px] overflow-x-hidden bg-faded">


