<?php

spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

date_default_timezone_set("Asia/Manila");



try {

    if ( isset( $_POST['add-product'] ) && $_POST['add-product'] ){

        // Try to upload the file
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            
            // Only save the product if the image upload was successful
            $param = [
                'name' => $_POST['product_name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'stock_qty' => $_POST['quantity'],
                'category_id' => $_POST['category_id'],
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime,
                'created_by' => 1,
            ];
        
            $product = new Product;
            $result = $product->save($param);

            $last_id = $product->getLastInsertedId();

            $target_dir = "uploads/products/$last_id/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if (!file_exists( "$target_dir" )) {
                mkdir("$target_dir", 0777, true);
            }

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                
                if($result){
                    header("Location: product-list.php");
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