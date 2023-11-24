<?php
session_start();

$db = new mysqli('', '', '', '');

if (mysqli_connect_errno()) {
    echo "Error: Could not connect to DB. Please try again later.";
    exit;
}

$email = $_SESSION['valid_user'];


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
            background-color: white;
            width: auto;
            height: auto;
            margin-bottom:10px;
            
        }

        #orders {
            float: center;
            margin-left: auto;
            margin-right: auto;
            width: auto;
            padding: 30px;
            height: auto;
            background-color: white;
            vertical-align: center;
            text-align: center;
            border: #0e0c0c;
        }

        .widercell {
            width: 200px;
        }

        td,th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 6px;
            text-align: center;
        }
        
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
        <div id="orders">
            <h3>My Orders</h3><br><br>
            <table style="margin: 0 auto;">
                <tr>                    
                    <th>
                        <strong>Order id</strong>
                    </th>
                    <th class="widercell">
                        <strong>Order Items</strong>
                    </th>
                    <th class="widercell">
                        <strong>Delivery Address</strong>
                    </th>
                    <th>
                        <strong>Order Status</strong>
                    </th>
                </tr>
                <?php
                    //user_id
                    $query1 = "SELECT user_id FROM users WHERE email='" . $email . "'";
                    $result1 = $db->query($query1);
                    $row1 = $result1->fetch_assoc();
                    $userid = $row1['user_id'];

                    //order_id
                    $query2 = "SELECT order_id FROM orders WHERE user_id='".$userid."'";
                    $result2 = $db->query($query2);
                    $num_row2 = $result2->num_rows;

                    for($i=0; $i<$num_row2; $i++){
                        $row2 = $result2->fetch_assoc();
                        
                        //delivery address
                        $query3 = "SELECT delivery_address, order_status FROM orders WHERE order_id = '".$row2['order_id']."'";
                        $result3 = $db->query($query3);
                        $row3 = $result3->fetch_assoc();
                        $deliveryaddress = $row3['delivery_address'];
                        $orderstatus = $row3['order_status'];

                        $query4 = "SELECT name, quantity FROM order_details WHERE order_id = '".$row2['order_id']."'";
                        $result4 = $db->query($query4);
                        $num_row4 = $result4->num_rows;

                        echo'<tr>';
                            echo '<td>';
                                echo $row2['order_id'];
                            echo '</td>';
                            echo '<td>';
                                echo '<ul>';
                                    for($j=0; $j<$num_row4; $j++){
                                        $row4 = $result4->fetch_assoc();
                                        $itemname = $row4['name'];
                                        $itemquantity = $row4['quantity'];
                                        echo '<li>';
                                            echo $itemname . ' x ' . $itemquantity;
                                        echo '</li>';
                                    }
                                echo '</ul>';
                            echo '</td>';
                            echo '<td>';
                                echo $deliveryaddress;
                            echo '</td>';
                            echo '<td>';
                                echo $orderstatus;
                            echo '</td>';
                        echo'</tr>';
                    }
            
                    ?>

            </table>

        </div </div>
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