<?php
if (isset($_POST['save_blog'])) {
	include 'db_con.php';
	extract($_POST);
	$chng="update blog_details set blog_title='$blog_title',content='$content' where blog_id='$blog_id' ";
	$run=mysqli_query($con,$chng);
	if ($_FILES['image']!='') 
		{	unlink("assests/images/$old_image");
			$name=$_FILES['image']['name'];
			$tmp_name=$_FILES['image']['tmp_name'];
			$t_name=$blog_id.$name;
			$path="assests/images/$t_name";
			move_uploaded_file($tmp_name, $path);
			echo $t_name;
			$up="update blog_details set image='$t_name' where blog_id='$blog_id'";
			mysqli_query($con,$up);
	}
}
else
{
	header("Location:edit_blog.php");
}
?>