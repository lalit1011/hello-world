<?php 

include("db_connection.php");
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

  <script type="text/javascript">
     $(document).ready(function(){
       
      $('#name').keyup(function(){

        var userName = $('#name').val();
        $.post('username_exist.php', {name : userName}, function(res){
          if(res==1){
            document.getElementById('submit').disabled=true;
            document.getElementById('user_exist').innerHTML='Your provided Username has already been used. Please use another Username';
          }
          if(res==0){
            document.getElementById('submit').disabled=false;
            document.getElementById('user_exist').innerHTML='';
          }
        }); 
      });
   
/* ---------Validation start ----------*/
      
        $('#submit').click(function(){

          var name=$('#name').val();     
          var pwd=$('#pwd').val();
          var re_pwd=$('#re-pwd').val();
          var address=$('#address').val();
          var gender1=$('#male').is(":checked");
          var gender2=$('#female').is(":checked");
          var city=$('#city').val();
          var image=$('#image').val();
          var check = true;

           if(image==""){    
            $('.err_image').html('Please upload file');
            check = false;
           }else{
              $('.err_image').html('');
           } 

          if(gender1==false && gender2==false){
            $('.err_gender').html('Check gender');
            check = false;
          }else{
            $('.err_gender').html('');
          }

          if(name==""){
            // alret(name);
            $('.err_name').html('Username is required');
            check=false;
          }else{
            $('.err_name').html('');
           
          }       
         
          if(pwd==""){
            $('.err_pwd').html('Password is required');
            check=false;
          }else{
            $('.err_pwd').html('');
         
          }
          if(re_pwd==""){
            $('.err_re-pwd').html('Confirm Password is required');
            check=false;
          }else{
            $('.err_re-pwd').html('');
            if(pwd!=re_pwd){
              $('.err_re-pwd').html('Password and Confirm Password should match');
              check=false;
            }else{
              $('.err_re-pwd').html('');
            }
          }

          if(address==""){
            $('.err_address').html('Address is required');
            check=false;
          }else{
            $('.err_address').html('');
          }

          if(city=="Select"){
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
      if(confirm('Are you sure you want to delete this detail?'))
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
              <!-- <li class="active"><a href="index.php">Home</a></li> -->
              <?php 
              if($_SESSION['name']!=""){
                ?>
                <li <?php if($fileName=='/lalit/dashboard.php'){echo "class='active'"; } ?>><a href='dashboard.php'>Dashboard</a></li>
              <?php
              }

               ?>
               <li  <?php if($fileName=="/lalit/index.php"){echo "class='active'"; } ?>><a href="index.php" >Home</a></li>
              <?php
              if($_SESSION['name']==""){
              ?>
                <li   <?php if($fileName=="/lalit/view_all.php"){echo "class='active'"; } ?>><a href="view_all.php">View All</a></li>
              <?php  
              }
              ?>              
              
              <li   <?php if($fileName=="/lalit/pagination.php"){echo "class='active'"; } ?>><a href="pagination.php">Pagination</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php 
              if($_SESSION['name']!=""){
                echo "<li ><a href='dashboard.php' ><span class='glyphicon glyphicon-user'></span>&nbsp;&nbsp;".$_SESSION['name']."</a></li>";
                  echo "<li><a href='logout.php'  ><span class='glyphicon glyphicon-log-in'></span>&nbsp;&nbsp;logout</a></li>";
              }else{
                ?>
                <li ><a href='#myModal'  data-toggle='modal' ><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
                <li <?php if($fileName=='/lalit/login.php'){echo "class='active'"; } ?>><a href='login.php'  ><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
                <?php
              }

               ?>
              
            
            </ul>
          </div>
        </div>  
      </nav>
  </div>
</div> 
<div class="container">
  <div class="row">
    <div class="col-md-offset-4 col-md-4">
        <h3 style="color:green;"><?php 
        if($_SESSION['succ_insert']!=""){

          echo  $_SESSION['succ_insert'];
          unset($_SESSION['succ_insert']);
        }

         ?> </h3>     
    </div>
  </div>
</div>

<!--end of navnar-->



