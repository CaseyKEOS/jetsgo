<?php
session_start();
include 'connection.php';


if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password_login = $_POST['password'];

    $sql = "SELECT * FROM tbluser WHERE uemail = '$email' AND upassword = '$password_login' AND verstats = '1'";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {

        if ($row['uemail'] === $email && $row['upassword'] === $password_login && $row['verstats'] === '1') {
            if ($row['userType'] == 'Admin' && $row['verstats'] == 1) {
                $_SESSION['email'] = $row['uemail'];
                header('location:admin.php');
            }
            // if ($row['userType'] == 'Employee' && $row['verstats'] == 1) {
            //     $_SESSION['email'] = $row['uemail'];
            //     header('location:empindex.php');
            // }
            if ($row['verstats'] == 0) {
                header("Location:loginfailed.php");
            }
            if($row['userType'] == ""){
                header("Location:error.php");
            }
        }
    } else {
        header("Location:loginfailed.php");
    }

}

?>