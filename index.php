<?php 
	session_start();
	
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- Bootstrap -->
    
  	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>  
    <script type="text/javascript" href="js/javascript.js"></script>

  </head>
  <body>
  	

   	<div id ="wrapper" class="row">
   		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
   			<h1 class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-sm-offset-3 col-lg-offset-4 col-md-offset-4">New User Registration</h1>
   		</div>
   	</div>	 
   	<?php 
   		if (isset($_SESSION['success_message'])) 
   		{
   			echo "<div class='alert alert-info'>" . $_SESSION['success_message'] . "</div>";
   		}

   	 ?>

   		<!--<?php // would use this if I wanted the alerts to pop up above the fields

		if (isset($_SESSION['error']))
		{
   			foreach ($_SESSION['error'] as $name => $message) 
   			{
   				echo "<div class= 'alert alert-danger'>" . $message . "</div>";
   			}
   		}
   		

   	
   		 ?>-->
   	<div class="container">
   		
	   		<form class="form" method="post" action="process.php" enctype="multipart/form-data">
	   			<div id="ballin" class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">

			   			<input type="hidden" name="action" value="user_registration">
			   			<?php if (isset($_SESSION['error']['email'])) // lines 54-64 this changes the input type border color
			   			{												// when an error message is triggered 
			   				echo "<input type='text'  class='form-control margin-top ballin' name='email' placeholder='email'> ";

			   				echo "<div class= 'alert alert-danger'>" . $_SESSION['error']['email'] . "</div>";
			   			} 
			   			else 
			   			{
			   				echo "<input type='text'  class='form-control margin-top' name='email' placeholder='email'> ";

			   			}?>
			   			<input id="ballin1" type="text" class="form-control margin-top error_message" name="first_name" placeholder="First Name">
			   			<?php if (isset($_SESSION['error']['first_name'])) 
			   			{
			   				echo "<div class= 'alert alert-danger'>" . $_SESSION['error']['first_name'] . "</div>";
			   			} ?>
		   			
		   			
			   			<input type="text" class="form-control margin-top" name="last_name" placeholder="Last Name">
			   			<?php if (isset($_SESSION['error']['last_name'])) 
			   			{
			   				echo "<div class= 'alert alert-danger'>" . $_SESSION['error']['last_name'] . "</div>";
			   			} ?>
			   			<input type="password" class="form-control margin-top" name="password" placeholder="Password">
			   			<?php if (isset($_SESSION['error']['password'])) 
			   			{
			   				echo "<div class= 'alert alert-danger'>" . $_SESSION['error']['password'] . "</div>";
			   			} ?>
			   			<input type="password" class="form-control margin-top" name="confirm_password" placeholder="Confirm Password">
			   			<?php if (isset($_SESSION['error']['confirm_password'])) 
			   			{
			   				echo "<div class= 'alert alert-danger'>" . $_SESSION['error']['confirm_password'] . "</div>";
			   			} ?>
			   			<input type="datepicker" class="form-control margin-top" name="birthdate" placeholder="Enter birthdate MM/DD/YY">
			   			<?php if (isset($_SESSION['error']['birthdate'])) 
			   			{
			   				echo "<div class= 'alert alert-danger'>" . $_SESSION['error']['birthdate'] . "</div>";
			   			} ?>
			   			<input type="file" class="form-control margin-top" name="profile_picture" >
			   			<?php if (isset($_SESSION['error']['profile_picture'])) 
			   			{
			   				echo "<div class= 'alert alert-danger'>" . $_SESSION['error']['profile_picture'] . "</div>";
			   			} ?>
			   			<input id="registeration_button" type="submit" value="Register " class="btn btn-primary margin-top">
			   			<a href="login.php" class="btn btn-info margin-top pull-right" >Log In</a>
	   				

	   			</div>
	   		</form>
   	</div>

 
  
  </body>
</html>
<?php 
	$_SESSION= array();


 ?>


