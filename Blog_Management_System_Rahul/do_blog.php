<?php
session_start();
if(isset($_POST['save_blog']))
{
	extract($_POST);
	include 'db_con.php';
	$status=true;
	while ($status)
	{
		$blog_id=rand(1111,9999999);
		$check_id="select * from blog_details where blog_id='$blog_id' ";
		$run_check=mysqli_query($con,$check_id);
		if(mysqli_num_rows($run_check)<=0)
		{
			$status=false;
		}
	}
	$date=date('Y-m-d');
	$user=$_SESSION['email'];
	$ins_blog="insert into blog_details(blog_id,blog_title,content,user,date) 
	values('$blog_id','$blog_title','$content','$user','$date')";
	mysqli_query($con,$ins_blog);

	if($_FILES['image']['name']!='')
	{
		$name=$_FILES['image']['name'];
		$tmp_name=$_FILES['image']['tmp_name'];
		$t_name=$blog_id.$name;
		$path="assests/images/".$t_name;	
		move_uploaded_file($tmp_name,$path);
		$up_query="update blog_details set image='$t_name' where blog_id='$blog_id'";
		mysqli_query($con,$up_query);
	}
	?>
	<script>
		alert('Blog Saved Successfully ');
		window.location='new_blog.php';
	</script>
	<?php
}
else
{
	header("Location:logout.php");
}

?>