 <?php

// ==============================
// 1. All CSS and JS file added here
// ==============================


    // bootsrap css file
     
    function shopt_load_css(){
        wp_enqueue_style('boostrap-css',  get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
        wp_enqueue_style('style-css', get_stylesheet_uri() , array(), '1.0', 'all');
        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap', array(), null);
    }

add_action('wp_enqueue_scripts', 'shopt_load_css');


    // bootsrap js file
     
    function devt_load_js(){
        wp_enqueue_script('boostrap-js',  get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0', true);
       // wp_enqueue_script('boostrap-bundle-js',  get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '1.0', true);
    }
   
    add_action('wp_enqueue_scripts', 'devt_load_js');
   


function add_custom_menu_class($classes, $item, $args) {
    if (isset($args->theme_location) && $args->theme_location === 'bootstrap-menu') {
        $classes[] = 'custom-menu-class';
    }
    return $classes;
}
add_action('wp_enqueue_scripts', 'devt_load_js');


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

require get_template_directory() .'/inc/wc-modifications.php';