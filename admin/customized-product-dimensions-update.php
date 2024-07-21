<?php
    include_once("./includes/header.php"); 
    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    // displayDataTest($_POST);
    // exit();

    date_default_timezone_set("Asia/Manila");
    

    try {
    
        if ( isset( $_POST['dimension-edit'] ) ){
    
        try {
    
            $param = [
                'shirt_option_type' => $_POST['shirt_option_type'],
                'customized_by' => $_POST['customized_by'],
                'size' => $_POST['size'],
                'dimension' => $_POST['dimension'],
                'price' => $_POST['price'],
            ];
        
            $result = new CustomizedProductDimensions;
            $result_ = $result->update($param, $_POST['id']);
                    
        } catch (\Exception $e) {
            //throw $th;
            throw $e->getMessage();
            
        }
            echo '<script> alert("Entry updated."); window.location.href = "customized-product-dimensions-list.php";</script>';
         
        }
        
    } catch (\Exception $e) {
        echo $e->getMessage();
        //throw $th;
    }