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

		<div id="confirmation">
			<hr>
			<center style="font-family: Inter"><strong>Order Confirmed</strong></center>
			<hr>
			<br><br>
			<div style="display: flex">
				<table border="0" style="display: flex; width: 450px;font-family: Inter">
					<tr>
						<td style="vertical-align: top;">
							Order Number:
						</td>
						<td>
							#123456789
						</td>
					</tr>
					<tr>
						<td style="vertical-align: top;">
							Order Summary:
						</td>
						<td>
							1x Pizza<br>
							2x Drinks
						</td>
					</tr>
					<tr>
						<td style="vertical-align: top;">
							Order Address:
						</td>
						<td>
							Jonson Street 75 <br>
							Block 730 #09-09 <br>
							S690730, Singapore
						</td>
					</tr>
				</table>
				<img src="images/confirmation/thumbsup.jpg" style="width: 230px; display: flex; float:left;">
			</div>
			<div>
				<br>
				<br>
				<hr>
				<center style="font-family: Inter"><strong>Please check your email for delivery updates.</strong>
				</center>
				<hr>
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