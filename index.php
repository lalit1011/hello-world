<?php 
include('db_conn.php');
$que = "SELECT * FROM `image_tble`";
$obj = mysqli_query($con, $que);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Index Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
<body>
<nav class="navbar navbar-inverse">
  <div class="col-md-2 ">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">JEWELLERs</a>
    </div>
   </div><!--end of col2--> 
   <div class="col-md-10">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <?php 
      if($_SESSION['id']!="")
      {
        echo "<li class='active'><a href='index.php'>Home</a></li>";
        echo "<li class='active'><a href='dashboard.php'>Dashboard</a></li>";
      }else
      {?>
       <li class="active"><a href="index.php">Home</a></li>
       <li><a href="#">About Us</a></li>
       <li><a href="#">Contact Us</a></li> 
       <li><a href="#">Help</a></li>
       <?php
      }
       ?>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php 
      if($_SESSION['id']!="")
      {
      echo "<li><a href='index.php'><span class='glyphicon glyphicon-user'></span> ".$_SESSION['name']."</a></li>";
      echo  "<li><a href='logout1.php'><span class='glyphicon glyphicon-log-in'></span> logout</a></li>";
      
       }else
       { ?>
       <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
       <li><a href="user_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php 
       }
       ?> 
      </ul>
    </div>
   </div> 
</nav>
<!--end of navbar-->

  
<div class="container" style="height: 700px;">
  <div class="row">
    <div class="jumbotron text-center">
      <h1>Jewellery  Reviews</h1>
      <h3>Your Design Jewellery</h3><h2> You Design  it we make it!</h2> 
    </div>
  
    <?php 
    while($data = mysqli_fetch_assoc($obj))
    {    
      $que1 = "SELECT AVG(rating) AS `average` FROM  `review_tble` WHERE img_id =".$data['id'];
       $obj1 = mysqli_query($con, $que1);
       $data1=mysqli_fetch_array($obj1);
       $avr =  round($data1['average'],1);
    ?>
      <div class="col-sm-4" style="margin-top:20px; ">

        <p><a href="product_page.php?im_id=<?php echo $data['id'];?> "><img src="uploads/<?php echo $data['image_name']; ?>" width="250" height="220"></a></p><img class="star_img" src="uploads/">&nbsp;&nbsp;<span id="avr"><?php 
            if($avr>1 && $avr<2){
              echo "<img src='1.5.jpg'>";
            }else if($avr>2 && $avr<3){
              echo "<img src='2.5.jpg'>";
            }else if($avr>3 && $avr<4){
              echo "<img src='3.5.jpg'>";

            }else if($avr>4 && $avr<5){
              echo "<img src='4.5.jpg'>";
            }else if($avr == 1){
              echo "<img src='1.jpg'>";
            }else if($avr == 2){
              echo "<img src='2.jpg'>";
            }else if($avr == 3){
              echo "<img src='3.jpg'>";
            }else if($avr ==4){
              echo "<img src='4.jpg'>";
            }else if($avr ==5){
              echo "<img src='5.jpg'>";
            }else{
              echo "<img src='0.jpg'>";
            }
         ?></span>&nbsp;&nbsp;<span class="text-success"><?php echo $avr; ?>&nbsp;&nbsp;Ratings</span>      
      </div> 
     <?php
       }
     ?> 
 </div>
 </div>

</body>
</html>
