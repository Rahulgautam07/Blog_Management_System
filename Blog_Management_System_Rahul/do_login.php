<?php
session_start();
if(isset($_POST['login']))
{
	extract($_POST);
	include 'db_con.php';
	$check_login="select * from user_details where email='$email' and password='$password'";
	$run_check=mysqli_query($con,$check_login);
	if(mysqli_num_rows($run_check)<=0)
	{
		?>
		<script>
			alert('Invalid email and password');
			window.location='login.php';
		</script>
		<?php
	}
	else
	{
		$user_data=mysqli_fetch_array($run_check);
		if($user_data['status']=="1")
		{
			$_SESSION['logins']=true;
			$_SESSION['user_type']=$user_data['user_type'];
			$_SESSION['email']=$user_data['email'];
			header("Location:new_blog.php");
		}
		else
		{
			?>
			<script>
				alert('Your id is not active ......');
				window.location='login.php';
			</script>
			<?php
			}
	}
}
else
{
	header("Location:index.php");
}

?>