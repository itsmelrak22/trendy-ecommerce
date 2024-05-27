<?php

Class Cart extends Model {

    /* STATUS :
        0 = Added to cart;
        1 = Checked out;
        2 = Processing;
        3 = Shipped;
        4 = Delivered;
        
        10 = Declined;
        11 = Canceled;

    */

    protected $table = 'carts';

    public static function getCarts(){
        $instance = new self;
        $dataCarts = $instance->setQuery("
            SELECT C.*, CM.first_name, CM.email, CM.last_name, P.name AS product_name
            FROM carts AS C
            LEFT JOIN products AS P ON P.id = C.product_id
            LEFT JOIN customers AS CM ON CM.id = C.customer_id
            ORDER BY P.created_at DESC
            WHERE C.deleted_at IS NULL
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
            AND C.status = 0
            AND C.deleted_at IS NULL
            ORDER BY P.created_at DESC
        ")->getAll();
        return $dataCarts;
    }

    public static function getCustomerCartCheckedoutItems($customer_id){
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
            AND C.deleted_at IS NULL
            AND C.status = 1
            ORDER BY P.created_at DESC
        ")->getAll();
        return $dataCarts;
    }

    public static function getCustomerCartProcessingItems($customer_id){
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
            AND C.deleted_at IS NULL
            AND C.status = 2
            ORDER BY P.created_at DESC
        ")->getAll();
        return $dataCarts;
    }

    public static function getCustomerCartShippedItems($customer_id){
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
            AND C.deleted_at IS NULL
            AND C.status = 3
            ORDER BY P.created_at DESC
        ")->getAll();
        return $dataCarts;
    }

    public static function getCustomerCartReceivedItems($customer_id){
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
            AND C.deleted_at IS NULL
            AND C.status = 4
            ORDER BY P.created_at DESC
        ")->getAll();
        return $dataCarts;
    }
    public static function getCustomerCartCancelledItems($customer_id){
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
            AND C.deleted_at IS NULL
            AND C.status = 11
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
            AND C.deleted_at IS NULL
            AND status = 0
        ")->getAll();
        
        return $dataCarts;
    }

}