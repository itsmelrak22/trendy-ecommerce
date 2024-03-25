<?php

Class AdminUser extends Model {

    protected $table = 'admin';


    // public static function authenticateUser($email, $password) {
    //     $instance = new self;

    //     $query = "SELECT * FROM admin WHERE email = :email AND password = :password";
    //     $stmt = $instance->pdo->prepare($query);
        

    //     $stmt->bindParam(':email', $email);
    //     $stmt->bindParam(':password', $password);
    //     $stmt->execute();
    //     $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $user;
    // }

    public static function authenticateUser($email, $password) {
        $instance = new self;
    
        $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $stmt = $instance->pdo->prepare($query);
        
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    
    
}