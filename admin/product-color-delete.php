<?php
require_once  '../vendor/autoload.php';
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  // print_r($_POST);

if ( isset( $_POST['delete-product-color'] ) && $_POST['delete-product-color'] ){

    $product = new ProductColor;

    $id = $_POST['id'];
    $product_id = $_POST['product_id'];
    $param = [
      "deleted_at" => new \DateTime,
    ];
    $result = $product->update($param ,$id);

    header("Location: product-color-list.php?product_id=$product_id");

 
}