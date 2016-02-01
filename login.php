<!DOCTYPE html>
<html>
	<head>
		<title> Login </title>
		<link href="css/style-login.css" rel="stylesheet" type="text/css" media="all"/>
		<style>
			body {
				background-image: url("images/background.jpg");
			}
		</style>
	</head>
	<body>
		<div class="all">
			<p> Login to your account </p>
			<form method='POST'>
				<input class='box' type="text" autocomplete='off' placeHolder='User Id' id='user' name='user' required/> <br/>
				<input class='box' type="password" placeHolder='Password' id='pass' name='pass' required/> <br/>
				<input class='button' type='submit' value='Login' id='button' name='button'> <br/>
				<?php
					if (isset($_POST['button'])) {
						session_start();

					//cek apakah masih dalam status login
					if(isset( $_SESSION['user_id'] )) {
						$message = 'Users is already logged in';
					}

					//cek jika user atau password salah
					if(!isset( $_POST['user'], $_POST['pass'])) {
						$message = 'Please enter a valid username and password';
					}

					else {
						$user = $_POST['user'];
						$pass = $_POST['pass'];
						include('connect_db.php');

						$sql = "SELECT * FROM user where id='$user' and password='$pass'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						// output data of each row
							$_SESSION['user_id'] = $user;
							echo "You are now logged in<br/>";
							echo "Redirectring...";
							$row = $result->fetch_assoc();
													
							if ( $row['stat'] == 'Dosen' ) {
								header('Location:dashboard.php');
							}
							
							elseif ( $row['stat'] == 'Admin' ) {
								header('Location:admin.php');
							}
						} else {
							echo "Failed to Login";
						}
						$conn->close();
					}									}
				?>
			</form>
		</div>
	</body>
</html>
