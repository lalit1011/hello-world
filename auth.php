<?php 
include('db_connection.php');
// print_r($_POST);
// die;
extract($_POST);
$name = mysqli_real_escape_string($con, $name);
$pwd = mysqli_real_escape_string($con, $pwd);
$autologin = mysqli_real_escape_string($con, $autologin);

$que="SELECT * FROM registration WHERE name='$name'";


$obj=mysqli_query($con, $que);
if(mysqli_num_rows($obj)==1){
  $data=mysqli_fetch_array($obj);

    if($data['pwd']==$pwd){
         $login_ok = true;
            if(!empty($autologin)){
          $_SESSION['welcome_msg'] = "Welcome";
          $_SESSION['name']=$data['name'];
          setcookie('c_name', $data['name'], time()+86400);
          setcookie('c_pwd', $data['pwd'], time()+86400);
          header("location:dashboard.php");
           
        }else{
           $_SESSION['welcome_msg'] = "Welcome";
          $_SESSION['name']=$data['name'];
          $_SESSION['id']=$data['id'];
          // $_SESSION['is_user_logged_in']=true;
          header("location:dashboard.php");
           exit();
        }
    }else{

      $_SESSION['msg']="Password Invalid !";
      header("location:login.php");
       exit();
    }
// print_r($data);
}else{

$_SESSION['msg']="Username and Password Invalid !";
header("location:login.php");
  exit();
}
?>