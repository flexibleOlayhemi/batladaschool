<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<?php include('cdn.php') ?>
	<style>
		label	{color: white;}

    
     #contact {
      background: lightblue;
	  color: white;
     border-radius: 0px;
     }
  </style>
	
	
</head>
<body>

  


  <?php  include('nav.php');  


    ?> 
<div class="container">
  
  <div class="row justify-content-center">
  	<div class="col-12 py-7" style="color: white;">
  		<h4 >Contact information</h4>
  		<p><b>Phone:</b> +234-8035675456</p>
  		<p><b>Mail:</b> <a class="btn btn-primary p-0" href="mailto:batladaschool@gmail.com">batladaschool@gmail.com</a></p>
  		<ul style="list-style-type: none;margin: 0;padding: 0;">
                        		<li style="display: inline;"><a href="https://www.facebook.com/batladaschool.lowcost"><i class="fa fa-facebook"></i></a></li>
								<li style="display: inline;"><a href="https://twitter.com/batladaschool"><i class="fa fa-twitter"></i></a></li>
								<li style="display: inline;"><a href="https://instagram.com/batladaschool"><i class="fa fa-instagram"></i></a></li>
								<li style="display: inline;"><a href="https://wa.me/+2348035675456"><i class="fa fa-whatsapp"></i></a></li>
		</ul>
  		<b> Adress:</b> Batagarawa Lowcost,P.O.Box 265, Katsina State.
  		
  		<h5 class="pt-4 text-success">For donation </h5>
  		<b>Bank name: </b> Jaiz Bank <br>
  		<b>Account Number: </b> 0005251506
  		<hr style="color:  white;background-color: white; ">
  	</div>

  </div>
  
  <div class="row justify-content-center">
  	<div class="col-12 py-7">
  		<?php if (!empty($_GET['message'])){
	  	echo "<div class='alert alert-success'>". $_GET['message']."</div>";
	  } ?>
  	
  		<h3 style="color: white;" class="py-4">Contact Us</h3>
			<form action="mailsender.php" method="POST">
					<div class="form-group pb-2">
			            <label for="Name"> Name:</label> 
			            <input type="text" class="form-control" name="name" placeholder ="Name" required="">
			            
			            
			        </div>

			        <div class="form-group pb-2">
			            <label for="email"> Email:</label>
			            <input type="email" class="form-control" name="email" placeholder="mail@mail.com" required="">
			            
			        </div>
			        <div class="form-group">
			            <label for="message"> Message:</label>
			            <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Your message"></textarea>
			            <button style="margin-bottom: 2px; margin-top: 1px;" name="sendMail" type="submit" class="btn btn-primary mt-3"> Send message</button>
			            
			        </div>
			        
			        
			    	
			    
			    </form>

			    <div class="row text-center">
					  <div class="col-12">
					    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.01411765276!2d7.596988213461766!3d12.906813619791997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x11b03b7fdf237c29%3A0x5031b8cc9394f81!2sBatlada%20Islamic%20and%20Community%20Model%20School!5e0!3m2!1sen!2sng!4v1590487691214!5m2!1sen!2sng" width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					  </div>
				</div>
		</div>
	</div>
 
	


	<?php include('footer.php')?>


</div>
</body>
</html>