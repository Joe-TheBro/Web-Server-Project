<?php
require 'login.php';
if($logged != 'True'){
  header('Location: https://www.betterthanbronze.ga');
};
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
  </head>
  <body>
 <br><a href="logout.php">Logout</a>
  </body>
</html>
