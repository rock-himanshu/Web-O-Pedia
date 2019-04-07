<?php 
//include 'include/headsection.php';
//include 'include/navheader.php';
 include 'include/config.php';
 if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
  $user_details_query = mysqli_query($con, "SELECT * FROM social WHERE username='$userLoggedIn'");
  $user = mysqli_fetch_array($user_details_query);
}
else {
  header("Location: register.php");
}

error_reporting(0);
ini_set('display_errors', 0);
 ?>
 <?php 
$error_array=array();	
if (isset($_POST['Submit'])) {
   
	
    $first_Name=mysqli_real_escape_string($con,$_POST["First_Name"]);
     $_SESSION['First_Name']=$first_Name;
	 $second_Name=mysqli_real_escape_string($con,$_POST["Second_Name"]);
	  $_SESSION['Second_Name']=$second_Name;
	 $cityname=mysqli_real_escape_string($con,$_POST["City"]);
	  $_SESSION['City']=$cityname;
	 $contact=mysqli_real_escape_string($con,$_POST["Contact"]);
	 $_SESSION['Contact']=$contact;
	 $location=mysqli_real_escape_string($con,$_POST["Address"]);
	 $_SESSION['Address']=$location;
	 $valid_date=mysqli_real_escape_string($con,$_POST["Valid_date"]);
     $_SESSION['Valid_date']=$valid_date;
    date_default_timezone_set("Asia/kolkata");
    $currenttime1=time();
   $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
   // $datetime=strftime("%m-%d-%y",$currenttime1);
    $datetime;
    $image=$_FILES['Image']["name"];
    $Target="uploadedimg/".basename($_FILES["Image"]["name"]) ;
    

     $user_log_id=$user['id'];
  
   	   $query1="INSERT INTO visitor(datetime,firstname,secondname,city,address,contact,profile,register_id,valid_date)
   	    VALUES('$datetime','$first_Name','$second_Name','$cityname','$location','$contact','$image','$user_log_id','$valid_date')";
	move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
   	if (mysqli_query($con, $query1)) {
            echo "New record created successfully";
            $s_q="SELECT id from visitor where register_id='$user_log_id'";
            $execute=mysqli_query($con,$s_q);
            $datarows1=mysqli_fetch_array($execute);
                  $ID=$datarows1['id'];
            	header("Location: id_generated.php?reg_id={$user_log_id}");
   	
         }    
    else {
         echo "Error: " . $query1 . "<br>" . mysqli_error($con);
         header("Location: demo.php");
         }
   


}//end of the if submit*/
  ?>
<!DOCTYPE html>
<html>
<head>
	<style >
        
		body {
        height: 100%;

        margin: 0;
        }
.back_img {
    background-image: url("img/abstract.jpg");
	height: 100%; 

	background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.headClass{
	color: green;
	  font-family: Arial, Helvetica, sans-serif;
}

::-webkit-file-upload-button {
  background: light;
  color: green;
  border-radius: 5px;
}

	</style>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
	<title></title>
</head>
<body class="back_img">
<div class="container" style="background-color: #f9f9f9;width: 600px;border-radius: 10px;">

			<center><h1 class="headClass">Add Visitor</h1></center>
			
			<div >
				<center><form style="width: 350px;" action="addnewvisitor.php" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="form-group">
						<label for="First Name">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Enter First Name:</span></label>

						<input class="form-control" type="text" name="First_Name" id="First_Name" placeholder="Enter the Visitor First Name" value="<?php 
						if(isset($_SESSION['First_Name'])) {
							echo $_SESSION['First_Name'];
						} 
						?>" required>
					</div>
					<div class="form-group">
						<label for="Second_name">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Second Name:</span></label>

						<input class="form-control" type="text" name="Second_Name" id="Second_Name" placeholder="Enter the Visitor second Name" value="<?php 
						if(isset($_SESSION['Second_Name'])) {
							echo $_SESSION['Second_Name'];
						} 
						?>" required>
					</div>

					
					<div class="form-group">
						<label for="city">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">City:</span></label>

						<input class="form-control" type="text" name="City" id="city" placeholder=" Enter the city Name">
					</div>


					
                     <div class="form-group">
						<label for="contact">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">contact :</span></label>
                        <input class="form-control" type="text" name="Contact" id="contact" placeholder="Contact Number">
                     </div>     
                      <div class="form-group">
						<label for="SelectImage">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Select Images:</span></label>

						<input class="form-control" type="file" name="Image" id="image">
					</div>
                    
					
		  		  
					<div class="form-group">
						<label for="Address">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Address:</span></label>

						<textarea class="form-control"  name="Address" id="address" placeholder="Put your address here"></textarea>
					</div>

					<div class="form-group">
						<label for="Valid Date">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Valid Date:</span></label>

						<input class="form-control" type="date" name="Valid_date" id="Valid_date" placeholder="Enter the Visitor Valid Date" value="<?php 
						if(isset($_SESSION['Valid_date'])) {
							echo $_SESSION['Valid_date'];
						} 
						?>" required>
					</div>

						<br>
						<input style="float: left;" class="btn btn-success" type="submit" name="Submit" value="Add">
					</fieldset><br>
				</form>
				</center>
			</div></div><br><br>
             <div class="container table-responsive">
		  	<table class="table table-striped table-hover">
		  		<tr>
		  			<th>id</th>
		  			<th>Date</th>
		  			<th>Name</th>
		  			<td>City</td>
		  			<td>Contact</td>
		  			<th>Address</th>
		  			<th>image</th>
		  			<th>Action</th>
		  			
		  			
		  		</tr>
		  		<?php 
                global $ConnectingDB;
                $user_log_id=$user['id'];
                $viewquery="SELECT * FROM visitor WHERE register_id='$user_log_id' ORDER BY datetime desc";
               
                $execute=mysqli_query($con,$viewquery);
                $srno=1;
                while ($datarows=mysqli_fetch_array($execute)) {
                	$ID=$datarows['id'];
                	$DateTime=$datarows['datetime'];
                	$firstname=$datarows['firstname'];
                	$lastname=$datarows['secondname'];
                	$cityname=$datarows['city'];
                	$location=$datarows['address'];
                	$contact=$datarows['contact'];	
                	$image=$datarows['profile'];
                   
		  		 ?>
		  		 <tr>
		  		 	<td><?php echo $srno; ?></td>
		  		 	<td><?php echo $DateTime ?></td>
		  		 	<td><?php echo $firstname." ". $lastname?></td>

		  		 	<td><?php echo $cityname; ?></td>
	         <td><?php echo  $contact; ?></td>
  	  		 	<td><?php echo  $location; ?></td>
	
		  		 	<td><img src="uploadedimg/<?php echo  $image; ?>" style="width:4cm;height: 2cm;border-radius: 5px;" ></td>
		  		 	<td><a href="edit_visit.php?Edit=<?php echo $ID ;?>"><span class="btn btn-success">Edit</span> </a>
                 <a onclick="myFunction()" href="delete_visitor.php?delete=<?php echo $ID ;?>"  ><span class="btn btn-danger">Delete</span></a>
              <script>
              function myFunction() {
                  alert("You are sure to delete this visitor");
              }
              </script>
    		 	</td>
		  		 </tr>
		  		 <?php 
		  		  $srno++;
  }//end of the while loop
		  		  ?>
		  	</table>
		  </div>	
		 
		</div><!--end of the middle div-->
	</div><!--end of the row div-->
	
</div><!--end of the container fluid class -->
</body> 
</html>
