<?php //authmain.php
$db = new mysqli('', '', '', '');

if ($db->connect_error) {
	echo "Database is not online";
	exit;
}

session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
	// if the user has just tried to log in
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = md5($password);
	$query = 'select * from users '
		. "where email='$email' "
		. " and password='$password'";
	$result = $db->query($query);
	if ($result->num_rows > 0) {
		// if they are in the database register the user id
		$_SESSION['valid_user'] = $email;
	}
	$query2 = "SELECT username from users WHERE email= '$email'";
	$result2 = $db->query($query2);
	$row = $result2->fetch_assoc();
	$username = $row['username'];
	$db->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title> Slice Me Up </title>

	<link rel="icon" type="image/x-icon" href="images/favicon.ico">

	<meta charset="utf-8">
	<link rel="stylesheet" href="site.css">
	<!---GOOGLE FONT-->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500&display=swap" rel="stylesheet">

	<!---AWESOME FONT-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/style.css">
	<style>
		#content {
			background-image: url('images/login/venice2.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			width: auto;
			height: 800px;
		}

		.text {
			position: absolute;
			text-align: center;
			bottom: 10%;
			padding-top: 60px;
			padding-bottom: 60px;
			margin-bottom: 230px;
			color: white;
			background-color: rgba(0, 0, 0, 0.5);
			font-family: 'Cinzel', serif;
		}
	</style>
</head>

<body>
	<header id="container">
		<div id="homeicon">
			<a href="index.php">
				<img id="pizzalogo" src="images/index/logo.png">
			</a>
		</div>
		<div id="logo">
			<div id="aboutbutton">
				<a href="menu.php">Our Menu</a>
			</div>
			<div id="aboutbutton">
				<a href="about.php">About Us</a>
			</div>
			<div id="contactbutton">
				<a href="contact.php">Contact Us</a>
			</div>
		</div>
		<div id="carticon">
			<a href="cart.php">My Cart</a>
		</div>
		<div class="dropdown" id="usericon">
			Account
			<div class="dropdown-content">
				<?php
				if (isset($_SESSION['valid_user'])) {
					echo '<a href="myorders.php">My Orders</a>';
					echo '<a href="logout.php">Log out</a>';
				} else {
					echo '<a href="signup.php">Sign up</a>';
					echo '<a href="login.php">Login</a>';
				}
				?>
			</div>
		</div>
	</header>

	<div id="content">
		<?php
		if (isset($_SESSION['valid_user'])) {
			echo '<div class="text"><h1>You are logged in: ' . $username . '</h1>';
			echo '</div>';
		} else {
			echo '<center>';
			echo '<div id="login">';
			echo '<div>';
			echo '<br>';
			echo '<div style="margin: auto;">';
			echo 'Member\'s Log In<br><br>';
			echo '</div>';
			echo '<form action="login.php" method="POST" id="signin" style="margin: auto;">';
			echo '<input type="email" name="email" placeholder="User Email" size="25" required style="background-color:#F5F5F7; border-radius: 10px; border: white; height: 25px;"><br><br>';
			echo '<input type="password" name="password" placeholder="Password" size="25" required style="background-color:#F5F5F7; border-radius: 10px; border: white; height: 25px;"><br><br>';
			echo '<button type="submit" value="Log In" style="background-color:#4CAF50; border-radius: 10px; border: white; height: 40px; width: 70px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; font-family: \'Cinzel\', serif;">Log In</button><br><br>';
			if (isset($email)) {
				// if they've tried and failed to log in
				echo '<span style="font-size:13px;">Could not log you in.</span><br />';
			} else {
				// they have not tried to log in yet or have logged out
				echo '<span style="font-size:13px;">You are not logged in.</span></h4><br />';
			}
			echo '</form>';
			echo '<br>';
			echo '<hr>';
			echo '<br>';
			echo '<div style="font-size: 13px;">';
			echo 'Don\'t Have an Account? <a href="signup.php" style="color: #0066CC;">Sign Up Now</a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</center>';
		}
		?>

	</div>
	<footer>
		<div id="container">
			<div style="width: 20%;">
				<a href="https://www.facebook.com/login.php"><i class="fa-brands fa-facebook fa-lg"></i></a>
				<a href="https://www.instagram.com"><i class="fa-brands fa-instagram fa-lg"></i></a>
				<a href="https://www.twitter.com"><i class="fa-brands fa-twitter fa-lg"></i></a>
			</div>
			<div style="width: 55%;">
				Copyright @ SliceMeUp | All Rights Reserved.
			</div>
			<div style="width: 20%;">
				<a href="about.php">Our Story</a>|
				<a href="contact.php">Feedback</a>
			</div>
		</div>
		</div>
	</footer>
</body>

</html>