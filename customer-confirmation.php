<?php
    require_once  './vendor/autoload.php';

function displayaDtaTest($array){
    echo "<pre>";
    echo print_r($array);
    echo "</pre>";
}
// displayaDtaTest($_POST);
// exit();


spl_autoload_register(function ($class) {
    include './models/' . $class . '.php';
});

if( isset($_POST['confirmation']) ){
    date_default_timezone_set("Asia/Manila");

    try {
    
    
            $customOrder = new CustomizeOrder;
            $param = [
                'customer_confirmation' => $_POST['confirmation'],
            ];
            $result = $customOrder->update($param, $_POST['custom-order-id']);

            $msg = '';
            if($_POST['confirmation'] == 'accept'){
                $msg = "Thank you for accepting the order invoice. We will update you about your order as soon as possible.";
            }else if($_POST['confirmation'] == 'decline'){
                $msg = "We apologize if this order did not meet your expectations. We hope to serve you better soon.";

            }
    
            if($result){
                // header("Location: view-products.php?id=$product_id&color_id=$color_id");
                echo '<script> alert("'.$msg.'"); window.location.href = "customer-cart.php?confirmed-customize-order-tab=true";</script>';
    
            }else{
                echo "Server error";
            }
            // displayDataTest($param);
      
    } catch (\Exception $e) {
        echo $e->getMessage();
        //throw $th;
    }
}

