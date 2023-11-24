<?php
session_start();
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
		<style>* {
			box-sizing: border-box;
		}

		/* Create two equal columns that floats next to each other */
		.column {
			float: left;
			width: 50%;
			height: 750px;
			margin-top: 30px;
			padding-top: 50px;
			display: flex;
			/* Use flexbox for centering */
			flex-direction: column;
			/* Stack child elements vertically */
			justify-content: center;
			/* Vertically center child elements */
			align-items: center;
			/* Horizontally center child elements */
		}

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		body {
			overflow: hidden;
		}

		/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 600px) {
			.column {
				width: 100%;
			}
		}

		body {
			background-color: white;
		}

		#bodycontent {
			background-image: url('images/extras/touch.jpg');
			background-size: cover;
			background-repeat: no-repeat;
			background-size: 2000px;
			background-attachment: fixed;
			width: ;
			/* Set a specific width (adjust as needed) */
			height: 800px;
			/* Fixed height as you originally specified */
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

	<div id="bodycontent">
		<div class="column">
			<div id="contactus">
				<center><strong>
						<h2>Get In Touch With Us</h2>
					</strong></center><br><br><br>
				<span class="fa-stack fa-1x" style="margin-left: 50px;"><i class="fa-solid fa-circle fa-stack-2x"
						style="color:white"></i><i class="fa-solid fa-phone fa-lg fa-stack-1x"></i></span> +65 8123
				4567<br><br><br>
				<span class="fa-stack fa-1x" style="margin-left: 50px;"><i class="fa-solid fa-circle fa-stack-2x"
						style="color:white"></i><i class="fa-solid fa-envelope fa-lg fa-stack-1x"></i></span>
				SliceMeUp@SliceMeUp.com<br><br><br>
				<span class="fa-stack fa-1x" style="margin-left: 50px;"><i class="fa-solid fa-circle fa-stack-2x"
						style="color:white"></i><i class="fa-solid fa-location-pin fa-lg fa-stack-1x"></i></span> John
				Street, Singapore<br><br><br>
				<span class="fa-stack fa-1x" style="margin-left: 50px;"><i class="fa-solid fa-circle fa-stack-2x"
						style="color:white"></i><i class="fa-solid fa-clock fa-lg fa-stack-1x"></i></span> 6.00am to
				11.00pm Daily<br><br><br>
			</div>
		</div>
		<div class="column">
			<div id="feedback">
				<center><strong>
						<h2>Tell Us About Your Experience</h2>
					</strong></center><br><br>
				<form action="feedbacksubmit.php" method="post" style="margin-left: 50px;">
					<label for="name"><strong>Name:</strong></label><br><input type="text" name="myname" size="25"
						required
						style="background-color:#F5F5F7; text-indent:8px; border-radius: 10px; border: white; height: 25px;"
						required><br><br>
					<label for="email"><strong>E-mail:</strong></label><br> <input type="email" name="myemail" size="25"
						required
						style="background-color:#F5F5F7; text-indent:8px; border-radius: 10px; border: white; height: 25px;"
						required><br><br>
					<label for="subject"><strong>Subject:</strong></label><br><input type="text" name="mysubject"
						size="25" required
						style="background-color:#F5F5F7; text-indent:8px; border-radius: 10px; border: white; height: 25px;"
						required><br><br>
					<label for="experience"><strong>Experience:</strong></label><br>
					<textarea name="mycomments" id="myComments" rows="4" cols="40" required
						style=" background-color:#F5F5F7; text-indent:8px; border-radius: 10px; border: white; max-height:150px; max-width: 300px;"
						required></textarea><br><br>
					<input type="submit" value="Submit"
						style="background-color:#4CAF50; border-radius: 10px; border: white; height: 40px; width: 70px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; font-family: 'Cinzel', serif;">
				</form>
			</div>
		</div>
	</div>


	<br><br>


	<footer>
		<div id="container">
			<div id="icons">
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