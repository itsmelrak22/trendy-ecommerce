<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

date_default_timezone_set("Asia/Manila");

try {
    if ( isset( $_POST['add-customer'] ) && $_POST['add-customer'] ){
        $param = [
            
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'phone_no' => $_POST['phone_no'],
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ];
    
        $customers = new Customer;
        $result = $customers->save($param);
    
    
        if($result){
            header("Location: customer-list.php");
        }
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}