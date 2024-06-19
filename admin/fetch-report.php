<?php
    header("Content-Type: application/json");
    require_once  '../vendor/autoload.php';

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });


if ( isset( $_GET['reportDate'] ) && $_GET['reportDate'] ){
    // displayDataTest($_GET['reportDate']);
    $sales = Sale::getSalesByDate($_GET['reportDate']);
    // print_r($sales);
    echo json_encode($sales);
    exit();
}