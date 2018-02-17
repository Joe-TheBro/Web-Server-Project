<?php
if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
}
else {
   header(location("http://www.betterthanbronze.ga"));
}
 ?>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Welcome</title>
   </head>
   <body>
     <p>HOLY SHIT IT WORKS WTF</p>
     <a href="logout.php">Logout</a>
   </body>
 </html>
