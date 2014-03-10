<?php 
	session_start();

 ?>
 <html lang='en'>
 <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap -->
    
  	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>  
    <script type="text/javascript" href="js/javascript.js"></script>
 </head>
 <body>
 	<?php
	if(isset($_SESSION['error']))
	{
		echo "<div class= 'alert alert-danger'>" . $_SESSION['error']['message'] . "</div>";
	}

	?>
 	<div id ="wrapper" class="row">
   		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
   			<h1 class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 col-sm-offset-3 col-lg-offset-4 col-md-offset-4">Log In</h1>
   		</div>
   	</div>	 
 	<form class="form" method="post" action="process.php">
		<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
   			<input type="hidden" name="action" value="login">
   			<input type='text'  class='form-control margin-top' name='email' placeholder='email'>		
   			<input type="password" class="form-control margin-top" name="password" placeholder="Password">
   			<input type="submit" value="Login" class="btn btn-primary margin-top">
   			<a href="index.php" class="btn btn-info margin-top pull-right" >Sign Up</a>

   		</div>
   	</form>
 </body>
 </html>
 <?php
$_SESSION = array();
?>