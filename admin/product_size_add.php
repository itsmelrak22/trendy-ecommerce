<?php
require_once  '../vendor/autoload.php';
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

date_default_timezone_set("Asia/Manila");


try {

    if ( isset( $_POST['product-size-add'] ) ){
        $param = [
            'size_price' => $_POST['size_price'],
            'size_display' => $_POST['size_display'],
            'size_name' => $_POST['size_name'],
            'product_id' => $_POST['product_id'],
            'created_at' => new \DateTime,
        ];
    
        $product = new ProductSize;
        $result = $product->save($param);
                
        header("Location: product-view.php?id=".$_POST['product_id']);
     
    }
    
} catch (\Exception $e) {
    echo $e->getMessage();
    //throw $th;
}