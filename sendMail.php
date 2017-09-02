<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
if(isset($_POST['submit']))
{
	if($_FILES['uploads_file']['name']!="")
	{
	 $f_name = $_FILES['uploads_file']['name'];
	 $tmp_name = $_FILES['uploads_file']['tmp_name'];
	$ext = end(explode('.', $f_name));		
	$new_name = time().rand(100, 1000).'.'.$ext;
	move_uploaded_file($tmp_name, 'attachment/'.$new_name);
	}
	
	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $_POST['from'];                     // SMTP username
	$mail->Password = 'satishlalit';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom($_POST['to'], 'Lalit');
	$mail->addAddress($_POST['to'], $_POST['from']);     // Add a recipient
	// $mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('lkpatidar1011@gmail.com', 'Information');
	
	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	$mail->addAttachment( 'attachment/'.$new_name);         // Add attachments
	$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $_POST['sub'];
	$mail->Body    = $_POST['msg'];
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
		echo "<div class='alert alert-danger alert-dismissable' style='text-align:center;'>
		<a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Danger!</strong>&nbsp;&nbsp;Your message could not be sent. Mailer Error:- ".$mail->ErrorInfo."</div>";
	} else {
		echo "<div class='alert alert-success alert-dismissable' style='text-align:center;'>
		<a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Success!</strong>&nbsp;&nbsp;Your message has been sent</div>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Send Mail</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-offset-4 col-md-4 well" style="margin-top:20px; ">

		  <form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
			    <label>To</label>	
		    	<input type="text" class="form-control" placeholder="example@gmail.com"  name="to">
			</div>
			<div class="form-group">
			    <label>Subject</label>	
		    	<input type="text" class="form-control" placeholder="Your subject" name="sub">
			</div>
			<div class="form-group">
			    <label>Attachment</label>	
		    	<input type="file"  name="uploads_file">
			</div>
			<div class="form-group">
			    <label>From</label>	
		    	<input type="text" class="form-control" readonly="readonly" value="lkpatidar1011@gmail.com"  name="from">
			</div>
			
			<div class="form-group">
			    <label>Message</label>	
			    <textarea class="form-control" name="msg" placeholder="Your Message.." ></textarea>
			</div>			
			<input type="submit" name="submit" class="btn btn-primary"
			value="Submit">
		 </form>
		</div>
	</div>
</div>

</body>
</html>