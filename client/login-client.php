<?php
    require_once  '../vendor/autoload.php';
    session_start();

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = CustomerLogin::loginUser($email, $password);
        
        if ($user) {
            $_SESSION["loggedInUser"] = $user;
            header("Location: ../index.php");
            exit();
        } else {
            echo '<script> alert("Invalid username or password!"); window.location.href = "../index.php";</script>';
        }
    }
?>