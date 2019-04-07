<?php 
$deleteid=$_GET['delete'];
require_once 'include/config.php';
 ?>
 <?php 
$error_array=array();	
	
      $username = $_SESSION['username'];

     $query1="DELETE FROM visitor WHERE id='$deleteid'";   
     if (mysqli_query($con, $query1)) {
            echo "Deleted  successfully";
              header("Location: index.php");
         }    
    else {
         echo "Error: " . $query1 . "<br>" . mysqli_error($con);
          }
   

  ?>
