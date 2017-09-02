<?php
include('db_connection.php');
$id=$_GET['id'];

$q="DELETE FROM registration WHERE id=$id";

mysqli_query($con, $q);
$_SESSION['msg']="Deleted Successfully";
header("location:view_all.php");



?>