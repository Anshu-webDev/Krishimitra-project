<?php   
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
    <title>Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cartstyle.css">
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
            <div>
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
    <!-- Ending header section of home page-->

    <div class="trans-lang" id="google_translate_element"></div>

    <div class="small-container">
        <div class="row row-2">
            <h2>All Products</h2>
            <select>
                <option>SHOP BY CATEGORY</option>
                <option>Fresh Vegetables</option>
                <option>Fresh Fruits</option>
                <option>Herbs & Seasonings</option>
                <option>Exotic Fruits & Veggies</option>
                <option>Organic Fruits & Vegetables</option>
                <option>Cuts & Sprouts</option>
            </select>
        </div>

        <h2 class="title">Latest upload</h2>
        <div class="row">
            <?php
            // $conn = mysqli_connect("sql305.epizy.com", "epiz_27208880", "3BjT4HuIVP3n", "epiz_27208880_examplevalid");
             $conn = mysqli_connect("localhost", "root", "", "examplevalid");
            //check connection
            if(!$conn){
                die("connection failed: " . mysqli_connect_error());
            }
            

            $sql = "SELECT * FROM updetail";
            $result = mysqli_query($conn, $sql);

            while ($row=  mysqli_fetch_array($result)) {
                
                
                    echo "<div class='col-4'>";
                        echo "<img src='".$row['fimg']."'>";
                        echo "<h4><b>".$row['fvname']." by ".$row['fname']." </b></h4>";
                        echo "<p>MRP:Rs".$row['famt']."";
                        // echo "&nbsp <a href='buy.php'><input type='button' value='BUY' name='BUY' class='btn'></a></p>";
                        echo "</p>";
                    echo "</div>";

            }
            $sqlf = "SELECT * from loging";
            $resultf = mysqli_query($conn,$sqlf);  
        ?>
        </div>

        <h2>Featured Products</h2>
        <div class="row">
            <div class="col-4">
                <a href="potatodetails.php">
                    <img src="../images/potato.png">
                </a>
                <h4><b>Potato</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>MRP:<del>Rs 50 </del>Rs 20</p>
            </div>
            <div class="col-4">
                <a href="oniondetails.php">
                    <img src="../images/onion1.png">
                </a>

                <h4><b>Onion</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>MRP:<del>Rs 80 </del>Rs 40</p>
            </div>
            <div class="col-4">
                <a href="tomatodetails.php">
                    <img src="../images/tomato2.png">
                </a>

                <h4><b>Tomato</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>MRP:<del>Rs 70 </del>Rs 30</p>
            </div>
            <div class="col-4">
                <a href="cauliflowerdetails.php">
                    <img src="../images/cauliflower.png">
                </a>
                <h4><b>Cauliflower</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>MRP:<del>Rs 50 </del>Rs 20</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <a href="productdetails.php">
                    <img src="../images/mango.png">
                </a>
                <h4><b>Mango</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>MRP:<del>Rs 500 </del>Rs 250</p>
            </div>
            <div class="col-4">
                <a href="bananadetails.php">
                    <img src="../images/banana.png">
                </a>

                <h4><b>Banana</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>MRP:<del>Rs 80 </del>Rs 50</p>
            </div>
            <div class="col-4">
                <a href="tomatodetails.php">
                    <img src="../images/tomato2.png">
                </a>

                <h4><b>Tomato</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>MRP:<del>Rs 70 </del>Rs 30</p>
            </div>
            <div class="col-4">
                <a href="spinachdetails.php">
                    <img src="../images/spinach.png">
                </a>

                <h4><b>Spinach</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>MRP:<del>Rs 50 </del>Rs 30</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <a href="potatodetails.php">
                    <img src="../images/potato.png">
                </a>
                <h4><b>Potato</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>MRP:<del>Rs 50 </del>Rs 20</p>
            </div>
            <div class="col-4">
                <a href="oniondetails.php">
                    <img src="../images/onion2.png">
                </a>

                <h4><b>Onion</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>MRP:<del>Rs 80 </del>Rs 40</p>
            </div>
            <div class="col-4">
                <a href="grapesdetails.php">
                    <img src="../images/grapes3.png">
                </a>

                <h4><b>Grapes</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>MRP:<del>Rs 100 </del>Rs 70</p>
            </div>
            <div class="col-4">
                <a href="kiwidetails.php">
                    <img src="../images/kiwi.png">
                </a>

                <h4><b>kiwi</b></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>MRP:<del>Rs 500 </del>Rs 200</p>
            </div>
        </div>
        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span> &#8594;</span>
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