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
 	<title>Staffs</title>
 	<?php 
       include "cdn.php";
 	 ?>
 	 <style>
 	 	label {color: white;}
 	 	h3 {color: white;}
 	 </style>
 </head>
 <body>
 	<div class="container">
 	<?php 

      include "nav.php" 

    ?>

 	
 	
 	<div class="table-responsive bg-white p-3 pb-10">
 		<h4 class="mb-4 text-warning pt-5">Staff details</h4>
		  <table class="table p-5">
		  	<thead >
		  		<tr>
		  			<th>Edit</th>
		  			<th>SN</th>
		  			<th id="h">ID</th>
		  			<th>First Name</th>
		  			<th>Middle Name</th>
		  			<th>Last Name</th>
		  			<th>Date of Birth</th>
		  			<th>Phone</th>
		  			<th>Address</th>
		  			<th>Email</th>
		  			<th>Image</th>
		  		</tr>
		  	</thead>
		  	<tbody id="ttbody">

	<?php 
	$num =0;
 	$result = $db->getStaffs();
 	while ($row = mysqli_fetch_assoc($result)){?>
 		   
		    <tr>
		    	<td ><button class="tbtnedit" data-id="<?php echo $row['id']; ?>">edit</button></td>
		    	<td><?php  echo $num += 1; ?></td>
		    	<td id="h" data-id="<?php echo $row['id']; ?>"><?php echo $row['id'] ?></td>
		    	<td  data-id="<?php echo $row['id']; ?>"><?php echo $row['fname'] ?></td>
		    	<td  data-id="<?php echo $row['id']; ?>"><?php echo $row['mname'] ?></td>
		    	<td  data-id="<?php echo $row['id']; ?>"><?php echo $row['lname'] ?></td>
		    	<td  data-id="<?php echo $row['id']; ?>"><?php echo $row['DOB'] ?></td>
		    	<td  data-id="<?php echo $row['id']; ?>"><?php echo $row['num'] ?></td>
		    	<td  data-id="<?php echo $row['id']; ?>"><?php echo $row['address'] ?></td>
		    	<td  data-id="<?php echo $row['id']; ?>"><?php echo $row['email'] ?></td>
		    	<td><img src="<?php echo $row['img'] ?>" height="50px" width="50px" alt="Image"></td>
		    </tr>



		 

   <?php

 	}
  ?> 
  </tbody>
</table>
		</div> 
<div id="te">
		<form action="" method="post" >
		 			<input type="hidden" name="tid" value="">
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
		 				<input type="date" name="tdob" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="pnum">Contact Number:</label>
		 				<input type="text" name="num" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="address">Address:</label>
		 				<input type="text" name="taddress" class="form-control" required>	
		 			</div>
		 			<div class="form-group py-2">
		 				<label for="email">Email:</label>
		 				<input type="text" name="temail" class="form-control">	
		 			</div>
		 			
		 			
		 			<button class="btn btn-warning m-2 mb-4" name="updateteachers">Update</button>
		 		  
		 		</form><hr style="border-color: white; ">

		 		<h3 style="color: white;">Upload Image</h3>
		 		<form action="" method="post" enctype="multipart/form-data">
		 			<input type="hidden" name="tid" value="">
		 			<div class="form-group py-2">
		 				<label for="utimage">Image:</label>
		 				<input type="file" name="utimage" class="form-control">	
		 			</div>
		 			<button class="btn btn-warning m-2" name="uploadtimage">Upload</button>
		 		</form>
		 	</div>


  </div>
  <div class="container"><?php include('footer.php')?></div>
 
 </body>
 </html>
