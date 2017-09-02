<?php 
if(isset($_POST['submit']))
{

$ch = curl_init();
$url = 'localhost/lalit/curl_receiver.php';

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
$response = curl_exec($ch);
$errmsg  = curl_error($ch) ; 
curl_close($ch);

	if($respone == true)
	{
		echo 'success';
	}else{
		echo $errmsg;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Curl Sender</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 30px">
 <div class="row">
  <div class="col-md-offset-4 col-md-4">
  <h2>Curl Sender</h2>
  <form action="" method="post" >
    <div class="form-group">
        <label for="Firstname">Firstname:</label>
        <input type="text" class="form-control" id="f_name" placeholder="Enter firstname" name="f_name">
    </div>    
    <div>
    	<label for="Surname">Surname:</label>
    	<input type="text" class="form-control" id="s_name" placeholder="Enter surname" name="s_name">
 	</div>
 	<div class="form-group">
        <label for="email">Email address:</label>
    	<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
    </div>
	<div class="form-group">
	    <label for="pwd">Password:</label>
	    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
	</div>  	
	<input type="submit" name="submit" value="submit">
  </form>
 </div>
</div>
</body>
</html>