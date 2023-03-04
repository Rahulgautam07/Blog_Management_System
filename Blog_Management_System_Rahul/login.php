<?php include 'topheader.php';?>
<script>
	function check_email(email)
	{
		$.ajax({
			type: 'POST',
			url: 'check_email.php',
			data:{'work':'cemail','email':email},
			success: function (result)
			{
				if(result)
				{
					$('#error_msg').html("Email id alredy exist");
					$('#email').val("");
				}
				else
				{
					$('#error_msg').html("");
				}
			}
		});
	}
</script>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-6">
			<h3>Login </h3>
			<form action="do_login.php" method="POST">
			  <div class="form-group">
			    <label for="email">Email address:</label>
			    <input type="email"  class="form-control" name="email" >
			  	
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" name="password">
			  </div>
			  
			  <button type="submit" name="login" class="btn btn-default">Submit</button>
			</form>
		</div>
		<div class="col-sm-6">
			<h3>Signup </h3>
			<form action="do_signup.php" method="POST">
				<div class="form-group">
			    <label for="email">Name:</label>
			    <input type="text" class="form-control" name="name">
			  </div>
			  <div class="form-group">
			    <label for="email">Mobile No:</label>
			    <input type="text" class="form-control" name="mobile_no">
			  </div>
			  <div class="form-group">
			    <label for="email">Email address:</label>
			    <input type="email" class="form-control" name="email" id="email" onblur="check_email(this.value)" >
			    <span  id="error_msg" style="color: red;"></span>
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" name="password">
			  </div>
			  
			  <button type="submit" name="signup" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
	
</div>

<?php include 'footer.php';?>