<?php
    include_once("./includes/header.php"); 

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

date_default_timezone_set("Asia/Manila");

displayDataTest($_POST);

try {

    if ( isset( $_POST['courier-delete'] ) ){
     
        try {

            $param = [
                'deleted_at' => new \DateTime,
            ];
        
            $result = new Courier;
            $result_ = $result->update($param, $_POST['id']);
                    
        } catch (\Exception $e) {
            //throw $th;
            throw $e->getMessage();
            
        }
            header("Location: courier-list.php");
         
        }
    
} catch (\Exception $e) {
    echo $e->getMessage();
    //throw $th;
}