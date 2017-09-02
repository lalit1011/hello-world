<?php 
$fileName = $_SERVER['PHP_SELF'];
  include("db_connection.php");
 if(!isset($_SESSION['name']))
 {
 header("Location: login.php");
 exit;
 }
  // print_r($_COOKIE);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
  <div class="row">
      <nav class="navbar navbar-default"  style="background-color: #fff; border:none">
        <div class="col-md-offset-1 col-md-2 ">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="index.php">WebSiteName</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li <?php if($fileName=="/lalit/dashboard.php"){echo "class='active'"; } ?>><a href="dashboard.php">Dashboard</a></li>
              <li  <?php if($fileName=="/lalit/index.php"){echo "class='active'"; } ?>><a href="index.php" >Home</a></li>
              <!-- <li   <?php //if($fileName=="/lalit/view_all.php"){echo "class='active'"; } ?>><a href="view_all.php">View All</a></li> -->
              <li   <?php if($fileName=="/lalit/pagination.php"){echo "class='active'"; } ?>><a href="pagination.php">Pagination</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li ><a href="dashboard.php" ><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['name'];?></a></li>
              <li><a href="logout.php"  ><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;logout</a></li>
            </ul>
          </div>
        </div>  
      </nav>
  </div>
</div>  
<!--end of navbar-->
 <div class="container">
   <div class="row">
     <div class="col-md-3">
          <h3>This is dashbord</h3>   
      </div>
     <div class="col-md-offset-6 col-md-3">
     <h3 class="text-success">  <?php 
     if($_SESSION['welcome_msg']!="")
     {
       echo $_SESSION['welcome_msg']."&nbsp;&nbsp;".$_SESSION['name'];
       unset($_SESSION['welcome_msg']);
     }
      ?></h3>
     </div>
   </div>

 </div>
</body>
</html>