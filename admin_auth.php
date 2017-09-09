<?php 
// include('db_conn.php');
include('db_conn.php');
extract($_POST);
$email = mysqli_real_escape_string($con, $email);
$pwd = mysqli_real_escape_string($con, $pwd);

$q="SELECT * FROM `admin_tble` WHERE email = '$email'";
$obj = mysqli_query($con, $q);

if(mysqli_num_rows($obj)==1)
{
	$data = mysqli_fetch_assoc($obj);
	if($data['pwd'] == $pwd)
	{	
		$_SESSION['wel_msg']="Welcome";
		$_SESSION['id1'] = $data['id'];
		$_SESSION['AdminName'] = $data['admin_name'];
		$_SESSION['is_admin_logged_in'] = true;
		header("location:admin_dashboard.php");

	}else{
		$_SESSION['msg'] = "Password Incorrect!";
		header("location:admin_login.php");		
	}
}else{
	$_SESSION['msg'] = "Username and Password Incorrect!";
	header("location:admin_login.php");	
}

?>