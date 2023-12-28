<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
       <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    
    <header>

        <section class="menu-area ">
            <div class="main-menu">

            <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
                <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
            
                    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand  " href="#">Navbar</a>
                        <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'primary',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse',
                                'container_id'      => 'bs-example-navbar-collapse-1',
                                'menu_class'        => 'nav navbar-nav',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            ) );
                        ?>
                                <div class="navbar-nav ms-auto">
                                    <?php get_search_form();?>
                                    <div class="navbar-expand">
                                        <ul class="navbar-nav float-left">
                                            <?php if(is_user_logged_in()):?>
                                            <li>
                                                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')))?>" class="nav-links">My Account</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo esc_url(wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id'))))?>" class="nav-links">Log Out</a>
                                            </li>
                                            <?php else: ?>
                                            <li>
                                                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')))?>" class="nav-links">Log in / Register</a>
                                            </li>
                                            <?php endif;?>
                                        </ul>

                                    </div>
                                    <div class="cart text-right">
                                        <a href="<?php echo wc_get_cart_url();?>"><span class="cart-icon">cart</span></a>
                                        <span class="items"><?php echo WC()->cart->get_cart_contents_count();?></span>
                                    </div>
                        
                                </div>
                </div>
            </nav>
                

            </div>
        </section>

 
    </header> 


