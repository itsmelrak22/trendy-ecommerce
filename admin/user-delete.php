<?php

include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

  // print_r($_POST);

if ( isset( $_POST['delete-user'] ) && $_POST['delete-user'] ){
    $id = $_POST['id'];
    $user = new AdminUser;
    $result = $user->delete($id);

    header("Location: user-list.php");
    // displayDataTest($param);
}