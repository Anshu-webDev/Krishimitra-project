<?php
	if(isset($_POST["submit"])){  
		  
		if(!empty($_POST['umobile']) && !empty($_POST['psw'])) {  
		$fmobile=$_POST['umobile']; 
		$fpass=$_POST['psw'];
		           //connect database
		    // $conn = mysqli_connect("sql305.epizy.com", "epiz_27208880", "3BjT4HuIVP3n", "epiz_27208880_examplevalid");
			 $conn = mysqli_connect("localhost", "root", "", "examplevalid");
		    //check connection
		    if(!$conn){
		        die("connection failed: " . mysqli_connect_error());
		    }
		  //for farmer
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
					
				$query2="SELECT * FROM updetail";
				$check2= mysqli_query($conn, $query2);
				$numrows2=mysqli_num_rows($check2);  

				if($numrows2!=0){  
					while($row2=mysqli_fetch_assoc($check2))  
					{ 
						$dbfname2=$row2['fname'];
						$dbfadd=$row2['fadd']; 
					  	  
				 
			
					if($fmobile == $dbfmobile && $fpass == $dbfpass)  
			        {  
			            session_start();  
			            $_SESSION['sess_user']=$dbfname;  


						if($dbfname == $dbfname2){
							$_SESSION['sess_add'] = $dbfadd;
							
						}
			          
			            /* Redirect browser */  
			            header("location: ../secondpage/farmer/famerhome.php");  
			        }
				}
				}   

		    }
			


		         //for customer
		    $query="SELECT * FROM loginc WHERE cmobile='".$fmobile."' AND cpass='".$fpass."'";
		    $check= mysqli_query($conn, $query);  
		    $numrows=mysqli_num_rows($check);  
			if($numrows!=0){  

				while($row=mysqli_fetch_assoc($check))  
           		 {  
           			 $dbfmobile=$row['cmobile'];  
          		     $dbfpass=$row['cpass'];
          		     $dbfname=$row['cname'];  
           		 }  
					
					if($fmobile == $dbfmobile && $fpass == $dbfpass)  
			            {  
			            session_start();  
			            $_SESSION['sess_user']=$dbfname;  
			          
			            /* Redirect browser */  
			            header("location: ../secondpage/customer/home.php");  
			            }   

		         }
		         else{
		         	echo "<script> alert('invalid mobile no and password'); </script>";
		         }


		 	  } 
 	  else {  
		    echo "All fields are required!";  
		   }  
	}  

?>