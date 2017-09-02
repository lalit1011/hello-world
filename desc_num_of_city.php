<?php 
include("db_connection.php");
$q="SELECT * FROM  `gda3f_states_cities` ORDER BY city_name DESC LIMIT 25";
$obj=mysqli_query($con, $q);

$q1="SELECT * FROM  `gda3f_states_cities` ORDER BY state_name ASC LIMIT 25";
$obj1=mysqli_query($con, $q1);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>State And City</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
  <h2>State And City Table</h2>
    <p>Return a list of state in descending order of number of cities in the state</p>            
    <table class="table table-hover">
      <thead>
        <tr>
          <th>S.no</th>
          <th>City Name</th>
          <th>State Name</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $n=1;
       while($data=mysqli_fetch_assoc($obj))
       {?>
        <tr>
          <td><?php echo $n; ?></td>
          <td><?php echo $data['city_name']; ?></td>
          <td><?php echo $data['state_name']; ?></td>
        </tr>

       <?php
            $n++;
        } 
  
       ?>            
      </tbody>
    </table>
  </div>
</div>

<div class="container">
  <div class="row">
  <h2>State And City Table</h2>
    <p>Return a list of city & there states in alphabetical order of name of state</p>            
    <table class="table table-hover">
      <thead>
        <tr>
          <th>S.no</th>
          <th>City Name</th>
          <th>State Name</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $n=1;
       while($data1=mysqli_fetch_assoc($obj1))
       {?>
        <tr>
          <td><?php echo $n; ?></td>
          <td><?php echo $data1['city_name']; ?></td>
          <td><?php echo $data1['state_name']; ?></td>
        </tr>

       <?php
            $n++;
        } 
  
       ?>            
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
