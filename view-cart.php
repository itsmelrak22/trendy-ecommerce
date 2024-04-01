<?php
    include_once("./includes/header.php"); 

    spl_autoload_register(function ($class) {
        include './models/' . $class . '.php';
    });


    $cart = new Cart;

    $userId = $_SESSION['user_id'];
    $carts = $cart->getCartsByUserId($userId);

    print_r($carts);

    $totalQuantity = 0;
    $totalPrice = 0;
    foreach ($carts as $cartItem) {
        if ($cartItem['status'] != 1) {
            $totalQuantity += $cartItem['quantity'];
            $totalPrice += $cartItem['price'] * $cartItem['quantity'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <form action="checkout.php" method="post">
                    <?php foreach ($carts as $key => $cartItem): ?>
                        <!-- <?php print_r($cartItem) ?> -->
                        <?php if ($cartItem['status'] != 1): ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="title">
                                        <h4><b>Shopping Cart</b></h4>
                                        <div class="text-right text-muted">3 items</div>
                                    </div>
                                    <hr>
                                    <div class="row border-top border-bottom">
                                        <div class="col-1"><input type="checkbox" name="selected_items[]" value="<?= $cartItem['id'] ?>"></div>
                                        <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                                        <div class="col">
                                            <div class="row text-muted"><?= $cartItem['product_name'] ?></div>
                                            <div class="row"><?= $cartItem['description'] ?></div>
                                        </div>
                                        <div class="col">
                                            <!-- <div class="row">
                                                <a href="#" class="mr-1">-</a>
                                                <span><?= $cartItem['quantity'] ?></span>
                                                <a href="#" class="ml-1">+</a>
                                            </div> -->
                                            <div class="row">
                                                <div class="btn-increment-decrement" onClick="decrementQuantity(<?php echo $cartItem["id"]; ?>)">-</div>
                                                <input class="input-quantity" id="input-quantity-<?php echo $cartItem["id"]; ?>" value="<?php echo $cartItem["quantity"]; ?>" readonly>
                                                <div class="btn-increment-decrement" onClick="incrementQuantity(<?php echo $cartItem["id"]; ?>)">+</div>
                                            </div>
                                        </div>
                                        <div id="priceElement" class="col">₱ <?= $cartItem['price'] ?><span class="close">&#10005;</span></div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="back-to-shop mt-3"><a href="index.php">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5><b>Summary</b></h5>
                            <hr>
                            <div class="row">
                                <div class="col">TOTAL ITEMS</div>
                                <div id="total-qty" class="col text-right"><?= $totalQuantity ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">TOTAL PRICE</div>
                                <div id="total-price" class="col text-right">₱ <?= $totalPrice ?></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once("./includes/scripts.php"); ?>
    <?php include_once("./includes/footer.php"); ?>
</body>
</html>
<script>
    
    function incrementQuantity(cart_id) {
        var inputQuantityElement = $("#input-quantity-" + cart_id);
        var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
        saveToDB(cart_id, newQuantity);
    }

    function decrementQuantity(cart_id) {
        var inputQuantityElement = $("#input-quantity-" + cart_id);
        if ($(inputQuantityElement).val() > 1) {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            saveToDB(cart_id, newQuantity);
        }
    }

    function saveToDB(cart_id, new_quantity) {
    var inputQuantityElement = $("#input-quantity-" + cart_id);

    $.ajax({
        url: "update-cart-qty.php",
        data: { cart_id: cart_id, new_quantity: new_quantity },
        type: 'post',
        success: function(response) {
            console.log()
            const data = JSON.parse(response)
            $(inputQuantityElement).val(new_quantity);
            $('#total-qty').text(`${data[0]}`)
            $('#total-price').text(`₱ ${data[1]}`)

            
            // updateTotalPrice();
        }
    });
}

// function updateTotalPrice() {
//     var priceElement = document.getElementById('priceElement');
//     var priceText = priceElement.textContent.trim();
//     var priceValue = parseFloat(priceText.replace(/[^\d.]/g, ''))
//     var totalPrice = 0;
//     $(".input-quantity").each(function() {
//         var quantity = parseInt($(this).val());
//         totalPrice += quantity * priceValue;
//     });

//     console.log("Total Price:", totalPrice);

//     $("#total-price").text("₱ " + totalPrice.toFixed(2));
// }


</script>



