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
}else if( (isset( $_GET['startDate'] ) && $_GET['startDate']) && (isset( $_GET['endDate'] ) && $_GET['endDate']) ){
     // displayDataTest($_GET['reportDate']);
     $sales = Sale::getSalesByCustomDate($_GET['startDate'], $_GET['endDate']);
     // print_r($sales);
     echo json_encode($sales);
     exit();
}else if ( isset( $_GET['reportYear'] ) && $_GET['reportYear'] ){
    // displayDataTest($_GET['reportYear']);
    $sales = Sale::getSalesByYear($_GET['reportYear']);
    // print_r($sales);
    echo json_encode($sales);
    exit();
}else if ( isset( $_GET['reportMonth'] ) && $_GET['reportMonth'] ){
    // displayDataTest($_GET['reportMonth']);
    $sales = Sale::getSalesByMonth($_GET['reportMonth']);
    // print_r($sales);
    echo json_encode($sales);
    exit();
}