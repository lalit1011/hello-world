<?php 

include('db_conn.php');
// $image_id = $_GET['im_id'];
$image_id = mysqli_real_escape_string($con, $_GET['im_id']);
  

$que = "SELECT user_login_tble.user_name, user_login_tble.email, review_tble.rating, review_tble.command, review_tble.date, image_tble.image_name FROM user_login_tble
    INNER JOIN review_tble ON user_login_tble.id = review_tble.user_id INNER JOIN image_tble ON review_tble.img_id = image_tble.id WHERE img_id = $image_id ORDER BY `date` DESC";

$obj = mysqli_query($con, $que);


$que0 = "SELECT * FROM  `image_tble` WHERE id ='$image_id'";
$obj0 = mysqli_query($con, $que0);
$data0=mysqli_fetch_assoc($obj0);
 
$que1 = "SELECT AVG(rating) AS `average` FROM  `review_tble` WHERE img_id ='$image_id'";
 $obj1 = mysqli_query($con, $que1);
 $data1=mysqli_fetch_array($obj1);
// print($data1['average']);

$que2 = "SELECT COUNT(*) AS `total` FROM  `review_tble` WHERE img_id ='$image_id'";
 $obj2 = mysqli_query($con, $que2);
 $data2=mysqli_fetch_array($obj2);
// print($data2['total']);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Product View</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var avr = $('#avr').html();
		// console.log(avr);
		if(avr>1 && avr<2){
			// alert(avr);	
			$('.star_img').attr("src","1.5.jpg");	
		}else if(avr>2 && avr<3){
			// alert('2-3 else');
			$('.star_img').attr("src","2.5.jpg");
		}else if(avr>3 && avr<4){
			// alert('3-4 else');
			$('.star_img').attr("src","3.5.jpg");

		}else if(avr>4 && avr<5){
			// alert('4-5 else');
			$('.star_img').attr("src","4.5.jpg");
		}else if(avr == 1){
			// alert('4-5 else');
			$('.star_img').attr("src","1.jpg");
		}else if(avr == 2){
			// alert('4-5 else');
			$('.star_img').attr("src","2.jpg");
		}else if(avr == 3){
			// alert('4-5 else');
			$('.star_img').attr("src","3.jpg");
		}else if(avr ==4){
			// alert('4-5 else');
			$('.star_img').attr("src","4.jpg");
		}else if(avr == 5){
			$('.star_img').attr("src","5.jpg");
			// alert('else');
		}else{
      $('.star_img').attr("src","0.jpg");
    }

		$('#log_in').click(function(){
			alert('Please Login On Jewellers');
		});
	
	});

</script>
</head>
<body style="background-color: #ccc">

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
<!--end of navbar -->

<div class="container " style="margin-top:50px; ">
	<div class="row well">
		<div class="col-md-4 ">
			<img src="uploads/<?php echo $data0['image_name']; ?>" width="220px" height="231px">
			 <?php
			 if($_SESSION['id']!="")
			 {
			 echo "<a href='review_command.php?id=".$data0['id']."' class='btn btn-primary'>Review</a>";  
			 }else
			 {?>
			 <a href="#" id="log_in" class="btn btn-primary" >Review</a>
			  <?php
			 }

			 ?>
		</div>
		<div class="col-md-6 text-center">
			<h1>Jewellery  Reviews</h1>
			<!-- <h3>Your Design Jewellery</h3><h2> You Design  it we make it!</h2> -->
			<center><img class="star_img" src="uploads/">&nbsp;&nbsp;(<span id="avr"><?php echo round($data1['average'],1); ?></span>)<a href="#" data-toggle='tooltip' data-placement='bottom' title="<?php echo round($data1['average'],1)." Out of 5"; ?>">&nbsp;&nbsp;Ratings </a> &nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">  <?php echo $data2['total']; ?>&nbsp;&nbsp;Reviews </a></center>
		</div>
	</div>
</div>

<div class="container" style="margin-top:50px">
      <?php 
    $n=1;
    	while($data = mysqli_fetch_assoc($obj))
    		{    
    		echo "<div class='row'><div class=' col-md-6 well'>";	
    		// print_r($data);		
          if($data['rating']==0)
          {
            echo "<img src='0.jpg'>";       
          }else if($data['rating']==1)
    			{
    			  echo "<img src='1.jpg'>";       
    			}else if($data['rating']==2)
    			{
    			  echo "<img src='2.jpg'>";
    			}else if($data['rating']==3)
    			{
    			  echo "<img src='3.jpg'>";
    			}else if($data['rating']==4)
    			{
    			  echo "<img src='4.jpg'>";
    			}else if($data['rating']==5)
    			{
    			  echo "<img src='5.jpg'>";
	  			}else{

	  			}
    	echo "<p>".$data['command']."</p>";
    	echo "<small>by&nbsp;&nbsp;".$data['user_name']."</small>";
    	echo "&nbspon&nbsp;".date($data['date']);
	   echo "</div></div>";
    		}	
    		?> 	    	    
  </div>
</div>
</body>