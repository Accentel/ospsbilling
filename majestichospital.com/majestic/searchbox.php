<?php //include('config.php');

session_start();

if($_SESSION['name1'])
{
$remainig_records = -1;//this is used from where the records should display
    $rowscounts = 0;        // if there is any records in next page it became >0 else rowscounts is 0 
    $tot=0;
    $m=0;
    $pagecount = 0;// it is used for page number
    $nd =10;//no of records per page
		/*view records*/
		//String no2=null;
    $no2=$_REQUEST['no'];
	if(!($no2==null) && !("0"==$no2)){$nd=$no2;}
		/*view records*/
    $pagecounter = "";
    $pagecounter = $_REQUEST['next'];
        if ($pagecounter != "") {
            $pagecount = $pagecounter;
        }
   
    $rowstart = ($pagecount * $nd);
    $rowend = ($rowstart + ($nd - 1));
    $records = 0;
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			include("header1.php");
		?>
		<script type="text/javascript" src="js/jquery.1.4.2.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />
     <script>
$().ready(function() {
	$("#name").autocomplete("set60.php", {
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
		
	</head>

	<body>

	<div id="conteneur" class="container">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div>
		<?php
			include("main_menu.php");
			?><?php */?>
            
            	<?php
			include("logo.php");
			include("main_menu.php");
			?>

         
		 <div align="center" style="min-height:500px; height:auto;">
          <h1 style="color:red;" align="center">Search Medicine   </h1>
                       <form name="frm" method="post" >
           
                
<table align="center" cellspacing="2" class="table">
<tr><td> Medicine Name : <input type="text" name="name" id="name" required/></td>
<td align="left"><input name="submit" type="submit" value="Search"  /></td></tr>
</table>
</form>


<table width="100%" align="center" border="0" class="table" cellpadding="0" cellspacing="0">	
		
		<tr><td><br /></td></tr>
		 
			<tr><th align="center"><b><u>SNO </u></b></th><th ><b><u>PRODUCT NAME</u></th><th><b><u>TOTAL QTY </u></th></tr> <tr><td><br /></td></tr>
<?php 
include('config.php');
if(isset($_POST['submit'])){
$name=$_POST['name'];
 $sql="select PRODUCT_NAME,sum(balance_qty) as T_QTY  from phr_purinv_dtl where PRODUCT_NAME='$name' group by PRODUCT_NAME";
$res=mysqli_query($link,$sql) or die(mysqli_error($link));
$i=1;
while($row=mysqli_fetch_array($res)){
?>
<tr>
<td align="center"><?php echo $i; ?></td>
<td align="center"><?php echo $row['PRODUCT_NAME']; ?></td>

<td align="center"><?php echo $row['T_QTY']; ?></td>


</tr>
			<?php $i++; } }?><!--	
<tr>
<td colspan="4" align="center"> <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></td>
</tr>-->
		</table>
		



</div>


 
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