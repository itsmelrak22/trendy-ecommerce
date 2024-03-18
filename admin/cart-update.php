<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });


if ( isset( $_POST['edit-cart'] ) && $_POST['edit-cart'] ){
    $id = $_POST['id'];
    $param = [
        'customer_id' => $_POST['customer_id'],
        'product_id' => $_POST['product_id'],
        'total_price' => $_POST['total_price'],
        'status' => $_POST['status'],
        'updated_at' => new \DateTime,
    ];

    $carts = new Cart;
    $result = $carts->update($param, $id);


    header("Location: cart-list.php");
    // diplayDataTest($param);
}