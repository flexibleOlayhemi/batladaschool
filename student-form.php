<?php 
include "post.php"

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Student Form</title>
 	<?php include "cdn.php" ?>
 	<style>
 		label {font-weight: bold;}
 	</style>
 </head>
 <body>
 	<div class="container">
 		<div class="row justify-content-center">
 			<div class="col-8" style="color: white;">
 				<h3>Register New Student</h3>
		 		<form action="" method="post" enctype="multipart/form-data">
		 			<div class="form-group py-2">
		 				<label for="fname">First Name:</label>
		 				<input type="text" name="sfname" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="mname">Middle Name:</label>
		 				<input type="text" name="smname" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="lname">Last Name:</label>
		 				<input type="text" name="slname" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="dob">Date of Birth:</label>
		 				<input type="date" name="sdob" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="pnum">Parent Contact:</label>
		 				<input type="text" name="spnum" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="address">Address:</label>
		 				<input type="text" name="saddress" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="email">Email:</label>
		 				<input type="text" name="semail" class="form-control">	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="sclass">Class:</label>
		 				<select name="sclass" class="form-control">
		 					<option value="" disabled>Select Class</option>
		 					<option value="" style="color: red;" disabled><b>Primary</b></option>
		 					<option value="p1">Primary one</option>
		 					<option value="p2">Primary two</option>
		 					<option value="p3">Primary two</option>
		 					<option value="p4">Primary two</option>
		 					<option value="p5">Primary two</option>
		 					<option value="" style="color: red;" disabled><b>Secondary</b></option>
		 					<option value="jss1">JSS1</option>
		 				</select>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="timage">Image:</label>
		 				<input type="file" name="simage" class="form-control">	
		 			</div>
		 		<button class="btn btn-primary mb-5" name="addstudent">ADD</button>	
		 		</form>
			</div>
 		</div>
 	<?php include "footer.php" ?>	
 	</div>
 
 
 </body>
 </html>