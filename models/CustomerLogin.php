<?php

Class CustomerLogin extends Model {

    protected $table = 'login';


    public static function loginUser($email, $password) {
        $instance = new self;
    
        $query = "SELECT * FROM customers 
            WHERE `email` = '$email' 
            AND `password` = '$password' 
            AND `deleted_at` IS NULL";
        $stmt = $instance->pdo->prepare($query);
        
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}