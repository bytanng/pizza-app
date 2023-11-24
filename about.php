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
		* {
			box-sizing: border-box;
		}

		/* Create two equal columns that floats next to each other */
		.column1 {
			float: left;
			width: 50%;
			padding: 30px;
			height: 540px;
			color:white;
			/* Should be removed. Only for demonstration */
		}

		.column2 {
			float: left;
			width: 50%;
			padding: 30px;
			height: 450px;
			color:white;
			/* Should be removed. Only for demonstration */
		}

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		#content{
			padding-top:30px;
		}

		.text {
			position: absolute;
			text-align: center;
			top:50%;
			padding-top: 30px;
			padding-bottom: 120px;
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

	<div class="slideshow-container">
        <div class="mySlides fade" style="margin-top:0px;">
            <img src="images/about/story.jpg" style="width:100%; height:50px; height:80%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="text"><h1>About Us</h1><h2></h2>
            </div>
        </div>
    </div>
	<div id="content">
		<div>
			<div class="row">
				<div class="column1" style="background-color:black; border-radius:10px;">
				<img src="images/about/about-image1.jpeg" alt="Your Image" style="max-width: 100%; height:auto; border-radius: 10px;">
				</div>
				<div class="column1" style="background-color:black; border-radius:10px;">
				<h2 style="color:red;">From Oven to Your Table: Our Story</h2>
				<p>Our story is a culinary voyage that begins with the aroma of a wood-fired oven and ends with the joy of sharing the perfect pizza at your table. 
				Originating from the breathtaking landscapes of Cinque Terre, our journey is a testament to our commitment to crafting the finest Italian pizzas, hand-picked ingredients, and the age-old traditions that give life to each slice. 
				From the moment our chefs knead the dough to the point it's garnished with the freshest produce, every step is a labor of love. Our wood-fired oven, like the heart of an Italian home, breathes life into each creation, infusing it with a distinctive smoky flavor that's impossible to resist.</p>
				<p>The result? Pizzas that transport you to the picturesque streets of Italy, where the simple pleasure of sharing good food is cherished. Our story is a tribute to authentic Italian pizza, and our mission is to deliver this timeless tradition to your table. As we serve you a slice of our history, 
				we invite you to savor the journey—from oven to your table—that makes SliceMeUp more than just a pizzeria; it's a celebration of the art and passion of authentic Italian cuisine.</p>
				</div>
			</div>
			<div class="row">
				<div class="column2" style="background-color:black; border-radius: 10px;">
					<h2 style="color:red;">Our Passion for Pizza</h2>
					<p>At SliceMeUp, our journey into the world of culinary delight began with a simple yet profound love for the art of crafting authentic Italian pizzas. Rooted in the heart of Italy's rich culinary heritage, we embarked on a mission to share the true essence of Italian flavors with the world.
						Our passion for pizza goes beyond the ordinary; it's a dedication to preserving tradition, savoring authenticity, and delivering a slice of Italy's finest to your plate.</p><p> Each pizza we create is a labor of love, handcrafted with the freshest ingredients and baked to perfection, honoring the centuries-old Italian culinary tradition.
						As you indulge in our pizzas, you'll taste the authenticity, the heritage, and the genuine Italian passion that we pour into every slice. Welcome to our journey, where pizza is more than a dish—it's a passion."</p>
				</div>
				<div class="column2" style="background-color:black; border-radius:10px;">
				<img src="images/about/about-image2.jpeg" alt="Your Image" style="max-width: 100%; height: auto; border-radius:10px;">
							</div>
			</div>
			<br><br>
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