<?php 
// print_r($_POST);
include('db_connection.php');
extract($_POST);
$name = mysqli_real_escape_string($con, $name);
$pwd = mysqli_real_escape_string($con, $pwd);
$address = mysqli_real_escape_string($con, $address);
$city = mysqli_real_escape_string($con, $city);
$gender = mysqli_real_escape_string($con, $gender);

if($_FILES['uploaded_file']['name']!="")
{
	$fileName=$_FILES['uploaded_file']['name'];
	$fileTmpLoc=$_FILES['uploaded_file']['tmp_name'];
	$fileType=$_FILES['uploaded_file']['type'];
	$fileSize=$_FILES['uploaded_file']['size'];
	$fileErrorMsg=$_FILES['uploaded_file']['error'];
	$kaboom=explode(".",$fileName);
	$fileExt=$kaboom[1];
	$new_name=time().rand(10000, 1000).".".$fileExt;
	if(!$fileTmpLoc)
	{
		echo "ERROR: PlZ browse for a file ";
		exit();
	}else if($fileSize>5242880){//size is 5 megabytes
	    echo "ERROR: file is larger than 5 megabytes";
	    unlink($fileTmpLoc);
	    exit();
	    // if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
	}else if(!preg_match("/\.(gif|jpg|png)$/i",$new_name)){
		echo "error: your image was not gif,jpg.jpeg";
		unlink($fileTmpLoc);
		exit();
	}else if($fileErrorMsg==1){
		echo "ERROE: an error occured while processing try again";
		exit();

	}

	$moveResult=move_uploaded_file($fileTmpLoc, "uploads/$new_name");

	if($moveResult!=true){
		echo "ERROR:file not uploaded ty again";
		unlink($fileTmpLoc);
		exit();
	}

	// unlink($fileTmpLoc);


	include_once("ak_php_img_lib_1.0.php");
	$target_file="uploads/$new_name";
	$resized_file="uploads/resized_$new_name";
	$wmax=90;
	$hmax=90;

	ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

	echo "The file name $fileName uploaded successfully<br>";
	echo "it is $fileSize bytes in size<br>";
	echo "it is an $fileType type of file<br>";
	echo "the file ext is $fileExt <br>";
	echo "the error msg output for this uploaded it";
}
	if(isset($new_name))
	{

		$q="UPDATE `registration` SET  name='$name', address='$address', city='$city', gender='$gender', image='resized_$new_name' WHERE id=$id";	
		
	}else{

		$q="UPDATE `registration` SET  name='$name', address='$address', city='$city', gender='$gender' WHERE id=$id";	
		
	}


		mysqli_query($con, $q);
		$_SESSION['msg']="Data Updated Successfully";
		header("location:view_all.php");
?> 