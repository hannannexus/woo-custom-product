
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


/* enqueue js file here */
function woo_custom_product_assets(){
    // jQuery UI css file 
    wp_enqueue_style('jquery-ui-css','//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css',null,'1.0.0','all');
    wp_enqueue_script('jquery-ui-js','//code.jquery.com/ui/1.12.1/jquery-ui.js',array('jquery'),'1.0.0', true);
    wp_enqueue_script('custom-product-js',plugin_dir_url( __FILE__ ) . '/assets/js/custom-product.js',array('jquery'),'1.0.0',true);
    
}
add_action('wp_enqueue_scripts','woo_custom_product_assets');


/** 
 *  register custom prduct trype for woocommerce 
*/

 function register_car_product_type(){
 
    class WC_Product_Digital_Gift_Card extends WC_Product {
        public function get_type() {
           return 'digital_gift_card';
        }
      }
}
add_action('init','register_car_product_type');


add_filter( 'woocommerce_product_class', 'digital_gift_card_product_class', 10, 2 );
 
function digital_gift_card_product_class( $classname, $product_type ) {
    if ( $product_type == 'digital_gift_card' ) {
        $classname = 'WC_Product_Digital_Gift_Card';
    }
    return $classname;
}

/** 
 *  Add csutom Product type to this product dropdown menu
*/

function add_digital_gift_card_product_type($types){
    $types["digital_gift_card"] = __("Dgital Gift Card","woo-custom-product");

    return $types;
}
add_filter('product_type_selector','add_digital_gift_card_product_type');

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
            jQuery('.product_data_tabs .general_tab').addClass('show_if_digital_gift_card').show();
            jQuery('#general_product_data .pricing').addClass('show_if_digital_gift_card').show();
            //for Inventory tab
            jQuery('.inventory_options').addClass('show_if_digital_gift_card').show();
            jQuery('#inventory_product_data ._manage_stock_field').addClass('show_if_digital_gift_card').show();
            jQuery('#inventory_product_data ._sold_individually_field').parent().addClass('show_if_digital_gift_card').show();
            jQuery('#inventory_product_data ._sold_individually_field').addClass('show_if_digital_gift_card').show();

            // for virtual and downloadable checkbox on custom type product

            jQuery('#_virtual').addClass('show_if_digital_gift_card').show();
        });
    </script>  
    <?php
}
add_action('admin_footer','add_car_product_panel_js');

/** 
 *  Add virtual and downloadable checkbox on car product type  
*/

function add_product_custom_type_options( $options ){
    $options['virtual']['wrapper_class'] = 'show_if_digital_gift_card';
    $options['downloadable']['wrapper_class'] = 'show_if_digital_gift_card';
 return $options;
}
add_filter('product_type_options','add_product_custom_type_options');



define('WCP', plugin_dir_path(__FILE__));
/* load custom single product page temple*/
function digital_gift_card_product_page_template_load($template){

    global $post;
    $template_slug = basename( rtrim( $template, '.php' ) );
    if ( ($template_slug === 'single-product' || $template_slug === 'woocommerce') && is_product()) {
        
        $product_obj = wc_get_product($post->ID);
        //echo $product_obj->get_type();
        if($product_obj->get_type()==='digital_gift_card'){
            $template = WCP . 'woocommerce/single-product-digital-gift-card.php';
        }
    }

    return $template;

}
add_filter('template_include','digital_gift_card_product_page_template_load',100);
