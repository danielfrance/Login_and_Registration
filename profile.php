<?php 
	session_start();
	require_once('new-connection.php');
	// echo "<p>Welcome" . $row['first_name'].' '. $row['last_name'] . '<a href="process.php?logout=1"qw>LOGOUT</a></p>  ' ;
 ?>
 <html>
 <head>
 	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <!-- Bootstrap -->
    
  	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>  
    <script type="text/javascript" href="js/javascript.js"></script>
 </head>
 <body>
 		<div>
		 	<?php 
		 		$query = "SELECT first_name, last_name, email, file_path, birthdate
						  FROM users
						  WHERE id = ".$_GET['id'];
				$result = mysqli_query($connection, $query);
				$row = mysqli_fetch_assoc($result);

				

				if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $_GET['id'])
					{
						?>
						<div id ='wrapper' class='row'>
							<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
								<h1 class = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 col-sm-offset-3 col-lg-offset-4 col-md-offset-4'>Welcome Home <?=$row['first_name']?></h1>
								<a class="pull-right" href="process.php?logout=1">LOGOUT</a>
							</div>;
						<?php 

					}
					 
		 	 ?>
	 	 </div>
	 	 <div class="container">
		 	<img class="col-md-3" width="200px"  src="<?=$row['file_path'] ?> ">
		 	<h2> <?= $row['first_name'].' '. $row['last_name'] ?></h2>
		 	<h3> <?= $row['email']?></h3>
		 	<h3> <?= date('M d Y', strtotime($row['birthdate'])) ?></h3>
	 	</div>
 	</div>
 </body>
 </html>