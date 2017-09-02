<?php 
$sub = "Lorem Ipsum copy in various charsets and languages languages for layouts.";

 preg_match('/Languages/i', $sub, $matches, PREG_OFFSET_CAPTURE);
// print_r($matches);
if(preg_match('/languages/i',  $sub, $matches))
{
	echo "Given string exist on subject string";
}else{
	echo "Not exist";
}


 ?>