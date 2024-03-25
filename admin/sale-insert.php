<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

date_default_timezone_set("Asia/Manila");

try {
    if ( isset( $_POST['add-sale'] ) && $_POST['add-sale'] ){
        $param = [
            
            'customer_id' => $_POST['customer_id'],
            'product_id' => $_POST['product_id'],
            'qty' => $_POST['qty'],
            'sale_price' => $_POST['sale_price'],
            'mop' => $_POST['mop'],
            'sub_total' => $_POST['sub_total'],
            'sales_date' => new \DateTime,
            'order_date' => new \DateTime,
        ];
    
        $sales = new Sale;
        $result = $sales->save($param);
    
    
        if($result){
            header("Location: sale-list.php");
        }
    }
} catch (\Exception $e) {
    echo $e->getMessage();
    //throw $th;
}