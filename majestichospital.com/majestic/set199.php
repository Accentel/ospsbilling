<?php
include("config.php");

$q = strtolower($_GET["term"]);
if (!$q) return;
 $rs="SELECT  distinct registerno FROM  patientregister WHERE registerno LIKE '%$q%'"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
	//$cname = $rs['registerno'];
	 $return_arr[] =  $rs['registerno'];
//	echo "$cname\n";
}
echo json_encode($return_arr);
//echo $return_arr;


?>