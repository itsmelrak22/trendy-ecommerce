<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});


date_default_timezone_set("Asia/Manila");

// displayDataTest($_POST);

try {

    if ( isset( $_POST['dimension-delete'] ) ){
     
        try {

            $param = [
                'deleted_at' => new \DateTime,
            ];
        
            $result = new CustomizedProductDimensions;
            $result_ = $result->update($param, $_POST['id']);
                    
        } catch (\Exception $e) {
            //throw $th;
            throw $e->getMessage();
            
        }
        echo '<script> alert("Entry Deleted."); window.location.href = "customized-product-dimensions-list.php";</script>';
         
        }
    
} catch (\Exception $e) {
    echo $e->getMessage();
    //throw $th;
}