<?php

Class Category extends Model {

    protected $table = 'categories';

    public static function getCategories(){
        $instance = new self;
        $categories = $instance->setQuery("
            SELECT *  FROM `categories` 
            WHERE `deleted_at` IS NULL      
            ORDER BY `created_at` DESC;
        ")->getAll();
    
        return $categories;
    }

}