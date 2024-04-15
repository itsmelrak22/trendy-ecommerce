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


    displayDataTest($_POST);

    try {
        if ( isset( $_POST['update_profile'] ) && $_POST['update_profile'] ){

            $id = $_POST['id'];
            $param = [
                'phone_no' => $_POST['phone_no'],
                'province' => $_POST['province'],
                'city_municipality' => $_POST['city_municipality'],
                'barangay' => $_POST['barangay'],
                'complete_address' => $_POST['complete_address'],
                'updated_at' => new \DateTime,
            ];
        
            $customers = new Customer;
            $result = $customers->update($param, $id);
        
        
            if($result){
                $_SESSION['snackbar_color'] = "green";
                $_SESSION['success_message'] = "Profile Updated!";
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