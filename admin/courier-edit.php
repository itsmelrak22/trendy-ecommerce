<?php
    include_once("./includes/header.php"); 

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

date_default_timezone_set("Asia/Manila");


try {

    if ( isset( $_POST['courier-edit'] ) ){

    try {

        $param = [
            'name' => $_POST['name'],
            'link' => $_POST['link'],
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