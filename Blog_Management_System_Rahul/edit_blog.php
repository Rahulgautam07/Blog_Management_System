<?php 
  include 'session.php'; 
  if (isset($_POST['edit'])) 
  { include 'db_con.php';
    include 'topheader.php';
    extract($_POST);
    $sel="select * from blog_details where blog_id='$blog_id' ";
    $run=mysqli_query($con,$sel);
    $row=mysqli_fetch_array($run);

 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4">
      <h3>Blog Editing </h3>
      <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="blog_id" value="<?php echo $row['blog_id']; ?>">
        <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>">
        <div class="form-group">
          <label for="email">Blog Title:</label>
          <input type="text" class="form-control" name="blog_title" value="<?php echo $row['blog_title']; ?>" >
        </div>
        <div class="form-group">
          <label for="pwd">Blog Content:</label>
          <textarea class="form-control" name="content" value=""><?php echo $row['content']; ?></textarea>
        </div>
         <div class="form-group">
          <label for="pwd">New Image:</label>
          <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
          <label for="pwd">old Image:</label>
          <img src="assests/images/<?php echo $row['image']; ?>" style="height: 150px;width: 200px;">
        </div>
        
        <button type="submit" name="save_blog" class="btn btn-default">Submit</button>
      </form>
    </div>
    <div class="col-sm-8">
      <h3>Blog List </h3>
      <table class="table table-bordered" style="table-layout: initial; ">
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
        <td ><?php echo $row['blog_title']; ?></td>
        <td><?php echo $row['content']; ?></td>
        <td>
            <img  src="assests/images/<?php echo $row['image']; ?>" style="height:70px;width:70px;">
        </td>
        <td>
          <form action="edit_blog.php" method="POST">
            <button type="submit" name="edit" class="btn btn-success">Edit</button>
            <input type="hidden" name="blog_id" value="<?php echo $row['blog_id']; ?>">
            <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
          </form>
        </td>
        <td>
          <form action="delete.php" method="POST">
            <input type="submit" class="btn btn-danger" value="Delete" name="delete">
            <input type="hidden" name="blog_id" value="<?php echo $row['blog_id']; ?>">
            <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
          </form>
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

<?php include 'footer.php';

  }
  else
  {
    header("Location:new_blog.php");
  }
  ?>