<?php
session_start();
include 'connection.php';

$statusMsg = '';

// tbldestination
$promo = $_POST['promo'];
$location = $_POST['location'];
$flighttype = $_POST['flighttype'];
$currency = $_POST['currency'];
$money = $_POST['price'];

$targetDir = "http://main.jetsgo.website/img/";
$fileName = basename($_FILES["img"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["adddest"]) && !empty($_FILES["img"]["name"] && ($money != null || $money <= 0))){
    $allowTypes = array('jpg','png','jpeg');
    if(in_array(($fileType), $allowTypes)){
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
            $insert = $conn->query("INSERT INTO tbldestination (imgName,promoName,locationName,pcurrency,pPrice,flightType) VALUES ('$fileName','$promo','$location','$currency','$money','$flighttype')");
            if($insert){
              header('Location: adminter.php');
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, files are allowed to upload.';
        }
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

if(isset($_POST["additi"])){
            $id = $_GET['imgID'];

            $destID = $_POST['destID'];
            $naryID = $_POST['naryID'];
            $detPosition = $_POST['detPosition'];
            $destTitle = $_POST['destTitle'];
            $destDetails = $_POST['destDetails'];

            $insert = $conn->query("INSERT INTO tbldestdetails (destID,detPosition,destTitle,destDetails,detailType) VALUES ('$id','$detPosition','$destTitle','$destDetails','itinerary')");
            if($insert){
              header('Location: editDest.php?imgID='. $id);
            }else{
        $statusMsg = "Sorry, there was an error uploading your file.";
    }
}

if (isset($_POST["addinex"])) {
    $id = $_GET['imgID'];

    $destID = $_POST['destID'];
    $naryID = $_POST['naryID'];
    $destDetails = $_POST['destDetails'];
    $detailType = $_POST['detailType'];

    $insert = $conn->query("INSERT INTO tbldestdetails (destID,detPosition,destTitle,destDetails,detailType) VALUES ('$id','0','$detailType','$destDetails','$detailType')");
    if ($insert) {
        header('Location: editDest.php?imgID=' . $id);
    } else {
        $statusMsg = "Sorry, there was an error uploading your file.";
    }
}

if (isset($_POST["addtnc"])) {
    $id = $_GET['imgID'];

    $destID = $_POST['destID'];
    $naryID = $_POST['naryID'];
    $destDetails = $_POST['destDetails'];
    $destTitle = $_POST['destTitle'];

    $insert = $conn->query("INSERT INTO tbldestdetails (destID,detPosition,destTitle,destDetails,detailType) VALUES ('$id','0','$destTitle','$destDetails','tnc')");
    if ($insert) {
        header('Location: editDest.php?imgID=' . $id);
    } else {
        $statusMsg = "Sorry, there was an error uploading your file.";
    }
}
?>