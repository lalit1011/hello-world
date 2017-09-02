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
    function change()
    {
      var x,y;
      var name = document.getElementById('name').value;
      var l_name = document.getElementById('l_name').value;
      var  age = document.getElementById('age').value;
      
      var obj = {"name":name, "last_name" :l_name, "age" : age};
      var dbParam = JSON.stringify(obj);
      var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200)
        {
          document.getElementById('demo').innerHTML=this.responseText;                    
        }
      };

      xmlhttp.open("post", "json_data.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("x="+dbParam);
    }


  </script>


</head>
<body>
<div class="container" style="margin: 80px">
<div class="row">
  <div class="col-md-offset-4 col-md-4">
    <label>FirstName</label>
      <input type="text" name="name" placeholder="Enter first name" id="name"><br/>
     <label>LastName</label>
      <input type="text" name="l_name" placeholder="Enter last name" id="l_name"><br/>
      <label>Age</label>
      <input type="text" name="age" placeholder="Enter your age" id="age"><br/>
      <button id="btn" type="button" class="btn btn-primary" onclick="change()">click</button>
      <p id="demo"></p>  
  </div>

</div>
  

 
</div>
</body>
</html>
