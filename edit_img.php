<?php 
include('db_conn.php');

$id = mysqli_real_escape_string($con, $_GET['id']);
$que = "SELECT * FROM `image_tble` WHERE id='$id' ";
$obj = mysqli_query($con, $que);
$data = mysqli_fetch_assoc($obj);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Image</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#submit').click(function(){
        var uploads = $('#uploaded_file').val();
        var check = true;
        if(uploads == "")
        {
         $('.err_uploads').html('Please Insert an Image');
         check = false; 
        }else{
          $('.err_uploads').html('');
        }
      return check;
      });      

      $('#btn').click(function(){
        window.location="<?php echo 'update_images.php' ?>";
      });

    });
  </script>
</head>
<body>

 <div class="container" style="margin:80px">
 	<div class="row">
 		<div class="col-md-offset-4 col-md-4">
 		 <div class="jumbotron" >
 				<form action="update.php" method="post" enctype="multipart/form-data">
 			  <input type="hidden" name="id" value="<?php echo $id; ?>">
        <img src="uploads/<?php echo $data['image_name']; ?>" width="100" height="100">       
        <div class="form-group">
 			    <label for="file">Upload Image:</label>
 			    <input type="file"   name="uploaded_file" id="uploaded_file">
          <span style="color:red;" class="err_uploads"></span>
 			  </div>
 			   			  
 			  <input type="submit" class="btn btn-primary" id="submit" value="Update">
        <button type="button" class="btn btn-default" id="btn">Back</button>
 			</form>
 		 </div>	
 		</div>
 	</div>
 </div>
</body>
</html>