<?php 
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "examplevalid";
	
	$conn = mysqli_connect($server, $username, $password, $dbname);
	
    session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else { 

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishimitra</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cartstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        document.getElementById('frmSearch').onsubmit = function () {
            window.location = 'http://www.google.com/search?q=site:http://pblproject.epizy.com ' + document.getElementById('txtSearch').value;
            return true;
        }
    </script>
</head>

<body>

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
                                    <!----> <input class="search" type="hidden" name="sitesearch" value="home.html" />
                            </div>

                            <div class="nav-right">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input type="submit" name="submition" value="Search">
                            </div>
                            <div class="nav-fill">
                                <input type="text" id="txtSearch" name="search_bar" maxlength="255" value=""
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

    <!-- Ending header section of home page-->

    
    <div class="trans-lang" id="google_translate_element"></div>


    <h1>Search page</h1>

    <div class="article-container">

        <div class="featured_product">

            <div class="small-container">

                <h2 class="title">Latest upload</h2>
                <div class="row">

                    <?php 
		if (isset($_POST['submition'])) {
			$searchWord = $_POST['search_bar'];
			echo $searchWord;
			$search = mysqli_real_escape_string($conn, $_POST['search_bar']);
			$sql = "SELECT * FROM updetail WHERE fname LIKE '%$search%' OR fvname LIKE '%$search%'";
			$result = mysqli_query($conn, $sql);
			$queryResult = mysqli_num_rows($result);

			echo "There are ".$queryResult." results!";

			if ($queryResult > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					
						echo "<div class='col-4'>";
                        echo "<img src='".$row['fimg']."'>";
                        echo "<h4><b>".$row['fvname']." by ".$row['fname']."</b></h4>";
                        echo "<p>MRP:Rs".$row['famt']."";
                        echo "&nbsp <input type='button' value='BUY' name='BUY' class='btn'></p>";
                    echo "</div>";

				}
			} else {
				echo "There are no results matching your search!";
			}
		}
	 ?>
                </div>
            </div>
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
            <p class="copyright">&copy Copyright 2020</p>
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