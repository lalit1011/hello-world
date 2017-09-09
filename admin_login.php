<?php 
// session_start();
include('db_conn.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container" style="margin:80px">
 	<div class="row">
 		<div class="col-md-offset-4 col-md-4">
 		 <div class="well" >
 		  <h2 class="text-center" style="margin:2px;">Admin Login</h2>	
 			<form action="admin_auth.php" method="post">
 			  <div class="form-group">
 			    <label for="email">Email address:</label>
 			    <input type="email" class="form-control" placeholder="Enter your email address " name="email" id="email">
 			  </div>
 			  <div class="form-group">
 			    <label for="pwd">Password:</label>
 			    <input type="password" class="form-control" placeholder="Enter your password" name="pwd" id="pwd">		   			 
 			  </div>
 			   			     

 			  <input type="submit" class="btn btn-primary" value="Submit">
 			</form>
 			  <span style="margin: 5px;">
 			   	<?php 
 			   if(isset($_SESSION['msg']))
 			    {
 			    echo "<div class='alert alert-danger alert-dismissable'>
 			 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$_SESSION['msg']."</div>";

 			    session_unset($_SESSION['msg']);
 			   	 }
 			   	 ?>	
 			  </span> 			
 		 </div>	
 		</div>
 	</div>
 </div>


</body>
</html>