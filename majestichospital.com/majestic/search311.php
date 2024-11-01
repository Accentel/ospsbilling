<?php
//include("config.php");
?>

<?php
//ob_start();
require_once("config.php");
 $q=$_GET["q"];?>

 
 <?php
 $sql1 = mysqli_query($link,"select registerdate from patientregister where registerno='$q'");
							$row1 = mysqli_fetch_array($sql1);
						echo	$registerdate = $row1['registerdate'];
							
						
							
							
					
 ?>
