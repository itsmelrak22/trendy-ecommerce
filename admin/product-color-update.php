<?php

    include_once("./includes/header.php"); 
    spl_autoload_register(function ($class) {
        include '../models/' . $class . '.php';
    });

if ( isset( $_POST['edit-product-color'] ) && $_POST['edit-product-color'] ){
    $id = $_POST['id'];
    $product_id = $_POST['product_id'];


    if(isset( $_FILES["fileToUpload"] )){

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {

            $param = [
                'name' => $_POST['color'],
                'product_id' => $product_id,
                'code' => $_POST['color_selected'],
                'stock_qty' => $_POST['stock_qty'],
                'updated_at' => new \DateTime,
                'updated_by' => 1,
            ];

            $products = new ProductColor;
            $result = $products->update($param, $id);

            $target_dir = "uploads/products/$product_id/$id/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if (!file_exists( "$target_dir" )) {
                mkdir("$target_dir", 0777, true);
            }

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                $param = [
                    'image' => $target_file,
                    'updated_at' => new \DateTime,
                    'updated_by' => 1,
                ];

                $result = $products->update($param, $id);
                if($result){
                    header("Location: product-color-list.php?product_id=$product_id");
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        $param = [
            'name' => $_POST['color'],
            'product_id' => $product_id,
            'code' => $_POST['color_selected'],
            'stock_qty' => $_POST['stock_qty'],
            'updated_at' => new \DateTime,
            'updated_by' => 1,
        ];

        $products = new ProductColor;
        $result = $products->update($param, $id);

        if($result){
            header("Location: product-color-list.php?product_id=$product_id");
        }else{
            echo "Server Error 500";

        }
    }
}
