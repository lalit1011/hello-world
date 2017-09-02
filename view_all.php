<?php
$fileName = $_SERVER['PHP_SELF'];
// include('db_connection.php');
include('navbar_layout.php');
$que="SELECT * FROM registration ORDER BY id DESC ";
$obj=mysqli_query($con, $que);
?>

<script type="text/javascript">
  function checkbox(){
    document.getElementById('btn').disabled=false;
    var check = $('.checkbox').is(':checked');
    if(check==false){
      document.getElementById('btn').disabled=true;
    }else{
      document.getElementById('btn').disabled=false;

    }
  }  

</script>
<div class="container">
  <span class="msg text-success" ><?php
    if(isset($_SESSION['msg'])){
      echo "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong>&nbsp;&nbsp;".$_SESSION['msg']."</div>";
      unset($_SESSION['msg']); 
  }
   ?></span>
  <form action="delete_all.php" method="post"> 
    <input type="submit" value="Multiple Delete" name="btn" id="btn" onclick="return ask1()" disabled="true" class="btn btn-danger" />
   <p><small>Please checked the checkbox which you want to delete.</small></p>
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th></th>
          <th>S.no</th>
          <th>Username</th>
          <th>Gender</th>
          <th>Image</th>
          <th>Address</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
     <?php 
     $n=1;
     while($data=mysqli_fetch_assoc($obj)){
      ?> 
        <tr>
          <td><input type="checkbox" name="checkbox[]" class="checkbox" onchange="checkbox()"  value="<?php echo $data['id']; ?>" /> </td>
          <td><?php echo $n; ?></td>
          <td><?php echo $data['name']; ?></td>
          <td><?php echo $data['gender']; ?></td>
          <td><img src="uploads/<?php echo $data['image']; ?>" width="90" height="67" /></td>
          <td><?php echo $data['address']; ?></td>
          <td><a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-success btn-xs"  >Edit</a></td>
          <td><a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-xs" onclick="return ask()"  >Delete</a></td>
        </tr>
        <?php
        $n++;
      }
      ?>
      </tbody>
    </table>
  </form>  
</div>
<?php 
include("modal_container.php");
 ?>
 <script type="text/javascript">
   function ask1(){
  
    if(confirm('Are you sure you want to delete checked details? ')){
      return true;
    }return false;

   }
 </script>
</body>
</html>
