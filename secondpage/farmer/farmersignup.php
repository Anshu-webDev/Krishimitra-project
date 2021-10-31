<!DOCTYPE html>
<html>
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<title>krishrimitra</title>

	<style type="text/css">
	
	.container{
		padding-top: 0px;
		text-align: center;
		width: 500px;		
	}

	#homePageContainer{
		margin-top: 30px;
	}
		html{ 
		  background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSYlJXgyp4MljDDv9mXcBfrtJIyu58vPMfq2Q&usqp=CAU) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		  font-family:erif;
		}
	
		.ava{
			width: 100px;
			height: 100px;
			border-radius: 50%;
		}
		body{
			background: none;
			color:#000;
		}
		.trans-lang {
			position: absolute;
			right: 0;
		}
		
	</style>

</head>
<body>
	<?php  
	if(isset($_POST["submit"])){  
		  
		if(!empty($_POST['name']) && !empty($_POST['phone'])) {  
		$name=$_POST['name'];  
		$mobile=$_POST['phone']; 
		$pass=$_POST['password'];
		$state=$_POST['state'];  

		           //connect database
			$conn = mysqli_connect("localhost", "root", "", "examplevalid");
			
		    //check connection
		    if(!$conn){
		        die("connection failed: " . mysqli_connect_error());
		    }
		  
		    $query="SELECT * FROM loging WHERE fmobile='".$mobile."'";
		    $check= mysqli_query($conn, $query);  
		    $numrows=mysqli_num_rows($check);  
			if($numrows==0){  
					$sql="INSERT INTO loging(fname,fstate,fmobile,fpass) VALUES('$name','$state','$mobile','$pass')";  
						
					$result=mysqli_query($conn, $sql);
				  
					if($result){  
					echo "Account Successfully Created";

				    session_start();  
				    $_SESSION['sess_user']=$name;  
				  
				header("location: famerhome.php");  
					} else {  
					echo "Failure!";  
					}  

		         } else {  
					echo "<script>alert('That mobile number already exists! Please try again with another.')</script>";  		
			          }   
		 	  } 
 	  else {  
		    echo "All fields are required!";  
		   }  
	}  
?> 

	<div class="trans-lang" id="google_translate_element"></div>


	<div class = "container" id="homePageContainer">
			<img src="../imgs/farava.jpeg" class="ava">
			
			<h1>Farmer Register</h1>	

			<form method="POST" id="signUpForm">
				<p>Interested? Sign up now.</p>	
				
				<div class = "form-group">
					<input class="form-control" type="text" name="name" id="name" placeholder="Enter Name">
				</div>				
				<!-- <div class="row"> -->
				<div class = "form-group " align="left">
					
					<select name="state" class="form-control ">
						<option>Select State</option>
						<option >Andhra Pradesh</option>
						<option> Arunachal Pradesh </option>
						<option>Assam</option>
						<option>Bihar</option>
						<option>Chhattisgarh</option>
						<option >Goa</option>
						<option>Gujarat</option>
						<option>Haryana</option>
						<option>Himachal Pradesh</option>
						<option>Jharkhand</option>
						<option>Karnataka</option>
						<option>Kerala</option>
						<option>Madhya Pradesh</option>
						<option>Maharashtra</option>
						<option>Manipur</option>
						<option>Meghalaya</option>
						<option>Mizoram</option>
						<option>Nagaland</option>
						<option>Odisha (Orissa)</option>
						<option>Punjab</option>
						<option>Rajasthan</option>
						<option>Sikkim</option>
						<option>Tamil Nadu</option>
						<option>Telangana</option>
						<option>Tripura</option>
						<option>Uttar Pradesh</option>
						<option>Uttarakhand</option>
						<option>West Bengal</option>
					</select>	
				</div>

				<div class = "form-group" align="left">
					
					<select name="district" class="form-control ">
						<option>select district</option>
						<option>banaras</option>
						<option>siwan</option>
						<option>patna</option>
						<option>lucknow</option>
					</select>	
				</div>
			<!-- </div> -->
	            <div class = "form-group">

					<input class="form-control" type="text" name="village"  placeholder="village Name">
				</div>

				<div class = "form-group">

					<input class="form-control" type="text" name="phone" value="+91" placeholder="Phone number">
				</div>
				
				<div class = "form-group">
				
					<input class="form-control" type="password" name="password" id = "password" placeholder="Password" required>
				</div>
				
				<div class = "form-group">
				
					<input class="form-control" type="password" name="password" id = "confirm_password" placeholder="confirm_password" required>
				</div>

				<div class = "form-group">
				
					<input class="btn btn-success" type="submit" name="submit" value="Sign Up!" >
				</div>
				<div class="form-group">
					<a href="farmersignin.php" style="text-decoration: none;"><p class="form-control">Already have an account Login here </p></a>
				</div>
			
			</form>
		</div>	

		<!-- google translate -->
		<script src="main.js"></script>

		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
		</script>


			 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  

</body>
</html>