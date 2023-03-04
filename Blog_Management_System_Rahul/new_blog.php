<?php include 'session.php'; ?>
<?php include 'topheader.php';?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4">
			<h3>New Blog </h3>
			<form action="do_blog.php" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
			    <label for="email">Blog Title:</label>
			    <input type="text" class="form-control" name="blog_title">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Blog Content:</label>
			    <textarea class="form-control" name="content"></textarea>
			  </div>
			   <div class="form-group">
			    <label for="pwd">Blog Image:</label>
			    <input type="file" class="form-control" name="image">
			  </div>
			  
			  <button type="submit" name="save_blog" class="btn btn-default">Submit</button>
			</form>
		</div>
		<div class="col-sm-8">
			<h3>Blog List </h3>
			<table class="table table-bordered">
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Blog Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $xx=1;
        include 'db_con.php';
        $sel_blog="select * from blog_details";
        if($_SESSION['user_type']=="user")
        {
            $user_email=$_SESSION['email'];
            $sel_blog.=" where user='$user_email'";
        }       
        $run_blog=mysqli_query($con,$sel_blog);
        while ($row=mysqli_fetch_array($run_blog)) {        
        ?>
      <tr>
        <td><?php echo $xx; ?></td>
        <td><?php echo $row['blog_title']; ?></td>
        <td><?php echo $row['content']; ?></td>
        <td>
            <img src="assests/images/<?php echo $row['image']; ?>" style="height:50px;width:50px;">
        </td>
        <td>
        	<button type="submit" class="btn btn-success">Edit</button>
        </td>
        <td>
        	<button type="submit" class="btn btn-danger">Delete</button>
        </td>
      </tr>
      <?php
      $xx++;
  }
  ?>
      
    </tbody>
  </table>
		</div>
	</div>
	
</div>

<?php include 'footer.php';?>