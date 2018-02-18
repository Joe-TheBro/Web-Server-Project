<?php
session_start();
require("connect.php");
if (isset($_POST['username']) and isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "SELECT * FROM logintable WHERE username='$username' and password='$password'";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);
  if($count == 1){
    $_SESSION['username'] = $username;
  }else if($count == 0){
    header('Location: https://www.betterthanbronze.ga/');
  }else {
    header('Location: https://www.betterthanbronze.ga/');
  }
 };
?>
