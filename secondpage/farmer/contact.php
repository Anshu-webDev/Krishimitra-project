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
<title>Contact Form</title>
<!--link-stylesheet----------->
<link rel="stylesheet" href="style.css">
 <link rel="stylesheet" type="text/css" href="navstyle.css">
<!--using-fontAwesome------------>
<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <link rel="stylesheet" type="text/css" href="styleu.css">

<style>
    @charset "utf-8";
/* CSS Document */
body{
	margin:0px;
	padding: 0px;
	background-color: #FFFFFF;
}
a{
	text-decoration:none;
}
.header{
	margin-bottom: 20px;
}
.blank{
	height: 100vh;
}
.social a{
	padding: 20px;
	color:#7b7c7c;
	font-size:1.1rem;
}
#contact{
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translate(-500px,-170px);
	display: flex;
/*	align-items: center;  */
}
.social{
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	background-color: #FFFFFF;
	box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
}
.social a:hover{
	color:#000000;
	transition: all ease 0.3s;
}
.contact-box{
	background-color:#434445;
	display: flex;
	flex-direction: column;
	justify-content: center;
	padding: 30px 30px;
	box-shadow: 2px 0px 30px rgba(0,0,0,0.1);
}
.c-heading h1{
	font-family: Roboto;
	color: #e7eef3;
	font-size: 2.5rem;
	font-weight: lighter;
	margin: 0px;
	padding: 0px;
}
.c-heading p{
	font-family: Roboto;
	color:#cecece;
	font-size: 0.8rem;
	font-weight: lighter;
	margin: 0px;
	padding: 0px;
	text-align: center;
}
.c-inputs{
	margin: 15px 0px;
	display: flex;
	flex-direction: column;
	justify-content: center;
}
.c-inputs input{
	width:250px;
	height: 45px;
	background-color: transparent;
	border: none;
	border-bottom: 1px solid rgba(251,251,251,0.1);
	outline: none;
	margin: 10px 0px;
	padding: 10px;
	box-sizing: border-box;
	color: #f4f4f4;
	display: flex;
}
.c-inputs textarea{
	width:250px !important;
	height: 200px !important;
	outline: none;
	background-color: transparent;
	border:1px solid rgba(82,82,82,1);
	color: #f4f4f4;
	padding: 10px;
	font-size: 1.2rem;
	box-sizing: border-box;
}
.c-inputs button{
	width:200px;
	height: 40px;
	background-color: #FFFFFF;
	border: none;
	outline: none;
	margin-top: 20px;
	border-radius: 10px;
	box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
	letter-spacing: 1px;
}
.c-inputs input:focus{
	border-bottom: 1px solid rgba(252,252,252,1.00);
	transition: all ease 0.5s;
}
.c-inputs textarea:focus{
	border: none;
	border-bottom: 1px solid rgba(255,255,255,1.00);
	transition: all ease 0.5s;
	background-color: rgba(0,0,0,0.1);
}
.c-inputs button:active{
	transform: scale(1.02);
}
.map{
	filter: grayscale(0.2);
	box-shadow: 2px 2px 30px rgba(0,0,0,0.2);
	border: 2px solid #FFFFFF;
}
@media(max-width:1100px){
	.map{
		display: none;
	}
}
@media(max-width:450px){
	.social{
		display: none;
	}
	.contact-box{
		width: 100%;
		height: 100vh;
		box-sizing: border-box;
	}
	#contact{
		position: static;
		transform: translate(0,0);
		width:100%;
		height: 100vh;
		box-sizing: border-box;
	}
	.c-heading h1{
		font-size: 2.2rem;
	}
	
}

 a.nav-link {
            font-size: 20px;
            margin: 0 10px 0 10px;
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
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
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
	<input type="text" placeholder="Full Name"/>	
	<input type="email" placeholder="Example@gmail.com"/>
	<textarea name="message" placeholder="Write Message"></textarea>
	<!--sumbit-btn----------->
	<button>SEND</button>
	</form>
	</div>
		
	</div>
	<!--map------------------->
	<div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.75267547465!2d72.8723748143787!3d19.20600185286533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b0e57647569d%3A0xc0aec329c82d3555!2sThakur%20College%20of%20Engineering%20and%20Technology!5e0!3m2!1sen!2sin!4v1604218683576!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>
	</section>

	
</body>
</html>
<?php
}
?>