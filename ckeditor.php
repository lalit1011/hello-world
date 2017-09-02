<?php 
include('db_connection.php');
 
 if(isset($_POST['btn']))
 {
 	echo $_POST['editor'];
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <title>Home Page</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="container">
	<form method="post" action="">
	  <textarea class="ckeditor" name="editor"></textarea>
	  <input type="submit" name="btn" value="Insert">
	</form>
</div>
</body>
</html>