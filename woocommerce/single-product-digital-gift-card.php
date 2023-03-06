<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Gift Card</title>
</head>
<body>
    <div class="container">
        <div class="main">
            <div class="image_price_main">
                <div class="image_section">
                    <span>Product Image will go here</span>
                </div>
                <div class="product_detals">
                    <div class="product_title">
                        <h2>Product Name</h2>
                    </div>
                    <div class="price">
                        <span>Product Price: $30 </span>
                    </div>
                </div>
            </div><!-- #end .image_price_main-->
            <div class="form_section">
                <form action="#">
                    <fieldset>
                        <legend>from</legend>
                        <label for="name">Name</label>
                        <input type="text" class="name" name="name" value="" placeholder="Give your Name"/>

                        <label for="Email">Email</label>
                        <input type="email" class="from_email" name="from_eamil" value="" placeholder="Give your mail"/>
                        
                    </fieldset>
                    <fieldset>
                        <legend>To</legend>
                        <label for="Reciver name">Reciver name</label>
                        <input type="text" class="reciver_name" name="reciver_name" value="" placeholder="Revicer Name"/>

                        <label for="Email">Email</label>
                        <input type="email" class="reciver_email" name="reciver_eamil" value="" placeholder="Revicer mail"/>
                        
                    </fieldset>
                    <fieldset>
                        <legend>Message</legend>
                         <textarea name="message" id="gift_card_message" cols="30" rows="10"></textarea>
                        
                    </fieldset>
                </form>

            </div><!-- end .form_section-->
            <div class="from_duplicate_section">
                <span>when form more than one then will be dislayed here</span>
            </div>
            <div class="quantity_and_cart_section">
                <div class="quantity">
                    <input type="number" class="gif_quantity" min="1" max="" step="0" value="1">
                </div>
                <div class="add_to_cart">
                    <a href="#" class="button add_to_cart" data-quantity="">Add To Cart</a>
                </div>
            </div>
        </div> <!-- end .main-->
    </div><!-- end .container-->
</body>
</html>