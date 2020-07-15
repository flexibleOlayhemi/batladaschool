<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<?php include "cdn.php" ?>
	 <style>
    
     #gallery {
      background: lightblue;
	  color: white;
     border-radius: 0px;
     }
	 
  </style>
</head>
<body>
	<?php include "nav.php"; ?>
	<div class="container">
		<div class="row">
	 	 <div class="col-md-12">
			<center><h5>OUR GALLERY</h5></center>
			<div class="img">
				<a target="_blank" href="event/g1.jpg">
					<img src="event/g1.jpg" alt="Image" width="200" height="200">
				</a>
				<div class="desc">Batlada school</div>
			</div>

			<div class="img">
				<a target="_blank" href="event/g2.jpg">
					<img src="event/g2.jpg" alt="Image" width="200" height="200">
				</a>
				<div class="desc">Administrative Block</div>
			</div>

			<div class="img">
				<a target="_blank" href="event/g3.jpg">
					<img src="event/g3.jpg" alt="Image" width="200" height="200">
				</a>
				<div class="desc">Classroom</div>
			</div>

			<div class="img">
				<a target="_blank" href="event/g4.jpg">
					<img src="event/g4.jpg" alt="Image" width="200" height="200">
				</a>
				<div class="desc">Construction of new classroom</div>
		 	</div>
		 </div>
		</div>

			







		<?php include "footer.php"; ?>
	</div>

</body>
</html>