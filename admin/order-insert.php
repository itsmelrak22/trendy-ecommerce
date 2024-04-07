<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});


date_default_timezone_set("Asia/Manila");

try {
    if ( isset( $_POST['add-cart'] ) && $_POST['add-cart'] ){
        $param = [
            
            'customer_id' => $_POST['customer_id'],
            'product_id' => $_POST['product_id'],
            'total_price' => $_POST['total_price'],
            'status' => $_POST['status'],
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ];
    
        $carts = new Cart;
        $result = $carts->save($param);
    
    
        if($result){
            header("Location: cart-list.php");
        }
        // diplayDataTest($param);
    }
} catch (\Exception $e) {
    echo $e->getMessage();
    //throw $th;
}