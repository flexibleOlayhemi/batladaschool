<?php 
session_start();

require_once('post.php');
  require_once("./DB/db.php");

  $dbnews = new createDB();
  if(!isset($_SESSION['user'])){
  header(urldecode("location:admin-login.php ? m=You must login first"));
}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<?php include('cdn.php') ?>

  <style>
    
     #admin {
      background: blue;
     border-radius: 5px;
     }
  </style>
	
</head>
<body>
  <div class="container " style="background: white;">
    <?php 

      include "nav.php" 

    ?>
    <div class="row">
      <div class="col-12">
      <form action="" method="post">
        <p style="float: right;"> Welcome <span style="color: green;"><?php echo $_SESSION['user']."istrator"; ?></span>  <button class="btn btn-danger" name="alogout">Logout</button>
      </p></form>
    </div>
  </div>

    <div class="row p-5">
      <div class="col-6">
         
        <a href="student-form.php" target="blank"><button class="btn btn-primary mb-2"> ADD NEW STUDENT</button></a><br>
        <a href="students.php" target="blank"><button class="btn btn-success"> VIEW STUDENTS</button></a>

         <?php if (!empty($_GET['studmsg'])){
        echo "<div class='alert alert-success'>". $_GET['studmsg']. "</div>";
      } ?>     
      </div>
      <div class="col-6">
         
          <a href="staff-form.php" target="blank"><button class="btn btn-primary mb-2"> ADD NEW STAFF</button></a><br>
          <a href="staffs.php" target="blank"><button class="btn btn-success"> VIEW STAFFS</button></a>

          <?php if (!empty($_GET['staffmsg'])){
        echo "<div class='alert alert-success'>". $_GET['staffmsg']. "</div>";
      } ?>
      </div>
    </div>
    <hr>

<!--
    <div class="row p-5">
      <div class="col-12">
        <a href="addevent.php"><button class="btn-primary p-2 mb-2" name="uploadevent" disabled="true">Upload Event</button></a>
        
        
      </div>
      
    </div>
    <hr>
-->



		<div class="row justify-content-center p-5">
		  		<div class="col-12 ">
						<h4 class="text text-success">Update Quotes or News</h4>
						<?php 
									postForm("quote_body","Postquote");
									postForm("news_body","Postnews");
						 ?>
				</div>
		</div>
<hr>
  	<div class="row justify-content-center p-5">
  		<div class="col-12 p-2">
  			<h4>Available Quotes</h4>
        <?php if (!empty($_GET['qmsg'])){
        echo "<div class='alert alert-success'>". $_GET['qmsg']. "</div>";
      } ?>
        
      
  	<?php 
			

                      $result = $dbnews->getData('quotes');
                      if ($result){

                      while($row = mysqli_fetch_assoc($result)){ ?>
                       <blockquote><?php echo $row['body'] ?></blockquote>
                       <form action="post.php" method="post"><button class="btn btn-danger mb-3 mt-1" name="qbtn" value="<?php echo $row['id'] ?> " onclick="return confirm('Delete Quote? ');">Delete</button></form>
                      <?php }} 
  ?>
  </div>
  </div>

  <div class="row justify-content-center p-5">
      <div class="col-12 p-2">
        <h4>Available News</h4>
        <?php if (!empty($_GET['nmsg'])){
        echo "<div class='alert alert-success'>". $_GET['nmsg']. "</div>";
      } ?>
    <?php 
      

                      $result = $dbnews->getData('news');
                      if ($result){
                      while($row = mysqli_fetch_assoc($result)){ ?>
                       <p><?php echo $row['body']."  (".$row['tm'].")";  ?></p>
                       <form action="post.php" method="post"><button class="btn btn-danger" name="nbtn" value="<?php echo $row['id'] ?>" onclick="return confirm('Delete News? ');">Delete</button></form>
                      <?php }} 
  ?>
  </div>
  </div>

  


  </div>
   <?php include('footer.php')?>
</body>
</html>