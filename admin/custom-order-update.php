<?php


include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

require("../models/PHPMailer/src/PHPMailer.php");
require("../models/PHPMailer/src/SMTP.php");
require("../send_email.php");

displayDataTest($_POST);
// exit();
if ( isset( $_POST['custom-edit-order-detail'] ) && $_POST['custom-edit-order-detail'] ){
    try {
        $id = $_POST['id'];
        $remarks = $_POST['remarks'];
        $status = $_POST['status'];
        $total_price = $_POST['total_price'];
        $customer_id = $_POST['customer_id'];
        $send_email = isset( $_POST['send_email'] ) ? true : false;

        $order = new CustomizeOrder;
        $order_ = $order->getSpecificCustomOrders($id);
        $param = [
            'status' => "$status",
            'total_price' => "$total_price",
            'remarks' => "$remarks",
            'updated_at' => new \DateTime,
        ];

        $result = $order->update($param, $id);

        $customer = new Customer;
        $customer_ = $customer->find($customer_id);


        // displayDataTest($customer_);
        // exit();
        if($send_email){
            $fullname = $customer_->first_name .' '. $customer_->last_name;
            $email = $customer_->email;
            // $email = "medinformationsystem44@gmail.com";


            sendCustomerEmailCustomOrder($email, $fullname, $status, "Custom Order: $status confirmation.", $remarks, $total_price);
        }


        header("Location: custom-order-list.php");
        // displayDataTest($param);
    } catch (\PDOException $e) {
        echo $e->getMessage();
        //throw $th;
    }
}

    /* STATUS :
        0 = Added to cart;
        1 = Checked out;
        2 = Processing;
        3 = Shipped;
        4 = Delivered;
        
        10 = Declined;
        11 = Cancelled;

    */