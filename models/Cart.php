<?php

Class Cart extends Model {

    protected $table = 'carts';

    public static function getCarts(){
        $instance = new self;
        $dataCarts = $instance->setQuery("
            SELECT C.*, CM.first_name, CM.last_name, P.name AS product_name
            FROM carts AS C
            LEFT JOIN products AS P ON P.id = C.product_id
            LEFT JOIN customers AS CM ON CM.id = C.customer_id
            ORDER BY P.created_at DESC
        ")->getAll();
        return $dataCarts;
    }

    public static function getCustomerCartItems($customer_id){
        $instance = new self;
        $dataCarts = $instance->setQuery("
            SELECT 
                C.*, 
                CM.first_name, 
                CM.last_name, 
                P.name AS product_name,
                PC.name as color,
                PC.image,
                P.price
            FROM carts AS C
            LEFT JOIN customers AS CM ON CM.id = C.customer_id
            INNER JOIN products AS P ON P.id = C.product_id
            INNER JOIN product_colors AS PC ON C.color_id = PC.id
            WHERE  C.customer_id = $customer_id
            ORDER BY P.created_at DESC
        ")->getAll();
        return $dataCarts;
    }

    public static function checkIfExists($customer_id , $product_id, $color_id){
        $instance = new self;
        $dataCarts = $instance->setQuery("
            SELECT *
            FROM carts
            WHERE  customer_id = $customer_id
            AND  product_id = $product_id
            AND  color_id = $color_id
        ")->getAll();
        
        return $dataCarts;
    }

}