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


$targetDir = "http://main.jetsgo.website/img/";
$fileName = basename($_FILES["img"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

//admph

if(isset($_POST["update"]) && !empty($_FILES["img"]["name"] && ($money == null || $money > 0))){
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array(($fileType), $allowTypes)){
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
            $insert = $conn->query("UPDATE tbldestination SET imgName='$fileName' WHERE placeName='$place' && locName='$loc'");
            if($insert){
              header('Location: admph.php');
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
        }
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
if(isset($_POST["insert"]) && !empty($_FILES["img"]["name"] && ($money != null || $money <= 0))){
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array(($fileType), $allowTypes)){
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
            $insert = $conn->query("INSERT INTO tbldestination (imgName,promoName,locationName,pcurrency,pPrice,flightType) VALUES ('$fileName','$promo','$location','$currency','$money','$flighttype')");
            if($insert){
              header('Location: admph.php');
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
if(isset($_POST["delete"])){
    $insert = $conn->query("DELETE FROM tbldestination WHERE placeName='$place' && locName='$loc'");
    if($insert){
        header('Location: admph.php');
    }  
}else{
    $statusMsg = 'Error at deleting row.';
}
if(isset($_POST["upprice"]) && empty($_FILES["img"]["name"]) && ($money != null || $money <= 0)){
    $insert = $conn->query("UPDATE tbldestination SET pPrice='$money' WHERE placeName='$place' && locName='$loc'");
    if($insert){
        header('Location: admph.php');
    }  
}else{
    $statusMsg = 'Error at updating Price.';
}
echo $statusMsg;


// adminter
if(isset($_POST["update1"]) && !empty($_FILES["img"]["name"] && ($money == null || $money > 0))){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
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
    $statusMsg = 'Please select a file to upload.';
}
if(isset($_POST["insert1"]) && !empty($_FILES["img"]["name"] && ($money != null || $money <= 0))){
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
if(isset($_POST["delete1"]) && empty($_FILES["img"]["name"] && ($money == null || $money > 0))){
    $insert = $conn->query("DELETE FROM tbldestination WHERE promoName='$promo' && locationName='$location'");
    if($insert){
        header('Location: adminter.php');
    }  
}else{
    $statusMsg = 'Error at deleting row.';
}
if(isset($_POST["upprice1"]) && empty($_FILES["img"]["name"]) && ($money != null || $money <= 0)){
    $insert = $conn->query("UPDATE tbldestination SET pPrice='$money', pcurrency='$currency' WHERE promoName='$promo' && locationName='$location'");
    if($insert){
        header('Location: adminter.php');
    }  
}else{
    $statusMsg = 'Error at updating Price.';
}
echo $statusMsg;


//admpplaces
if(isset($_POST["update2"]) && !empty($_FILES["img"]["name"])){
    $allowTypes = array('jpg','png','jpeg');
    if(in_array(($fileType), $allowTypes)){
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
            $insert = $conn->query("UPDATE tblpplaces SET imgName='$fileName' WHERE placeName='$place' && locName='$loc'");
            if($insert){
              header('Location: admpplaces.php');
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
        }
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
if(isset($_POST["insert2"]) && !empty($_FILES["img"]["name"])){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array(($fileType), $allowTypes)){
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
            $insert = $conn->query("INSERT INTO tblpplaces (imgName,placeName,locName) VALUES ('$fileName','$place','$loc')");
            if($insert){
              header('Location: admpplaces.php');
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
        }
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
if(isset($_POST["delete2"]) && empty($_FILES["img"]["name"])){
    $insert = $conn->query("DELETE FROM tblpplaces WHERE placeName='$place' && locName='$loc'");
    if($insert){
        header('Location: admpplaces.php');
    }  
}else{
    $statusMsg = 'Error at deleting row.';
}
echo $statusMsg;
?>