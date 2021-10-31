<?php
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else { 
?>
<!--doctype html-->
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact </title>
	<!--link-stylesheet----------->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="cartstyle.css">
	<!--using-fontAwesome------------>
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Newly added-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery1.store.js"></script>
	<!-- Newly added-->
	<script type="text/javascript">
		document.getElementById('frmSearch').onsubmit = function () {
			window.location = 'http://www.google.com/search?q=site:http://pblproject.epizy.com ' + document.getElementById('txtSearch').value;
			return true;
		}
	</script>
	<style>
		@charset "utf-8";

		/* CSS Document */
		body {
			margin-top: 50%;
			margin: 0px;
			padding: 0px;
			background-color: #FFFFFF;
		}

		a {
			text-decoration: none;
		}

		.blank {
			height: 100vh;
			margin-top: 80px;
		}

		.social a {
			padding: 20px;
			color: #7b7c7c;
			font-size: 1.1rem;
		}

		#contact {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-500px, -170px);
			display: flex;
			margin-top: 80px;
			/*	align-items: center;  */
		}

		.social {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			background-color: #FFFFFF;
			box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.1);
		}

		.social a:hover {
			color: #000000;
			transition: all ease 0.3s;
		}

		.contact-box {
			background-color: #434445;
			display: flex;
			flex-direction: column;
			justify-content: center;
			padding: 30px 30px;
			box-shadow: 2px 0px 30px rgba(0, 0, 0, 0.1);
		}

		.c-heading h1 {
			font-family: Roboto;
			color: #e7eef3;
			font-size: 2.5rem;
			font-weight: lighter;
			margin: 0px;
			padding: 0px;
		}

		.c-heading p {
			font-family: Roboto;
			color: #cecece;
			font-size: 0.8rem;
			font-weight: lighter;
			margin: 0px;
			padding: 0px;
			text-align: center;
		}

		.c-inputs {
			margin: 15px 0px;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		.c-inputs input {
			width: 250px;
			height: 45px;
			background-color: transparent;
			border: none;
			border-bottom: 1px solid rgba(251, 251, 251, 0.1);
			outline: none;
			margin: 10px 0px;
			padding: 10px;
			box-sizing: border-box;
			color: #f4f4f4;
			display: flex;
		}

		.c-inputs textarea {
			width: 250px !important;
			height: 200px !important;
			outline: none;
			background-color: transparent;
			border: 1px solid rgba(82, 82, 82, 1);
			color: #f4f4f4;
			padding: 10px;
			font-size: 1.2rem;
			box-sizing: border-box;
		}

		.c-inputs button {
			width: 200px;
			height: 40px;
			background-color: #FFFFFF;
			border: none;
			outline: none;
			margin-top: 20px;
			border-radius: 10px;
			box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.1);
			letter-spacing: 1px;
		}

		.c-inputs input:focus {
			border-bottom: 1px solid rgba(252, 252, 252, 1.00);
			transition: all ease 0.5s;
		}

		.c-inputs textarea:focus {
			border: none;
			border-bottom: 1px solid rgba(255, 255, 255, 1.00);
			transition: all ease 0.5s;
			background-color: rgba(0, 0, 0, 0.1);
		}

		.c-inputs button:active {
			transform: scale(1.02);
		}

		.map {
			filter: grayscale(0.2);
			box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.2);
			border: 2px solid #FFFFFF;
		}

		@media(max-width:1100px) {
			.map {
				display: none;
			}
		}

		@media(max-width:450px) {
			.social {
				display: none;
			}

			.contact-box {
				width: 100%;
				height: 100vh;
				box-sizing: border-box;
			}

			#contact {
				position: static;
				transform: translate(0, 0);
				width: 100%;
				height: 100vh;
				box-sizing: border-box;
			}

			.c-heading h1 {
				font-size: 2.2rem;
			}

		}
	</style>
</head>

<body>

	<div class="header">

		<div class="navbar">
			<div class="logo">
				<p>
					<a href="home.php">
						<img src="../images/logo.png" width="125px">
					</a>
				</p>
			</div>
			<!--Search bar-->
			<div class="search-box">
				<div class="nav-fill">
					<div id="nav-search">
						<form>
							<div class="nav-left">
								<span class="nav-search-label">All</span>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
								<select id="nav-search-select">
									<option selected="selected" value="aps">All Categories</option>
									<option value="Vegetables">Vegetables</option>
									<option value="Fruits">Fruits</option>
									<option value="Herbs & Seasonings">Herbs & Seasoningss</option>
									<option value="Exotic Fruits & Veggies">Exotic Fruits & Veggies</option>
									<option value="Organic Fruits & Vegetables">Organic Fruits & Vegetables</option>
									<option value="Cuts & Sprouts">Cuts & Sprouts</option>
								</select>
								<!---->
								<form id="frmSearch" class="search" method="get" action="home.html">
									<!----> <input class="search" type="hidden" name="sitesearch" value="home.html" />
							</div>
							<div class="nav-right">
								<i class="fa fa-search" aria-hidden="true"></i>
								<!----> <input type="submit" name="submition" value="Search">
							</div>
							<div class="nav-fill">
								<!----> <input type="text" id="txtSearch" name="search_bar" maxlength="255" value=""
									autocomplete="on">
							</div>
						</form>
					</div>
				</div>
			</div>
			<nav>
				<ul id="Menuitems">
					<li><a href="home.php">Home</a></li>
					<li><a href="products.php">Products</a></li>
					<li><a href="">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li onclick="myFunction()" style="color:white;" class="usern">Welcome,
						<?=$_SESSION['sess_user'];?>!
						<ul>
							<!--   <li><a href="">Profile</a></li>  -->
							<li id="myDIV" style="display:none" class="logout"><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</nav>

			<script>
				function myFunction() {
					var x = document.getElementById("myDIV");
					if (x.style.display === "none") {
						x.style.display = "block";
					} else {
						x.style.display = "none";
					}
				}
			</script>
			<p>
			<div class="Mydiv">
				<a href="cart.php">
					<img src="../images/cart.png" width="50px" height="50px">
				</a>
			</div>
			<div class="hide">
				<span>0</span>
			</div>
			</p>
			<img src="../images/menu.png" class="menu-icon" onclick="menutoggle()">

		</div>
	</div>
	<!-- Ending header section of home page-->
	<!-- Ending header section of home page-->
	<section class="blank"></section>

	<div class="trans-lang" id="google_translate_element"></div>


	<!--contact-form-container------------------->
	<section id="contact">
		<!--socail----------->
		<div class="social">
			<!--icons--------->
			<a href="#"><i class="fab fa-facebook-f"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>

		</div>
		<!--contact-box------------->
		<div class="contact-box">
			<!--heading---------->
			<div class="c-heading">
				<h1>Get In Touch</h1>
				<p>Call Or Email Us Regarding Question Or Issues</p>
			</div>
			<!--inputs------------------>
			<div class="c-inputs">
				<form>
					<input type="text" placeholder="Full Name" />
					<input type="email" placeholder="Example@gmail.com" />
					<textarea name="message" placeholder="Write Message"></textarea>
					<!--sumbit-btn----------->
					<button>SEND</button>
				</form>
			</div>

		</div>
		<!--map------------------->
		<div class="map">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.75267547465!2d72.8723748143787!3d19.20600185286533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b0e57647569d%3A0xc0aec329c82d3555!2sThakur%20College%20of%20Engineering%20and%20Technology!5e0!3m2!1sen!2sin!4v1604218683576!5m2!1sen!2sin"
				width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
				tabindex="0"></iframe>
		</div>
	</section>


	<!-- Footers-->

	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col-1">
					<h3>Download Our App</h3>
					<p>Download App For Android and ios mobile phone</p>
					<div class="app-logo">
						<img src="../images/play-store.png">
						<img src="../images/app-store.png">
					</div>

				</div>
				<div class="footer-col-2">
					<p>
						<a href="home.php">
							<img src="../images/logo.png" alt="">
						</a>
					</p>
					<p>Our Purpose is to sustainably make the pleasure and benefits of glossary to the many.</p>
				</div>
				<div class="footer-col-3">
					<h3>Useful Links</h3>
					<ul>
						<li>Discount Offer</li>
						<li>Blog Post</li>
						<li>Return Policy</li>
						<li>Join Affiliate</li>
					</ul>
				</div>
				<div class="footer-col-4">
					<h3>Follow us</h3>
					<ul>
						<li>Facebook</li>
						<li>Instagram</li>
						<li>Youtube</li>
						<li>Twitter</li>
					</ul>
				</div>
			</div>
			<hr>
			<p class="copyright">Copyright 2020</p>
		</div>
	</div>

	<script>
		var Menuitems = document.getElementById("Menuitems");

		Menuitems.style.maxHeight = "0px";
		function menutoggle() {
			if (Menuitems.style.maxHeight == "0px") {
				Menuitems.style.maxHeight = "200px";
			}
			else {
				Menuitems.style.maxHeight = "0px";
			}
		}

		var ProductImg = document.getElementById("ProductImg");
		var SmallImg = document.getElementsByClassName("small-img");

		SmallImg[0].onclick = function () {
			ProductImg.src = SmallImg[0].src;
		}
		SmallImg[1].onclick = function () {
			ProductImg.src = SmallImg[1].src;
		}
		SmallImg[2].onclick = function () {
			ProductImg.src = SmallImg[2].src;
		}
		SmallImg[3].onclick = function () {
			ProductImg.src = SmallImg[3].src;
		}
	</script>

	<script src="main.js"></script>

	
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>




</body>

</html>
<?php
}
?>