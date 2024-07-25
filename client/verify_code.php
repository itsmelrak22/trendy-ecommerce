<?php
    require_once  '../vendor/autoload.php';
    session_start();

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    date_default_timezone_set("Asia/Manila");

    function displayDataTest($array){
        echo "<pre>";
        echo print_r($array);
        echo "</pre>";
    }


    displayDataTest($_POST); exit;


    try {

            $existingUser = Customer::findByEmail($_POST['forgot_email']);

            if ($existingUser) {
                $_SESSION['snackbar_color'] = "red";
                $_SESSION['error_message'] = "User with this email already exists";
                header("Location: ../index.php");
                exit;
            }
            $param = [
                
                'password' => $_POST['new_password'],
                'updated_at' => new \DateTime,
            ];
        
            $customers = new Customer;
            $result = $customers->save($param);
        
        
            if ($result) {
                $_SESSION['snackbar_color'] = "green";
                $_SESSION['success_message'] = "Reset Password successful!";
                header("Location: ../index.php");
                exit;
            }
    } catch (\Exception $e) {
        $_SESSION['snackbar_color'] = "red";
        $_SESSION['error_message'] = $e->getMessage();
        echo $e->getMessage();
        header("Location: ../index.php");
    }

?>