<?php 
include("db_conn.php");
// $id=$_GET['id'];
$id = mysqli_real_escape_string($con, $_GET['id']);
$que = "SELECT * FROM `image_tble` WHERE id='$id'";
$obj = mysqli_query($con, $que);
$data = mysqli_fetch_assoc($obj);

$user_id = $_SESSION['id'];

  $que1 = "SELECT * FROM  `review_tble` WHERE img_id = '$id' && user_id = '$user_id'";

 $obj1 = mysqli_query($con, $que1);

if(mysqli_num_rows($obj1)==1){
  $label = 'Update';
}else{
  $label = 'Submit';
}
$single_row = mysqli_fetch_assoc($obj1);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Index Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#close_btn').click(function(){
  			// alert('hlw');
  			window.location="index.php";
  		});

  		$('#rating').change(function(){
  			var value = $(this).val();
  			// alert(value);
  			if(value==1){
          $('.img_star').attr("src", "1.jpg");
        }
  			else if(value==2){
  				$('.img_star').attr("src", "2.jpg");
  			}else if(value==3){
  				$('.img_star').attr("src", "3.jpg");
  			}else if(value==4){
  				$('.img_star').attr("src", "4.jpg");
  			}else if(value==5){
  				$('.img_star').attr("src", "5.jpg");
  			}else{
  				$('.img_star').attr("src", "0.jpg");
  			}
  		});

      $('#submit').click(function(){
        var rating = $('#rating').val();
        var review = $('#review').val();
        var id = $('#img_id').val();
        var r_id = $('#r_id').val();
       
        $.post("save_review.php", {rating : rating, review : review, id : id, r_id : r_id}, function(res){
          console.log(res);
          if(res == '1'){

              rating = $('#rating').val('');
              rating = $('#review').val('');
              id = $('#img_id').val('');
             // alert(r_id);
             if(r_id!=""){
              alert('Your review updated successfully');
              location.reload(true);
             }else{
                alert('Your review has been successfully! Thankyou for your review');
              location.reload(true);
             }
          }
           if(res == '0'){

            alert('Some Error Occur');
          }
        });
        
      });
  	});
  </script>
</head>
<body>
<div class="container" style="margin-top:60px; ">
  <div class="row">
	  <div class="col-md-offset-4 col-md-4">
<!--       <form action="save_review.php" method="post" class="well"> -->

        <input type="hidden" name="id" id="img_id" value="<?php echo $id; ?>">
    		<input type="hidden" name="r_id" id="r_id" value="<?php echo $single_row['id']; ?>">
    		  <label>Product Image</label><br/>
    		   <img src="uploads/<?php echo $data['image_name']; ?>" width="100px" height="100px" />
    		 <div class="form-group ">
    		 	<label>Rating</label>
    		  	<select name="rating" id="rating" class="form-control">
      		 		<option value="" >No rating</option>
      		 		<option value="1" <?php if($single_row['rating']=='1'){echo "selected=='selected'";} ?>>Poor</option>
      		 		<option value="2" <?php if($single_row['rating']=='2'){echo "selected=='selected'";} ?>>Average</option>
      		 		<option value="3" <?php if($single_row['rating']=='3'){echo "selected=='selected'";} ?>>Good</option>
      		 		<option value="4" <?php if($single_row['rating']=='4'){echo "selected=='selected'";} ?>>Very Good</option>
      		 		<option value="5" <?php if($single_row['rating']=='5'){echo "selected=='selected'";} ?>>Excellent</option>
    		  	</select>
    		 </div>
    		 <div class="form-group">
       		 	<label>Review</label>
    	  	 	<textarea id="review" name="review" class="form-control" placeholder="Eneter your review" ><?php echo $single_row['command'] ?></textarea>
    		 </div>
    		 <div class="form-group">
    		 	<label>Stars</label>

      		 	<!-- <img src="0.jpg" class=img_star> -->
            <?php 
            if($single_row['rating']==1){
              echo "<img src='1.jpg' class=img_star>";
            }else if($single_row['rating']==2){
              echo "<img src='2.jpg' class=img_star>";
            }else if($single_row['rating']==3){
              echo "<img src='3.jpg' class=img_star>";
            }else if($single_row['rating']==4){
              echo "<img src='4.jpg' class=img_star>";
            }else if($single_row['rating']==5){
              echo "<img src='5.jpg' class=img_star>";
            }else{
              echo "<img src='0.jpg' class=img_star>";
            }


             ?>
    		 </div>
      		  <input type="submit" name="submit" value="<?php echo $label; ?>" id="submit" class="btn btn-primary">
      		  <button class="btn btn-default" type="button" id="close_btn">Back</button>
<!-- 	   </form>-->
	   <?php 
     if(isset($_SESSION['succ_msg']))
     {
        echo "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' >&times;</a><strong>Success!</strong>" .$_SESSION['succ_msg']."</div>";
        session_unset($_SESSION['succ_msg']);

     }
     if(isset($_SESSION['err_msg']))
     {
        echo "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' >&times;</a><strong>Success!</strong>" .$_SESSION['err_msg']."</div>";
        session_unset($_SESSION['err_msg']);
        
     }
      ?>
    </div>
  </div>
</div>

</body>
</html>