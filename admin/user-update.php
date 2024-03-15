<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });


if ( isset( $_POST['edit-user'] ) && $_POST['edit-user'] ){
    $id = $_POST['id'];
    $param = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'updated_at' => new \DateTime,
    ];

    $users = new AdminUser;
    $result = $users->update($param, $id);


    header("Location: user-list.php");
    // diplayDataTest($param);
}