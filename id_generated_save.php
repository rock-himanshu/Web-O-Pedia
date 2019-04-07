<?php 
include 'include/headsection.php';
include 'include/navheader.php';

?>
</ul></div></div></nav>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			
		</div>
		<div class="col-sm-6">
		  <?php
		  $get_use_id=$_GET['reg_id'];
            $query="SELECT * FROM visitor WHERE register_id='$get_use_id' ORDER BY datetime desc";
            $execute=mysqli_query($con,$query);
            $datarows=mysqli_fetch_array($execute);
               
		   ?>
		 <div class="row">
		 	<div class="col-sm-6"><?php echo $datarows['datetime']; ?></div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-6"><img class="border border-success" style="border-radius: 5px;max-width: 6cm;max-height: 6cm;min-width: 4cm;min-height: 5" src="uploadedimg/<?php echo $datarows['profile']; ?>" ></div>
		 </div>	
		 <div class="row">
		 	<div class="col-sm-6" style="background-color: #9400D3">
		 		<div class="row">
		 			<div class="col-sm-6">
		 				First Name:<br>
		 				Last Name:<br>
		 				Contact No:<br>
		 				City Name:<br>		 				
		 			</div>
		 			<div class="col-sm-6">
		 				<?php echo $datarows['firstname']; ?><br>
		 				<?php echo $datarows['secondname']; ?><br>
		 				<?php echo $datarows['contact']; ?><br>
		 				<?php echo $datarows['city']; ?><br>		 				
		 			</div>		 			
		 		</div>
		 		<div class="row">
                      <center><span>Printed by: <?php echo "$userLoggedIn"; ?></span></center>
		 		</div>
                
		 		</div>
		 </div>  

		</div>
		<div class="col-sm-3">
				
		</div>				
	</div>
</div>