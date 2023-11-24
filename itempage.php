<?php
session_start();

if (isset($_POST['add_to_cart'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    // Check if the cart array exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Append the item to the cart array
    $_SESSION['cart'][] = array('name' => $name, 'quantity' => $quantity);
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
	<script>
		function showAlert() {
			alert("Item added to cart");
		}
	</script>
	<style>
		body{
			background-color:white;
		}
		#content{
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
		$name = $_GET['name'];
		$quantity = 1;
		$db = new mysqli('', '', '', '');

		if (mysqli_connect_errno()) {
			echo "Error: Could not connect to DB. Please try again later.";
			exit;
		}

		$query = "SELECT price, img_path, long_desc FROM products WHERE name='$name'";
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		$price = $row["price"];
		$long_desc = $row["long_desc"];
		$img_path = $row["img_path"];
		$descriptions = explode('|', $long_desc);

		echo '<div id="itempage" style="height:auto;">';
		echo '<div>';
		echo '<img id="image" src="' . $img_path . '" style="width: 400px; border: 1px solid black; margin-top: 20px; margin">';
		echo '</div>';
		echo '<div id="iteminfo">';
		echo '<h3><strong><span id="name">' . $name . '</span></strong></h3><br>';
		echo '<strong style="font-size: 12px">Includes:</strong>';
		echo '<strong><ul style="font-size: 12px">';
		foreach ($descriptions as $desc) {
			echo '<li>' . $desc . '</li><br>';
		}
		echo '</ul></strong>';
		echo '</div>';


		echo '<div id="itemlabel" style="margin-left:50px;">';
		echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
		echo 'Unit Price:<br><br>';

		echo 'Quantity:<br><br>';

		echo '</div>';
		echo '<form method="post">';
		echo '<input type="hidden" name="name" value= "'.$name.'">';
		echo '<div id="itemqty">';
		echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
		echo '<span id="price">$' . $price . '</span><br><br>';
		echo '<input type="number" style="width:35px;" id="quantity" name="quantity" min="1" max="50" value="' . $quantity . '">';
		echo '<br><br>';
		echo '<div>';
		echo '<button type="submit" name="add_to_cart" onclick="showAlert()" value="Add To Cart" style="background-color:#4CAF50; margin-left: 45px;border-radius: 10px; border: white; height: 40px; width: 150px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; font-family: \'Cinzel\', serif;">';
		echo 'Add To Cart</button>';
		echo '</div>';
		echo '</a>';
		echo '</div>';
		?>
	</div>
	<br><br>
	</div>

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
	</footer>

</body>

</html>