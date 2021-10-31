<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  
?>

<!DOCTYPE html>
<html>

<head>
	<title>Your Order</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="cartstyle.css">
	<link rel="stylesheet" href="style11.css" media="screen" type="text/css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script type="text/javascript" src="jquery1.store.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		document.getElementById('frmSearch').onsubmit = function () {
			window.location = 'http://www.google.com/search?q=site:http://pblproject.epizy.com ' + document.getElementById('txtSearch').value;
			return true;
		}
	</script>
</head>

<body id="checkout-page">

	<!-- Creating header section of home page-->

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
						<form method="POST" action="search.php">
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
								<form id="frmSearch" class="search" method="get" action="home.html">
									<input class="search" type="hidden" name="sitesearch" value="home.html" />
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

	<div class="trans-lang" id="google_translate_element"></div>

	<div id="site">
		<header id="masthead">
		</header>
		<div id="content">
			<h1>Your Order</h1>
			<table id="checkout-cart" class="shopping-cart">
				<thead>
					<tr>
						<th scope="col">Item</th>
						<th scope="col">Qty</th>
						<th scope="col">Price</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
			<div id="pricing">

				<p id="shipping">
					<strong>Shipping</strong>: <span id="sshipping"></span>
				</p>

				<p id="sub-total">
					<strong>Total</strong>: <span id="stotal"></span>
				</p>
			</div>

			<div id="user-details">
				<h2>Your Data</h2>
				<div id="user-details-content"></div>
			</div>




			<!-- <form action="" method="post"> -->
				<input type="hidden" name="cmd" value="_cart" />
				<input type="hidden" name="upload" value="1" />
				<input type="hidden" name="business" value="" />

				<input type="hidden" name="currency_code" value="" />
				<!-- <input type="submit" id="paypal-btn" class="btn" value="Pay with PayPal" /> -->
				<a href="https://rzp.io/l/ooqHjM7"><button class="btn">Pay with PayPal</button></a>
			<!-- </form> -->


		</div>



	</div>


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

	<!-- to click photo and display-->
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