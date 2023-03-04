<?php
if(isset($_POST['work']))
{
	extract($_POST);
	include 'db_con.php';
	$check_email="select * from user_details where email='$email'";
	$run_check=mysqli_query($con,$check_email);
	if(mysqli_num_rows($run_check)>0)
	{
		echo true;
	}
}
?>