<?php 
include('db_conn.php');
// $id=$_POST['id'];
$id = mysqli_real_escape_string($con, $_POST['id']);
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
		header("location:update_images.php");
	}
}else{
	$_SESSION['msg'] ="your image was not gif,jpg.jpeg|png";
	header("location:update_images.php");
}

	
	 $q="UPDATE `image_tble` SET image_name ='$new_name' WHERE id=$id";	
	mysqli_query($con, $q);
	$_SESSION['msg_succ']="Image Updated Successfully";
	header("location:update_images.php");

?>
