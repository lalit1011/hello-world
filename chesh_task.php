<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<table class="table table-bordered" cellpadding="10px" cellspacing="10px;">
		<?php 
		for($i=1;$i<=8;$i++)
		{
				echo "<tr>";
			for($j=1;$j<=8;$j++){
			
		
				if($i%2==0){
					echo "<th>".$i."</th>";			
				}else{
					echo "<th style='background:#000'>".$i."</th>";
				}	

				if($i==$i && $j ==8){
					echo "</tr>";

				}	

			}
		
	}

		 ?>
	</table>

</div>

</body>
</html>