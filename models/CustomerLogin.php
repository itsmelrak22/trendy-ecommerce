<?php

Class CustomerLogin extends Model {

    protected $table = 'login';


    public static function loginUser($username, $password) {
        $instance = new self;
    
        $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
        $stmt = $instance->pdo->prepare($query);
        
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}