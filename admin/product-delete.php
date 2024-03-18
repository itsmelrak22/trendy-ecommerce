<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  // print_r($_POST);

if ( isset( $_POST['delete-product'] ) && $_POST['delete-product'] ){
    $id = $_POST['id'];
    $product = new Product;
    $result = $product->delete($id);

    header("Location: product-list.php");


    // $today =  $today->format('Y-m-d H:i:s');

    // $param = [
    //   "deleted_at" => new \DateTime,
    //   'updated_at' => new \DateTime,
    // ];

    // $product = new Product;
    // $result = $product->update($param ,$id);
    // diplayDataTest($param);
}