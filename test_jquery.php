<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
  	
  		
  			var name = $('#name').val();
  			check =  true;


  			// alert(name);
  	 if(name!=""){
  	   alert(name);
  	   // check = false;
  	   $.post('username_exist.php', {name : name}, function(res){
  	   	alert(res);
  	     // console.log(res);
  	     if(res==1){
  	         alert(res);
  	       $('.err_name').html('Your provided Username has already been used. Please use another Username');  
  	      check = false; 
  	     }

  	     if(res==0){
  	       $('.err_name').html('');  
  	     }
  	     alert(check + "ajax");
  	    });  



  	 }else{
  	  alert('else');
  	  $('.err_name').html('Username is required');
  	  check=true; 
  	}   
  	alert(check + "final"); 
  	});
  </script>
</head>
<body>
	<input type="text" name="name" id="name">
	<span class="err_name"></span>
	<button id="btn">click</button>
</body>
</html>
