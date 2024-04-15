<?php
    require_once  '../vendor/autoload.php';
    session_start();

    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

    date_default_timezone_set("Asia/Manila");


    try {
        if ( isset( $_POST['add-customer'] ) && $_POST['add-customer'] ){

            $existingUser = Customer::findByEmail($_POST['reg_email']);

            if ($existingUser) {
                throw new Exception("User with this email already exists");
            }
            $param = [
                
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'username' => $_POST['username'],
                'email' => $_POST['reg_email'],
                'password' => $_POST['reg_password'],
                'phone_no' => $_POST['phone_number'],
                'province' => $_POST['province'],
                'city_municipality' => $_POST['city_municipality'],
                'barangay' => $_POST['barangay'],
                'complete_address' => $_POST['complete_add'],
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
            ];
        
            $customers = new Customer;
            $result = $customers->save($param);
        
        
            if($result){
                $_SESSION['snackbar_color'] = "green";
                $_SESSION['success_message'] = "Registration successful!";
                header("Location: ../index.php");
            }
        }
    } catch (\Exception $e) {
        $_SESSION['snackbar_color'] = "red";
        $_SESSION['error_message'] = $e->getMessage();
        echo $e->getMessage();
        header("Location: ../index.php");
    }

?>