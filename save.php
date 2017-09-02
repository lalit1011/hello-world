<?php 
include('db_connection.php');
extract($_POST);

$name = mysqli_real_escape_string($con, $name);
$pwd = mysqli_real_escape_string($con, $pwd);
$address = mysqli_real_escape_string($con, $address);
$city = mysqli_real_escape_string($con, $city);
$gender = mysqli_real_escape_string($con, $gender);

$fileName=$_FILES['uploaded_file']['name'];
$fileTmpLoc=$_FILES['uploaded_file']['tmp_name'];
$fileType=$_FILES['uploaded_file']['type'];
$fileSize=$_FILES['uploaded_file']['size'];
$fileErrorMsg=$_FILES['uploaded_file']['error'];
$kaboom=explode(".",$fileName);
$fileExt=$kaboom[1];
$new_name=time().rand(10000, 1000).".".$fileExt;
if(!$fileTmpLoc){
	echo "ERROR: Plz browse for a file ";
	exit();
}else if($fileSize>5242880){//size is 5 megabytes
    echo "ERROR: file is larger than 5 megabytes";
    unlink($fileTmpLoc);
    exit();
}else if(!preg_match("/\.(gif|jpg|png)$/i",$new_name)){
	echo "ERROR: your image was not gif,jpg.jpeg";
	unlink($fileTmpLoc);
	exit();
}else if($fileErrorMsg==1){
	echo "ERROR: an error occured while processing try again";
	exit();

}

$moveResult=move_uploaded_file($fileTmpLoc, "uploads/$new_name");

if($moveResult!=true){
	echo "ERROR:file not uploaded ty again";
	unlink($fileTmpLoc);
	exit();
}

include_once("ak_php_img_lib_1.0.php");
$target_file="uploads/$new_name";
$resized_file="uploads/resized_$new_name";
$wmax=90;
$hmax=90;

ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

	$q="INSERT INTO `registration` (name, pwd, address, city, gender, image) VALUES('$name', '$pwd', '$address', '$city', '$gender', 'resized_$new_name')";	
	

	$val =	mysqli_query($con, $q);
	if($val == true){
		$_SESSION['succ_insert']='You have successfully confirmed your registration.';
	}else{
		$_SESSION['succ_insert']='ERROR: Plz checked all field';
	}

		header("location:login.php");
		exit();
 ?>