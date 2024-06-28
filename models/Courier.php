<?php

Class Courier extends Model {

    protected $table = 'couriers';

    public static function getCouriers(){
        $instance = new self;
        $couriers = $instance->setQuery("
            SELECT *  FROM `couriers` 
            WHERE `deleted_at` IS NULL      
            ORDER BY `created_at` DESC;
        ")->getAll();
    
        return $couriers;
    }

}