<?php 
include("db_connection.php");
 	if(isset($_POST['num']))
 	{	
 		$a=$_POST['num'];
 		$a=$a-1;
 		$b=$a*100;

 		$q="SELECT * FROM `gda3f_states_cities` LIMIT  $b, 100";
 	}else{
		$q="SELECT * FROM `gda3f_states_cities` LIMIT 100";
 	}
 	$obj=mysqli_query($con, $q);
 	while($data = mysqli_fetch_assoc($obj)){
 		 $arr[] = $data;
 	}
 	echo json_encode($arr);
 ?>
 