<?php
    include_once("./includes/header.php"); 
    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });



if ( isset( $_POST['add-courier'] ) && $_POST['add-courier'] ){
    $param = [
        'name' => $_POST['name'],
        'link' => $_POST['link'],
        'created_at' => new \DateTime,
        'updated_at' => new \DateTime,
        'created_by' => 1,
    ];

    $courier = new Courier;
    $result = $courier->save($param);


    header("Location: courier-list.php");
    // displayDataTest($param);
}