<?php 
include('db_conn.php');
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
   <div class="col-md-2">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span> 
       </button>
       <a class="navbar-brand" href="index.php">JEWELLERs</a>
     </div>
    </div> 
    <div class="col-md-10"> 
     <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav">
         <li class="active"><a href="index.php">Home</a></li>
         <li><a href="#">About Us</a></li>
         <li><a href="#">Contact Us</a></li> 
         <li><a href="#">Help</a></li> 
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
         <li><a href="user_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
       </ul>
     </div>
   </div>
 </nav>
 <!--end of navbar-->

   
<div class="container" style="margin-top: 60px;">
  <div class="row">
 	<div class="col-md-offset-3 col-md-6">
 	  <div class="panel panel-group">
 		<div class="panel panel-primary">
 			<div class="panel-heading">
 			  <h2 class="text-center" style="margin: 0px;">LOGIN</h2>
 			</div>
		    <div class="panel-body">
				<form method="post" action="auth.php" enctype="multipart/form-data">
				<!--form-->
				  <div class="form-group">
				    <label for="email">Username:</label>
				    <input type="text" class="form-control" placeholder="Enter userId"  name="email" id="email">
				    <span class="err err_name"></span>
				  </div>
				  <div class="form-group">
				    <label for="pwd">Password:</label>
				    <input type="password" class="form-control" placeholder="Enter password" name="pwd" id="pwd">
				    <span class="err err_pwd"></span>
				  </div>
				  
				     <span style="color:red; font-size:14px;">
				    	<?php 
				    	if(isset($_SESSION['msg']))
				    	{
				    		echo "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$_SESSION['msg']."</div>";
				    		unset($_SESSION['msg']);
				    	}
		    	 ?>
           <input type="submit" name="submit" class="btn btn-primary" >
				  </div>    			   
				   
				</form>
			</div>
 		</div>
 	  </div>
 	</div>
  </div>
</div>

</body>
</html>