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

		$fileName=$_FILES['file']['name'];
		$fileTmpName=$_FILES['file']['tmp_name'];
		$fileSize=$_FILES['file']['size'];
		$fileError=$_FILES['file']['error'];
		$fileType=$_FILES['file']['type'];

		           //connect database
		    $conn = mysqli_connect("localhost:3307", "root", "", "examplevalid");

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
					$fileDestination= 'image/'.$fileName;
					move_uploaded_file($fileTmpName, $fileDestination);

					$sql="INSERT INTO loginu(fname,fadd,ftveg,fvname,fquan,fd,famt,fimg) VALUES('$fname','$fadd','$ftveg','$fvname','$fquan','$fd','f$amt','$fileName')";  

					$result=mysqli_query($conn, $sql);  
					if($result){

						echo "uploaded Successfully";
						echo "<script> alert('Details uploaded Successfully ');</script> ";

						header("location: infogiveupload.php");
					
					} else { 
						echo "failure"; 
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

 ?>