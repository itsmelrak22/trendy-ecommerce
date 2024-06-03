<?php
session_start();
require_once  './vendor/autoload.php';

function displayaDtaTest($array){
    echo "<pre>";
    echo print_r($array);
    echo "</pre>";
}
// displayaDtaTest($_POST);
// exit();

$product_id = $_POST['product_id'];
$color_id = $_POST['color_id'];
$customer_id = $_POST['customer_id'];

if(!isset($_POST['size']) || !$_POST['size']){
    echo '<script> alert("Please, Select product size."); window.location.href = "view-products.php?id='.$product_id.'&color_id='.$color_id.'";</script>';
}

spl_autoload_register(function ($class) {
    include './models/' . $class . '.php';
});


date_default_timezone_set("Asia/Manila");

    try {
        if ( isset( $_POST['add-cart'] ) || isset( $_POST['buy-now'] ) ){
    
            $cart = new Cart;
            $existing_item = $cart->checkIfExists($customer_id , $product_id, $color_id);
            
            if( count($existing_item) > 0 ){
                $param = [
                
                    'product_id' => $_POST['product_id'],
                    'color_id' => $_POST['color_id'],
                    'customer_id' => $_POST['customer_id'],
                    'quantity' => (int) $existing_item[0]['quantity'] + (int) $_POST['quantity'],
                    'size' => $_POST['size'],
                    'updated_at' => new \DateTime,
                ];
                
                $result = $cart->update($param, $existing_item[0]['id']);
    
            }else{
                $param = [
                
                    'product_id' => $_POST['product_id'],
                    'color_id' => $_POST['color_id'],
                    'customer_id' => $_POST['customer_id'],
                    'quantity' => $_POST['quantity'],
                    'size' => $_POST['size'],
                    'created_at' => new \DateTime,
                    'updated_at' => new \DateTime,
                ];
    
                $result = $cart->save($param);
    
            }
    
        
            if($result){
                // header("Location: view-products.php?id=$product_id&color_id=$color_id");

                if(isset($_POST['buy-now'])){
                    $last_id = $cart->getLastInsertedId();
                    $_SESSION['buy_now_cart_id'] = $last_id ;
                    echo '<script> alert("Item added to your cart, you will be redirect to checkout page."); window.location.href = "customer-cart.php";</script>';

                }else{
                    echo '<script> alert("Item added to your cart."); window.location.href = "view-products.php?id='.$product_id.'&color_id='.$color_id.'";</script>';

                }

                
    
            }else{
                echo "Server error";
            }
            // displayDataTest($param);
        }else{
            echo "Else";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
        //throw $th;
    }