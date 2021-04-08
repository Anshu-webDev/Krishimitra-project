<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.php");  
} else {  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krishimitra</title>

   
    <link rel="stylesheet" type="text/css" href="styleh.css">
 <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    -->
     <link rel="stylesheet" type="text/css" href="navstyle.css">

     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <link rel="stylesheet" type="text/css" href="styleu.css">

         

     <style type="text/css">
      a.nav-link {
            font-size: 20px;
            margin: 0 10px 0 10px;
        }	

	</style>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>


</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="logo">
                <a href="#"><img class="logok" src="../images/logo.png"></a>
            </div>

             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainListDiv" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

            <div id="mainListDiv" class="collapse navbar-collapse main_list">
               <ul class="navbar-nav ml-auto navlinks">
                    <li class="nav-item"><a class="nav-link" href="famerhome.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="infogiveupload.php">Upload</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                   
                    <li class="nav-item usern"><a class="nav-link" href="" >Welcome,<?=$_SESSION['sess_user'];?></a>
                    	
                    	    <li class="logout"><a class="nav-link" href="logout.php">Logout</a></li>
                    	
                    </li>	
                    
                </ul>
            </div>
        <!--    <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>  -->
        </div>
    </nav>
    
      <section class="home">
    </section>

<!--freature products-->
<div id="google_translate_element"></div>

<!--modal chat-->

<button class="open-button" onclick="openForm()">Chat</button>


<div class="chat-popup" id="myForm">
  <form id="prospects_form" class="form-container" method="POST" >
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>
    
    <?php
    if(isset($_POST["submit"])){
        if(!empty($_POST['msg'])) { 
            $msg=$_POST['msg'];

            $conn = mysqli_connect("localhost", "root", "", "examplevalid");

            $search = mysqli_real_escape_string($conn, $_POST['msg']);
            $sql = "SELECT * FROM queandans WHERE ques LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            if ($queryResult > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					
						echo $row['ans'];

				}
			}

        }
        else{
            echo "Please fill out this elements";
        }

    }
    ?>


    <button type="submit" class="btn" name="submit">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>

$("#prospects_form").submit(function(e) {
    e.preventDefault();
});

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>



	  <div class="featured_product">

		    <div class="small-container">

                <h2 class="title"> My Latest upload</h2>
                <div class="row">
                    
        <?php
            //  $conn = mysqli_connect("sql305.epizy.com", "epiz_27208880", "3BjT4HuIVP3n", "epiz_27208880_examplevalid");
             $conn = mysqli_connect("localhost", "root", "", "examplevalid");
            //check connection
            if(!$conn){
                die("connection failed: " . mysqli_connect_error());
            }
            
            $sql = "SELECT * FROM updetail where fname='".$_SESSION['sess_user']."'";
            $result = mysqli_query($conn, $sql);

            while ($row=  mysqli_fetch_array($result)) {
                
            		echo "<div class='col-4'>";
                        echo "<img src='".$row['fimg']."'>";
                    //    echo "<img scr='image/".$row['fimg']."'>";
                    //    echo "<p>".$row['fimg']."</p>";
                        echo "<h4><b>".$row['fvname']."</b></h4>";
                        echo "<p>MRP:Rs".$row['famt']."</p>";
                    echo "</div>";

            }


        ?>
                    
                </div>
               
    </div>
</div>

<!-- Offer -->

    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-4">
                    <img src="../images/mango.png" class="offer-img">
                </div>
                <div class="col-4">
                    <p>Today's Exclusively Deals on Krishimitra</p>
                    <h1>Alphonso mango</h1>
                    <small>
                        The Alphonso is a seasonal fruit, available mid-April through the end of June.The fruits generally weigh between 150 and 300 grams . They have a rich, creamy, tender texture and delicate, non-fibrous, juicy pulp. The skin of a fully ripe Alphonso mango turns bright golden-yellow with a tinge of red which spreads across the top of the fruit. The flesh of the fruit is saffron-colored. These characteristics make Alphonso a favored cultivar.
                    </small>
                    <a href="" class="btn">Add To Cart &#8594;</a>
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores veniam ex ut, voluptatum illo obcaecati commodi praesentium! Porro, quod sequi? Possimus dolore eveniet eaque omnis, necessitatibus pariatur et beatae magnam.
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores veniam ex ut, voluptatum illo obcaecati commodi praesentium! Porro, quod sequi? Possimus dolore eveniet eaque omnis, necessitatibus pariatur et beatae magnam.
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores veniam ex ut, voluptatum illo obcaecati commodi praesentium! Porro, quod sequi? Possimus dolore eveniet eaque omnis, necessitatibus pariatur et beatae magnam.
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
                    <div class="col-3">
                        <img src="../images/tcetlogo.jpg" >
                    </div>
                    <div class="col-3">
                        <img src="../images/tcetcomp.jpg" >
                    </div>
                    <div class="col-3">
                        <img src="../images/bharat.png" >
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
                            <a href="home.html">
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
        function menutoggle(){
        if(Menuitems.style.maxHeight == "0px")
        {
            Menuitems.style.maxHeight = "200px";
        }
        else
        {
            Menuitems.style.maxHeight = "0px";
        }
        }

        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function()
        {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function()
        {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function()
        {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function()
        {
            ProductImg.src = SmallImg[3].src;
        }
    </script>

        <script src="main.js"></script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>


         <!-- Jquery needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>

    <!-- Function used to shrink nav bar removing paddings and adding black background -->
    <script>
        $(window).scroll(function () {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });

        $('.navTrigger').click(function () {
            $(this).toggleClass('active');
            console.log("Clicked menu");
            $("#mainListDiv").toggleClass("show_list");
            $("#mainListDiv").fadeIn();
        });

        var modal = document.getElementById('id01');
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


     

</body>
</html>
<?php
}
?>