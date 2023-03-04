<?php session_start();?>
<?php include 'topheader.php'; ?>

<div class="container-fluid"> 
<?php
include 'db_con.php';
$sel="select * from blog_details ";
$run=mysqli_query($con,$sel);
while ($row=mysqli_fetch_array($run)) 
{
?>	<div class="panel panel-primary">
	  <div class="panel-heading">
	  	<?php echo $row['blog_title'];?>
	  </div>
	  <div class="panel-body">
	    <div class="row">
	    	<div class="col-sm-8">
	    			<?php echo $row['content'];?>
	    	</div>
	    	<div class="col-sm-4">
	    		<img src="assests/images/<?php echo $row['image'];?>" style="height:100%;width:100%;">
	    	</div>
	    </div>
	  </div>
	</div>
	<?php

}
?>
</div>



<?php include 'footer.php'; ?>