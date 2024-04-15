<?php

    include_once("./includes/header.php"); 
    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });


if ( isset( $_POST['edit-product'] ) && $_POST['edit-product'] ){
    $id = $_POST['id'];
    $param = [
        'name' => $_POST['product_name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        // 'stock_qty' => $_POST['quantity'],
        'updated_at' => new \DateTime,
    ];

    $products = new Product;
    $result = $products->update($param, $id);


    header("Location: product-list.php");
    // displayDataTest($param);
}