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
        <script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
<script>
$().ready(function() {
	$("#mrno").autocomplete("ipreg.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});
</script> 
<script>
function showHint52(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("fdate").value=strar[1];
	
	document.getElementById("pname").value=strar[2];
	
	
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search567.php?q="+str,true);
xmlhttp.send();
}
</script>
	<style>
    .text-line {
        background-color: transparent;
        color: #000;
        outline: none;
        outline-style: none;
        outline-offset: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: solid red 1px;
        padding: 3px 10px;
    }
    </style>
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
if(isset($_POST['submit'])){
error_reporting(E_ALL);
$mrno = $_POST['mrno'];
$user = $_POST['user'];
$pname=$_POST['pname'];
$dname = $_POST['dname'];
$dname1=$_POST['dname1'];
$suffer=$_POST['suffer'];
$duty=$_POST['duty'];
$user=$_POST['user'];
$fdate1=$_POST['fdate'];
$fdate=date('Y-m-d',strtotime($fdate1));
$tdate1=$_POST['tdate'];
$tdate=date('Y-m-d',strtotime($tdate1));
$sq="INSERT INTO medicalcertificate(mrno,pname,dname,dname1,suffer,duty,fdate,tdate,user,cdate)VALUES('$mrno','$pname','$dname','$dname1','$suffer','$duty','$fdate','$tdate','$user',now())";
mysqli_query($link,$sq) or die(mysqli_error($link)); 
$id=mysqli_insert_id();
if($sq){
print "<script>";
			print "alert('Successfully Added ');";
			print "self.location='medicalcertificate_print.php?id=$id';";
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
		  
          <h1 style="color:red;" align="center">ADD MEDICAL CERTIFICATE </h1>
          
                      <form name="frm" method="post" action="">
                
<table width="100%" cellspacing="10" align="center">

<tr>	
	  <td class="label1"> UMR No</td>
	  <td><input type="text" name="mrno" class=" text"  id="mrno" onfocus="showHint52(this.value);"/>
      <input type="hidden" name="user" class=" text"  id="user" value="<?php  echo $aname?>"/></td>
</tr>
</table>
<div align="left">Signature of the Applicant <input type="text" name="pname" class=" text-line"  id="pname"/>I,Dr.<input type="text" name="dname" class=" text-line"  id="dname"/>after careful personal examination of the case hereby certify that<input type="text" name="dname1" class=" text-line"  id="dname1"/>whose signature is given above, is suffering from<input type="text" name="suffer" class=" text-line"  id="suffer"/>that I consider that a period of absence from duty for<input type="text" name="duty" class=" text-line"  id="duty"/>with effect from<input type="text" name="fdate" class=" text-line"  id="fdate"/>to<input type="text" name="tdate" class=" text-line tcal"  id="tdate" value="<?php echo date('d-m-Y') ?>"/>is absolutely necessary for the restoration of his/her health.





</div><table width="600">
  
 
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Save" class="butt"/>&nbsp;<input type="button" name="reset" id="reset" class="butt" value="Close" onclick="window.location.href='view_medicalcertificate.php'"/></td><td></td></tr></table>
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