<?php 
include('db_conn.php');

extract($_POST);
$email = mysqli_real_escape_string($con, $email);
$pwd = mysqli_real_escape_string($con, $pwd);

$que="SELECT * FROM `user_login_tble` WHERE email='$email'";
$obj=mysqli_query($con, $que);

if(mysqli_num_rows($obj)==1){

  $data=mysqli_fetch_assoc($obj);
    if($data['pwd']==$pwd){
          $_SESSION['wel_msg'] = "Welcome";
          $_SESSION['name']=$data['user_name'];
          $_SESSION['id']=$data['id'];
          $_SESSION['is_user_logged_in']=true;
          header("location:dashboard.php");
     
    }else{

      $_SESSION['msg']="Password Invalid!";
      header("location:user_login.php");
    }
}else{

$_SESSION['msg']="Username and Password Invalid!";
header("location:user_login.php");
}

?>