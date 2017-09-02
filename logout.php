<?php 
session_start();
session_destroy();
	// print_r($_COOKIE);

if(isset($_COOKIE['c_name']) && isset($_COOKIE['c_pwd']))
{
  setcookie ('c_name', '', time() - 86400);
  setcookie ('c_pwd', '', time() - 86400);
}

header("location:login.php");
 ?>
