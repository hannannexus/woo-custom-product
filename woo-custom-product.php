
<?php 

/** 
 *  Plugin Name: Woo Custom Product 
 *  Description: Add custom product type in woocommerce
 *  Plugin URL: https://github.com/hannannexus/
 *  Author: Hannan
 *  Author URL:  https://github.com/hannannexus/
 *  Version: 1.0.0
 *  Text Domain: woo-custom-product
*/


/** 
 *  register custom prduct trype for woocommerce 
*/

 function register_car_product_type(){
    class WC_Product_Car extends WC_Product{

        public function __construct($product){
            $this->product_type = "Car";           
            parent:: __construct($product);
        }
        
    }
}
add_action('init','register_car_product_type');


/** 
 *  Add csutom Product type to this product dropdown menu
*/

function add_car_product_type($types){
    $types["car"] = __("Car","woo-custom-product");

    return $types;
}
add_filter('product_type_selector','add_car_product_type');

/**
 *  Add new panel for woocommerce custom product product by Jquery
*/

function add_car_product_panel_js(){
    
    if ('product' != get_post_type()) :
        return;
    endif;

    ?>
   <script type='text/javascript'>
        jQuery(document).ready(function () {

            //for Price tab
            jQuery('.product_data_tabs .general_tab').addClass('show_if_car').show();
            jQuery('#general_product_data .pricing').addClass('show_if_car').show();
            //for Inventory tab
            jQuery('.inventory_options').addClass('show_if_car').show();
            jQuery('#inventory_product_data ._manage_stock_field').addClass('show_if_car').show();
            jQuery('#inventory_product_data ._sold_individually_field').parent().addClass('show_if_car').show();
            jQuery('#inventory_product_data ._sold_individually_field').addClass('show_if_car').show();

            // for virtual and downloadable checkbox on custom type product

            jQuery('#_virtual').addClass('show_if_car').show();
        });
    </script>  
    <?php
}
add_action('admin_footer','add_car_product_panel_js');

/** 
 *  Add virtual and downloadable checkbox on car product type  
*/

function add_product_custom_type_options( $options ){
    $options['virtual']['wrapper_class'] = 'show_if_car';
    $options['downloadable']['wrapper_class'] = 'show_if_car';
 return $options;
}
add_filter('product_type_options','add_product_custom_type_options');




/**
 * Template Override 
*/

// function woo_custom_single_product_template( $template, $template_name, $template_path ){


//     if( "title.php" === basename($template)){

//         $template = trailingslashit(plugin_dir_path(__FILE__)).'woocommerce/single-product/title.php';
//     }

//     return $template;
// }
// add_filter('woocommerce_locate_template','woo_custom_single_product_template',100,3);




/* load custom single product page temple*/
function car_custom_product_page_template_load($template){

    define('WCP', plugin_dir_path(__FILE__));
  
    $template_slug = basename( rtrim( $template, '.php' ) );
    if ( ($template_slug === 'single-product' || $template_slug === 'woocommerce') && is_product()  ) {
        $template = WCP . 'woocommerce/single-product-car.php';
    }

    return $template;

}
add_filter('template_include','car_custom_product_page_template_load',100);
