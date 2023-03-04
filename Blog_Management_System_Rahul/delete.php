<?php
if (isset($_POST['delete'])) 
{ include 'db_con.php';
  extract($_POST);
  $del="delete from blog_details where blog_id='$blog_id' ";
  mysqli_query($con,$del);
  unlink("assests/images/$image"); 
?>
<script>
  alert('Your selected blog is deleted');
  window.location='new_blog.php';
</script>

<?php
}
else
{
  header("Location:new_blog.php");
}
?>