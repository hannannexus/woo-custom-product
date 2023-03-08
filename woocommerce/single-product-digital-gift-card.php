<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Gift card </title>
</head>
<body>
   <div id="main">
        <div id="p_one">

               <?php 
                  global $post;
                  $digital_gift_product = wc_get_product($post->ID);
                //   echo '<pre>';
                //   var_dump($digital_gift_product);

                ?>
            <div class="digital_gift_thumbnail_side">
                <div class="product_name"><?php echo $digital_gift_product->name; ?></div>
                <div class="digital_product_thumbnail">
                    <?php the_post_thumbnail('thumbnail');?>
                </div>
            </div>
            <div class="product_details_side">
                    <div class="price">
                    <p> <span>Product Price:</span><?php echo $digital_gift_product->price;?></p>
                    </div>
                    <div class="stock">
                        <p><span>Product Stock: <?php echo $digital_gift_product->stock_status; ?></span></p>
                    </div>

            </div>
        </div> <!-- end #p_one-->
           
    </div><!-- #end main-->
    <!-- product bottom section -->
    <div id="p_one_bottom" class="product_bottom_section">
        <div class="quantity">

                <form action="" method="post">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="" step="1">
                    
                </form>
                    <?php 
                        
                        global $woocommerce;

                        $p_id = $post->ID; // Replace with the ID of the product you want to add to the cart.
                        $quantity = isset( $_POST['quantity'] ) ? intval( $_POST['quantity'] ) : 1;

                        // $woocommerce->cart->add_to_cart( $$p_id , $quantity );

                    ?>
                    

                </div>
                <div class="quantity_cart_button">
                    <a href="?add-to-cart=<?php echo $post->ID; ?>" rel="nofollow" data-product-id="<?php echo $post->ID; ?>" class="btn btn-primary">Add to cart</a>   
                </div>
    </div>
</body>
</html>