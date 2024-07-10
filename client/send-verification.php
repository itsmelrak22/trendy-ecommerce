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

    function sendVerificationCode($MAIL_TO, $SUBJECT = "Verification Code", $code){
        $mailTo = $MAIL_TO;
        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = "mail.smtp2go.com";
        $mail->SMTPAuth = true;
        $mail->Username = "trendydressshop.online";
        $mail->Password = "password";
        $mail->SMTPSecure = "tls";
        $mail->Port = "2525";
        $mail->From = "admin@trendydressshop.online";
        $mail->FromName = "TRENDY THREADS APPAREL";
        $mail->addAddress($mailTo, 'Customer');
        $mail->isHTML('true');
        $mail->Subject = $SUBJECT;
        $mail->Body =  "Your verification code is: $code";
        $mail->AltBody = "Your verification code is: $code";
    
        if(!$mail->send()){
            echo "Mailer Error :". $mail->ErrorInfo;
        } else {
            return 200;
        }
    }
    $email = $_POST['email'];
    $code = mt_rand(100000, 999999); // Generate a 6-digit random code
    $result = sendVerificationCode($email, 'Verification Code', "$code");

    if ($result == 200) {
        echo json_encode(['success' => true, 'verificationCode' => $code]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
