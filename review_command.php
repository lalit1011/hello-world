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

if($single_row['rating']!=""){
 $db_rating = $single_row['rating']; 
}else{
  $db_rating = "null";
}
  

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Index Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <style type="text/css">
 .star{
   color: #ccc;
   cursor: pointer;
   transition: all 0.2s linear;
  }

  .star_checked{
   color:gold;
  }
 </style>
  <script type="text/javascript">
  	$(document).ready(function(){
  	  
      var get_rating;

      var star_id0 = <?php echo $db_rating; ?>

     if(star_id0!=" "){
        
        switch(star_id0){
          case 1: 
                get_rating = 1;            
               $("#star-1").addClass("star_checked");
               break;
          
          case 2:
                get_rating = 2;
               $("#star-1").addClass("star_checked");
               $("#star-2").addClass("star_checked");
               break;

          case 3:
               get_rating = 3;
               $("#star-1").addClass("star_checked");
               $("#star-2").addClass("star_checked");
               $("#star-3").addClass("star_checked");
               break;

          case 4:
              get_rating = 4;
               $("#star-1").addClass("star_checked");
               $("#star-2").addClass("star_checked");
               $("#star-3").addClass("star_checked");
               $("#star-4").addClass("star_checked");
               break;
          case 5:
               get_rating = 5;
               $("#star-1").addClass("star_checked");
               $("#star-2").addClass("star_checked");
               $("#star-3").addClass("star_checked");
               $("#star-4").addClass("star_checked");
               $("#star-5").addClass("star_checked");
               break;
          }

     }

     $(".star").on("mouseover",function(){
       $(".star").removeClass("star_checked");
        var star_id = $(this).attr('id');
       switch(star_id){
        case "star-1": 
             $("#star-1").addClass("star_checked");
             break;
        
        case "star-2":
             $("#star-1").addClass("star_checked");
             $("#star-2").addClass("star_checked");
             break;

        case "star-3":
             $("#star-1").addClass("star_checked");
             $("#star-2").addClass("star_checked");
             $("#star-3").addClass("star_checked");
             break;

        case "star-4":
             $("#star-1").addClass("star_checked");
             $("#star-2").addClass("star_checked");
             $("#star-3").addClass("star_checked");
             $("#star-4").addClass("star_checked");
             break;
        case "star-5":
             $("#star-1").addClass("star_checked");
             $("#star-2").addClass("star_checked");
             $("#star-3").addClass("star_checked");
             $("#star-4").addClass("star_checked");
             $("#star-5").addClass("star_checked");
             break;
        }

     }).on("mouseover", function(){
         get_rating = $(this).attr("id").split("-")[1];
    }); 

      $('#submit').click(function(){

          var rating = get_rating;
          var review = $('#review').val();
          var id = $('#img_id').val();
          var r_id = $('#r_id').val();
        $.post("save_review.php", {rating : rating, review : review, id : id, r_id : r_id}, function(res){
          if(res == 1){

              rating = $('#rating').val('');
              rating = $('#review').val('');
              id = $('#img_id').val('');
             // alert(r_id);
              if(r_id!=""){
                  alert('Your review updated successfully');
                  location.reload(true);
              }else{
                  alert('Your review has been successfully! Thank you for your review');
                  location.reload(true);
              }
          }
          
          if(res == 0){
            alert('Some Error Occur');
          }
        });        
      });


      $('#close_btn').click(function(){
        window.location="index.php";
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
    		 	<label>Rating Star</label>
    		   <div id="star_container">
            <i class="fa fa-star fa-2x star" id="star-1"></i>
            <i class="fa fa-star fa-2x star" id="star-2"></i>
            <i class="fa fa-star fa-2x star" id="star-3"></i>
            <i class="fa fa-star fa-2x star" id="star-4"></i>
            <i class="fa fa-star fa-2x star" id="star-5"></i>
           </div>
         </div>
    		 <div class="form-group">
       		 	<label>Review</label>
    	  	 	<textarea id="review" name="review" class="form-control" placeholder="Enter your review" ><?php echo $single_row['command'] ?></textarea>
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