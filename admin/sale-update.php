<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });


if ( isset( $_POST['edit-sale'] ) && $_POST['edit-sale'] ){
    $id = $_POST['id'];
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
    $result = $sales->update($param, $id);


    header("Location: sale-list.php");
    // diplayDataTest($param);
}