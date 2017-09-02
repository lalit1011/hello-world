<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#btn').click(function(){
  			// alert();
  			$('#div1').css("background-color","#222");
  		});
  	});
  </script>
  <style type="text/css">
  	#div1{
  		background-color: red; height: 330px;
  	}
  </style>
</head>
<body>
<div class="container" style="margin:20px;">
 <div class="row">
  <div class="col-md-4" id="div1"></div>
  	<button type="button" class="btn btn-info" id="btn">click</button>
 	
 </div>
</div>
</body>
</html>

