<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

  print_r($_POST);

if ( isset( $_POST['delete-customer'] ) && $_POST['delete-customer'] ){
    $id = $_POST['id'];
    $customer = new Customer;
    $result = $customer->delete($id);

    header("Location: customer-list.php");
    // diplayDataTest($param);
}