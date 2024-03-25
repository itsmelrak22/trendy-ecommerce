<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});


  print_r($_POST);

if ( isset( $_POST['delete-category'] ) && $_POST['delete-category'] ){
    $id = $_POST['id'];
    $category = new Category;
    $result = $category->delete($id);

    header("Location: category-list.php");
    // diplayDataTest($param);
}