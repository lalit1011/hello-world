<?php 
// session_start();
$fileName = $_SERVER['PHP_SELF'];
include('db_conn.php');
if(!$_SESSION['is_admin_logged_in'])
{
header("location:admin_login.php");
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Image</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#submit').click(function(){
        var uploads = $('#uploaded_file').val();
        var check = true;
        if(uploads == "")
        {
         $('.err_uploads').html('Please Insert an Image');
         check = false; 
        }else{
          $('.err_uploads').html('');
        }
      return check;
      });      
    });
  </script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li  <?php if($fileName=='/lalit/lalit/add_images.php'){echo "class='active'";} ?>><a href="add_images.php">Add Images</a></li>
        <li><a href="update_images.php">Update Images</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin_dashboard.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['AdminName']; ?></a></li>
        <li><a href="admin_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
       
      </ul>
    </div>
  </div>
</nav>

 <div class="container" style="margin:80px">
 	<div class="row">
 		<div class="col-md-offset-4 col-md-4">
 		 <div class="jumbotron" >
 		 <?php 

       if($_SESSION['msg']!="")
        {

        echo "<div class='alert alert-danger alert-dismissable'>
     <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Danger!</strong>&nbsp;&nbsp;".$_SESSION['msg']."</div>";

      unset($_SESSION['msg']);
         }

 		 if($_SESSION['msg_succ']!="")
 		 {
 		 	echo "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Success!</strong>&nbsp;&nbsp;".$_SESSION['msg_succ']."</div>";
 		 
 		 	unset($_SESSION['msg_succ']);
 		 }
 		  ?>
 			<form action="add_img_save.php" method="post" enctype="multipart/form-data">
 			  <div class="form-group">
 			    <label for="file">Upload Image:</label>
 			    <input type="file" name="uploaded_file" id="uploaded_file">
          <span style="color:red;" class="err_uploads"></span>
 			  </div>
 			   			  
 			  <input type="submit" class="btn btn-primary" id="submit" value="Submit">
 			</form>
 		 </div>	
 		</div>
 	</div>
 </div>
</body>
</html>