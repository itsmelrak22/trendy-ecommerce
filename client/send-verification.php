<?php
session_start();

require("../models/PHPMailer/src/PHPMailer.php");
require("../models/PHPMailer/src/SMTP.php");
require("../send_email.php");
require_once  '../vendor/autoload.php';
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
});



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $code = mt_rand(100000, 999999); // Generate a 6-digit random code
    $result = sendVerificationCode($email, $email, 'Verification Code', "$code");

    if ($result == 200) {
        echo json_encode(['success' => true, 'verificationCode' => $code]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
