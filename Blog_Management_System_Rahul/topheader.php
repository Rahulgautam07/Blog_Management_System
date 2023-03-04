<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
	<link rel="stylesheet" href="assests/css/bootstrap.css">
  <link rel="stylesheet" href="assests/css/mystyle.css">
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Our Blogs</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
           <?php
           if(isset($_SESSION['logins']) && $_SESSION['logins']==true)
           {
            ?>
            <li><a href="new_blog.php">New Blog</a></li> 
            <?php
            if($_SESSION['user_type']=='admin')
            {
              ?>
              <li><a href="user_list.php">User List</a></li> 
              <?php
            }
           }
           else
           {
            ?>
            <li><a href="login.php">Login/Signup <span class="sr-only">(current)</span></a></li>
            <?php
           }

           ?>    
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <?php
           if(isset($_SESSION['logins']) && $_SESSION['logins']==true)
           {
            ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php">Logout</a></li>            
          </ul>
        </li>
        <?php
           }

           ?>  
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>