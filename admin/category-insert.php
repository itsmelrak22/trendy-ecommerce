<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});


if ( isset( $_POST['add-category'] ) && $_POST['add-category'] ){
    $param = [
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'created_at' => new \DateTime,
        'updated_at' => new \DateTime,
        'created_by' => 1,
    ];

    $categories = new Category;
    $result = $categories->save($param);

    header("Location: category-list.php");
    // diplayDataTest($param);
}