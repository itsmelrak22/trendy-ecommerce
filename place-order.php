<?php
    ob_start();
    include_once("./includes/header.php");
    spl_autoload_register(function ($class) {
        include './models/' . $class . '.php';
    });


    if (!isset($_SESSION['user_id'])) {
        echo "User not logged in.";
        exit;
    }

    $userId = $_SESSION['user_id'];

    $selectedItems = $_POST['selected_items'] ?? [];

    if (empty($selectedItems)) {
        echo "No items selected for placing order.";
        exit;
    }

    $cart = new Cart;
    $sales = new Sale;

    foreach ($selectedItems as $cartId) {

        $cartItem = $cart->getCartItemById($cartId);

        $cart->updateCartItemStatus($cartItem['id'], 1);

        $salesData = array(
            'customer_id' => $userId,
            'product_id' => $cartItem['product_id'],
            'qty' => $cartItem['quantity'],
            'sale_price' => $cartItem['total_price'],
            'sales_date' => new \DateTime,
            'order_date' => new \DateTime,
        );

        $sales->save($salesData);
    }

    header("Location: view-cart.php");
    exit;
    ob_flush();
?>
