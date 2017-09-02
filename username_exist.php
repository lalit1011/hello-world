<?php 

include("db_connection.php");

if($_POST['name']!=""){

	$name = $_POST['name'];
	$que = "SELECT * FROM `registration` WHERE name = '$name'";

	$obj = mysqli_query($con, $que);
	 $data = mysqli_fetch_assoc($obj);
	 // print_r($data);
	if(mysqli_num_rows($obj)==1){
		echo 1;
	}else{
		echo 0;
	}
}

 ?>