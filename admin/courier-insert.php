<?php
    include_once("./includes/header.php"); 
    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    // displayDataTest($_POST);
    // exit();


if ( isset( $_POST['add-courier'] ) ){

    // displayDataTest($_POST);
    // exit();

    try {
        //code...
        $param = [
            'name' => $_POST['name'],
            'link' => $_POST['link'],
            'created_at' => new \DateTime,
        ];
    
        $courier = new Courier;
        $result = $courier->save($param);

    } catch (\Exception $e) {
        //throw $th;
        throw $e->getMessage();
        
    }


    header("Location: courier-list.php");
    // displayDataTest($param);
}