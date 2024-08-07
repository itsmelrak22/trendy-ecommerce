<?php
    session_start();
    
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }
require_once  '../vendor/autoload.php';

function displayDataTest($array){
    echo "<pre>";
    echo print_r($array);
    echo "</pre>";
}

function getImageLink($image){
    $img_link = '';
    if(!$image){
        $img_link = 'https://dummyimage.com/450x450/dee2e6/6c757d.jpg';
    }else{
        if(file_exists("$image")){
            $img_link = "$image";
        }else{
            $img_link = 'https://dummyimage.com/450x450/dee2e6/6c757d.jpg';
        }
    }

    return $img_link;
}

function camelize($input, $separator = ' '){
    return lcfirst(str_replace($separator, '', ucwords($input, $separator)));
}

function getBadgeClass($status) {
    switch ($status) {
        case 'Checked out':
        case 'Confirmed':
            return 'badge-primary';
        case 'Processing':
            return 'badge-info';
        case 'Shipped':
            return 'badge-warning';
        case 'Delivered':
            return 'badge-success';
        case 'Cancelled':
        case 'Canceled':
        case 'canceled':
            return 'badge-danger';
        default:
            return 'badge-secondary'; // default class for any unexpected status
    }
}

    // displayDataTest($orders);
    function getStatusText($status){

        switch ($status) {
            case 0:
                return "Added to cart";
                break;
            case 1:
                return "Checked out";
                break;
            case 2:
                return "Processing";
                break;
            case 3:
                return "Shipped";
                break;
            case 4:
                return "Delivered";
                break;
            case 10:
                return "Declined";
                break;
            case 11:
                return "Canceled";
                break;
            default:
                return "Unknown status";
                break;
        }
        

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

    <title>Admin - TRENDY THREADS APPAREL</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

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
    
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        #wrapper {
            display: flex;
            height: 100%;
        }

        #content-wrapper {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            overflow-y: auto;
            height: 100%;
        }

        #adminNav .navbar {
            position: sticky;
            top: 0;
            z-index: 1000; /* Ensures the navbar stays on top of other content */
            background-color: white; /* Ensure the navbar has a background */
        }

        #adminNav .topbar-divider {
            height: 100%;
        }

        #adminNav .dropdown-menu {
            z-index: 1050; /* Ensures dropdowns display above other content */
        }
    </style>
    

       <!-- Include jsPDF -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
    <!-- <script src="https://cdn.tiny.cloud/1/7s668lopwo28cxkecplxkvrx5clnsanfssk47cktburr6jbs/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> -->
    <script src="https://cdn.tiny.cloud/1/7s668lopwo28cxkecplxkvrx5clnsanfssk47cktburr6jbs/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
</head>