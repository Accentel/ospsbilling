<?php //include('config.php');

session_start();

if($_SESSION['name1'])

{
$aname= $_SESSION['name1'];
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header.php");
		?>
	</head>

	<body>

	<div id="conteneur">
		
		  

		  <?php include('logo.php'); ?>
		<?php
			include("main_menu.php");
			?>
		  
	
<?php
ob_start();
include("config.php");
$bid = $_REQUEST['id'];
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$btype = $_POST['btype'];
$remarks=$_POST['remarks'];

$sq="update bedtype set BEDTYPE = '$btype',REMARKS = '$remarks',CURRENTDATE = now(),AUTH_BY ='$aname' where BEDTYPE_ID = $bid";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
if($sq){
print "<script>";
			print "alert('Successfully Updated ');";
			print "self.location='bed_type.php';";
			print "</script>";

}
else{
mysqli_error($link);}
}
?>
<?php
ob_get_flush();
?>

		  <div id="centre">
		  
          <h1 style="color:red;" align="center">EDIT BED TYPE</h1>
          
                      <form name="frm" method="post" action="">
<?php
include("config.php");


$sql = mysqli_query($link,"select * from bedtype where BEDTYPE_ID = $bid")or die(mysqli_error($link));
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$bedtype = $row['BEDTYPE'];
	$remark = $row['REMARKS'];
}

?>                
<table width="100%" cellspacing="10" align="center">

<tr><td class="label1">Bed Type Name <font color="red">*</font> : </td><td><input type="text" name="btype" id="btype" class="text" value="<?php echo $bedtype; ?>" required/></td></tr>
<tr><td class="label1">Remarks : </td><td><textarea name="remarks" id="remarks" cols="34" rows="5"><?php echo $remark; ?></textarea></td></tr>

<tr><td colspan="4" align="center"><input type="submit" name="submit" value="Update" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='bed_type.php'"/></td><td></td></tr></table>
	           </form>        
		
        
        </div>

		<?php include('footer.php'); ?>

	</div>

	</body>

</html>

<?php 

}else

{

session_destroy();

session_unset();

header('Location:login.php');

}

?>