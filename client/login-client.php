<?php
    session_start();

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = CustomerLogin::loginUser($username, $password);
        
        if ($user) {
            $_SESSION["username"] = $user["username"];
            header("Location: ../index.php");
            exit();
        } else {
            echo '<script> alert("Invalid username or password!"); window.location.href = "../index.php";</script>';
        }
    }
?>