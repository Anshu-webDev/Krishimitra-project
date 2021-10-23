<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Checkout</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style11.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="cartstyle.css" media="screen" type="text/css" />
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
					<a href="home.html">
						<img src="../images/logo.png" width="125px">
					</a>
				</p>
			</div>
			<!--Search bar-->
			<div class="search-box">
				<div class="nav-fill">
					<div id="nav-search">
						<form  method="POST" action="search.php">
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

	<div class="trans-lang" id="google_translate_element"></div>

	<div id="site">
		<header id="masthead">
		</header>
		<div id="content">
			<h1>Checkout</h1>
			<table id="checkout-cart" class="shopping-cart">
				<thead>
					<tr>
						<th scope="col">Products</th>
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

			<form action="order.php" method="post" id="checkout-order-form">
				<h2>Your Details</h2>

				<fieldset id="fieldset-billing">
					<legend>Billing</legend>
					<div>
						<label for="name">Name</label>
						<input type="text" name="name" id="name" data-type="string"
							data-message="This field cannot be empty" />
					</div>
					<div>
						<label for="email">Email</label>
						<input type="text" name="email" id="email" data-type="expression"
							data-message="Not a valid email address" />
					</div>
					<div>
						<label for="city">City</label>
						<input type="text" name="city" id="city" data-type="string"
							data-message="This field cannot be empty" />
					</div>
					<div>
						<label for="address">Address</label>
						<input type="text" name="address" id="address" data-type="string"
							data-message="This field cannot be empty" />
					</div>
					<div>
						<label for="zip">ZIP Code</label>
						<input type="text" name="zip" id="zip" data-type="string"
							data-message="This field cannot be empty" />
					</div>
					<div>
						<label for="country">Country</label>
						<select name="country" id="country" data-type="string"
							data-message="This field cannot be empty">
							<option value="">Select</option>
							<option value="IN">India</option>
						</select>
					</div>
				</fieldset>

				<div id="shipping-same">Same as Billing <input type="checkbox" id="same-as-billing" value="" /></div>

				<fieldset id="fieldset-shipping">

					<legend>Shipping</legend>

					<div>
						<label for="sname">Name</label>
						<input type="text" name="sname" id="sname" data-type="string"
							data-message="This field cannot be empty" />
					</div>
					<div>
						<label for="semail">Email</label>
						<input type="text" name="semail" id="semail" data-type="expression"
							data-message="Not a valid email address" />
					</div>
					<div>
						<label for="scity">City</label>
						<input type="text" name="scity" id="scity" data-type="string"
							data-message="This field cannot be empty" />
					</div>
					<div>
						<label for="saddress">Address</label>
						<input type="text" name="saddress" id="saddress" data-type="string"
							data-message="This field cannot be empty" />
					</div>
					<div>
						<label for="szip">ZIP Code</label>
						<input type="text" name="szip" id="szip" data-type="string"
							data-message="This field cannot be empty" />
					</div>
					<div>
						<label for="scountry">Country</label>
						<select name="scountry" id="scountry" data-type="string"
							data-message="This field cannot be empty">
							<option value="">Select</option>
							<option value="IN">India</option>
						</select>
					</div>
				</fieldset>

				<p><input type="submit" id="Confirm-order" value="Confirm" class="btn" /></p>

			</form>
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