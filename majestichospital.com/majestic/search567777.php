<?php
include("config.php");

$q=$_GET["q"];

$sql="SELECT * FROM patientregister WHERE registerno = '$q'";
$result = mysqli_query($link,$sql);
if($result){
	$row = mysqli_fetch_array($result);
	
	echo ":" . $row['pname_type']." .".$row['patientname'];
	echo ":" . $row['age'];
	echo ":" . $row['phoneno'];
	
	echo ":" . $row['gender'];
	
		
	
	
}

?>	

