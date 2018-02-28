<?php
require 'connect.php';
if (isset($_POST['username'])){
  $username = $_POST['username'];
  $num = "0";
  $query = "SELECT * FROM logintable WHERE username='$username'";
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);
  if($count == 1){
    $delete = "DELETE FROM logintable WHERE username='$username';";
    mysqli_query($connection, $delete)  or die(mysqli_error($connection));
    echo "<p>Done </p>";
  }else if($count == 0){
    echo "<p>No such user</p>";
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
