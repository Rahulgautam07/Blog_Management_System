<?php
if(isset($_POST['signup']))
{
	extract($_POST);
	include 'db_con.php';
	$check_email="select * from user_details where email='$email'";
	$run_check=mysqli_query($con,$check_email);
	if(mysqli_num_rows($run_check)>0)
	{
		?>
		<script>
			alert('Emailid already exist');
			window.location='login.php';
		</script>
		<?php
	}
	else
	{
		$status=true;
	while ($status)
	{
		$user_id=rand(1111,9999999);
		$check_id="select * from user_details where user_id='$user_id' ";
		$run_check=mysqli_query($con,$check_id);
		if(mysqli_num_rows($run_check)<=0)
		{
			$status=false;
		}
	}
	$ins_user="insert into user_details(user_id,name,mobile_no,email,password,status,user_type)
	 values('$user_id','$name','$mobile_no','$email','$password','0','user')";
	 mysqli_query($con,$ins_user);
	 ?>
	<script>
		alert('Registration completed ');
		window.location='index.php';
	</script>
	<?php	
	}
}
else
{
	header("Location:index.php");
}


?>