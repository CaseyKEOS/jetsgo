<?php
require 'connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function sendemail($name, $email, $subject, $promo, $country) {
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
                <p>Thank you for leaving us a message at JetsGo Travel Services. <br>We have received your message and we will respond as soon as possible.<br><br>
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
    $subject = $_POST['enquirysub'];
    $messageContent = $_POST['message'];
    $promo = $_POST['promo'];
    $contactNumber = $_POST['contactnumber'];
    $country = $_POST['country'];
    $noOfAdults = $_POST['noofadults'];
    $noOfChildren = $_POST['noofchilds'];

    // Insert into database
    $query = "INSERT INTO tblenquiry (eID,cName,cEmail,cEnqSub,cEnqMessage,promoName,country,cNumber,numAdults,numChilds,datentime) VALUES (NULL,'$name','$email','$subject','$messageContent','$promo','$country','$contactNumber','$noOfAdults','$noOfChildren',NULL)";
    
    try {
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            if(sendemail($name, $email, $subject, $promo, $country)){
                echo '<script>
                window.alert("Message Inquiry Sent");
                window.location.href ="services.php";
                </script>';
            } else {
                echo '<script>
                window.alert("Failed to send email");
                window.location.href ="services.php";
                </script>';
            }
        } else {
            echo '<script>
            window.alert("Failed to insert into database. ' . mysqli_error($conn) . '");
            window.location.href ="services.php";
            </script>';
        } 
    } catch (Exception $e) {
        echo '<script>
        window.alert("Error: ' . $e->getMessage() . '");
        window.location.href ="services.php";
        </script>';
    }
}
?>
