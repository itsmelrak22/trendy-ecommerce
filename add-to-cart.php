<?php
    require_once  './vendor/autoload.php';

function displayDataTest($array){
    echo "<pre>";
    echo print_r($array);
    echo "</pre>";
}

// exit();
$product_id = $_POST['product_id'];
$color_id = $_POST['color_id'];
$customer_id = $_POST['customer_id'];

spl_autoload_register(function ($class) {
    include './models/' . $class . '.php';
});


date_default_timezone_set("Asia/Manila");

try {
    if ( isset( $_POST['add-cart'] ) ){

        $cart = new Cart;
        $existing_item = $cart->checkIfExists($customer_id , $product_id, $color_id);
        
        if( count($existing_item) > 0 ){
            $param = [
            
                'product_id' => $_POST['product_id'],
                'color_id' => $_POST['color_id'],
                'customer_id' => $_POST['customer_id'],
                'quantity' => (int) $existing_item[0]['quantity'] + (int) $_POST['quantity'],
                'updated_at' => new \DateTime,
            ];
            
            $result = $cart->update($param, $existing_item[0]['id']);

        }else{
            $param = [
            
                'product_id' => $_POST['product_id'],
                'color_id' => $_POST['color_id'],
                'customer_id' => $_POST['customer_id'],
                'quantity' => $_POST['quantity'],
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ];

            $result = $cart->save($param);

        }

    
        if($result){
            // header("Location: view-products.php?id=$product_id&color_id=$color_id");
            echo '<script> alert("Item added to your cart."); window.location.href = "view-products.php?id='.$product_id.'&color_id='.$color_id.'";</script>';

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