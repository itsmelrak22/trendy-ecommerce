<?php
    require_once  '../vendor/autoload.php';
    session_start();

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $user = CustomerLogin::loginUserViaUsername($username, $password);
        
        if ($user) {
            $_SESSION["loggedInUser"] = $user;
            $_SESSION['snackbar_color'] = "green";
            $_SESSION['success_message'] = "Login successful!";
            header("Location: ../index.php");
            exit();
        } else {
            $_SESSION['snackbar_color'] = "red";
            $_SESSION['success_message'] = "Login Failed!";
            header("Location: ../index.php");
            // echo '<script> alert("Invalid username or password!"); window.location.href = "../index.php";</script>';
        }
    }
?>