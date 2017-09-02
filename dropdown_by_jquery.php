<?php 
$con = mysqli_connect('localhost', 'root', 'root', 'project_rating');

$que1="SELECT id, name FROM `countries`";
$obj1=mysqli_query($con, $que1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dropdown Task</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  		$('#country_id').change(function(){
  			var country_id = $(this).val();
  			console.log(country_id);
  			$.post('get_state.php', { country_id : country_id }, function(res){
  			    $('#state').html(res);
  			});
  		});

  		$('#state').change(function(){
  			var state_id = $(this).val();
  			$.post('get_state.php', { state_id : state_id }, function(res){
  				$('#city').html(res);
  			});
  		});
  	});
  </script>

</head>
<body>
<div class="container well well-lg" style="margin-top:10px;">
 <div class="row">
 	<div class="col-md-offset-4 col-md-6">
		<form>
		  <div class="form-group">
			<label>Select Country:</label>
				<select id="country_id" class="form-control">
					<option>Select</option>
				<?php 
					while($data1=mysqli_fetch_assoc($obj1))
					{
						?>
						<option value="<?php echo $data1['id']; ?>"><?php echo $data1['name']; ?></option>

				<?php	
				
					}
				 ?>	
					
				</select>
		  </div>
		  <div class="form-group">
			<label>Select State:</label>
				<select id="state" class="form-control">
					<option>Select</option>
				</select>
		  </div>
		  <div class="form-group">
		  	<label>Select City:</label>
		  		<select id="city" class="form-control">
		  			<option>Select</option>
		  		</select>
		  </div>

		</form>
    </div>
  </div>
</div>

</body>
</html>