<?php
if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  $logged = 'True';
};
if($logged != 'True'){
  header('Location: https://www.betterthanbronze.ga');
};
?>
