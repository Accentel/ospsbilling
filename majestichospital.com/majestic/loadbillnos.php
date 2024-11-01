<?php
include("config.php");

$rs="SELECT distinct BillNO FROM bill"; 
$rsd = mysqli_query($link,$rs);
while($rs = mysqli_fetch_array($rsd)) {
  
  echo "<option value='".$rs['BillNO']."'>" . $rs['BillNO'] . "</option>";
   
  }



?> 

  
