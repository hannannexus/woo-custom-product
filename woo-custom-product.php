
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
        });
    </script>  
    <?php
}
add_action('admin_footer','add_car_product_panel_js');




