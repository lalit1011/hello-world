<?php 
$con = mysqli_connect('localhost', 'root', 'root', 'project_rating');

if (isset($_POST['country_id'])) {
	$country_id = $_POST['country_id'];

	$q="SELECT * FROM `states` WHERE country_id='$country_id'";
	$obj=mysqli_query($con, $q);
	echo "<option>Select</option>";

	while($data=mysqli_fetch_assoc($obj)){
		echo "<option value='".$data['id']."'>".$data['name']."</option>";
	}

}else if(isset($_POST['state_id'])){

	$state_id = $_POST['state_id'];
	$q="SELECT DISTINCT(name) FROM `cities` WHERE state_id='$state_id'";
	$obj=mysqli_query($con, $q);
	echo "<option>Select</option>";

	while($data=mysqli_fetch_assoc($obj)){
		echo "<option value='".$data['name']."'>".$data['name']."</option>";
	}
}


 ?>

