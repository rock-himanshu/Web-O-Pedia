<?php 
include 'include/headsection.php';
//include 'include/navheader.php';
require 'include/config.php';

if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
  $user_details_query = mysqli_query($con, "SELECT * FROM social WHERE username='$userLoggedIn'");
  $user = mysqli_fetch_array($user_details_query);
}
else {
  header("Location: register.php");
}

?>
</ul></div></div></nav>
<div class="container">
	<div id="rowPrint" class="row well">
		<div class="col-sm-4">
			
		</div>
		<div class="col-sm-8 ">
		  <?php
		  $get_use_id=$_GET['reg_id'];
            $query="SELECT * FROM visitor WHERE register_id='$get_use_id' ORDER BY datetime desc";
            $execute=mysqli_query($con,$query);
            $datarows=mysqli_fetch_array($execute);
               
		   ?>
		 <div class="row">
	<div class="col-sm-6">	 	<span style="color: green">Pass Creation Date:</span><?php echo $datarows['datetime']; ?></div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-6 well" style="overflow: hidden;"><center><img class="img-thumbnail"   style="border-radius: 5px;height: 5cm;width: 4cm" src="uploadedimg/<?php echo $datarows['profile']; ?>" ></center></div>
		 </div>	
		 <div class="row ">
		 	<div class="col-sm-6" >
		 		<div class="row well">
		 			<div class="col-sm-6 well">
		 				<span style="color: green">Id:</span><br>
		 				<span style="color: green">Name:</span><br>
		 				
		 				<span style="color: green">Contact:</span><br>
		 				<span style="color: green">City Name:</span><br>
		 				<span style="color: green">Address:</span>		 				
		 			</div>
		 			<div class="col-sm-6 well">
		 				<?php echo $datarows['id'];?><br>
		 				<?php echo $datarows['firstname']." ".$datarows['secondname']; ?><br>
						<?php echo $datarows['contact']; ?><br>
		 				<?php echo $datarows['city']; ?><br>
		 				<?php echo $datarows['address']; ?><br>		 				
		 			</div>
		 			<div class="row">
		 				 	<span style="color: green;float: left;">Date:</span><?php echo $datarows['datetime']; ?>
		 				<span style="color: green;float: right;">Valid Date:<?php echo $datarows['valid_date']; ?></span>
		 			</div>		 			
		 		</div>
		 		<div class="row well">
                      <center><span>Added by: <?php echo "$userLoggedIn"; ?></span></center>
		 		</div>
<div class="row well">
<button class="btnclass" class="btn btn-success" style="float: right;" onclick="myFunction()">Print </button>

<script>
function myFunction() {
    window.print();
}
</script>
<a  href="index.php"  class="btn btn-primary" style="float: left;" >Add_New_Entry</a>

</div>
				
		 		</div>
		 </div>  

		</div>
		<div class="col-sm-3">
				
		</div>				
	</div>
</div>