<?php 
$fileName = $_SERVER['PHP_SELF'];
include('db_conn.php');
if(!$_SESSION['is_admin_logged_in'])
{
header("location:admin_login.php");
}

$que = "SELECT * FROM `image_tble` ORDER BY `sort` ASC";
$obj = mysqli_query($con, $que);

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
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

 <script type="text/javascript">
  $(function(){
     var sortOrder = [];
     var $sortableTable  = $("#sortable tbody");

     $sortableTable.sortable({
        start: function(event, element){

            $.map($('[name^=sort]', $sortableTable), function(element){
                  sortOrder.push(element.value);
            });
        },
        stop: function(event, element) {
            $.each($('tr [name^=sort]', $sortableTable), function(index, element){
                element.value = sortOrder[index];                
        
            });
            var id = document.getElementsByClassName('checkbox');
            var s_value = document.getElementsByClassName('sort1');
          
            var obj = {};
          
        for (var i = 0; i < id.length; i++) {
               
              obj.id = $(id[i]).val();
              obj.value = $(s_value[i]).val();
       
              var dbParam = JSON.stringify(obj);
              var xmlhttp = new XMLHttpRequest();

              xmlhttp.onreadystatechange = function(){

                  if(this.readyState == 4 && this.status == 200){
                    var res = this.responseText;                            
                  }
               };

              xmlhttp.open("post", "sort_update.php", true);
              xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xmlhttp.send("x="+dbParam);              
          }        
      }
   });
 });
 </script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="admin_dashboard.php">Dashboard</a></li>
        <li ><a href="add_images.php">Add Images</a></li>
        <li  <?php if($fileName=='/lalit/lalit/update_images.php'){echo "class='active'";} ?>><a href="update_images.php">Update Images</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin_dashboard.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['AdminName']; ?></a></li>
        <li><a href="admin_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>       
      </ul>
    </div>
  </div>
</nav>
<!--end of navbar-->
<div class="container" >
     <?php
     if($_SESSION['msg_succ']!=""){

        echo "<div class='alert alert-success alert-dismissable'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>Success!</strong>&nbsp;&nbsp;".$_SESSION['msg_succ']."</div>";

       unset($_SESSION['msg_succ']);
      }

      if($_SESSION['err_msg']!=""){

         echo "<div class='alert alert-danger alert-dismissable'>
         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong>Danger!</strong>&nbsp;&nbsp;".$_SESSION['err_msg']."</div>";

        unset($_SESSION['err_msg']);
       }
      ?>
</div>
<div class="container" >
  <div class="row">
     <form action="delete.php" method="post">
        <input type="submit" name="submit" id="submit" disabled="true" value="Multiple Delete"  onclick="return ask1()" class="btn btn-danger">
        <p><small>Please check the checkbox which you want to delete.</small></p>
        <table class="table table-hover table-stripped" id="sortable">
          <thead>
            <tr>
              <th></th> 
              <th>S.no</th>
              <th></th>
              <th>Images</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody class="ui-sortable">
             
           <?php 
           $n=1;
           while($data = mysqli_fetch_assoc($obj))
           { ?>
             <tr>
                <td><input type="checkbox" class="checkbox" onchange="checkbox()" name="check[]" id="id_s<?php echo $n; ?>" value="<?php echo $data['id']; ?>"></td>
                <td><?php  echo $n; ?></td>
                <td><input type="hidden" name="<?php echo 'sort'.$data['sort'];?>" disabled class="sort1"  value="<?php echo $data['sort'];?>" style="width: 20px;"></td>
                <td><img src="uploads/<?php echo $data['image_name'];  ?>" class='img-thumbnail' width="90"></td>
                <td><a href="edit_img.php?id=<?php echo $data['id'];  ?>" class="btn btn-info btn-xs">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $data['id'];  ?>"  class="btn btn-danger btn-xs" onclick="return ask()">Delete</a></td>
             </tr>
           <?php 
           $n++;
           }                
            ?>
          <tbody>
        </table>
     </form>
  </div>
</div>
<script type="text/javascript">
  function ask(){
      if(confirm('Are you sure you want to delete this image?')){
        return true;
      }return false;
   }

   function ask1(){
     if(confirm('Are you sure you want to delete checked images?')){
       return true;
     }return false;
   }

    function checkbox(){
    
       document.getElementById('submit').disabled=false;
       var check = $('.checkbox').is(':checked');
       if(check==false){
         document.getElementById('submit').disabled=true;
       }else{
         document.getElementById('submit').disabled=false;
       }   
   }

</script>
</body>
</html>
