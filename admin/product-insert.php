<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

date_default_timezone_set("Asia/Manila");

try {
    if ( isset( $_POST['add-product'] ) && $_POST['add-product'] ){
        $param = [
            
            'name' => $_POST['product_name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'stock_qty' => $_POST['quantity'],
            'category_id' => $_POST['category_id'],
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
            'created_by' => 1,
        ];
    
        $products = new Product;
        $result = $products->save($param);
    
    
        if($result){
            header("Location: product-list.php");
        }
        // diplayDataTest($param);
    }
} catch (\Exception $e) {
    echo $e->getMessage();
    //throw $th;
}