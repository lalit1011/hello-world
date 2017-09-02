<?php 
include("db_connection.php");

if(isset($_POST['checkbox'])){

	$multi_del=$_POST['checkbox'];

	foreach ($multi_del as $value){
		$q="DELETE FROM registration WHERE id=$value";
		mysqli_query($con, $q);
		header("location:view_all.php");
	}
	$_SESSION['msg']="Deleted Successfully";		
}
else{
		header("location:view_all.php");
}

 ?>