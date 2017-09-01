<?php 
$fileName = $_SERVER['PHP_SELF'];
// include('db_connection.php');
include('navbar_layout.php');
		
if(!$_SESSION['name']){
	if(isset($_COOKIE['c_name'])){
     		echo 	$_SESSION['name'] = $_COOKIE['c_name'];
	    	header("Location:dashboard.php");
		}
}
?>

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
				    <label for="name">Username</label>
				    <input type="text" class="form-control"   placeholder="Enter username" name="name" id="name1">
				    <!-- <span class="err error_name"></span> -->
				  </div>
				  <div class="form-group">
				    <label for="pwd">Password</label>
				    <input type="password" class="form-control" placeholder="Enter password"  name="pwd" id="pwd1">
				    <span class="err err_pwd"></span>
				  </div>
				  <div class="checkbox">
				     <label><input type="checkbox" name="autologin" value="1"> Remember me</label>
				     <span style="color:red; font-size:14px;">
				    	<?php 
				    	if(isset($_SESSION['msg'])){

				    		echo "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>&nbsp;&nbsp;".$_SESSION['msg']."</div>";
				    		unset($_SESSION['msg']);
				    	}
				      	 ?>
				    </span>
				  </div>    			   
				   <input type="submit" name="submit" class="btn btn-primary" >
				</form>
			</div>
 		</div>
 	  </div>
 	</div>
  </div>
</div>
<?php 
include("modal_container.php");
 	if(isset($_COOKIE['c_name']) && isset($_COOKIE['c_pwd'])){
 		$email = $_COOKIE['c_name'];
 		$pwd = $_COOKIE['c_pwd'];
 		echo "<script> 
 		document.getElementById('name1').value='$email';
 		document.getElementById('pwd1').value='$pwd';

 		</script>";
 		header("location:dashboard.php");
 	           // exit();
 	}

 ?>
</body>
</html>