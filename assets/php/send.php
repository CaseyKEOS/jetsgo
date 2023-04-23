<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/src/Exception.php';
require 'assets/src/PHPMailer.php';
require 'assets/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'caseykeos352@gmail.com';
    $mail->Password = 'ddfwxadklfwqruay';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('caseykeos352@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["name"];
    $mail->Body = $_POST["message"];

    $mail->send();

    echo
    "
    <script>
    alert('Sent Successfully');
    document.location.href = index.php;
    </script>
    ";
}
?>