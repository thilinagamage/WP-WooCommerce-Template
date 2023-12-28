 <?php


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


// ==============================
// 1. All CSS and JS file added here
// ==============================


    // bootsrap css file
     
    // function shopt_load_css(){
    //     wp_enqueue_style('boostrap-css',  get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
    //     wp_enqueue_style('style-css', get_stylesheet_uri() , array(), '1.0', 'all');
    //     wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap', array(), null);
    // }
    // add_action('wp_enqueue_scripts', 'shopt_load_css');

    // // bootsrap js file
    //      function devt_load_js(){
    //     wp_enqueue_script('boostrap-js',  get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0', true);
    //    // wp_enqueue_script('boostrap-bundle-js',  get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '1.0', true);
    // }
    // add_action('wp_enqueue_scripts', 'devt_load_js');
   
    function enqueue_bootstrap() {
        wp_enqueue_style('style-css', get_stylesheet_uri() , array(), '1.0', 'all');
        wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
        wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js', array('jquery'), '', true);
        wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery', 'popper'), '', true);
    }
    add_action('wp_enqueue_scripts', 'enqueue_bootstrap');
    






    function register_bootstrap_menu() {
        register_nav_menu('bootstrap-menu', __('Bootstrap Menu', 'text-domain'));
    }
    add_action('after_setup_theme', 'register_bootstrap_menu');
    


// ==============================
// 2. Theme Support
// ==============================


function wpdev_config(){

    // Register custom navigation menus
    register_nav_menus(
        array(
        'primary'   => esc_html__('Primary Menu', 'devt'),
        'secondary' => esc_html__('Secondary Menu', 'devt'),
    ));

    // add custom Header Image

    $args = array(
        'default-image'          => '',
        'random-default'         => false,
        'width'                  => 1920,
        'height'                 => 225,
        'uploads'                => true,
         );
    add_theme_support( 'custom-header', $args);

    // add post thumbnail
    add_theme_support( 'post-thumbnails' );

    //add custom logo
    add_theme_support( 'custom-logo' , 
        array(
            'height'               => 100,
            'width'                => 150,
            'flex-height'          => true,
            'flex-width'           => true,
            )
    );

    // add woocommerce support
    add_theme_support( 'woocommerce', 
        array(
            'thumbnail_image_width'     => 255,
            'single_image_width'        => 255,
            'product_grid'          => array(
                'default_rows'    => 10,
                'min_rows'        => 5,
                'max_rows'        => 10,
                'default_columns' => 4,
                'min_columns'     => 4,
                'max_columns'     => 4,
            ),
        ) 
    );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    
    if ( ! isset( $content_width ) ) {
        $content_width = 600;
    }

}

add_action('after_setup_theme', 'wpdev_config', 0); 

if(class_exists('WooCommerce')){
    require get_template_directory() .'/inc/wc-modifications.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'shoptheme_woocommerce_header_add_to_cart_fragment' );

function shoptheme_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
    <span class="items"><?php echo WC()->cart->get_cart_contents_count();?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}