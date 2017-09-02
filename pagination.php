<?php 
$fileName = $_SERVER['PHP_SELF'];

// include("db_connection.php");
include("navbar_layout.php");


	$q1="SELECT * FROM `gda3f_states_cities`";
	$obj1=mysqli_query($con, $q1);

    $totol = mysqli_num_rows($obj1);
	$per_page=100;
 	$per_page=ceil($totol/100);
$a=0;
 	if(isset($_GET['num']))
	{

 		$a=$_GET['num'];
 		
 		$a=$a-1;
 		$b=$a*100;

 		$q="SELECT * FROM `gda3f_states_cities` LIMIT  $b, 100";
 	}else{
		$q="SELECT * FROM `gda3f_states_cities` LIMIT 100";
 	}
 	$obj=mysqli_query($con, $q);

 ?>
 <style type="text/css">
 	
 </style>

 <div class="container">
   <h2>This is pagination page</h2>
   	<div class="row">
   	 <div class="col-md-offset-3" >
   	 	<ul class="pagination">
		<?php 
	
		 if($a!=0)
		 {
		 	?>

	         <li><a href="pagination.php?num=<?php echo $a; ?>"><</a></li>
		 <?php 
		 }
		  for($i=1; $i<=$per_page; $i++)
		{
			if ($_GET['num'] == $i) { ?>
				<li class="active" ><a href="pagination.php?num=<?php echo $i;?>"><?php echo $i; ?></a></li>
				<?php
			}else{ ?>
				<li  class="num<?php echo $i; ?>"><a href="pagination.php?num=<?php echo $i;?>"><?php echo $i; ?></a></li>
			<?php } ?>
		
		
		<?php
		}
		if($a!=9)
		{?>	
			<li><a href="pagination.php?num=<?php echo $a+2; ?>">></a></li>
		<?php
		}
		?>
	   	</ul>
	</div>   	           
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
			  <td><?php echo $data['city_id'];  ?></td>
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
  <script type="text/javascript">
 $(document).ready(function() {
 	var a = <?php echo $a; ?>;
 	if(a == 0){
 		$('.num1').addClass('active');
 	}
 });
 </script>
 <?php 
 include("modal_container.php");
  ?>