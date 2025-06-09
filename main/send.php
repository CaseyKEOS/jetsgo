<?php
require 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function sendemail($name, $email, $subject, $message) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contact@jetsgo.website';
        $mail->Password   = 'C@sey352';
        $mail->SMTPSecure = 'STARTTLS';
        $mail->Port       = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('cokezenzero@gmail.com', 'JetsGo Travel Services');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $msg = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
                <p> Dear <strong> ' . $name . ' !</strong></p>
                <p>'. $message .'
                </p>
                <br><br>
                Have the day you deserve,<br>
                <strong>JetsGo Travel Services.</strong>
                <br><br>
            </body>
            </html>
        ';
        $mail->Body = $msg;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}


?>
