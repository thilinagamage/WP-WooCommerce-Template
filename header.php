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
       




                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container">
                            <a href="#" class="navbar-brand">
                                <?php the_custom_logo()?> 
                            </a>
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                
                                <?php
                                           wp_nav_menu(
                                            array(
                                                    'theme_location' => 'primary',
                                                    'container'    => 'div',
                                                    'menu_id'       => 'primary-menu',
                                                    'menu_class'    => 'nav navbar-nav nav__main',
                                                    'depth'     => 2,
                                                    
                                                )
                                            );
                                        ?>
                            
                                <div class="navbar-nav ms-auto">
                                    <?php get_search_form();?>
                                </div>
                            </div>
                        </div>
                    </nav>
                

            </div>
        </section>

 
    </header> 