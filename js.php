<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">

 
  	function select_atlest_one(){
  		
  		if((document.getElementById('d1').value!="") || (document.getElementById('d2').value !="") || (document.getElementById('d3').value != "")){
  				
  			return true;
  		}else{
  			return false;	
  		}
  	}

  	function sequence(){
  		if(document.getElementById('d1').value!=""){
  			
  			document.getElementById('d2').disabled=false;

  			if(document.getElementById('d2').value!=""){

  					document.getElementById('d3').disabled=false;
  			}
  		}
  	}

  	function noduplicate()
  		{
  			if(document.getElementById('d1').value!=""){
  				if((document.getElementById('d2').value=="") && (document.getElementById('d3').value=="")){
  					return true;
  				}else if((document.getElementById('d2').value!="") && (document.getElementById('d3').value=="")){

  					if((document.getElementById('d1').value != document.getElementById('d2').value) || (document.getElementById('d2').value != document.getElementById('d1').value) ){
  						return true;
  					}else{
  						return false;
  					}
		  				}else if((document.getElementById('d2').value!="") && (document.getElementById('d3').value!="")){
		  					
		  					if(document.getElementById('d1').value != document.getElementById('d2').value && document.getElementById('d2').value != document.getElementById('d3').value && document.getElementById('d3').value != document.getElementById('d1').value){

		  							return true;
		  						
		  					}else{
		  						return false;
		  					}
		  				}else{
		  					return false;
		  				}
  			}else{
  				return false;
  			}
  		}


  function check(){
  		var a = select_atlest_one();
  		var b = noduplicate();
  		// var c = sequence();
  		console.log("A "+a);
  		console.log("B "+b);
  		if(a==true)
  		{
  			if(b==true)
  			{
  				document.getElementById('output').hidden=false;
  				document.getElementById('output').innerHTML="Your city has been submitted";
  			

  			}else{
  				if(document.getElementById('d2').value !="" && document.getElementById('d1').value!="")
  				{
  					document.getElementById('output').hidden=false;
  					document.getElementById('output').innerHTML='Please do not select duplicate';
  				}
  				else{

  					document.getElementById('output').hidden=false;

  				document.getElementById('output').innerHTML='Please select in sequence';

  				}
  				
  			}

  		}else{

  			document.getElementById('output').hidden=false;
  			document.getElementById('output').innerHTML='Select atleast one';
  		}
  	}
  </script>
</head>
<body style="margin-top:10px;">
<div class="container">
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<select id="d1" name="d1" onchange="sequence()" class="form-control">
				<option value="">select</option>
				<option value="indore">indore</option>
				<option value="bhopal">bhopal</option>
				<option value="pune">pune</option>
				<option value="mumbai">mumbai</option>
				<option value="delhi">delhi</option>
			</select>
			<select id="d2" name="d2" onchange="sequence()" disabled="true" class="form-control">
				<option value="">select</option>
				<option value="indore">indore</option>
				<option value="bhopal">bhopal</option>
				<option value="pune">pune</option>
				<option value="mumbai">mumbai</option>
				<option value="delhi">delhi</option>
			</select>	
			<select id="d3" name="d3" onchange="sequence()" disabled="true" class="form-control">
				<option value="">select</option>
				<option value="indore">indore</option>
				<option value="bhopal">bhopal</option>
				<option value="pune">pune</option>
				<option value="mumbai">mumbai</option>
				<option value="delhi">delhi</option>
			</select>		
			<button type="button" class="btn btn-info" onclick="check()">Check</button>
			</div>
			<label id="output" name="output" hidden="true"></label>
			
	</div>
</div>
</body>
</html>