<?php 
$getid=$_GET['Edit'];
include 'include/navheader.php';
 ?></ul></div></div></nav>
 <?php 
$error_array=array();	
if (isset($_POST['Submit'])) {
   
	
    $first_Name=mysqli_real_escape_string($con,$_POST["First_Name"]);
     $_SESSION['First_Name']=$first_Name;
	
	 $second_Name=mysqli_real_escape_string($con,$_POST["Second_Name"]);
	  $_SESSION['Second_Name']=$second_Name;
	
   $Contact=mysqli_real_escape_string($con,$_POST["Contact"]);
	$_SESSION['Contact']=$Contact;
	echo $Contact;
	$Address=mysqli_real_escape_string($con,$_POST["Address"]);
	$_SESSION['Address']=$Address;

	$City=mysqli_real_escape_string($con,$_POST["City"]);
	$_SESSION['City']=$City;
	$Valid_Date=mysqli_real_escape_string($con,$_POST["Valid_date"]);
	$_SESSION['Valid_date']=$Valid_Date;
    
     date_default_timezone_set("Asia/kolkata");
    $currenttime1=time();
   $datetime=strftime("%B-%d-%Y %H:%M:%S",$currenttime1);
   // $datetime=strftime("%m-%d-%y",$currenttime1);
    $datetime;
    $image=$_FILES['Image']["name"];
    $Target="uploadedimg/".basename($_FILES["Image"]["name"]) ;
    
       $user_log_id=$user['id'];
       $query1="UPDATE visitor SET 
        datetime='$datetime',firstname='$first_Name',secondname='$second_Name',profile='$image',contact='$Contact',address='$Address',valid_date='$Valid_Date',register_id='$user_log_id' WHERE id='$getid'";
   	move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
    if (mysqli_query($con, $query1)) {
            echo "Edited successfully";
            header("Location: index.php");
         }    
    else {
         echo "Error: " . $query1 . "<br>" . mysqli_error($con);
         //header("Location: demo.php");
         }
   


}//end of the if submit*/
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
	<title></title>
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
input[type=text] {
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid green;
}
input[type=textarea] {
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid green;
}
input[type=file] {
    
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid green;
}
::-webkit-file-upload-button {
  background: light;
  color: green;
  border-radius: 5px;
}
	</style>

	<title></title>
</head>

<body>
<body class="back_img">
<div class="container">
	
		
		<div class=" col-sm-offset-2 col-sm-6"><!--middle div-->
			<center><h1 style="color: white;">Edit Pass</h1></center>
			
			<div>
        <?php 
                 // $ConnectingDB;
     //     $getid=$_GET['id'];
                $viewquery="SELECT * FROM visitor WHERE id='$getid' ORDER BY datetime desc";
               $execute=mysqli_query($con,$viewquery);
            $dataRows=mysqli_fetch_array($execute);
              $upfirstname=$dataRows["firstname"];
              $upsecondname=$dataRows["secondname"];
              $upcontact=$dataRows["contact"];
              $Upcity=$dataRows["city"];
              $Upaddress=$dataRows["address"];
              $upprofile=$dataRows["profile"];
              $upvalid_date=$dataRows["valid_date"];

               
         ?>
         <center><form style="width: 350px;" action="edit_visit.php" enctype="multipart/form-data" method="post">
					<fieldset>
						<div class="form-group">
						<label for="First Name">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Enter First Name:</span></label>

						<input class="form-control" type="text" name="First_Name" id="First_Name" placeholder="Enter the Visitor First Name" value="<?php 
					  echo	$upfirstname;
						?>" required>
					</div>
					<div class="form-group">
						<label for="Second_name">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Second Name:</span></label>

						<input class="form-control" type="text" name="Second_Name" id="Second_Name" placeholder="Enter the Visitor second Name" value="<?php 
					  echo	$upsecondname;
						?>" required>
					</div>

					
					<div class="form-group">
						<label for="city">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">City:</span></label>

						<input class="form-control" type="text" name="City" id="city" placeholder=" Enter the city Name" required value="<?php 
					  echo	$Upcity;
						?>">
					</div>


					
                     <div class="form-group">
						<label for="contact">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">contact :</span></label>
                        <input class="form-control" type="text" name="Contact" id="contact" placeholder="Contact Number" value="<?php 
					  echo	$upcontact;
						?>">
                     </div>     
                      <div class="form-group">
                      	<img src="uploadedimg/<?php echo($upprofile); ?>" style="width: 4cm;height: 2cm">
						<label for="SelectImage">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Select Images:</span></label>

						<input class="form-control" type="file" name="Image" id="image" value="<?php 
					  echo	$upprofile;
						?>" >
					</div>
                    
					
		  		  
					<div class="form-group">
						<label for="Address">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Address:</span></label>

						<textarea class="form-control"  name="Address" id="address" placeholder="Put your address here" value="<?php 
					  echo	$Upaddress;
						?>"></textarea>
					</div>

					<div class="form-group">
						<label for="Valid Date">&nbsp;<span style="font-style: bold;color:black;font-size: medium;">Valid Date:</span></label>

						<input class="form-control" type="date" name="Valid_date" id="Valid_date" placeholder="Enter the Visitor Valid Date" value="<?php 
					  echo	$upvalid_date;
						?>" required>
					</div>

						<br>
						<input style="float: left;" class="btn btn-success" type="submit" name="Submit" value="Edit">
					</fieldset><br>
				</form>
				</center>
	

	</div>	
</div><!--end of the container fluid class -->
</body> 
</html>
