<?php
	include("config.php");
	$id=$_GET['id'];
	echo $id;
	//$name=$_GET['name'];
	//echo $name;
	$sql="DELETE FROM package WHERE id='$id'";
	$result=mysql_query($link,$sql)or die(mysqli_error($link));
	if($result)
	{
		print "<script>";
		print "alert('Successfully deleted');";
		print "self.location='package.php';";
		print "</script>";
	}else{
		print "<script>";
		print "alert('unable to delete');";
		print "self.location='package.php';";
		print "</script>";
	}
?>