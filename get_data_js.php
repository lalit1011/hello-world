<?php
// echo "Hello";
$con=mysql_connect("localhost", "root", "password");
mysql_select_db("tss5", $con);
$obj=mysql_query("SELECT * FROM product_tbl");
$arr=array();

while($data=mysql_fetch_assoc($obj))
{
	$arr[]=$data;
}

echo json_encode($arr);
?>
