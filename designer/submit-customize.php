<?php
session_start();
function displayDataTest($array){
    echo "<pre>";
    echo print_r($array);
    echo "</pre>";
}
require("../models/PHPMailer/src/PHPMailer.php");
require("../models/PHPMailer/src/SMTP.php");
require("../send_email.php");
require_once  '../vendor/autoload.php';
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});

// displayDataTest($_POST);
// displayDataTest($_SESSION);

$customize_order = new CustomizeOrder;


if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['customize-page-submit'])) {

    try {
        $customize_by = $_POST['customize_by'];
        $sizes = [];
        foreach($_POST as $key => $value) {
            if (strpos($key, '-checked') !== false && $value == 'on') {
                $size = str_replace('-checked', '', $key);
                $sizes[$size] = $_POST[$size];
            }
        }
        $objectDatas = json_decode($_POST['objectDatas']);
    
        $frontObjects = $objectDatas->front[0];
        $backObjects = $objectDatas->back[0];
        $timestamp = time();
    
        $data = array(
            'customize_by' => $customize_by,
            'sizes_ordered' => $sizes,
            'front_canvas_image' => '',
            'front_canvas_image_objects' => [],
            'front_canvas_text_objects' => [],
            'back_canvas_image' => '',
            'back_canvas_image_objects' => [],
            'back_canvas_text_objects' => [],
        );
    
        
        // OBJECT IMAGES
        foreach($frontObjects as $object) {
            if($object->type == 'image') {
                $imageUrl = $object->value;
                if (substr($imageUrl, 0, 11) === 'data:image/' && strpos($imageUrl, ';base64,') !== false){
                    $imageType = substr($imageUrl, 11, strpos($imageUrl, ';base64,') - 11);
                    $imageName = "frontObjectImage_" . $timestamp . "." . $imageType;
                    $imageData = base64_decode(substr($imageUrl, strpos($imageUrl, ';base64,') + 8));
                    file_put_contents("customize/" . $imageName, $imageData);
                } else {
                    $imageExtension = pathinfo($imageUrl, PATHINFO_EXTENSION);
                    $imageName = "frontObjectImage_" . $timestamp . "." . $imageExtension;
                    file_put_contents("customize/" . $imageName, file_get_contents($imageUrl));
                }
                $timestamp++;
                
                array_push( $data['front_canvas_image_objects'], $imageName );
            }else if ($object->type == 'text'){
                array_push( $data['front_canvas_text_objects'], $object );
                
            }
        }
        
        foreach($backObjects as $object) {
            if($object->type == 'image') {
                $imageUrl = $object->value;
                if (substr($imageUrl, 0, 11) === 'data:image/' && strpos($imageUrl, ';base64,') !== false){
                    $imageType = substr($imageUrl, 11, strpos($imageUrl, ';base64,') - 11);
                    $imageName = "backObjectImage_" . $timestamp . "." . $imageType;
                    $imageData = base64_decode(substr($imageUrl, strpos($imageUrl, ';base64,') + 8));
                    file_put_contents("customize/" . $imageName, $imageData);
                } else {
                    $imageExtension = pathinfo($imageUrl, PATHINFO_EXTENSION);
                    $imageName = "backObjectImage_" . $timestamp . "." . $imageExtension;
                    file_put_contents("customize/" . $imageName, file_get_contents($imageUrl));
                }
                $timestamp++;
        
                array_push( $data['back_canvas_image_objects'], $imageName );
            }else if ($object->type == 'text'){
                array_push( $data['back_canvas_text_objects'], $object );
                
            }
        }
        
        //CANVAS IMAGES
    
        $target_dir = "customize/";
        // Process the front image
        $frontImage = $_FILES["frontImage_"];
        $frontImage_target_file = $target_dir . basename($frontImage["name"]);
    
        if (move_uploaded_file($frontImage["tmp_name"], $frontImage_target_file)) {
            // echo "The file ". basename($frontImage["name"]). " has been uploaded to the 'customize' folder.";
            $data['front_canvas_image'] = basename($frontImage["name"]);
    
        } else {
            echo "Sorry, there was an error uploading your front image.";
            exit();
        }
    
        // Process the back image
        $backImage = $_FILES["backImage_"];
        $backImage_target_file = $target_dir . basename($backImage["name"]);
    
        if (move_uploaded_file($backImage["tmp_name"], $backImage_target_file)) {
            // echo "The file ". basename($backImage["name"]). " has been uploaded to the 'customize' folder.";
            $data['back_canvas_image'] = basename($backImage["name"]);
    
        } else {
            echo "Sorry, there was an error uploading your back image.";
            exit();
        }
    
        // Your data
        // displayDataTest($data);

        $param = [
            "customer_id" => $_SESSION['loggedInUser']['id'],
            "json_data" => json_encode($data),
            "created_at" =>  new \DateTime,
        ];

        $result = $customize_order->save($param);

            
        if($result){
            $email = $_SESSION['loggedInUser']['email'];
            // $email = "medinformationsystem44@gmail.com";
            $fullname = $_SESSION['loggedInUser']['first_name'] . ' ' . $_SESSION['loggedInUser']['last_name'];
            sendCustomerEmail($email, $fullname, "Pending", "Order: Pending confirmation.");
            echo json_encode("DONE!");
        }

    } catch (\Exception $e) {
        //throw $th;
        echo "ERROR : $e->getMessage()";
    }
 

}
