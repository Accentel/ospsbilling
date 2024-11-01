<?php
include("config.php");

$rs="SELECT  distinct TestName FROM  testdetails"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
  
  echo "<option value='".$rs['TestName']."'>" . $rs['TestName'] . "</option>";
   
  }



?> 

  
