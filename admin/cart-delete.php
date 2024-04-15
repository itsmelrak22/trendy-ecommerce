<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

  print_r($_POST);

if ( isset( $_POST['delete-cart'] ) && $_POST['delete-cart'] ){
    $id = $_POST['id'];
    $cart = new Cart;
    $result = $cart->delete($id);

    header("Location: cart-list.php");
    // displayDataTest($param);
}