<?php 
session_start();


  require_once("./DB/db.php");

  $db = new createDB();
  if(!isset($_SESSION['user'])){
  header("location:admin-login.php ? m=You must login first");
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Add Event</title>
 	<?php include "cdn.php"; ?>
 </head>
 <body>



 
 </body>
 </html>