<?php
    header("Content-Type: application/json");
    require_once  '../vendor/autoload.php';

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });


if ( isset( $_GET['reportDate'] ) && $_GET['reportDate'] ){
    $sales = Sale::getSalesByDate($_GET['reportDate']);
    echo json_encode($sales);
    exit();
}else if( (isset( $_GET['startDate'] ) && $_GET['startDate']) && (isset( $_GET['endDate'] ) && $_GET['endDate']) ){
     $sales = Sale::getSalesByCustomDate($_GET['startDate'], $_GET['endDate']);
     echo json_encode($sales);
     exit();
}else if ( isset( $_GET['reportYear'] ) && $_GET['reportYear'] ){
    $sales = Sale::getSalesByYear($_GET['reportYear']);
    echo json_encode($sales);
    exit();
}else if ( isset( $_GET['reportMonth'] ) && $_GET['reportMonth'] ){
    $sales = Sale::getSalesByMonth($_GET['reportMonth']);
    echo json_encode($sales);
    exit();
}