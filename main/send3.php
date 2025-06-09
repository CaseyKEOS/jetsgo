<?php
require 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function sendemail($name, $email, $subject) {

    $promo = $_POST['promo'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactnumber'];
    $country = $_POST['country'];
    $noOfAdults = $_POST['noofadults'];
    $noOfChildren = $_POST['noofchilds'];
    $enquirySubject = $_POST['enquirysub'];
    $messageContent = $_POST['message'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contact@jetsgo.website';               // SMTP username
    $mail->Password   = 'C@sey352';                        // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption
    $mail->Port       = 587; 


    $mail->setFrom('contact@jetsgo.website', 'JetsGo Travel Services');
    $mail->addAddress($email, $name);

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
            <p>Thank you for booking at JetsGo Travel Services. <br>We have received your booking and we will respond as soon as possible.<br><br>
            <strong> ' . $promo . ', '. $country .' !</strong>
            </p>
            <br><br>
            Have the day you deserve,<br>
            <strong>JetsGo Travel Services.</strong>
            <br><br>
        </body>
        </html>
    ';
    $mail->Body = $msg;
    
    // Call the send() function to send the email
    $mail->send();
}

if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $msg = $_POST["message"];
    $place = $_POST['place'];
    $money = $_POST['price'];
    $country = $_POST['country'];
    
    $promo = $_POST['promo'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactnumber'];
    $country = $_POST['country'];
    $noOfAdults = $_POST['noofadults'];
    $noOfChildren = $_POST['noofchilds'];
    $enquirySubject = $_POST['enquirysub'];
    $messageContent = $_POST['message'];

    $query = "INSERT INTO tblinterbook (msgID,mName,mEmail,mSubject,mMessage,promoName,countryName,pPrice,datentime) VALUES (NULL,'$name','$email','$subject','$msg','$place','$country','$money',NULL)";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        sendemail($name,$email,$subject);
        echo '<script>
        window.alert("Message Inquiry Sent");
        window.location.href ="services.php";
        </script>';
    }else{
        echo '<script>
        window.alert("Message Failed to sent");
        window.location.href ="services.php";
        </script>';
    } 
}



?>