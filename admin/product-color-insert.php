<?php
require_once  '../vendor/autoload.php';
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

date_default_timezone_set("Asia/Manila");

// print_r($_POST);
// exit();

try {

    if ( isset( $_POST['add-color'] ) && $_POST['add-color'] ){

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $product_id = $_POST['product_id'];
            
            // Only save the product if the image upload was successful
            $param = [
                'name' => $_POST['color'],
                'product_id' => $_POST['product_id'],
                'code' => $_POST['color_selected'],
                'stock_qty' => $_POST['stock_qty'],
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
                'created_by' => 1,
                'updated_by' => 1,
            ];
        
            $product = new ProductColor;
            $result = $product->save($param);

            $last_id = $product->getLastInsertedId();

            $target_dir = "uploads/products/$product_id/$last_id/";
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

                $result = $product->update($param, $last_id);

                
                if($result){
                    header("Location: product-color-list.php?product_id=$product_id");
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    }
    
} catch (\Exception $e) {
    echo $e->getMessage();
    //throw $th;
}