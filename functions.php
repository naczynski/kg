<?php 
    
    add_theme_support( 'post-thumbnails' ); 
 
    define("THEME_URL",get_template_directory_uri());
    define('THEME_URL_DIR', get_theme_root().'/'.get_template().'/');
    define("AJAX_DIR", THEME_URL_DIR.'/inc/ajax');

    $files = array(

    	'inc/scripts',
        'inc/angular',
        'inc/assets'
        
    );

    foreach ($files as $url) {
        
        include THEME_URL_DIR. '' .$url . '.php'; 

    }

    // Declare woocommerce compatibility

    function woocommerce_support() {
   
        add_theme_support( 'woocommerce' );
   
    }

    add_action( 'after_setup_theme', 'woocommerce_support' );

    
          
 ?>