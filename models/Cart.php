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

}