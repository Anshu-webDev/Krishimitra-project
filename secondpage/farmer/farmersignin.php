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
		  background: url(../imgs/bg.jpg) no-repeat center center fixed; 
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
		
	</style>

</head>
<body>
	<?php  
	if(isset($_POST["submit"])){  
		  
		if(!empty($_POST['phone']) && !empty($_POST['password'])) {  
		$fmobile=$_POST['phone']; 
		$fpass=$_POST['password'];
		           //connect database
		    // $conn = mysqli_connect("sql305.epizy.com", "epiz_27208880", "3BjT4HuIVP3n", "epiz_27208880_examplevalid");
			$conn = mysqli_connect("localhost", "root", "", "examplevalid");
		    //check connection
		    if(!$conn){
		        die("connection failed: " . mysqli_connect_error());
		    }
		  
		    $query="SELECT * FROM loging WHERE fmobile='".$fmobile."' AND fpass='".$fpass."'";
		    $check= mysqli_query($conn, $query);  
		    $numrows=mysqli_num_rows($check);  
			if($numrows!=0){  

				while($row=mysqli_fetch_assoc($check))  
           		 {  
           			 $dbfmobile=$row['fmobile'];  
          		     $dbfpass=$row['fpass'];
          		     $dbfname=$row['fname'];  
           		 }  
					
					if($fmobile == $dbfmobile && $fpass == $dbfpass)  
			            {  
			            session_start();  
			            $_SESSION['sess_user']=$dbfname;  
			          
			            /* Redirect browser */  
			            header("location: famerhome.php");  
			            }   

		         } else {  
					echo "<script>alert('Incorrect mobile no. or password')</script>";  		
			          }   
		 	  } 
 	  else {  
		    echo "All fields are required!";  
		   }  
	}  
?> 
	<div class = "container" id="homePageContainer">
			<img src="../imgs/farava.jpeg" class="ava">
			
			<h1>Login Here</h1>	

			<form method="POST" id="signUpForm">
				<p>Seen here.</p>	
				

				<div class = "form-group">

					<input class="form-control" type="text" name="phone" value="+91" placeholder="Phone number">
				</div>
				
				<div class = "form-group">
				
					<input class="form-control" type="password" name="password" id = "password" placeholder="Password" required>
				</div>
				

				<div class = "form-group">
						<button type="submit" class="btn btn-success" name="submit">Login</button> 
				<!--	<input class="btn btn-success" type="submit" name="submit" value="Sign Up!" >   -->
				</div>
				<div class="form-group">
					<a href="farmersignup.php" style="text-decoration: none;"><p class="form-control">Don't have a account register here </p></a>
				</div>
			
			</form>
		</div>	



			 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  

</body>
</html>