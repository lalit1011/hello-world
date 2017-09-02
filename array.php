<?php 

$arr=array("11"=>"a", "12"=>"b", "13"=>"c", "14"=>"d");

foreach($arr AS $key=>$val)
{
	$arr1[]=$key;
	$arr2[]=$val;
}
print_r($arr1);
echo "<br>";
print_r($arr2);

 ?>
