<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});


if ( isset( $_POST['edit-order-detail'] ) && $_POST['edit-order-detail'] ){
    $id = $_POST['id'];

    // diplayDataTest($_POST);
    // exit();
   
    $order = new Order;
    $orders = $order->getOrderAndOrderDetails($_POST['id']);

    foreach ($orders->order_details as $key => $value) {
        $carts = new Cart;
        $param = [
            'status' => $_POST['status'],
            'updated_at' => new \DateTime,
        ];
        $result = $carts->update($param, $value['cart_id']);
    }


    header("Location: order-list.php");
    // diplayDataTest($param);
}