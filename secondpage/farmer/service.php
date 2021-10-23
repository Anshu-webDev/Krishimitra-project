<?php
    // $result = exec("C:\Users\amits\AppData\Local\Programs\Python\Python37\python python\crop-prediction\predict-crop.py");
    // echo $result;
    // echo "hello";

    session_start();  
    if(!isset($_SESSION["sess_user"])){  
          header("location:login.php");  
    } else { 


    if(isset($_POST["submit"])){
        $temp=$_POST['temp']; 
        $hum=$_POST['hum']; 
        $ph=$_POST['ph']; 
        $rain=$_POST['rain']; 
        
        $link = "http://127.0.0.1:5000/predict?temperature=" .$temp. "&humidity=" .$hum. "&ph=" .$ph. "&rain=" .$rain;
        $result = file_get_contents($link);
       // echo $result;

       
        // echo "<script>alert('you have to grow ".$result." crop. ')</script>";


      
    }
     

    // $result = shell_exec("python C:/xampp/htdocs/kris/secondpage/farmer/python/crop-prediction/predict-crop.py");
    // echo $result;
  
    // $command = escapeshellcmd('/usr/bin/python python/crop-prediction/predict-crop.py');
    // $output = shell_exec($command);
    // echo $output;

    // $command_exec = escapeshellcmd('C:\xampp\htdocs\kris\secondpage\farmer\python\crop-prediction\predict-crop.py');
    // $str_output = shell_exec($command_exec);
    // echo $str_output;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->

    <link rel="stylesheet" type="text/css" href="styleh.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
     <link rel="stylesheet" type="text/css" href="navstyle.css">

     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <link rel="stylesheet" type="text/css" href="styleu.css">


     <style type="text/css">
      a.nav-link {
            font-size: 20px;
            margin: 0 10px 0 10px;
        }	
        .footer{
          margin-top: 80px;
        }
        h1{
          font-family: oswald;
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
      <!-- <section class="home">
    </section> -->

    <div class="trans-lang" id="google_translate_element"></div>


    <center>
    <b><h1>Want to know which crop is to grow in your soil</h1>
    <p>So write the soil detail in given below textboxs </p></b>
    </center>

<div class="container">
<form method="post">
  <div class="form-group">
    <label >Temperature</label>
    <input name="temp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Temperature">
    
  </div>
  <div class="form-group">
    <label>Humidity</label>
    <input name="hum" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Humidity">
  </div>
  <div class="form-group">
    <label >PH value</label>
    <input name="ph" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter PH Value">
   
  </div>
  <div class="form-group">
    <label>rainfall</label>
    <input name="rain" type="text" class="form-control" id="exampleInputPassword1" placeholder="Rainfall">
  </div>

  <button name="submit" type="submit" class="d-flex justify-content-center align-center btn btn-primary">Submit</button>
</form>
</div>

        <?php
        if(isset($_POST["submit"])){
        echo  "<center><b><h1>you have to grow \"". $result ."\" crop. </h1></b></center>";
        }
        ?>

        <div class="container">
        <h1>Helpful Tips</h1>
        <p>
            1) To find the PH of soil use litmus paper and click on the link to see the video how to find the ph of soil 
            <a href="https://youtu.be/xIz2YPBXuZU">click here</a>
        </p>
        <p>
            2) To know the temperature the temperature, humidity and rainfall of your place you have to see the local newspaper heading.
        </p>
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