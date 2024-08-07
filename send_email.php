<?php
// require("PHPMailer/src/PHPMailer.php");
// require("PHPMailer/src/SMTP.php");


function sendCustomerEmail($MAIL_TO, $RECEIVER_NAME, $STATUS, $SUBJECT){

    $statusMessages = array(
        "Pending" => "We have successfully received your custom order! Our team is now in the process of reviewing and preparing it. We will get back to you immediately once we have an update. Thank you for choosing our store!",
        "Processing" => "We have confirmed your order! We're currently preparing your items. You'll receive an update when your order is ready to ship. Thank you for choosing our store!",
        // "TO_SHIP" => "Your order has been processed and is now ready to be shipped. We'll update you once your package is on its way. Thank you for shopping with us!",
        "Shipped" => "Good news! Your order is on its way. We hope you're as excited as we are!",
        "Delivered" => "Your package has been delivered! We hope you love your new clothes. Thank you for shopping with us and we look forward to serving you again.",
        "Cancelled" => "Your order has been cancelled as per your request. If you have any questions or need further assistance, feel free to contact us. We're here to help!
        <br> https://www.facebook.com/SlayAndWearItFashionable?mibextid=LQQJ4d <br>
                        Email: mailto:trendythreadsapparel30@gmail.com <br>
                        Phone: 0963-609-9067 or 0951-927-3835 <br>
                        "
    );

    $mailTo = $MAIL_TO;

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = "mail.smtp2go.com";
    $mail->SMTPAuth = true;

    $mail->Username = "trendydressshop.online";
    $mail->Password = "password";
    $mail->SMTPSecure = "tls";

    $mail->Port = "2525";
    $mail->From = "admin@trendydressshop.online";
    $mail->FromName = "TRENDY THREADS APPAREL";
    $mail->addAddress($mailTo, $RECEIVER_NAME );

    $mail->isHTML('true');
    $mail->Subject = $SUBJECT;
    $mail->Body = $statusMessages[$STATUS];
    $mail->AltBody = "Alt Body";

    if(!$mail->send()){
        return 500;
        // echo "Mailer Error :". $mail->ErrorInfo;
    }else{
        return 200;
        // echo "Message Sent";
    }
}

function sendCustomerEmailCustomOrder($MAIL_TO, $RECEIVER_NAME, $STATUS, $SUBJECT, $REMARKS, $TOTAL_PRICE){

    $statusMessages = array(
        "Confirmed" => "We have successfully received your custom order! Our team is now in the process of reviewing and preparing it. We will get back to you immediately once we have an update. Thank you for choosing our store!",
        "Processing" => "We have confirmed your order! We're currently preparing your items. You'll receive an update when your order is ready to ship. Thank you for choosing our store!",
        // "TO_SHIP" => "Your order has been processed and is now ready to be shipped. We'll update you once your package is on its way. Thank you for shopping with us!",
        "Shipped" => "Good news! Your order is on its way. We hope you're as excited as we are!",
        "Delivered" => "Your package has been delivered! We hope you love your new clothes. Thank you for shopping with us and we look forward to serving you again.",
        "Cancelled" => "Your order has been cancelled as per your request. If you have any questions or need further assistance, feel free to contact us. We're here to help!
        <br> https://www.facebook.com/SlayAndWearItFashionable?mibextid=LQQJ4d <br>
                        Email: mailto:trendythreadsapparel30@gmail.com <br>
                        Phone: 0963-609-9067 or 0951-927-3835 <br>
                        "
    );

    $statusMessageStatus = $statusMessages[$STATUS];
    $message = "
        <h2>Hi $RECEIVER_NAME,</h2>

        <div> $statusMessageStatus </div>
        <br> <hr>
        <h5>Remarks: </h5>
        <div>$REMARKS</div>
        <hr>
        <h4>TOTAL PRICE: </h4>
        <div>$TOTAL_PRICE</div>
    ";

    $mailTo = $MAIL_TO;

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = "mail.smtp2go.com";
    $mail->SMTPAuth = true;

    $mail->Username = "trendydressshop.online";
    $mail->Password = "password";
    $mail->SMTPSecure = "tls";

    $mail->Port = "2525";
    $mail->From = "admin@trendydressshop.online";
    $mail->FromName = "TRENDY THREADS APPAREL";
    $mail->addAddress($mailTo, $RECEIVER_NAME );

    $mail->isHTML('true');
    $mail->Subject = $SUBJECT;
    $mail->Body = $message;
    $mail->AltBody = "Alt Body";

    if(!$mail->send()){
        return 500;
        // echo "Mailer Error :". $mail->ErrorInfo;
    }else{
        return 200;
        // echo "Message Sent";
    }
}



?>