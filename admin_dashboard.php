<?php 
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
  <title>Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <li <?php if($fileName=='/lalit/lalit/admin_dashboard.php'){echo "class='active'";} ?>><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="add_images.php">Add Images</a></li>
        <li><a href="update_images.php">Update Images</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin_dashboard.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['AdminName']; ?></a></li>
        <li><a href="admin_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
       
      </ul>
    </div>
  </div>
</nav>
<!--end of navbar-->
 <div class="container">
   <div class="row">
    <div class="col-md-4">
      <h3>This is Admin Dashboard</h3>
    </div>
    <div class="col-md-offset-5 col-md-3">
    <h2>
     <?php 
     if($_SESSION['wel_msg']!="")
     {
      echo $_SESSION['wel_msg'];
      unset($_SESSION['wel_msg']);
     }
       
      ?></h2> 
    </div>
     
   </div>
 </div>
</body>
</html>
