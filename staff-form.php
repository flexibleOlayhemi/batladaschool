<?php 
session_start();
include "post.php";
if(!isset($_SESSION['user'])){
  header("location:admin-login.php? m=You must login first");
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Staff Form</title>
 	<?php include "cdn.php" ?>
 	<style>
 		label {font-weight: bold;}
 	</style>
 </head>
 <body>

 	<div class="container">
 		<div class="row justify-content-center">
 			<div class="col-8" style="color: white;">
 				<h3>Register New Staff</h3>
		 		<form action="" method="post" enctype="multipart/form-data">
		 			<div class="form-group py-2">
		 				<label for="fname">First Name:</label>
		 				<input type="text" name="tfname" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="mname">Middle Name:</label>
		 				<input type="text" name="tmname" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="lname">Last Name:</label>
		 				<input type="text" name="tlname" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="dob">Date of Birth:</label>
		 				<input type="date" name="tdob" pattern="\d{1,2}-\d{1,2}-\d{4}" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="pnum">Contact:</label>
		 				<input type="text" name="tnum" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="address">Address:</label>
		 				<input type="text" name="taddress" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="email">Email:</label>
		 				<input type="email" name="temail" class="form-control">	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="timage">Image:</label>
		 				<input type="file" name="timage" class="form-control">	
		 			</div>
		 			
		 		<button class="btn btn-primary mb-5" name="addstaff">ADD</button>	
		 		</form>
			</div>
 		</div>
 	<?php include "footer.php" ?>	
 	</div>
 
 
 </body>
 </html>