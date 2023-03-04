<?php

function woo_custom_single_product_template( $template, $template_name, $template_path ){
    global $woocommerce;

    //  is template is single product page template 

    // if( "single-product.php" === basename($template)){

    //     $template = trailingslashit(plugin_dir_path(__FILE__)).'woocommerce/single-product/title.php';
    // }

    
    if( "cart.php" === basename($template)){

        $template = trailingslashit(plugin_dir_path(__FILE__)).'woocommerce/cart/cart.php';
    }

    return $template;
}
add_filter('woocommerce_locate_template','woo_custom_single_product_template',100,3);