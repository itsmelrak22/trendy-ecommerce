<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});


  print_r($_POST);

if ( isset( $_POST['delete-sale'] ) && $_POST['delete-sale'] ){
    $id = $_POST['id'];
    $sale = new Sale;
    $result = $sale->delete($id);

    header("Location: sale-list.php");
    // diplayDataTest($param);
}