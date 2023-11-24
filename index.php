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
    .text {
    position: absolute;
    text-align: center;
    top:40%;
    padding-top:20px;
    margin-bottom: 210px;
    color: white;
    background-color: rgba(0, 0, 0, 0.5);
    font-family: 'Cinzel', serif;
    }

    h1{
        font-size: 60px;
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
        <div class="mySlides fade">
            <img src="images/index/1.jpeg"
                style="width:100%; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="text"><h1>SliceMeUp</h1><h2>Experience the authentic italian taste</h2>
            <a href="menu.php" class="buttonlink" onmouseover="this.style.color='white';"><h2 style="color:red;">View our selection</h2></a>
            </div>
        </div>
        <div class="mySlides fade">
            <img src="images/index/2.jpeg"
                style="width:100%; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            <div class="text">
            <h1>SliceMeUp</h1><h2>Experience the authentic italian taste</h2>
            <a href="menu.php" onmouseover="this.style.color='white';"><h2 style="color:red;">View our selection</h3></a>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="images/index/3.jpeg" style="width:100%;">
            <div class="text">
            <h1>SliceMeUp</h1><h2>Experience the authentic italian taste</h2>
            <a href="menu.php" onmouseover="this.style.color='white';"><h2 style="color:red;">View our selection</h3></a>
            </div>
        </div>
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <div>
    </div>
    <div style="display: flex; justify-content: center; margin-top: 20px; margin-bottom: 80px; ">
        <<img src="images/index/5.jpeg"
                style="height: 405px; margin-right: 10px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius:8px;"></a>
        <img src="images/index/4.jpeg"
                style="height: 405px; margin-left: 10px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius:8px;"></a>
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
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
</body>

</html>