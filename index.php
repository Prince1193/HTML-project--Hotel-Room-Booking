<!DOCTYPE html>
<html>
<head>
	<title>winstercastle</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style/ourservices.css">
	<link rel="stylesheet" type="text/css" href="style/aboutus.css">
	<link rel="stylesheet" type="text/css" href="style/roomstyle.css">
	<link rel="stylesheet" type="text/css" href="style/contact2style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style/footerstyle.css">
	 <!-- JavaScript to handle the pop-up dialog -->
	 <script>
        function openLoginDialog() {
            // Create a container for the dialog
            var dialogContainer = document.createElement("div");
            dialogContainer.className = "dialog-container";

            // Create a dialog box for admin login
            var adminLoginBox = document.createElement("div");
            adminLoginBox.className = "login-box";
            adminLoginBox.innerHTML = "<a href='admin/login.php'>Admin</a>";
            
            // Create a dialog box for user login
            var userLoginBox = document.createElement("div");
            userLoginBox.className = "login-box";
            userLoginBox.innerHTML = "<a href='user/login.php'>User</a>";

            // Append the dialog boxes to the container
            dialogContainer.appendChild(adminLoginBox);
            dialogContainer.appendChild(userLoginBox);

            // Append the container to the body
            document.body.appendChild(dialogContainer);

			 // Close the dialog when clicking outside of it
			 dialogContainer.addEventListener("click", function(event) {
                if (event.target === dialogContainer) {
                    dialogContainer.style.display = "none";
                }
            });
        }
		
    </script>
	<style>
		 /* CSS styles for the dialog container */
.dialog-container {
    position: fixed;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
	padding-top: 60px;
	padding-left: 70px;
    background-color: rgba(0, 0, 0, 0);
    z-index: 999;
    display: block;
    
}

/* CSS styles for the individual links */
.dialog-container a {
    color: white;
    text-decoration: none;
	float: right;
	padding-right: 25px;
}


/* Style for the dropdown content */
.dialog-container .dropdown-content {
    display: none;
    flex-direction: column;
    align-items: flex-start;
}

/* Show the dropdown content on hover */
.dialog-container:hover .dropdown-content {
    display: flex;
}

	</style>
	
</head>
<body>
	<header>
	<section id="home"></section>
	
		<div class="main">
			<div class="logo">
				<img src="img/logo.png">
			</div>
			<ul>
				<li class="active"><a href="#home">Home</a></li>
				<li><a href="#Rooms">Rooms</a></li>
				<li><a href="#Services">Services</a></li>
				<li><a href="gallery.html">Gallery</a></li>
				<li><a href="#contactus">Contact us</a></li>
				<li><a href="#" onclick="openLoginDialog()"><i class="fas fa-solid fa-user"></i></a></li>
			</ul>
		</div>

		<div class="title">
			<h1>Winster <span style="color:  darkorange;">Castle</span></h1>
		</div>
		<div class="button">
			<a href="#Rooms" class="btn">Explore</a>
			<a href="#Rooms" class="btn1">Book Now</a>
		</div>
	</header>
<!--About us-->
<section id="About Us"></section>
<a href="#" class="gototop"><i class="fas fa-arrow-up"></i></a>

	<div class="absection">
		<div class="abcontainer">
			<div class="abcontent-section">
				<div class="abtitle">
					<h1><span>About</span> <span style="color:  darkorange;">Us</span></h1>
				</div>
				<div class="abcontent">
					<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h3>
					<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<div class="abbutton">
						<a href="">Read More</a>
					</div>
				</div>
				<div class="absocial">
					<a href=""><i class="fab fa-facebook-f"></i></a>
					<a href=""><i class="fab fa-instagram"></i></a>
				</div>
			</div>
			<div class="abimage-section">
				<img src="img/hotel2.jpg">
			</div>
		</div>
	</div>
<!--Rooms-->
<section id="Rooms">

<div class="roomdisp">
	<h1>Our<span style="color:  darkorange;"> Rooms</span></h1>
	<h2>Explore our <span style="color:  darkorange;">ROOMS</span></h2>

<div class="rbox-container">
		<div class="rbox">
			<img src="img/img3.jpeg">
			<div class="content">
				<h3>Suited</h3>
				<i class="fas fa-bed fa-2x text-primary"> <p1>&ensp;3 beds &ensp;| &ensp;</p1><i class="fa fa-wifi fa-2x text-primary"> <p1>&ensp;wifi &ensp; |&ensp;  </p1><i class="fas fa-bath fa-2x text-primary"> <p1>&ensp;2 bath</p1></i></i></i>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="stars">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
				</div>
				<div class="price">$90.00 per day</div>
				<div class="rbtn">
				<a href="bookingmain.php" class="btn">Book Now</a>
			</div>
			</div>
		</div>
		<div class="rbox">
			<img src="img/img4.jpeg">
			<div class="content">
				<h3>Delux</h3>
				<i class="fas fa-bed fa-2x text-primary"> <p1>&ensp;3 beds&ensp;  |&ensp;  </p1><i class="fa fa-wifi fa-2x text-primary"> <p1>&ensp;wifi&ensp;  |&ensp;  </p1><i class="fas fa-bath fa-2x text-primary"> <p1>&ensp;2 bath&ensp;</p1></i></i></i>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="stars">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
				</div>
				<div class="price">$90.00 per day</div>
				<div class="rbtn">
				<a href="bookingmain.php" class="btn">Book Now</a>
			</div>
			</div>
		</div>
		<div class="rbox">
			<img src="img/img6.jpg">
			<div class="content">
				<h3>Premium</h3>
				<i class="fas fa-bed fa-2x text-primary"> <p1>&ensp;3 beds&ensp;| &ensp;</p1><i class="fa fa-wifi fa-2x text-primary"> <p1>&ensp;wifi &ensp; |&ensp;  </p1><i class="fas fa-bath fa-2x text-primary"> <p1>&ensp;2 bath&ensp;</p1></i></i></i>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="stars">
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
					<i class="fas fa-star"></i>
				</div>
				<div class="price">$90.00 per day</div>
				<div class="rbtn">
				<a href="bookingmain.php" class="btn">Book Now</a>
			</div>
			</div>
		</div>
		
	</div>
</div>
</section>
<!--Services-->
<section id="Services">
<div class="wrapper">
		<h1>Our <span style="color:  darkorange;">Facilities</span></h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		<div class="content-box">
			<div class="card">
				<i class="fas fa-hotel fa-2x text-primary"></i>
				<h2>Rooms & Appartments</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="card">
				<i class="fas fa-utensils fa-2x text-primary"></i>
				<h2>Food & Restaurent</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="card">
				<i class="fas fa-spa fa-2x text-primary"></i>
				<h2>Spa & Fitness</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="card">
				<i class="fas fa-swimmer fa-2x text-primary"></i>
				<h2>Sports & Gaming</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="card">
				<i class="fas fa-glass-cheers fa-2x text-primary"></i>
				<h2>Events & Party</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="card">
				<i class="fas fa-dumbbell fa-2x text-primary"></i>
				<h2>Gym and Yoga</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>
	</div>
</section>
<!--Contact us-->
<section id="contactus"></section>
<footer class="footer-distributed">

	<div class="footer-left">
		<h3>Winster<span>Castle</span></h3>

		<p class="footer-links">
			<a href="#home">Home</a>
			|
			<a href="#About Us">About</a>
			|
			<a href="bookingmain.php">Reservations</a>
			|
			<a href="gallery.html">Gallery</a>
		</p>

		<p class="footer-company-name">Copyright © 2023 <strong>WinsterCastle</strong> All rights reserved</p>
	</div>

	<div class="footer-center">
		<div>
			<a href="https://maps.app.goo.gl/ueK9WbnQv99ArxR29"><i class="fa fa-map-marker"></i></a>
			<p><span>Ramapuram</span>
				Kottayam</p>
		</div>

		<div>
			<i class="fa fa-phone"></i>
			<p>+91 74**9**258</p>
		</div>
		<div>
			<i class="fa fa-envelope"></i>
			<p><a href="winstercastle@gmail.com">winstercastle@gmail.com</a></p>
		</div>
	</div>
	<div class="footer-right">
		<p class="footer-company-about">
			<span>About the Hotel</span>
			<strong>Winster Castle</strong> is the perfect place for that that seek a luxurious place to stay and spend their quality time with their loved ones .
		</p>
		<div class="footer-icons">
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-instagram"></i></a>
			<a href="#"><i class="fa fa-linkedin"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-youtube"></i></a>
		</div>
		 
	</div>
</footer>

</body>

</html>