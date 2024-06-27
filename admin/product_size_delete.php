<?php
require_once  '../vendor/autoload.php';
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

date_default_timezone_set("Asia/Manila");


try {

    if ( isset( $_POST['product_size_delete'] ) ){
        $param = [
            'deleted_at' => new \DateTime,
        ];
    
        $product = new ProductSize;
        $result = $product->update($param, $_POST['id']);
                
        header("Location: product-view.php?id=".$_POST['product_id']);
     
    }
    
} catch (\Exception $e) {
    echo $e->getMessage();
    //throw $th;
}