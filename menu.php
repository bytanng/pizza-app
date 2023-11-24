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
		body{
			background-color:white;
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
	<div id="menucontent" style="padding-top: 50px;">

		<?php
		$db = new mysqli('', '', '', '');

		if (mysqli_connect_errno()) {
			echo "Error: Could not connect to DB. Please try again later.";
			exit;
		}
		//combo
		$query_combo = "SELECT name, price, img_path FROM products WHERE category = 'combo'";
		$result_combo = $db->query($query_combo);

		$num_combo_results = $result_combo->num_rows;
		echo '<div id="smallmenucontainer">';
		echo '<div style="padding-top: 30px;">';
		echo '<h2 style="color:white;">Combo Offers</h2>';
		echo '</div>';
		echo '<div id="menurow">';

		$combo_per_row = 3;
		$combo_count = 0;

		for ($i = 0; $i < $num_combo_results; $i++) {
			$row_combo = $result_combo->fetch_assoc();
			$combo_name = $row_combo["name"];
			$combo_price = $row_combo["price"];
			$combo_img_path = $row_combo["img_path"];

			echo '<div id="middleitem">';
			echo '<img id="menuimg" src="' . $combo_img_path . '">';
			echo '<br><br>';
			echo '<div id="itemdesc">';
			echo '<strong>' . $combo_name . '</strong><br>Price: $' . $combo_price . '';
			echo '</div>';
			echo '<br>';
			echo '<a href="itempage.php?name=' . urlencode($combo_name) . '">';
			echo '<div id="selectbutton">';
			echo 'Select';
			echo '</div>';
			echo '</a>';
			echo '</div>';

			$combo_count++;

			if ($combo_count % $combo_per_row == 0) {
				echo '</div>';
				echo '<div id="menurow">';
			}

		}
		echo '<span id="redirectpizza">';
		echo '</div>';
		echo '</div>';

		//pizza
		$query_pizza = "SELECT name, price, img_path FROM products WHERE category='pizza'";
		$result_pizza = $db->query($query_pizza);

		$num_pizza_results = $result_pizza->num_rows;
		echo '<div id="smallmenucontainer">';
		echo '<div style="padding-top: 30px;">';
		echo '<h2 style="color:white;">Ala-carte Pizza</h2>';
		echo '</div>';
		echo '<div id="menurow">';

		$pizza_per_row = 3;
		$pizza_count = 0;

		for ($i = 0; $i < $num_pizza_results; $i++) {
			$row_pizza = $result_pizza->fetch_assoc();
			$pizza_name = $row_pizza["name"];
			$pizza_price = $row_pizza["price"];
			$pizza_img_path = $row_pizza["img_path"];

			echo '<div id="middleitem">';
			echo '<img id="menuimg" src="' . $pizza_img_path . '">';
			echo '<br><br>';
			echo '<div id="itemdesc">';
			echo '<strong>' . $pizza_name . '</strong><br>Price: $' . $pizza_price . '';
			echo '</div>';
			echo '<br>';
			echo '<a href="itempage.php?name=' . urlencode($pizza_name) . '">';
			echo '<div id="selectbutton">';
			echo 'Select';
			echo '</div>';
			echo '</a>';
			echo '</div>';

			$pizza_count++;

			if ($pizza_count % $pizza_per_row == 0) {
				echo '</div>';
				echo '<div id="menurow">';
			}
		}
		echo '<span id="redirectsides">';
		echo '</div>';
		echo '</div>';


		//snacks
		$query_snacks = "SELECT name, price, img_path FROM products WHERE category = 'snacks'";
		$result_snacks = $db->query($query_snacks);

		$num_snacks_results = $result_snacks->num_rows;
		echo '<span id="redirectsides">';
		echo '<div id="smallmenucontainer">';
		echo '<div style="padding-top: 30px;">';
		echo '<h2 style="color:white;">Sides</h2>';
		echo '</div>';
		echo '<div id="menurow">';

		$snacks_count = 0;
		$snacks_per_row = 3;

		for ($i = 0; $i < $num_snacks_results; $i++) {
			$row_snack = $result_snacks->fetch_assoc();
			$snack_name = $row_snack["name"];
			$snack_price = $row_snack["price"];
			$snack_img_path = $row_snack["img_path"];

			echo '<div id="middleitem">';
			echo '<img id="menuimg" src="' . $snack_img_path . '">';
			echo '<br><br>';
			echo '<div id="itemdesc">';
			echo '<strong>' . $snack_name . '</strong><br>Price: $' . $snack_price . '';
			echo '</div>';
			echo '<br>';
			echo '<a href="itempage.php?name=' . urlencode($snack_name) . '">';
			echo '<div id="selectbutton">';
			echo 'Select';
			echo '</div>';
			echo '</a>';
			echo '</div>';

			$snacks_count++;

			if ($snacks_count % $snacks_per_row == 0) {
				echo '</div>';
				echo '<div id="menurow">';
			}

		}
		echo '<span id="redirectdrinks">';
		echo '</div>';
		echo '</div>';

		//drinks
		$query_drinks = "SELECT name, price, img_path FROM products WHERE category = 'drinks'";
		$result_drinks = $db->query($query_drinks);

		$num_drinks_results = $result_drinks->num_rows;

		echo '<span id="redirectdrinks">';
		echo '<div id="smallmenucontainer">';
		echo '<div style="padding-top: 30px;">';
		echo '<h2 style="color:white;">Drinks</h2>';
		echo '</div>';
		echo '<div id="menurow">';

		$drinks_count = 0;
		$drinks_per_row = 3;

		for ($i = 0; $i < $num_drinks_results; $i++) {
			$row_drinks = $result_drinks->fetch_assoc();
			$drinks_name = $row_drinks["name"];
			$drinks_price = $row_drinks["price"];
			$drinks_img_path = $row_drinks["img_path"];

			echo '<div id="middleitem">';
			echo '<img id="menuimg" src="' . $drinks_img_path . '">';
			echo '<br><br>';
			echo '<div id="itemdesc">';
			echo '<strong>' . $drinks_name . '</strong><br>Price: $' . $drinks_price . '';
			echo '</div>';
			echo '<br>';
			echo '<a href="itempage.php?name=' . urlencode($drinks_name) . '">';
			echo '<div id="selectbutton">';
			echo 'Select';
			echo '</div>';
			echo '</a>';
			echo '</div>';

			$drinks_count++;

			if ($drinks_count % $drinks_per_row == 0) {
				echo '</div>';
				echo '<div id="menurow">';
			}
		}
		echo '</div>';
		echo '</div>';
		echo '</div>';

		$db->close();
		?>

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
	<!--php-->

</body>

</html>