<?php
    require_once  './vendor/autoload.php';

function displayaDtaTest($array){
    echo "<pre>";
    echo print_r($array);
    echo "</pre>";
}
// displayaDtaTest($_POST);
// exit();
if(!isset($_REQUEST['id'])){
    exit();
}
$id = $_REQUEST['id'];

spl_autoload_register(function ($class) {
    include './models/' . $class . '.php';
});


date_default_timezone_set("Asia/Manila");

try {
        $cart = new Cart;
        $param = [
            'deleted_at' => new \DateTime,
        ];
        $result = $cart->update($param, $id);

        if($result){
            // header("Location: view-products.php?id=$product_id&color_id=$color_id");
            echo '<script> alert("Item removed from your cart."); window.location.href = "customer-cart.php";</script>';

        }else{
            echo "Server error";
        }
        // displayDataTest($param);
  
} catch (\Exception $e) {
    echo $e->getMessage();
    //throw $th;
}