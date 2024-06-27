<?php
// session_start();
include_once("./includes/header.php"); 
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});


if ( isset( $_POST['update-site-settings'] ) && $_POST['update-site-settings'] ){
    $data = [
        "productSelect" => $_POST["product-select"],
        "color_id" => $_POST["color_id"],
        "discountPercentage" => $_POST["discountPercentage"],
        "productPrice" => $_POST["productPrice"],
        "discountedPrice" => $_POST["discountedPrice"],
        "customRadio" => $_POST["customRadio"],
        "customRadio2" => $_POST["customRadio2"],
        "productImage" => $_POST["productImage"],
        "defaultImage" => "assets/carousel/2.jpg",
        "uploadedBanner" => "",
        "Banner" => $_POST["Banner"],
        "Banner2" => $_POST["Banner2"],
        "defaultImage2" => "assets/carousel/2.jpg",
        "uploadedBanner2" => "",
    ];

    displayDataTest($_POST);
    displayDataTest($data);
    displayDataTest($_FILES);

    try {
        echo "a";

        if( $_POST["customRadio"] === "setDefaultImage"){
            echo "b";
            $data["productImage"] = "";
            $data["uploadedBanner"] = "";
            $data["Banner"] = "assets/carousel/2.jpg";
        
        }else if($_POST["customRadio"] === "uploadSelectedBanner"){
            echo "c";
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "c1";
    
                $target_dir = "uploads/banners/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
                if (!file_exists( "$target_dir" )) {
                    echo "c2";
                    mkdir("$target_dir", 0777, true);
                }
    
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "c3";
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    $data["productImage"] = "";
                    $data["uploadedBanner"] = $target_file;
                    $data["Banner"] = $target_file;
    
                }
            }
    
        }else if($_POST["customRadio"] === "setSelectedProductBanner"){
            echo "d";
            $data["Banner"] = $_POST["productImage"];
            $data["uploadedBanner"] = "";
        }
    
        if( $_POST["customRadio2"] === "setDefaultImage2"){
            echo "e";
            $data["uploadedBanner2"] = "";
            $data["Banner2"] = "assets/carousel/3.jpg";
        
        }else if($_POST["customRadio2"] === "uploadSelectedBanner2"){
            echo "f";
            
            $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
            if($check !== false) {
                echo "c4";
    
                $target_dir = "uploads/banners/";
                $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
                if (!file_exists( "$target_dir" )) {
                    echo "c5";
                    mkdir("$target_dir", 0777, true);
                }
    
                if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
                    echo "c6";
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload2"]["name"])). " has been uploaded.";
                    $data["uploadedBanner2"] = $target_file;
                    $data["Banner2"] = $target_file;
    
                }
            }
    
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
        throw $e->getMessage();
    }

    echo "1";
    $instance = new SiteSetting;
    $param = [
        "json_data" => json_encode($data),
        'created_at' => new \DateTime,
    ];
    echo "2";

    $result = $instance->save($param);
    echo "3";

    header("Location: site-settings.php");


    // displayDataTest($_POST);
    // echo "<hr>";
    // displayDataTest($_FILES);
    // echo "<hr>";
    // displayDataTest($data);

}