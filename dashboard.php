<?php 
  include("db_conn.php");
  if(!($_SESSION['is_user_logged_in']))
  {
    header("location:user_login.php");
  }else{
    $_SESSION['welcome_msg'] = "Welcome";
    unset($_SESSION['welcome_msg']);
  }
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
      <nav class="navbar navbar-inverse" style="">
        <div class="col-md-2 ">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="index.php" >JEWELLERs</a>
          </div>
        </div>
        <div class="col-md-10">
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li class="active"><a href="dashboard.php">Dashboard</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href='index.php'><span class='glyphicon glyphicon-user'></span> <?php echo $_SESSION['name']?></a></li>;
              <li><a href="logout1.php"  ><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
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
          <h3>This is dashboard</h3>   
      </div>
     <div class="col-md-offset-6 col-md-3">
     <h2>  <?php 
     if($_SESSION['wel_msg']!=""){

       echo $_SESSION['wel_msg'];
       unset($_SESSION['wel_msg']);
     }

        ?></h2>
     </div>
   </div>

 </div>
</body>
</html>
