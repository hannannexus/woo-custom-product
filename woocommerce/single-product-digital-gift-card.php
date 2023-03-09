<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Gift card </title>
    <?php wp_head();?>
</head>
<body>
    <div id="main">
        <div class="wrap">
           <h3> prduct Header </h3>
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

                   <!-- form section start here-->
                    <div class="form_main">
                        <div class="reciver_part">
                            <div class="reciver_title">
                                <h4>Recipient Info: </h4>
                            </div>
                            <div class="receiver_info">
                                <label for="Name">Receiver Name</label>
                                <input type="text" name="receiver_name[]" value="" class="receiver_name">
                                
                                <label for="Receiver Telephone_number">Telephone Number</label>
                                <input type="number" name="receiver_telephone_number[]" value="">
                                
                                <label for="Email">Receiver Email:</label>
                                <input type="email" name="receiver_email[]" value="" class="receiver_email">
                                
                                <textarea name="receiver_address[]" id="receiver_address" cols="5" rows="5" placeholder="Receiver Address..."></textarea>
                                
                             </div>
                        </div>

                        <!-- sender info -->
                        <div class="sender_part">
                            <div class="sender_title">
                                <h4>Sender Info: </h4>
                            </div>
                            <div id="Sender_info">
                                <label for="Sender Name">Sender Name</label>
                                <input type="text" name="sender_name[]" value="" class="sender_name">
                                <label for="Telephone_number">Telephone Number</label>
                                <input type="number" name="sender_telephone_number[]" value="">
                                <label for="Sender Email">Sender Email:</label>
                                <input type="email" name="sender_email[]" value="" class="sender_email">
                                <textarea name="sender_address[]" id="sender_address" cols="5" rows="5" placeholder="Sender Address..."></textarea>
                            </div>

                            <div class="messagae_part">
                                <textarea name="sms[]" id="sender_sms" cols="5" rows="5" placeholder="Send SMS..."></textarea>
                            </div>
                            <div class="sending_option">
                                <div class="radio_one">
                                    <label for="send for email">
                                        <input type="radio" name="email_send[]" id="email_radio"> Send an email to the recipient
                                    </label>
                                </div>
                               <div class="radio_two">
                                    <label for="send for sms">
                                        <input type="radio" name="sms_send[]" id="sms_radio"> Send an SMS to the recipient
                                    </label>
                               </div>
                                <div class="radio_three">
                                    <label for="send for sms and email">
                                        <input type="radio" name="sms_email_send[]" id="sms_email_radio"> Send sms & email to recipient
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                  <!-- form section end here-->
            </div> <!-- end #p_one-->
        </div>

       
        
    </div><!-- #end main-->
    <!-- product bottom section -->
    <div id="p_one_bottom" class="product_bottom_section">
        <div class="quantity">

            <form action="#" method="post">
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
    <?php wp_footer();?>
</body>
</html>