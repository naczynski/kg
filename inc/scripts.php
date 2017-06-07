<?php 

	function kg_scripts() {
		
		$url			= get_template_directory_uri();
		$protocol		= is_ssl() ? 'https' : 'http';
		
		$theme			= wp_get_theme();
		$theme_name		= $theme->stylesheet;
		$theme_version	= $theme->version;
		
		global $wp_styles;
		global $wp_scripts;
		global $wp_filter;
		
		// print_r($wp_styles);

		// kg_log($wp_scripts);

		// unset( $wp_styles->woocommerce-layout);

		// wp_deregister_script('jquery-core');
		// wp_deregister_script('jquery-migrate');
		
		wp_dequeue_style('jcrop');
		wp_dequeue_script('jcrop');
		remove_action( 'wp_print_scripts', 'bp_core_add_jquery_cropper' );

		wp_dequeue_script('jquery');
		wp_dequeue_script('jquery-core');

		wp_dequeue_script('bp-confirm');
		wp_deregister_script('bp-confirm');

		// wp_deregister_script('woocommerce-general-css');

	}

	add_action( 'wp_enqueue_scripts', 'kg_scripts' );
	// 
?>