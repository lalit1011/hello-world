<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript">
     $(document).ready(function(){
        $('#submit').click(function(){
          // alert('hell');
          var name=$('#name').val();
          var pwd=$('#pwd').val();
          var re_pwd=$('#re-pwd').val();
          var address=$('#address').val();
          var gender1=$('#male').is(":checked");
          var gender2=$('#female').is(":checked");
          var city=$('#city').val();
          var image=$('#image').val();

          var check=true;
           if(image=="")
           {
            $('.err_image').html('Please upload file');
           }else{
              $('.err_image').html('');
           } 

          if(gender1==false && gender2==false)
          {
            $('.err_gender').html('Checked gender');
          }else{
            $('.err_gender').html('');

          }

          if(name=="")
          {
            $('.err_name').html('Username is required');
            check=false;
          }else{
            $('.err_name').html('');
          }
          if(pwd=="")
          {
            $('.err_pwd').html('Password is required');
            check=false;
          }else{
            $('.err_pwd').html('');
          }
          if(re_pwd=="")
          {
            $('.err_re-pwd').html('Confirm Password is required');
            check=false;
          }else{
            $('.err_re-pwd').html('');
            if(pwd!=re_pwd)
            {
              $('.err_re-pwd').html('Password and Confirm Password shoud be match');
              check=false;
            }else{
              $('.err_re-pwd').html('');
            }
          }
          if(address=="")
          {
            $('.err_address').html('Address is required');
            check=false;
          }else{
            $('.err_address').html('');
          }
          if(city=="Select")
          {
            $('.err_city').html('City is required');
            check=false;
          }else{
            $('.err_city').html('');
          }
          

          return check;
        });
     }); 

  </script>
  <script type="text/javascript">
    function ask(){
      if(confirm('Are u sure to want delete this file'))
      {
        return true;
      }else{
        return false;
      }
    }
  </script>
  <style type="text/css">
    .err{
      color:#ff0000;
      font-size:12px;
    }
  </style>
</head>
<body bgcolor="#ccc">
<div class="container-fluid">
  <div class="row">
      <nav class="navbar navbar-default" style="background-color: #fff; border:none">
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
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="view_all.php">View All</a></li>
              <li><a href="pagination.php">Pagination</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#myModal"  data-toggle="modal" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="login.php"  ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </div>  
      </nav>
  </div>
</div>  
<!--end of navnar-->



