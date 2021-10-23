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
    <title>Krishimitra</title>
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

        <!--- language --->
        <!-- <img src="../images/language.png" width="50px", align="right"> -->
        
        <div class="trans-lang" id="google_translate_element"></div>



        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h1>India’s biggest Upcoming Online Supermarket</h1>
                    <p>
                        Did you ever imagine that the freshest of fruits and vegetables, top quality pulses and food
                        grains, dairy products and hundreds of branded items could be handpicked and delivered to your
                        home, all at the click of a button?
                    </p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="../images/image1.jpg">
                </div>
            </div>
        </div>
    </div>
    <!-- Ending header section of home page-->

    <!----- Featured Categories ------>
    <div class="categories">
        <div class="small-container">


            <div class="row">
                <div class="col-3">
                    <a href="products.php">
                        <img src="../images/green_vegetables.jpg">
                    </a>

                </div>
                <div class="col-3">
                    <a href="products.php">
                        <img src="../images/vegetables.png">
                    </a>
                </div>
                <div class="col-3">
                    <a href="products.php">
                        <img src="../images/fruits.png">
                    </a>

                </div>
            </div>
        </div>
    </div>
    <!----- Ending Featured Categories ------>







    <!----- Featured Products ------>
    <div class="featured_product">

        <div class="small-container">

            <h2 class="title">Latest upload</h2>
            <div class="row">
                <?php
         //     $conn = mysqli_connect("sql305.epizy.com", "epiz_27208880", "3BjT4HuIVP3n", "epiz_27208880_examplevalid");
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
                                    // echo "&nbsp <a href=''><input type='button' value='BUY' name='BUY' class='btn'></a></p>";
                                    echo "</p>";
                        echo "</div>";
            
                }
                $sqlf = "SELECT * from loging";
                $resultf = mysqli_query($conn,$sqlf);  
        ?>
            </div>

            <h2 class="title">Featured Products</h2>
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
            <h2 class="title">Today's best Products</h2>
            <div class="row">
                <div class="col-4">
                    <p>
                        <a href="productdetails.php">
                            <img src="../images/mango.png">
                        </a>
                    </p>
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
                    <a href="graphesdetails.php">
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
        </div>
    </div>

    <!-- Offer -->

    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <a href="productdetails.php"><img src="../images/mango.png" class="offer-img"></a>
                </div>
                <div class="col-2">
                    <p>Today's Exclusively Deals on Krishimitra</p>
                    <h1>Alphonso mango</h1>
                    <small>
                        The Alphonso is a seasonal fruit, available mid-April through the end of June.The fruits
                        generally weigh between 150 and 300 grams . They have a rich, creamy, tender texture and
                        delicate, non-fibrous, juicy pulp. The skin of a fully ripe Alphonso mango turns bright
                        golden-yellow with a tinge of red which spreads across the top of the fruit. The flesh of the
                        fruit is saffron-colored. These characteristics make Alphonso a favored cultivar.
                    </small>
                    <a href="productdetails.php" class="btn">View Product &#8594;</a>
                </div>
            </div>
        </div>
    </div>

    <!--  Feedback  -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores veniam ex ut, voluptatum illo
                        obcaecati commodi praesentium! Porro, quod sequi? Possimus dolore eveniet eaque omnis,
                        necessitatibus pariatur et beatae magnam.
                    </p>
                    <div class="rating1">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="../images/img2.jpg">
                    <h3>Dr. Sheetal Rathi</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores veniam ex ut, voluptatum illo
                        obcaecati commodi praesentium! Porro, quod sequi? Possimus dolore eveniet eaque omnis,
                        necessitatibus pariatur et beatae magnam.
                    </p>
                    <div class="rating1">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="../images/img1.jpg">
                    <h3>Dr. Deven Shah</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores veniam ex ut, voluptatum illo
                        obcaecati commodi praesentium! Porro, quod sequi? Possimus dolore eveniet eaque omnis,
                        necessitatibus pariatur et beatae magnam.
                    </p>
                    <div class="rating1">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="../images/img3.jpg">
                    <h3>Mrs. Vidyadhari R. Singh</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Feedback  -->

    <!------ Our Partners -->
    <div class="partners">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <img src="../images/tcetlogo.jpg">
                </div>
                <div class="col-5">
                    <img src="../images/tcetcomp.jpg">
                </div>
                <div class="col-5">
                    <img src="../images/bharat.png">
                </div>
            </div>
        </div>
    </div>
    <!------ End of Our Partners -->

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