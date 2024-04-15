<?php


include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

require("../models/PHPMailer/src/PHPMailer.php");
require("../models/PHPMailer/src/SMTP.php");
require("../send_email.php");

if ( isset( $_POST['edit-order-detail'] ) && $_POST['edit-order-detail'] ){
    try {
        $id = $_POST['id'];
        $send_email = isset( $_POST['send_email'] ) ? true : false;
        $order_total = 0;


        $order = new Order;
        $orders = $order->getOrderAndOrderDetails($_POST['id']);
        $customer = new Customer;
        $customer_ = $customer->find($orders->customer_id);
        $status = '';
        switch ($_POST['status']) {
            case 1:
                $status = "Checked out";
                break;
            case 2:
                $status = "Processing";
                break;
            case 3:
                $status = "Shipped";
                break;
            case 4:
                $status = "Delivered";
                break;
            case 11:
                $status = "Cancelled";
                break;
        }
        // displayDataTest($_POST);
        displayDataTest($orders);
     
        foreach ($orders->order_details as $key => $value) {
            $order_total += $value['total_price'];
            $carts = new Cart;
            $param = [
                'status' => $_POST['status'],
                'updated_at' => new \DateTime,
            ];
            $result = $carts->update($param, $value['cart_id']);
        }

        $param = [
            "total" => $order_total,
            'updated_at' => new \DateTime,
        ];

        $order->update($param, $_POST['id']);

        
        if($send_email){
            $fullname = $customer_->first_name .' '. $customer_->last_name;
            $email = $customer_->email;
            $email = "medinformationsystem44@gmail.com";


            sendCustomerEmail($email, $fullname, $status, "Order: $status confirmation.");
        }

        $sales_order = new Sale;
        $sales_order_ = $sales_order->findOrder($_POST['id']);

        if( in_array($status, ["Processing","Shipped", "Delivered"]) ){
            if($sales_order_){
                $param = [
                    'updated_at' => new \DateTime,
                    'deleted_at' => null,
                ];

                $sales_order->update($param, $sales_order_->id);
            }else{
                $param = [
                    'order_id' => $_POST['id'],
                    'created_at' => new \DateTime,
                    'updated_at' => new \DateTime,
                ];

                $sales_order->save($param);
            }


        }else if(in_array($status, ["Cancelled", "Checked out"])){
            
            if($sales_order_){
                $param = [
                    'updated_at' => new \DateTime,
                    'deleted_at' => new \DateTime,
                ];

                $sales_order->update($param, $sales_order_->id);
            }
        }

        header("Location: order-list.php");
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