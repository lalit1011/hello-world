<?php 
include('db_conn.php');

header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

foreach ($obj as $value0) {

   $que = "UPDATE `image_tble` SET sort =".$obj->value." WHERE id = ".$obj->id;
   $result = mysqli_query($con, $que);
}
// echo $obj->id. "  " .$obj->value;
?>
