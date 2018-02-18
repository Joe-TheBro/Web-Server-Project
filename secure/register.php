<?php
require 'connect.php';
if (isset($_POST['username']) and isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "SELECT * FROM logintable WHERE username='$username' and password='$password'";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);
  if($count == 1){
    header("Location: https://www.betterthanbronze.ga/register.html");
  }else if($count == 0){
    $col1 = 'username';
    $col2 = 'password';
    $insert = "INSERT INTO logintable (`username`, `password`) VALUES ('$username', '$password')";
    mysqli_query($connection, $insert) or die(mysqli_error($connection));
    header("Location: https://www.betterthanbronze.ga");
  }else {
    echo "Something got really fucked up.";
  }
 };
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Problems</title>
  </head>
  <body>
    <canvas class='connecting-dots'></canvas>
    <script></script>
  </body>
</html>
