<?php 
require_once("./DB/db.php");

  $dbnews = new createDB();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>News</title>
	<?php include('cdn.php') ?>

</head>
<body>
	
<?php include('nav.php');  ?>
<div class="container">
<div class="row">
  <div class="col-12">
    <div class="card">
    <div class="card-header alert-success">School Updates</div>
      <div class="card-body">
        <?php 
            $result = $dbnews->getData('news');
            if ($result){

            while($row = mysqli_fetch_assoc($result)){ ?>
            	<?php if($row['id'] == $_GET['id']) {?>
                <p> <?php echo $row['body']; ?></p>

             <?php } ?>
             
              <?php 
            }
          } 
        ?>

        <br><a href="index.php#news">go back</a>
      
      </div>
    </div>
  </div>
 </div>
 </div>

</body>
</html>