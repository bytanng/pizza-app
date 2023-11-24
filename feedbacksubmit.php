<?php
session_start();

$db = new mysqli('', '', '', '');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to DB. Please try again later.";
    exit;
}

// Escape user inputs for security
$name = $_POST['myname'];
$email = $_POST['myemail'];
$subject = $_POST['mysubject'];
$comment = $_POST['mycomments'];

// Prepare and execute the SQL query
$sql = "INSERT INTO feedback (name, email, subject, comment) VALUES ('$name', '$email', '$subject', '$comment')";

$db->query($sql);

// Close the database connection
$db->close();
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
			background-image: url('images/login/italy2.jpg');
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
    <div class="text"><h1>Thank you for your feedback.</h1>
	</div>

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
<?php
    unset($_SESSION['cart']);
    unset($_SESSION['total_amount']);
?>
</html>