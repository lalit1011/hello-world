<?php 

for ($i=1; $i<6 ; $i++) 
{ 
	for($j=1; $j<=5-$i; $j++)
	{
		echo "&nbsp;&nbsp";
	}
	for($k=1; $k<=$i; $k++)
	{
		echo "&nbsp;&nbsp;*";
	}
	echo '<br/>';
}

?>