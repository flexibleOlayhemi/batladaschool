<?php
session_start(); 

require_once("./DB/db.php");
include "post.php";


  $db = new createDB();
  if(!isset($_SESSION['user'])){
  header("location:admin-login.php? m=You must login first");
}



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Students</title>
 	<?php 
       include "cdn.php";
 	 ?>

 	 <style>
 	 	label {color: white;}
 	 </style>
 </head>
 <body>
 	<div class="container">
 	<?php 

      include "nav.php" 

    ?>

 	
 	
 	<div class="table-responsive bg-white p-3 pb-10">
 		<h4 class="mb-4 text-warning pt-5">Student details</h4>
		  <table class="table pt-5">
		  	<thead >
		  		<tr>
		  			<th>Edit</th>
		  			<th>SN</th>
		  			<th id="h">ID</th>
		  			<th>First Name</th>
		  			<th>Middle Name</th>
		  			<th>Last Name</th>
		  			<th>Date of Birth</th>
		  			<th>Parent Phone</th>
		  			<th>Address</th>
		  			<th>Email</th>
		  			<th>Class</th>
		  			<th id="h">Class id</th>
		  			<th>Image</th>
		  		</tr>
		  	</thead>
		  	<tbody id="stbody">

	<?php 
	$num =0;
 	$result = $db->getStudent();
 	while ($row = mysqli_fetch_assoc($result)){?>
 		   
		    <tr>
		    	<td><button class="sbtnedit" data-id="<?php echo $row['id']?>">edit</button></td>
		    	<td><?php  echo $num += 1; ?> </td>
		    	<td id="h" data-id="<?php echo $row['id']; ?>"><?php echo $row['id'] ?></td>
		    	<td data-id="<?php echo $row['id']; ?>"><?php echo $row['fname'] ?></td>
		    	<td data-id="<?php echo $row['id']; ?>"><?php echo $row['mname'] ?></td>
		    	<td data-id="<?php echo $row['id']; ?>"><?php echo $row['lname'] ?></td>
		    	<td data-id="<?php echo $row['id']; ?>"><?php echo $row['DOB'] ?></td>
		    	<td data-id="<?php echo $row['id']; ?>"><?php echo $row['pnum'] ?></td>
		    	<td data-id="<?php echo $row['id']; ?>"><?php echo $row['address'] ?></td>
		    	<td data-id="<?php echo $row['id']; ?>"><?php echo $row['email'] ?></td>
		    	<td data-id="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></td>
		    	<td id="h" data-id="<?php echo $row['id']; ?>"><?php echo $row['class_id'] ?></td>
		    	<td ><img src="<?php echo $row['img'] ?>" height="50px" width="50px" alt="Image"></td>
		    </tr>



		 

   <?php

 	}
  ?> 
  </tbody>
</table>
		</div> 
		

	<div id="se">
		<form action="" method="post" >
		 			<input type="hidden" name="sid" value="">
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
		 				<label for="pnum">Parent Contact Number:</label>
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
		 				<select name="sclass" id="sclass" class="form-control">
		 					<option value="" disabled>Select Class</option>
		 					<option value="" style="color: red;" disabled><b>Primary</b></option>
		 					<option value="1">Primary one</option>
		 					<option value="2">Primary two</option>
		 					<option value="3">Primary three</option>
		 					<option value="4">Primary four</option>
		 					<option value="5">Primary five</option>
		 					<option value="" style="color: red;" disabled><b>Secondary</b></option>
		 					<option value="6">JSS1</option>
		 					<option value="7">JSS2</option>
		 					<option value="8">JSS3</option>
		 				</select>	
		 			</div>
		 			
		 			<button class="btn btn-warning m-2 mb-4" name="updatestudent">Update</button>
		 		  
		 		</form><hr style="border-color: white; ">

		 		<h3 style="color: white;">Upload Image</h3>
		 		<form action="" method="post" enctype="multipart/form-data">
		 			<input type="hidden" name="sid" value="">
		 			<div class="form-group py-2">
		 				<label for="usimage">Image:</label>
		 				<input type="file" name="usimage" class="form-control">	
		 			</div>
		 			<button class="btn btn-warning m-2" name="uploadsimage">Upload</button>
		 		</form>
		 	</div>


  </div>
  <div class="container"><?php include('footer.php')?></div>
 
 </body>
 </html>
