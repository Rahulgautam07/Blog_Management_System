<?php include 'session.php'; ?>
<?php include 'topheader.php';?>
<?php
if(isset($_POST['active']))
{
    $user_id=$_POST['user_id'];
    include 'db_con.php';
    $ch_st="update user_details set status='1' where user_id='$user_id'";
    mysqli_query($con,$ch_st);
    ?>
    <script>
        alert("User is Now Active");
        window.location='user_list.php';
    </script>
    <?php
}
if(isset($_POST['deactive']))
{
    $user_id=$_POST['user_id'];
    include 'db_con.php';
    $ch_st="update user_details set status='0' where user_id='$user_id'";
    mysqli_query($con,$ch_st);
    ?>
    <script>
        alert("User is Now Deactive");
        window.location='user_list.php';
    </script>
    <?php
}

?>
<div class="container-fluid">
	<div class="row">
		
		<div class="col-sm-12">
			<h3>User List </h3>
			<table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Mobile no</th>
        <th>Email</th>        
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
<?php
include 'db_con.php';
$sel_user="select * from user_details where user_type!='admin'";
$run_user=mysqli_query($con,$sel_user);
while($row=mysqli_fetch_array($run_user))
{
?>
<tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['mobile_no'];?></td>
        <td><?php echo $row['email'];?></td>        
        <td>
        	<?php
            if($row['status']=="1")
            {
                ?>
                <form method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                <button type="submit" name="deactive" class="btn btn-danger">Click To Deactive</button>
                    </form>
                <?php
            }
            if($row['status']=="0")
            {
                ?>
                <form method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                <button type="submit" name="active" class="btn btn-success">Click To Active</button>
                </form>
                <?php
            }

            ?>
        </td>
      </tr>
      <?php
  }
  ?>  
            </tbody>
          </table>
		</div>
	</div>
	
</div>

<?php include 'footer.php';?>