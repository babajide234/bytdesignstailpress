<?php
/**
 * Auth form login
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/auth/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates\Auth
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_auth_page_header' ); ?>

<h1>
	<?php
	/* translators: %s: app name */
	printf( esc_html__( '%s would like to connect to your store', 'woocommerce' ), esc_html( $app_name ) );
	?>
</h1>

<?php wc_print_notices(); ?>

<p>
	<?php
	/* translators: %1$s: app name, %2$s: URL */
	echo wp_kses_post( sprintf( __( 'To connect to %1$s you need to be logged in. Log in to your store below, or <a href="%2$s">cancel and return to %1$s</a>', 'woocommerce' ), esc_html( wc_clean( $app_name ) ), esc_url( $return_url ) ) );
	?>
</p>

<form method="post" class=" w-full wc-auth-login">
	<div class=" w-full flex-col justify-start items-start gap-[18px] flex">
		<div class="w-full flex flex-col gap-2">
			<label for="username" class=""><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" name="username" id="username" class="w-full py-2.5 bg-faded relative rounded-lg border border-black border-opacity-20" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
		</div>
		<div class="w-full flex flex-col gap-2">
			<label for="password" class=""><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="password" name="password" id="password" class="w-full py-2.5 bg-faded relative rounded-lg border border-black border-opacity-20" />
		</div>
	</div>
	<div class="w-full h-[0px] border-b border-black border-opacity-10"></div>
	<div class="flex-col justify-start items-center gap-[15px] flex">
		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

        <button type="submit" class=" wc-auth-login-button w-full  py-2.5 bg-primary rounded-[10px] justify-center items-center gap-2.5 inline-flex text-white text-xl font-normal font-dm-sans">
		<?php esc_html_e( 'Login', 'woocommerce' ); ?>
        </button>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect_url ); ?>" />

        <div>
            <span class="text-neutral-500 text-sm font-normal font-dm-sans leading-[14px]">Already have an account with us? </span>
            <a href="" class="text-slate-600 text-sm font-normal font-dm-sans leading-[14px]">Login</a>
        </div>
    </div>
	
</form>

<?php do_action( 'woocommerce_auth_page_footer' ); ?>
