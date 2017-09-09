<?php
include('db_conn.php');

$id = mysqli_real_escape_string($con, $_GET['id']);
$del_id = $_POST['check'];

if(isset($del_id)){
	foreach ($del_id as $value){

	$que="DELETE FROM `image_tble` WHERE id=$value";	
	$object0 = mysqli_query($con, $que);	

	$que1="DELETE FROM `review_tble` WHERE img_id=$value";	
	$object1 = mysqli_query($con, $que1);

	}

	if($object1==1 && $object0==1){

		$_SESSION['msg_succ']="Deleted Successfully";
		header("location:update_images.php");
		exit();
	}else{

		$_SESSION['err_msg']="Details not deleted because some error occur";
		header("location:update_images.php");
		exit();
	}
	
}

if(isset($id)){

	$que="DELETE FROM `image_tble` WHERE id=$id";
	$object0 = mysqli_query($con, $que);

	$que1="DELETE FROM `review_tble` WHERE img_id=$id";
	$object1 = mysqli_query($con, $que1);

	if($object1==1 && $object0==1){

		$_SESSION['msg_succ']="Deleted Successfully";
		header("location:update_images.php");
		exit();
	}else{

		$_SESSION['err_msg']="Detail not deleted because some error occur";
		header("location:update_images.php");
		exit();
	}
}
?>