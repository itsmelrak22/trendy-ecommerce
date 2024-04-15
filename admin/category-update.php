<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});


if ( isset( $_POST['edit-category'] ) && $_POST['edit-category'] ){
    $id = $_POST['id'];
    $param = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'updated_at' => new \DateTime,
    ];

    $categories = new Category;
    $result = $categories->update($param, $id);


    header("Location: category-list.php");
    // displayDataTest($param);
}