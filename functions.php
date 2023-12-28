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




// add div elemnts for product archive page 
add_action('woocommerce_before_main_content','shoptheme_open_conatiner',5);

function shoptheme_open_conatiner(){
    echo'<div class="container shop-content">
            <div class="row">
    ';
}



add_action('woocommerce_after_main_content','shoptheme_close_conatiner',5);

function shoptheme_close_conatiner(){
    echo ' </div></div>';

}

add_action('woocommerce_before_main_content','shoptheme_add_tags_sidebar',6);
function shoptheme_add_tags_sidebar(){
    echo'<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-2">';
}

remove_action('woocommerce_sidebar','woocommerce_get_sidebar',);

add_action('woocommerce_before_main_content','woocommerce_get_sidebar',7);

add_action('woocommerce_before_main_content','shoptheme_close_tags_sidebar',8);
function shoptheme_close_tags_sidebar(){
    echo'</div>';
}

add_action('woocommerce_before_main_content','shoptheme_add_shop_tags',9);
function shoptheme_add_shop_tags(){
    echo'<div class="col-lg-9 col-md-8 order-1 order-md-2">';
}

add_action('woocommerce_before_main_content','shoptheme_close_shop_tags',4);
function shoptheme_close_shop_tags(){
    echo'</div>';
}
