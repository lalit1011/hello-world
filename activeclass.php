<?php 
include("navbar_layout.php");

 ?>
 <script type="text/javascript">
 	$(document).ready(function(){
 		$('li').click(function(){
 			$('li').removeClass("active");
 			$(this).addClass("active");
 		});
 	});
 </script>
<ul class="pagination">
<?php 
	for($i=1; $i<=10; $i++){
		?>
		<li><a href="activeclass.php?id=<?php echo $i; ?>"><?php echo $i ?></a></li>
		<?php
	}
 ?>
  
</ul>
