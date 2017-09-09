<?php 
include("db_conn.php");
// print_r($_POST);
extract($_POST);
$user_id = mysqli_real_escape_string($con, $user_id);
$id = mysqli_real_escape_string($con, $id);
$rating = mysqli_real_escape_string($con, $rating);
$review = mysqli_real_escape_string($con, $review);
// die;
$user_id = $_SESSION['id'];
if(empty($r_id)){

	$que = "INSERT INTO `review_tble` (user_id, img_id, rating, command) VALUES('$user_id', '$id', '$rating', '$review') ";
	$status = mysqli_query($con, $que);
	
	if($status==1)
	{
		echo 1;
	}else{
		echo 0;
	}
}else{
	$que = "UPDATE `review_tble` SET user_id = '$user_id', img_id = '$id', rating = '$rating', command = '$review' WHERE id= '$r_id'";
	$status = mysqli_query($con, $que);
	if($status==1)
	{
		echo 1;
	}else{
		echo 0;
	}


}

?>