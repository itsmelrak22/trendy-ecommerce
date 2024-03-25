<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});


if ( isset( $_POST['edit-customer'] ) && $_POST['edit-customer'] ){
    $id = $_POST['id'];
    $param = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'phone_no' => $_POST['phone_no'],
        'updated_at' => new \DateTime,
    ];

    $customers = new Customer;
    $result = $customers->update($param, $id);


    header("Location: customer-list.php");
}