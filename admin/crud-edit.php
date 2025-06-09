<?php
session_start();
include 'connection.php';

$statusMsg = '';
$id = $_GET['imgID'];
// $place = $_POST['place'];
// $loc = $_POST['loc'];



$targetDir = "http://main.jetsgo.website/img/";
$fileName = basename($_FILES["img"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

//admph

if (isset($_POST["updDetails"]) && ($money == null || $money > 0)) {
    $promo = $_POST['promo'];
    $location = $_POST['location'];
    $flighttype = $_POST['flighttype'];
    $currency = $_POST['currency'];
    $money = $_POST['price'];
    $insert = $conn->query("UPDATE tbldestination SET promoName='$promo', locationName='$location',pcurrency='$currency',pPrice='$money',flightType='$flighttype' WHERE imgID='$id'");
    if ($insert) {
        header('Location: editDest.php?imgID='. $id);
    } else {
        $statusMsg = "Sorry, there was an error uploading your file.";
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

if (isset($_POST["updimgdest"]) && !empty($_FILES["img"]["name"])) {
        $allowTypes = array('jpg','png','jpeg');
        if(in_array(($fileType), $allowTypes)){
            if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
                $insert = $conn->query("UPDATE tbldestination SET imgName='$fileName' WHERE imgID='$id'");
                if($insert){
                  header('Location: editDest.php?imgID='. $id);
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
        }
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Update Itinerary

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upditinerary'])) {
    // Retrieve data from form
    $destID = $_POST['destID'];
    $naryID = $_POST['naryID'];
    $detPosition = $_POST['detPosition'];
    $destTitle = $_POST['destTitle'];
    $destDetails = $_POST['destDetails'];

    // Prepare update query
    $sql = "UPDATE tbldestdetails SET detPosition='$detPosition', destTitle='$destTitle', destDetails='$destDetails' WHERE destID='$destID' AND naryID='$naryID'";

    // Execute update query
    if (mysqli_query($conn, $sql)) {
        // Redirect to adminter.php after successful update
        header("Location: editDest.php?imgID=" . $destID);
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updinclusion'])) {
    // Retrieve data from form
    $destID = $_POST['destID'];
    $naryID = $_POST['naryID'];
    $destDetails = $_POST['destDetails'];

    // Prepare update query
    $sql = "UPDATE tbldestdetails SET detPosition='0', destTitle='inclusion', detailType='inclusion', destDetails='$destDetails' WHERE destID='$destID' AND naryID='$naryID'";

    // Execute update query
    if (mysqli_query($conn, $sql)) {
        // Redirect to adminter.php after successful update
        header("Location: editDest.php?imgID=" . $destID);
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updexclusion'])) {
    // Retrieve data from form
    $destID = $_POST['destID'];
    $naryID = $_POST['naryID'];
    $destDetails = $_POST['destDetails'];

    // Prepare update query
    $sql = "UPDATE tbldestdetails SET detPosition='0', destTitle='exclusion', detailType='exclusion', destDetails='$destDetails' WHERE destID='$destID' AND naryID='$naryID'";

    // Execute update query
    if (mysqli_query($conn, $sql)) {
        // Redirect to adminter.php after successful update
        header("Location: editDest.php?imgID=" . $destID);
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updtnc'])) {
    // Retrieve data from form
    $destID = $_POST['destID'];
    $naryID = $_POST['naryID'];
    $destTitle = $_POST['destTitle'];
    $destDetails = $_POST['destDetails'];

    // Prepare update query
    $sql = "UPDATE tbldestdetails SET detPosition='0', destTitle='$destTitle', detailType='tnc', destDetails='$destDetails' WHERE destID='$destID' AND naryID='$naryID'";

    // Execute update query
    if (mysqli_query($conn, $sql)) {
        // Redirect to adminter.php after successful update
        header("Location: editDest.php?imgID=" . $destID);
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}


?>
