<?php
require 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$msg = $_POST["message"];

function sendemail($name, $email, $subject, $msg) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@jetsgo.fun';
    $mail->Password = 'C@sey352';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('contact@jetsgo.fun', 'JetsGo Travel Services');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "Dear ". $name .", <br>". $msg ."<br><br>
    Thank you for trusting JetsGo Travel Services.";
    
    // Call the send() function to send the email
    $mail->send();
}

    if (isset($_POST["reply"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $msg = $_POST["message"];
        $replyer = $_POST["replyer"];

        $query = "INSERT INTO tblreply (msgID,mName,mEmail,mSubject,mMessage,datentime,replyerName) VALUES (NULL,'$name','$email','$subject','$msg',NULL,'$replyer')";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            sendemail($name,$email,$subject,$msg);
            echo '<script>
            window.alert("Message Inquiry Sent");
            window.location.href ="admcontactlist.php";
            </script>';
        }else{
            echo '<script>
            window.alert("Message Failed to sent");
            window.location.href ="admcontactlist.php";
            </script>';
        } 
    }

?>