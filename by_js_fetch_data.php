<?php 
include("db_conn.php");
$user_id = $_SESSION['id'];
$id = $_POST['id'];
$que1 = "SELECT * FROM  `review_tble` WHERE img_id = '$id' && user_id = '$user_id'";
 $obj1 = mysqli_query($con, $que1);
 $single_row = mysqli_fetch_assoc($obj1);


 ?>