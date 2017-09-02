<?php 
// header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$con=mysqli_connect("localhost", "root", "root", "lalit");

$q="INSERT INTO json_tble (name, last_name, age) VALUES('".$obj->name."', '".$obj->last_name."', '".$obj->age."')";	

mysqli_query($con, $q);

echo json_encode($obj);
?>