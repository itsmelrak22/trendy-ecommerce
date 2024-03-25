<?php
require_once  '../vendor/autoload.php';
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  // print_r($_POST);

if ( isset( $_POST['delete-product'] ) && $_POST['delete-product'] ){

    $product = new Product;

    $id = $_POST['id'];
    $param = [
      "deleted_at" => new \DateTime,
    ];
    $result = $product->update($param ,$id);

    header("Location: product-list.php");

 
}