<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    
    
    $mail = new PHPMailer(true);
    
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@jetsgo.fun';
    $mail->Password = 'C@sey352';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    
    $mail->setFrom('contact@jetsgo.fun');
    
    $mail->addAddress($_POST["email"]);
    
    $mail->isHTML(true);
    
    $mail->Subject = $_POST["subject"];
    $mail->Body = "Thank you for taking the time to email us". $_POST["name"] ."We appreciate your communication and will respond as soon as possible.";
    
    $mail->send();
    
     echo '<script>',
     'alert("Sent Successfully");',
     'window.location.replace("https://jetsgo.fun");',
     '</script>';
}
?>