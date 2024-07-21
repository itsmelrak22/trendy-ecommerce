<?php
    include_once("./includes/header.php"); 
    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    // displayDataTest($_POST);
    // exit();
    $dimensions = new CustomizedProductDimensions;


if ( isset( $_POST['add-dimension'] ) ){

    // displayDataTest($_POST);
    // exit();
    
    $shirt_option_type  =  $_POST['shirt_option_type'];
    $customized_by      =  $_POST['customized_by'];
    $size               =  $_POST['size'];
    $price              =  $_POST['price'];
    $dimension              =  $_POST['dimension'];

    $exist = $dimensions->setQuery("SELECT *
        FROM customized_product_dimensions 
        WHERE `shirt_option_type` = '$shirt_option_type'
        AND `customized_by` = '$customized_by'
        AND `size` = '$size'
        AND `dimension` = '$dimension'
        AND `deleted_at` IS NULL
        ")
    ->getFirst();

    if( isset( $exist->size ) ){
        echo '<script> alert("Entry already exists."); window.location.href = "customized-product-dimensions-list.php";</script>';
        exit();
    }

    try {
        //code...
        $param = [
            'shirt_option_type'     =>   $_POST['shirt_option_type'],
            'customized_by'         =>   $_POST['customized_by'],
            'size'                  =>   $_POST['size'],
            'dimension'             =>   $_POST['dimension'],
            'price'                 =>   $_POST['price'],
            'created_at'            =>   new \DateTime,
            'updated_at'            =>   new \DateTime,
        ];
    
        $result = $dimensions->save($param);

    } catch (\Exception $e) {
        //throw $th;
        throw $e->getMessage();
        
    }
    echo '<script> alert("Entry Added."); window.location.href = "customized-product-dimensions-list.php";</script>';

}