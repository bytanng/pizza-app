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

</head>
<style>
	#content {
		background-color: white;
		width: auto;
		height: 800px;
		background-image: url('images/login/italy5.jpg'); /* Replace 'path/to/your/image.jpg' with the actual path to your image */
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
	}

	body {
		background-color: white;
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

	#ordered {
		font-size: 14px;
		width: 66%;
		margin-bottom: 200px;
	}
</style>

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
		if (!isset($_SESSION['valid_user'])) {
			echo '<div class="text"><h1>Please <a href="/ie4717/Design%20Project/DP/login.php" style="color:red;">login</a> to view cart</h1>';
			echo '</div>';
		} 
		else if (!isset($_SESSION['cart'])){
			echo '<div class="text"><h1>Your Cart is Empty.</h1>';
			echo '</div>';
		}
		else {
			echo '<div id="cart">';
			echo '<center><strong><h2>My Cart</h2></strong></center><br><br>';
			echo '<div id="container">';
			echo '<div id="ordered">';
			echo '<hr>';
			echo '<table style="border-collapse: collapse; width: 100%">';

			$db = new mysqli('', '', '', '');
			$subtotal = 0;

			if (mysqli_connect_errno()) {
				echo "Error: Could not connect to DB. Please try again later.";
				exit;
			}

			if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
				foreach ($_SESSION['cart'] as $item) {
					$name = $item['name'];
					$quantity = $item['quantity'];

					$query = "SELECT price, short_desc, img_path FROM products WHERE name = '" . $name . "'";
					$result = $db->query($query);
					$row = $result->fetch_assoc();

					$img_path = $row['img_path'];
					$short_desc = $row['short_desc'];
					$price = $row['price'];
					$descriptions = explode('|', $short_desc);
					$itemtotal = $price * $quantity;
					$subtotal = $subtotal + $itemtotal;

					// You can use $short_desc, $price, etc. here as needed
					echo '<tr style="border-bottom: 1px solid grey;">';
					echo '<td><img src="' . $img_path . '"style="height:190px; border-radius:6px; width:190px; border: 1px solid black; margin:15px;"><br><br></td>';
					echo '<td style="vertical-align: top; padding-left: 20px; padding-top:20px;">';
					echo '' . $name . '<br><br>';
					echo 'Includes:';
					echo '<ul>';
					foreach ($descriptions as $desc) {
						echo '<li>' . $desc . '</li>';
					}
					echo '</ul>';
					echo '</td>';
					echo '<td style="vertical-align: top; padding-left: 20px; padding-top:20px;">';
					echo 'Each<br><br>';
					echo '$' . $price . '';
					echo '</td>';
					echo '<td style="vertical-align: top; padding-left: 20px; padding-top:20px;">';
					echo 'Quantity<br><br>';
					echo '<form action="update_quantity.php" method="post">';
					echo '<input type="hidden" name="item_name" value="' . $name . '">';
					echo '<input type="number" style="width:35px;" name="new_quantity" value="' . $quantity . '" min="1" max="10">';
					echo '<button type="submit" style="width:50px; margin-left:5px;">Update</button>';
					echo '</form>';
					echo '</td>';

					echo '<td style="vertical-align: top; padding-left: 20px; padding-top:20px;">';
					echo 'Total<br><br>';
					echo '$' . $itemtotal . '<br><br><br><br><br><br>';
					echo '<form action="remove_item.php" method="post">';
					echo '<input type="hidden" name="item_name" value="' . $name . '">';
					echo '<button type="submit" name="remove_item" style="background-color:red; width:30px; border-radius:5px; margin-top:15px;">';
					echo '<i class="fa-regular fa-trash-can"></i>'; //delete item
					echo'</button>';
					echo '</form>';
					echo '</td>';
					echo '</tr>';
				}
			}
			echo '</table>';
			echo '</div>';

			echo '<div id="totalcost">';
			echo '<table style="border-collapse: collapse; width: 100%;">';
			echo '<hr>';
			echo '<tr style="padding-top: 10px;">';
			echo '<td>';
			echo 'Subtotal';
			echo '</td>';
			echo '<td style="float:right;">';
			echo '$' . $subtotal . '';
			echo '</td>';
			echo '</tr>';
			echo '<tr style="border-bottom: 1px solid grey;">';
			echo '<td>';
			echo 'Delivery Fee';
			echo '</td>';
			echo '<td style="float:right;">';
			echo '$1.30';
			echo '</td>';
			echo '</tr>';
			echo '<tr style="border-bottom: 1px solid grey;">';
			echo '<td>';
			echo 'Total';
			echo '</td>';
			echo '<td style="float:right;">';
			$totalprice = $subtotal + 1.30;
			$_SESSION['total_amount'] = $totalprice;
			echo '$' . $totalprice . '';
			echo '</td>';
			echo '</tr>';
			echo '</table>';

			echo '<center>';
			echo '<a href="checkout.php">';
			echo '<div style="border-bottom: 1px solid grey; padding:10px;">';
			echo '<button type="submit" value="Secure Checkout" style="background-color:#4CAF50; border-radius: 10px; border: white; height: 40px; width: 130px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; font-family: \'Cinzel\', serif;">';
			echo 'Secure Checkout</button>';
			echo '</div>';
			echo '</a>';
			echo '</center>';
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';


		echo '<footer>';
		echo '<div id="container">';
		echo '<div style="width: 20%;">';
		echo '<a href="https://www.facebook.com/login.php" style="margin-right:5px;"><i class="fa-brands fa-facebook fa-lg"></i></a>';
		echo '<a href="https://www.instagram.com" style="margin-right:5px;"><i class="fa-brands fa-instagram fa-lg"></i></a>';
		echo '<a href="https://www.twitter.com"><i class="fa-brands fa-twitter fa-lg"></i></a>';
		echo '</div>';
		echo '<div style="width: 55%;">';
		echo 'Copyright @ SliceMeUp | All Rights Reserved.';
		echo '</div>';
		echo '<div style="width: 20%;">';
		echo '<a href="about.php">Our Story</a>|';
		echo '<a href="contact.php">Feedback</a>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</footer>';
		$db->close();
		?>
		<script defer src="quantity.js"></script>

</body>

</html>