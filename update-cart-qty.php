<?php
// include_once("./includes/header.php");
require_once  './vendor/autoload.php';
session_start();
spl_autoload_register(function ($class) {
    include './models/' . $class . '.php';
});

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['error' => 'User is not logged in']);
        exit;
    }

    if (!isset($_POST["cart_id"]) || !isset($_POST["new_quantity"])) {
        echo json_encode(['error' => 'Missing parameters']);
        exit;
    }

    $cartId = $_POST["cart_id"];
    $newQuantity = $_POST["new_quantity"];

    $success = Cart::updateQuantityById($cartId, $newQuantity);


    $cart = new Cart;

    $userId = $_SESSION['user_id'];
    $carts = $cart->getCartsByUserId($userId);


    $totalQuantity = 0;
    $totalPrice = 0;
    foreach ($carts as $cartItem) {
        if ($cartItem['status'] != 1) {
            $totalQuantity += $cartItem['quantity'];
            $totalPrice += $cartItem['price'] * $cartItem['quantity'];
        }
    }

    if ($success) {
        echo json_encode([$totalQuantity,$totalPrice]);
    } else {
        echo json_encode(['error' => 'Failed to update quantity']);
    }

} else {
    echo json_encode(['error' => 'Invalid request method']);
    exit;
}
?>
