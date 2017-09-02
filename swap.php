<?php 

swap("sapna sangeeta");

function swap($str)
{
	$arr = explode(" ",$str);
	$arr1 = array();

	$arr1[] = $arr[1];
	$arr1[] = $arr[0];

	echo $arr1[0].' '.$arr1[1];
}

 ?>