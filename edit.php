<?php
include('db_connection.php');
// include('navbar_layout.php');

$id=$_GET['id'];
$q="SELECT * FROM registration WHERE id=$id";
$obj=mysqli_query($con, $q);
$data=mysqli_fetch_assoc($obj);
// print_r($data);
?>
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
     $(document).ready(function(){
        $('#submit').click(function(){
          // alert('hell');
          var name=$('#name').val();
          var pwd=$('#pwd').val();
          var re_pwd=$('#re-pwd').val();
          var address=$('#address').val();
          var gender1=$('#male').is(":checked");
          var gender2=$('#female').is(":checked");
          var city=$('#city').val();
          var check=true;
          
          if(gender1==false && gender2==false)
          {
            $('.err_gender').html('Checked gender');
          }else{
            $('.err_gender').html('');

          }

          if(name=="")
          {
            $('.err_name').html('Username is required');
            check=false;
          }else{
            $('.err_name').html('');
          }
          if(pwd=="")
          {
            $('.err_pwd').html('Password is required');
            check=false;
          }else{
            $('.err_pwd').html('');
          }
          if(re_pwd=="")
          {
            $('.err_re-pwd').html('Confirm Password is required');
            check=false;
          }else{
            $('.err_re-pwd').html('');
            if(pwd!=re_pwd)
            {
              $('.err_re-pwd').html('Password and Confirm Password shoud be match');
              check=false;
            }else{
              $('.err_re-pwd').html('');
            }
          }
          if(address=="")
          {
            $('.err_address').html('Address is required');
            check=false;
          }else{
            $('.err_address').html('');
          }
          if(city=="Select")
          {
            $('.err_city').html('City is required');
            check=false;
          }else{
            $('.err_city').html('');
          }
          

          return check;
        });

        $('#close').click(function(){
            window.location.href = "view_all.php";
        });
     }); 

  </script>


  <style type="text/css">
    .err{
      color:#ff0000;
      font-size:12px;
    }
  </style>
</head>
<body>
<div class="container" style="margin-top: 60px;">
 <div class="row">
   <div class="col-md-offset-3 col-md-6">
         <!--panel -->
          <div class="panel-group">
            <div class="panel panel-info">
              <div class="panel-body">
              <p class="err">Mandatory fields are marked with an asterisk (*)</p>
             <!--form--> 
                <form method="post" action="update.php" enctype="multipart/form-data">
                 <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="form-group">
                    <label for="file">Image</label><span class="err"> *</span>
                  <input type="file" name="uploaded_file" id="image">
                  </div>
                  <div class="form-group">
                    <label for="name">Username</label><span class="err"> *</span>
                    <input type="name" class="form-control" placeholder="Enter username" value="<?php echo $data['name']; ?>" name="name" id="name">
                    <span class="err err_name"></span>

                  </div>
                  
                  <div class="form-group">
                    <label for="gender">Gender</label><span class="err"> *</span>
                    M<input type="radio" name="gender" id="male" value="male" 
                    <?php 
                    if($data['gender']=='male')
                    {
                      echo "checked='checked'";
                    }


                     ?>
                    >
                    F<input type="radio" name="gender" id="female" value="female"
                    <?php 
                    if($data['gender']=='female')
                    {
                      echo "checked='checked'";
                    }


                     ?>
                    >
                  <span class="err err_gender"></span>

                  </div>
                  <div class="form-group">
                    <label for="address">Address</label><span class="err"> *</span>
                    <textarea name="address" id="address" placeholder="Enter address" class="form-control"><?php echo $data['address']; ?></textarea>
                    <span class="err err_address"></span>

                  </div>
                   <div class="form-group"> 
                     <label for="city">City</label><span class="err"> *</span>
                     <select class="form-control" name="city" id="city">
                       <option value="Select" <?php if($data['city']=='Select'){echo "selected='selected'";} ?> >Select</option>
                       <option value="bhopal" <?php if($data['city']=='bhopal'){echo "selected='selected'";} ?>>Bhopal</option>
                       <option value="pune"  <?php if($data['city']=='pune'){echo "selected='selected'";} ?>>Pune</option>
                       <option value="mumbai"  <?php if($data['city']=='mumbai'){echo "selected='selected'";} ?> >Mumbai</option>
                       <option value="delhi"   <?php if($data['city']=='delhi'){echo "selected='selected'";} ?> >Delhi</option>
                     </select>
                     <span class="err err_city"></span>

                   </div> 
               
                  <input type="submit" class="btn btn-warning" name="submit" value="Update" id="submit">
                  <button type="button" class="btn btn-danger" id="close">Close</button>
                </form>
              </div>
            </div>
  </div>
  </div>  
</div>
</body>
</html>
