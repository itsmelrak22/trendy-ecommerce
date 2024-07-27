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




    try {
        // $_POST['forgot_email'] = 'testsss@sdf.com';
            $user = Customer::findByEmail($_POST['forgot_email']);
            // displayDataTest($_POST); exit;

            if (!isset($user['id'])) {

                $_SESSION['snackbar_color'] = "red";
                $_SESSION['error_message'] = "Email is not used by any user accounts";
                header("Location: ../index.php");
                exit;
            }

            $param = [
                'password' => $_POST['new_password'],
                'updated_at' => new \DateTime,
            ];
        
            $customers = new Customer;
            $result = $customers->update($param, $user['id']);
        
        
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