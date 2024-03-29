<?php
    session_start();
    
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }
require_once  '../vendor/autoload.php';

function diplayDataTest($array){
    echo "<pre>";
    echo print_r($array);
    echo "</pre>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Trendy Dress Shop</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/colorPick.css">
    <!-- The following line applies the dark theme -->
    <link rel="stylesheet" href="css/colorPick.dark.theme.css">


    <link rel="stylesheet" type="text/css" href="css/coloris.min.css">

    <style>



    #clr-picker {
        z-index: 1050; /* Adjust this value as needed */
    }
	</style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
</head>