
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
 *  Show Add To Cart Button 
*/
add_action( 'woocommerce_single_product_summary', 'custom_button_after_product_summary', 30 );

function custom_button_after_product_summary() {
  global $product;
  echo "<a href='".$product->add_to_cart_url()."'>add to cart</a>";
}


/**
 *  Add quantity on custom type product  
*/


add_filter( 'woocommerce_is_sold_individually', 'disable_sold_individually_for_custom_product_type', 10, 2 );

function disable_sold_individually_for_custom_product_type( $bool, $product ) {
    if ( $product->is_type( 'Car' ) ) {
        return false;
    }
    return $bool;
}

add_action( 'woocommerce_before_add_to_cart_button', 'add_quantity_input_custom_product', 10 );

function add_quantity_input_custom_product() {
    global $product;

    if ( $product->is_type( 'Car' ) ) {
        echo '<div class="quantity">';
        woocommerce_quantity_input( array(
            'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
            'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
            'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1
        ) );
        echo '</div>';
    }
}



