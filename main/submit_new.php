<?php
require 'connection.php';

if(isset($_POST['submit_password']) && $_POST['email'] && $_POST['password'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $select=mysqli_query($conn,"UPDATE tbluser SET upassword='$pass' WHERE uemail='$email'");
    header('Location: login.php');
}
?>
