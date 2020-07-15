<?php require_once('post.php');
  require_once("./DB/db.php");

  $dbnews = new createDB();
  $dbquotes = new createDB("heroku_6457e24b7049eb6","quotes");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<?php include('cdn.php') ?>
   <style>
    
     #home {
      background:#191970;
      color: white;
     border-radius: 5px;
     }
  </style>
	
</head>
<body onscroll="disp();">


 <?php  include('nav.php');  ?> 
  
  <div class="container">



 
  
  
<div class="slidder" style="margin-top: 0px !important;">
   <div id="bg" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#bg" data-slide-to="0" class="active"></li>
      <li data-target="#bg" data-slide-to="1"></li>
      <li data-target="#bg" data-slide-to="2"></li>
      <li data-target="#bg" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="img/s1.jpg" height="300px" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Female</h5>
                <p>Sound education without discrimination</p>
              </div>
              
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="img/s2.jpg" height="300px" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Happy Learning</h5>
                <p>Conducive environment for adequate learning</p>
              </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="img/s3.jpg" height="300px" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Material</h5>
                <p>Up to date learning material for our students</p>
              </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="img/s4.jpg" height="300px" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h5 style="color: white;">Administrative Block</h5>
                <p style="color: white;">Our school Administrative Block</p>
              </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#bg" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#bg" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>


  <div class="row">
    <div class="col-12">
    <div class="card">
      <div class="card-header alert-success mb-5" >Updates</div>
       <div class="card-body">

            <div class="slidder">
               <div id="bg" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active ">
                    
                           <center><h5 class="text-success">Quotes of the day</h5></center>
                           <center><?php echo (date("D-M-Y")); ?></center>
                          
                          
                  </div>
                   <?php 
                      $result = $dbnews->getData('quotes');
                      if ($result){

                      while($row = mysqli_fetch_assoc($result)){ ?>
                        <div class="carousel-item ">
                          <center><blockquote> <?php echo $row['body'] ?></blockquote></center>
                        </div>
                       
                        <?php 
                      }
                    } 
                  ?>

                </div>
            </div>
          </div>
        </div>
           
               

     </div>           
    </div>
  </div>
          



            
    

  <div class="row" id="news">
  <div class="col-12">
    <div class="card">
    <div class="card-header alert-success">School Updates</div>
      <div class="card-body">
        <?php 
            $result = $dbnews->getData('news');
            if ($result){

            while($row = mysqli_fetch_assoc($result)){ ?>

                <p> <?php echo substr($row['body'],0,100)."<span style='color:green;'>  (".$row['tm'].")</span>";  ?></p>
                <a class="btn btn-primary" href="news.php?id=<?php echo $row['id'] ?>">Read more>></a><hr>
             
              <?php 
            }
          } 
        ?>


      
      </div>
    </div>
  </div>
</div>

  <div class="row">
  <div class="col-12">
    <div class="card">
    <div class="card-header alert-success">Science and Education News</div>
      <!-- 24-7 Press Release Newswire Landing Page Widget Code Starts Here --> <script type="text/javascript" src="https://news.24-7pressrelease.com/247pr-news-widget.js?categories=124,372,123,373,374,375,376,248,&amp;showRelease=1&amp;width=auto&amp;headlinebold=1&amp;headlinesonly=0&amp;headlinecolor=2d57a1&amp;briefcolor=666666&amp;textcolor=333333&amp;typeface=arial&amp;fontsize=11&amp;width=auto&amp;headlinesepstyle=dotted&amp;showimages=1&amp;numstories=5&amp;bgcolor=ffffff&amp;"></script> <!-- 24-7 Press Release Newswire Landing Page Widget Code Ends Here --> 
      
    </div>
  </div>
   <button onclick="topFunction()" id="upBtn" title="goto top">Top</button>
</div>

</div>


  
      <div class="container"><?php include('footer.php')?></div>

  </div>

  
</body>
</html>