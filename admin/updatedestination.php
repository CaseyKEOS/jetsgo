<?php
session_start();
include 'connection.php';

$statusMsg = '';
$id = $_GET['imgID'];
// $place = $_POST['place'];
// $loc = $_POST['loc'];

$promo = $_POST['promo'];
$location = $_POST['location'];
$flighttype = $_POST['flighttype'];
$currency = $_POST['currency'];
$money = $_POST['price'];
$samefile = $_POST['imgName'];


$targetDir = "http://main.jetsgo.website/img/";
$fileName = basename($_FILES["img"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

//admph


// adminter
if(isset($_POST["update1"])&& ($money == null || $money > 0)){
    if(!empty($_FILES["img"]["name"])){
        $allowTypes = array('jpg','png','jpeg');
        if(in_array(($fileType), $allowTypes)){
            if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
                $insert = $conn->query("UPDATE tbldestination SET imgName='$fileName', promoName='$promo', locationName='$location',pcurrency='$currency',pPrice='$money',flightType='$flighttype' WHERE imgID='$id'");
                if($insert){
                  header('Location: adminter.php');
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
            }
        }
    }else{
        $insert = $conn->query("UPDATE tbldestination SET imgName='$samefile', promoName='$promo', locationName='$location',pcurrency='$currency',pPrice='$money',flightType='$flighttype' WHERE imgID='$id'");
                if($insert){
                  header('Location: adminter.php');
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}


?>