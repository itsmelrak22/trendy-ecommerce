<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });


if ( isset( $_POST['add-product'] ) && $_POST['add-product'] ){
    $param = [
        'category_id' => 1,
        'name' => $_POST['product_name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'stock_qty' => $_POST['quantity'],
        'created_at' => new \DateTime,
        'updated_at' => new \DateTime,
        'created_by' => 1,
    ];

    $products = new Product;
    $result = $products->save($param);


    header("Location: product-list.php");
    // diplayDataTest($param);
}