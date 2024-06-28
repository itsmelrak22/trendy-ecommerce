<?php

Class ProductSize extends Model {

    protected $table = 'product_sizes';


    public static function getProductSizes($product_id){
        $instance = new self;
        $product_sizes = $instance->setQuery("
            SELECT *  FROM `product_sizes`
            WHERE `deleted_at` IS NULL
            AND `product_id` = $product_id 
            ORDER BY `created_at` DESC
        ")->getAll();
    
        return $product_sizes;
    }
    

}