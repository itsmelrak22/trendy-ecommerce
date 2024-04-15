<?php

Class Customer extends Model {

    protected $table = 'customers';

    public static function findByEmail($email)
    {
        $instance = new self;
    
        $query = "SELECT * FROM customers 
            WHERE `email` = '$email' 
            LIMIT 1 ";
        $stmt = $instance->pdo->prepare($query);
        
        $stmt->execute();
        $register = $stmt->fetch(PDO::FETCH_ASSOC);
        return $register;
    }

}