<?php
    include_once("./includes/header.php");
    spl_autoload_register(function ($class) {
        include './models/' . $class . '.php';
    });

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['selected_items']) && is_array($_POST['selected_items'])) {

            $totalQuantity = 0;
            $totalPrice = 0;
            $checkedItems = array();
            
            $cart = new Cart;
            
            foreach ($_POST['selected_items'] as $cartId) {
                $cartItem = $cart->getCartItemById($cartId);
                // print_r($cartItem);
        
                $totalQuantity += $cartItem['quantity'];
                $totalPrice += $cartItem['price'] * $cartItem['quantity'];
                
                $checkedItems[] = $cartItem;
            }
        } else {
            echo "<h2>No items selected for checkout</h2>";
            exit;
        }
    } else {
        header("Location: view-cart.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($checkedItems as $key => $cartItem): ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="title">
                                <h4><b>Shopping Cart</b></h4>
                                <div class="text-right text-muted">3 items</div>
                            </div>
                            <hr>
                            <div class="row border-top border-bottom">
                                <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                                <div class="col">
                                    <div class="row text-muted"><?= $cartItem['product_name'] ?></div>
                                    <div class="row"><?= $cartItem['description'] ?></div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <span><?= $cartItem['quantity'] ?></span>
                                    </div>
                                </div>
                                <div class="col">₱ <?= $cartItem['price'] ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5><b>Summary</b></h5>
                        <hr>
                        <div class="row">
                            <div class="col">TOTAL ITEMS</div>
                            <div class="col text-right"><?= $totalQuantity ?></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">TOTAL PRICE</div>
                            <div class="col text-right">₱ <?= $totalPrice ?></div>
                        </div>
                        <form action="place-order.php" method="POST">
                            <?php foreach ($checkedItems as $cartItem): ?>
                                <input type="hidden" name="selected_items[]" value="<?= $cartItem['id'] ?>">
                            <?php endforeach; ?>
                            <button type="submit" class="btn btn-primary btn-block mt-3">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("./includes/scripts.php"); ?>
    <?php include_once("./includes/footer.php"); ?>
</body>
</html>
