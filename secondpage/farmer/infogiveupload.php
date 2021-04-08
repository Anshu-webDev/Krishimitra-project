<?php   

	if (isset($_POST['submit'])) {
		# code...
		$fname=$_POST['fname'];  
		$fadd=$_POST['fadd']; 
		$ftveg=$_POST['ftveg'];
		$fvname=$_POST['fvname'];
		$fquan=$_POST['fquan']; 
		$fd=$_POST['fd']; 
		$famt=$_POST['famt'];

		$file=$_FILES['file'];

		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		           //connect database
		    // $conn = mysqli_connect("sql305.epizy.com", "epiz_27208880", "3BjT4HuIVP3n", "epiz_27208880_examplevalid");
			$conn = mysqli_connect("localhost", "root", "", "examplevalid");
		    //check connection
		    if(!$conn){
		        die("connection failed: " . mysqli_connect_error());
		    }
		    echo "connection Successfully! ";


		$fileExt= explode('.', $fileName);
		$fileActualExt= strtolower(end($fileExt));

		$allowed= array('jpeg','jpg','png','svc');

		if (in_array($fileActualExt, $allowed)) {
			# code...
			if ($fileError ===0) {
				# code...
				if ($fileSize <5000000) {
					# code...
					$fileDestination= '../image/'.$fileName;
					move_uploaded_file($fileTmpName, $fileDestination);

					$sql="INSERT INTO updetail(fname,fadd,ftveg,fvname,fquan,fd,famt,fimg) VALUES('$fname','$fadd','$ftveg','$fvname','$fquan','$fd','$famt','$fileDestination')";  

					$result=mysqli_query($conn, $sql);  
					if($result){

						echo "<script> alert('Details uploaded Successfully ');</script> ";

					
					} else { 
						
						echo "<script> alert('Failure!'); </script>";  
					}

				} else{

					echo "Your image is too big!";
				}
			} else{
				echo "There was an error uploading in image!";
			}
		} else{
			echo "You cannot ulpoad image of this type!";
		}

	}

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
	<title> upload vegatable</title>


	<link rel="stylesheet" type="text/css" href="navstyle.css">  
<!--	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">  -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  

	<link rel="stylesheet" type="text/css" href="styleu.css">

      

	<style type="text/css">
		/* form  */
		.container1{
			border: 10px solid #0278ae;  
			border-radius: 20px;
			width: 60%;
			padding: 20px;
			margin: auto;
		}

        ul.navbar-nav {
            margin-left: 90px;
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

	<div id="google_translate_element"></div>

	<div class="container1">
		
		
		<form method="POST" enctype="multipart/form-data">	    
				<div class="form-group">
					<label for="firstName">Your Name</label>
					<input type="text" class="form-control" id="firstName" name="fname" value="<?=$_SESSION['sess_user'];?>">
				</div>
				<div class="form-group">
					<label for="lastName">Address</label>
					<input type="text" class="form-control" id="fadd" name="fadd" value="<?=$_SESSION['sess_add'];?>" >
				</div>
				<div class="form-group">
					<label for="year" >Type</label>
						<br>
						<label for="fr" class="radio-inline"><input type="radio" name="ftveg" id="fr" value="FRUITS"> FRUITS</label>
						<label for="veg" class="radio-inline"><input type="radio" name="ftveg" id="ve" value="VEGETABLES"> VEGETABLES</label>
				</div>
			   <div class="form-group">
					<label for="vegname">Vegetable/Fruit Name</label>
					<input type="text" class="form-control" id="vegname" name="fvname" >
				</div>
				<div class="form-group">
					<label for="quan">Quantity</label>
					<input type="text" id="phnum" name="fquan" >
								<select name="fd">
									<option>KGs</option>
									<option>Dozens</option>
								</select>
				</div>
				<div class="form-group">
						<label for="amt">Amount</label>
						<input type="text" class="form-control" name="famt">
				</div>
				<div class="form-group">
						<input class="form-control" type="file" name="file">
				</div>
								
				<input type="submit" class="btn btn-primary" style="padding: 10px; font-size: 10px" name="submit" value="UPLOAD DETAIL"></a>
			</form>				
				<div class="panel-footer text-right">
							<small>&copy; tcetCOMP</small>
				</div>
	
	 
	
	</div>
				
	<script src="main.js"></script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
	</script>	

			
	  

	<!-- Jquery needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>

<!-- Function used to shrink nav bar removing paddings and adding black background -->

	<script>
	        $(window).scroll(function() {
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
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

</body>
</html>
<?php  
}  
?>  