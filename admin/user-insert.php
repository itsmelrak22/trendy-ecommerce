<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});


if ( isset( $_POST['add-user'] ) && $_POST['add-user'] ){
    $param = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'created_at' => new \DateTime,
        'updated_at' => new \DateTime,
    ];

    $users = new AdminUser;
    $result = $users->save($param);


    header("Location: user-list.php");
    // displayDataTest($param);
}