<?php
function shoptheme_woocommerce_modifications(){

            

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

        

        /** 
         *remove woocommerce main side bar from its original position.
        *put it somewere else
        */
        remove_action('woocommerce_sidebar','woocommerce_get_sidebar',);

        if(is_shop()){
            add_action('woocommerce_before_main_content','shoptheme_add_tags_sidebar',6);
            function shoptheme_add_tags_sidebar(){
                echo'<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-2">';
            }

        // Put the Woocommerce sidebar in different position
        add_action('woocommerce_before_main_content','woocommerce_get_sidebar',7);

        add_action('woocommerce_before_main_content','shoptheme_close_tags_sidebar',8);
        function shoptheme_close_tags_sidebar(){
            echo'</div>';
        }
        // add_action('woocommerce_after_shop_loop_item_title','the_excerpt',1);
    
        }



        add_action('woocommerce_before_main_content','shoptheme_add_shop_tags',9);
        function shoptheme_add_shop_tags(){
            if(is_shop()){
                echo'<div class="col-lg-9 col-md-8 order-1 order-md-2">';
            }else{
                echo'<div class="col">';
            }
        }

        add_action('woocommerce_before_main_content','shoptheme_close_shop_tags',4);
        function shoptheme_close_shop_tags(){
            echo'</div>';
        }


        


}

add_action('wp','shoptheme_woocommerce_modifications');