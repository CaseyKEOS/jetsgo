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
        $mail->SMTPSecure = 'TLS';
        $mail->Port       = 587;

        $mail->setFrom('contact@jetsgo.website', 'JetsGo Travel Services');
        $mail->addAddress('contact@jetsgo.website', $name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $msg = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
                <strong>From: ' . $email . '</strong>
                
                <p>' . $message.'</p>
                <br>
                Have the day you deserve,<br>
                <strong>'. $name .'.</strong>
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

if (isset($_POST["send"])) {
    // Sanitize and validate inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert into database
    $query = "INSERT INTO tblcontact (msgID,mName,mEmail,mSubject,mMessage,datentime) VALUES (NULL,'$name','$email','$subject','$message', NULL)";
    
    try {
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            if(sendemail($name, $email, $subject, $message)){
                echo '<script>
                window.alert("Message Inquiry Sent");
                window.location.href ="contact.php";
                </script>';
            } else {
                echo '<script>
                window.alert("Failed to send email");
                window.location.href ="contact.php";
                </script>';
            }
        } else {
            echo '<script>
            window.alert("Failed to insert into database. ' . mysqli_error($conn) . '");
            window.location.href ="contact.php";
            </script>';
        } 
    } catch (Exception $e) {
        echo '<script>
        window.alert("Error: ' . $e->getMessage() . '");
        window.location.href ="contact.php";
        </script>';
    }
}
?>
