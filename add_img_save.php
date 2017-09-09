<?php 
include('db_conn.php');

$que_max = " SELECT MAX(sort) AS mx_value FROM  `image_tble`";

$result = mysqli_query($con, $que_max);
$result = mysqli_fetch_assoc($result);

$fileName = $_FILES['uploaded_file']['name'];
$fileTmp = $_FILES['uploaded_file']['tmp_name'];
$fileExt = end(explode('.', $fileName));
$fileSize = $_FILES['uploaded_file']['size']; 
$new_name = time().rand(10000, 1000).".".$fileExt;

if($fileExt == 'jpg' || $fileExt == 'jpeg' ||$fileExt == 'png')
{
	$maxSize = 1024*1024*2;
	if($fileSize<=$maxSize){
		move_uploaded_file($fileTmp, "uploads/".$new_name);
	}else{
		$_SESSION['msg']="file is larger than 5 megabytes";
		header("location:add_images.php");
	}
}else{
	$_SESSION['msg'] ="your image was not gif,jpg.jpeg|png";
	header("location:add_images.php");
}
	
	
	 $q="INSERT INTO `image_tble` (image_name, sort) VALUES('$new_name', ".($result['mx_value'] + 1).")";	
	mysqli_query($con, $q);
	$_SESSION['msg_succ']="Image Inserted Successfully";
	header("location:add_images.php");

?> 
