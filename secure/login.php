<?php
session_start();
require('connect.php');
if (isset($_POST['username']) and isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "SELECT * FROM 'user' WHERE username='$username' and password='$password'";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);
  if($count == 1){
    $_SESSION['username'] = $username;
  }
  else{
    $fmsg = "Invalid Login"
  }  }



if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  header(location("https://www.betterthanbronze.ga/member.php"));
}
?>
