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
	<style>
		#information{
			margin-left:420px;
			margin-top:100px;
		}

		body{
			background-color: white;
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
                }
				else {
                    echo '<a href="signup.php">Sign up</a>';
                    echo '<a href="login.php">Login</a>';
                }
                ?>
            </div>
        </div>
    </header>
	<div id="content">
		<div id="checkout">
			<div id="information">
				<form action="order_confirm.php" method="post" style="margin-left: 40px; display:flex;">
					<div>
						<span class="fa-stack fa-1x"><i class="fa-solid fa-circle fa-stack-2x"
								style="color: #d9d9d9"></i><i class="fa-solid fa-1 fa-lg fa-stack-1x"
								style="color: black"></i></span>
						<strong>Basic Information</strong><br><br>
						<input type="text" name="firstName" placeholder="First Name" size="12"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height: 25px; margin-left: 45px;" required>
						<input type="text" name="lastName" placeholder="Last Name" size="12"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height: 25px;" required><br><br>
						<input type="email" name="email" placeholder="Email Address" size="25"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height: 25px; margin-left: 45px;" required><br><br>
						<input type="text" name="phone" placeholder="Phone Number" size="25"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height: 25px; margin-left: 45px;" required><br><br><br><br>
						<span class="fa-stack fa-1x"><i class="fa-solid fa-circle fa-stack-2x"
								style="color: #d9d9d9"></i><i class="fa-solid fa-2 fa-lg fa-stack-1x"
								style="color: black"></i></span>
						<strong>Delivery Address</strong><br><br>
						<input type="text" name="street" placeholder="Street" size="25"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height:25px; margin-left: 45px;" required><br><br>
						<input type="text" name="block" placeholder="Block" size="12"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height:25px; margin-left: 45px;" required>
						<input type="text" name="unit" placeholder="Unit Number" size="12"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height:25px;" required><br><br>
						<input type="text" name="postalcode" placeholder="Postal Code" size="12"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height:25px; margin-left: 45px;" required><br><br>
					</div>
					<div style="margin-left: 100px;">
						<span class="fa-stack fa-1x"><i class="fa-solid fa-circle fa-stack-2x"
								style="color: #d9d9d9"></i><i class="fa-solid fa-3 fa-lg fa-stack-1x"
								style="color: black"></i></span>
						<strong>Payment Information</strong><br><br>
						<input type="text" name="cardName" placeholder="Name on Credit Card" size="25"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height:25px; margin-left: 45px;" required><br><br>
						<input type="text" name="cardNumber" placeholder="Credit Card Number" size="25"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height:25px; margin-left: 45px;" required><br><br>
						<select class="form-select" id="month" name="month"
							style="background-color:#F5F5F7; margin-left: 45px; border-radius: 10px; border: white; height:25px;" required>
							<option value="">Expiry Month</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<select class="form-select" id="year" name="year"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height:25px;" required>
							<option value="">Expiry Year</option>
							<option value="01">2023</option>
							<option value="02">2024</option>
							<option value="03">2025</option>
							<option value="04">2026</option>
							<option value="05">2027</option>
							<option value="06">2028</option>
							<option value="07">2029</option>
							<option value="08">2030</option>
							<option value="09">2031</option>
							<option value="10">2032</option>
							<option value="11">2033</option>
							<option value="12">2034</option>
							<option value="13">2035</option>
							<option value="14">2036</option>
							<option value="15">2037</option>
							<option value="16">2038</option>
							<option value="17">2039</option>
							<option value="18">2040</option>
						</select>
						<br><br>
						<input type="text" name="cardCCV" placeholder="CCV" size="12"
							style="background-color:#F5F5F7; border-radius: 10px; border: white; height:25px; margin-left: 45px;" required><br><br>
						<br><br>
						<a href="confirmation.php">
							<input type="submit" value="Place Order"
							style="background-color:#4CAF50; margin-left: 45px;border-radius: 10px; border: white; height: 40px; width: 150px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; font-family: 'Cinzel', serif;" required>
						</a>
					</div>
				</form>
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