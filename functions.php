<?php

/* Create Settings Page
------------------------------------------ */

/* Hook to admin menu */
add_action( 'admin_menu', 'tarex_theme_register_theme_page' );

/**
 * Theme Settings/About Page
 * @uses add_theme_page()
 * @link https://developer.wordpress.org/reference/functions/add_theme_page/
 */
function tarex_theme_register_theme_page(){
	add_theme_page(
		$page_title  = __( "I'm Batman", 'domain' ),
		$menu_title  = 'Ask <span class="update-plugins"><span class="pending-count">' . __( 'why?', 'domain' ) . '</span></span>',
		$capability  = 'edit_theme_options',
		$menu_slug   = 'because',
		$cb_function = 'tarex_theme_settings'
	);
}

/**
 * Settings Page Callback
 */
function tarex_theme_settings(){
	?>
	<img style="max-width:100%;" src="<?php echo get_template_directory_uri() . '/assets/im-batman.png'?>">
	<?php
}


/* Rediect On Theme Activation
------------------------------------------ */

/* Redirect on theme activation */
add_action( 'admin_init', 'tarex_theme_activation_redirect' );


/**
 * Redirect to "Install Plugins" page on activation
 */
function tarex_theme_activation_redirect() {
	global $pagenow;
	if ( "themes.php" == $pagenow && is_admin() && isset( $_GET['activated'] ) ) {
		wp_redirect( esc_url_raw( add_query_arg( 'page', 'because', admin_url( 'themes.php' ) ) ) );
	}
}

