
<?php 

/** 
 *  Plugin Name: Woo Custom Product 
 *  Description: Add custom product type in woocommerce
 *  Plugin URL: https://github.com/hannannexus/
 *  Author: Hannan
 *  Author URL:  https://github.com/hannannexus/
 *  Version: 1.0.0
 *  Text Domain: woo-custom-product
 * 
 * 
*/


/** 
 *  register custom prduct trype for woocommerce 
*/

 function register_car_product_type(){
    class WC_Product_Car extends WC_Product{

        public function __construct($product){
            $this->product_type = "car";           
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
 *  Add  new Tab for car product 
*/

function car_data_tabs( $tabs ){

    $tabs['car'] = array(
        'label' => __(' Product Car','woo-custom-product'),
        'target' => 'car_product_option',
        'class' => array('show_if_car_product'),
        'priority' => 10
    );    
    return $tabs;
}
add_filter('woocommerce_product_data_tabs','car_data_tabs');
