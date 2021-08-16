<?php
$cartItem = $shoppingCart->getMemberCartItem($member_id);
if (! empty($cartItem)) {
    $item_quantity = 0;
    $item_price = 0;
    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {
            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
        }
    }
}
?>
    <div id="shopping-cart">
        <div class="txt-heading">
            <div class="txt-heading-label">Shopping Cart</div>

            <a id="btnEmpty" href="index.php?action=empty"><img
                src="empty-cart.png" alt="empty-cart" title="Empty Cart"
                class="float-right" /></a>
            <div class="cart-status">
                <div>Total Quantity: <?php echo $item_quantity; ?></div>
                <div>Total Price: <?php echo $item_price; ?></div>
            </div>
        </div>
<?php
if (! empty($cartItem)) {
    ?>
<div class="shopping-cart-table">
            <div class="cart-item-container header">
                <div class="cart-info title">Title</div>
                <div class="cart-info">Quantity</div>
                <div class="cart-info price">Price</div>
            </div>
<?php
    foreach ($cartItem as $item) {
        ?>
				<div class="cart-item-container">
                <div class="cart-info title">
                    <?php echo $item["name"]; ?>
                </div>

                <div class="cart-info quantity">
                    <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo $item["cart_id"]; ?>)">-</div><input class="input-quantity"
                        id="input-quantity-<?php echo $item["cart_id"]; ?>" value="<?php echo $item["quantity"]; ?>"><div class="btn-increment-decrement"
                        onClick="increment_quantity(<?php echo $item["cart_id"]; ?>)">+</div>
                </div>

                <div class="cart-info price">
                        <?php echo "$".$item["price"]; ?>
                    </div>


                <div class="cart-info action">
                    <a
                        href="index.php?action=remove&id=<?php echo $item["cart_id"]; ?>"
                        class="btnRemoveAction"><img
                        src="icon-delete.png" alt="icon-delete"
                        title="Remove Item" /></a>
                </div>
            </div>
				<?php
    }
    ?>
</div>
  <?php
}
?>
</div>
<?php require_once "product-list.php"; ?>
<script>
function increment_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    save_to_db(cart_id, newQuantity);
}

function decrement_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    if($(inputQuantityElement).val() > 1) 
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    save_to_db(cart_id, newQuantity);
    }
}

function save_to_db(cart_id, new_quantity) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    $.ajax({
        url : "update_cart_quantity.php",
        data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
        type : 'post',
        success : function(response) {
            $(inputQuantityElement).val(new_quantity);
        }
    });
}
</script>
Shopping Cart Item Quantity Increment Decrement with AJAX
by Vincy. Last modified on May 26th, 2021.
In this tutorial, we are going to add increment decrement buttons to edit the shopping cart item quantity. These buttons are added to the quantity input of each cart item and to change the cart item quantity before checkout.

This is done using AJAX to give a seamless user experience. On clicking the buttons, an AJAX handler will be invoked to process the request for editing the cart item quantity.

If you are just starting to develop, then you should check my earlier article on PHP shopping cart.

In the previous shopping cart examples, it shows quantity input only on product gallery. In this example, I have added quantity edit box for each product item added to the cart.

view demo

The following screenshot shows the increment and decrement buttons for changing the cart item quantity.

shopping-cart-increment-decrement-cart-quantity-output

The user can both use the increment/decrement buttons and cart edit box to directly type the new quantity. I used jquery AJAX for handling the increment and decrement actions on the cart item quantity.

Shopping Cart Items Increment Decrement Buttons
The following HTML code is used to display the product gallery with the add to cart option. In this code, it has the increment and decrement buttons to edit the quantity of each cart item before checkout.

On clicking the buttons, the AJAX function is called to send the request to the PHP file for editing the cart database with new item quantity.

<?php
$cartItem = $shoppingCart->getMemberCartItem($member_id);
if (! empty($cartItem)) {
    $item_quantity = 0;
    $item_price = 0;
    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {
            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
        }
    }
}
?>
    <div id="shopping-cart">
        <div class="txt-heading">
            <div class="txt-heading-label">Shopping Cart</div>

            <a id="btnEmpty" href="index.php?action=empty"><img
                src="empty-cart.png" alt="empty-cart" title="Empty Cart"
                class="float-right" /></a>
            <div class="cart-status">
                <div>Total Quantity: <?php echo $item_quantity; ?></div>
                <div>Total Price: <?php echo $item_price; ?></div>
            </div>
        </div>
<?php
if (! empty($cartItem)) {
    ?>
<div class="shopping-cart-table">
            <div class="cart-item-container header">
                <div class="cart-info title">Title</div>
                <div class="cart-info">Quantity</div>
                <div class="cart-info price">Price</div>
            </div>
<?php
    foreach ($cartItem as $item) {
        ?>
                <div class="cart-item-container">
                <div class="cart-info title">
                    <?php echo $item["name"]; ?>
                </div>

                <div class="cart-info quantity">
                    <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo $item["cart_id"]; ?>)">-</div><input class="input-quantity"
                        id="input-quantity-<?php echo $item["cart_id"]; ?>" value="<?php echo $item["quantity"]; ?>"><div class="btn-increment-decrement"
                        onClick="increment_quantity(<?php echo $item["cart_id"]; ?>)">+</div>
                </div>

                <div class="cart-info price">
                        <?php echo "$".$item["price"]; ?>
                    </div>


                <div class="cart-info action">
                    <a
                        href="index.php?action=remove&id=<?php echo $item["cart_id"]; ?>"
                        class="btnRemoveAction"><img
                        src="icon-delete.png" alt="icon-delete"
                        title="Remove Item" /></a>
                </div>
            </div>
                <?php
    }
    ?>
</div>
  <?php
}
?>
</div>
<?php require_once "product-list.php"; ?>
jQuery AJAX Handler to Increment/Decrement Cart Quantity
This jQuery script shows the AJAX function which is used to send the request to increment/decrement cart quantity. The PHP code receives the AJAX request and updates the cart item quantity in the database.

<script>
function increment_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    save_to_db(cart_id, newQuantity);
}

function decrement_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    if($(inputQuantityElement).val() > 1) 
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    save_to_db(cart_id, newQuantity);
    }
}

function save_to_db(cart_id, new_quantity) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    $.ajax({
        url : "update_cart_quantity.php",
        data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
        type : 'post',
        success : function(response) {
            $(inputQuantityElement).val(new_quantity);
        }
    });
}
</script>
And the PHP code is,

<?php
require_once "ShoppingCart.php";

$member_id = 2; // you can your integrate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();
 
$shoppingCart->updateCartQuantity($_POST["new_quantity"], $_POST["cart_id"]);