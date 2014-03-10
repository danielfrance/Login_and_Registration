<?php 
	session_start();
	require_once('new-connection.php');

	// log out function

	function logout()
	{
		$_SESSION = array();
		session_destroy();
	};

	// registration form script 

	function register($connection, $post)
	{
		foreach ($post as $name => $value) 
			{
				if (empty($value)) 
				{
					$_SESSION['error'][$name] = "sorry " . $name . " can not be left blank";
				}
				else
					{
					switch ($name) 
					{
						case 'first_name':
						case 'last_name';
							if (is_numeric($value)) 
							{
								$_SESSION['error'][$name] = $name . ' can not have numbers';
							}
							break;

						case 'email':
							if (!filter_var($value, FILTER_VALIDATE_EMAIL)) 
							{
								$_SESSION['error'][$name] = $name . ' is not a valid email';
							}
						break;
						case 'password':
						$password = $value;
							if (strlen($value) < 6) 
							{
								$_SESSION['error'][$name] = $name . ' must be greater than 6 characters.';
							}
							break;

						case 'confirm_password':
							if ($password != $value) 
							{
								$_SESSION['error'][$name] = 'Your password did not match';
							}
							break;

						case 'birthdate':
						if (strlen($value) < 8)
						{
							$_SESSION['error'][$name] = "your birthdate must be in the following format: MM/DD/YY";
						}
						else
						{
							$birthdate = explode('/', $value); 
							if (!checkdate($birthdate[0], $birthdate[1], $birthdate[2])  ) 
							{
								$_SESSION['error'][$name] = $name . ' is not a valid date.';
							}
						}
						break;
					}


				}
			}


// file upload script 

		if($_FILES['profile_picture']['error'] > 0 )
		{
			$_SESSION['error']['profile_picture'] = "error on file upload Return Code:" . $_FILES['profile_picture']['error'];
		}
		else
		{
			$directory = "upload/";
			$file_name = $_FILES['profile_picture']['name'];
			$file_path = $directory.$file_name;

			if (file_exists($file_path)) 
			{
				$_SESSION['error']['profile_picture'] = $file_name . "  already exists";
			}
			else
			{
				if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $file_path)) 
				{
					$_SESSION['error']['profile_picture'] = $file_name . " Could not be saved "; 		
				}

			}
		}

// successful registration 

		if (!isset($_SESSION['error']))
		{
			$_SESSION['success_message'] = "Congrats! You're on your way!";

			$salt = bin2hex(openssl_random_pseudo_bytes(22)); 
			$hash = crypt($post['password'], $salt); // hashing out a password;

			$f_birthdate = $birthdate[2]. '-'.$birthdate[0]. '-'. $birthdate[1];
			$query = "INSERT INTO users (first_name, last_name, email, password, birthdate, file_path, created_at, updated_at)
						VALUES(' ".$post['first_name']." ', '".$post['last_name']."', '".$post['email']."', '{$hash}', '".$f_birthdate."',' ".$file_path."  ', NOW(), NOW()    ) ";
			
			mysqli_query($connection, $query);

			$user_id = mysqli_insert_id($connection); // this gets us the ID of the record that was created above
			$_SESSION['user_id'] = $user_id;

			header('Location: profile.php?id='.$user_id); //this sends user to profile uses the GET 
			exit;											// method to grab the user ID and displays the appropriate profile
		

		}

} // END OF REGISTER FUNCTION!!!


// Login function
	function login($connection, $post)
	 {
	 	if (empty($post['email']) || empty($post['password']) ) 
	 	{
	 		$_SESSION['error']['message'] = "Email or Password can not be blank";
	 	}
	 	else
	 	{
	 		$query = "SELECT id, password
	 					FROM users
	 					WHERE email = '{$post['email']}'";
	 		$result = mysqli_query($connection, $query);
	 		$row = mysqli_fetch_assoc($result);

	 		if (empty($row)) 
	 		{
	 			$_SESSION['error']['message'] = "Could not find email in database";
	 		}
	 		else
	 		{
	 			if (crypt($post['password'], $row['password']) != $row['password'] ) 
	 			{
	 				$_SESSION['error']['message'] = "Incorrect password";
	 			}

	 			else
	 			{
	 				$_SESSION['user_id'] = $row['id'];
	 				header('Location: profile.php?id='.$row['id']);
	 				exit;
	 			}
	 		}

	 	}
	 	header('Location: login.php');
	 	exit;

	 }
	// End of login function



// Calling REGISTER function
if (isset($_POST['action']) && $_POST['action'] == 'user_registration' ) 
{
	register($connection, $_POST);
}

elseif(isset($_POST['action']) && $_POST['action'] == 'login')
{
	login($connection, $_POST);
}

elseif (isset($_GET['logout'])) 
{
	logout();
}
header('location: index.php');
?>










