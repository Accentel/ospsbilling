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
			include("header.php");
		?>

<link rel="stylesheet" href="js/jquery-ui.min.css" type="text/css" /> 	
		</head>

	<body>

	<div id="conteneur">
		<?php /*?><div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
		<?php
		include("logo.php");
			include("main_menu.php");
			?>
		<div id="centre">
          <h1 style="color:red;" align="center">PURCHASE INVOICE LIST</h1>
          
                       <form name="frm" method="post" >
           
                
<table align="right" cellspacing="2">
<tr><td>Search By Supplier Name : <input type="text" name="name" id="name" required /></td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
</table>
</form>
<table border="0" cellpadding="2" cellspacing="2">
<tr><td width="68" class="label1"><a href="add_purchase_invoice.php" title="Add New Record"><img src="images/add1.gif"></a></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="expense_table" style="font-size:14px;">
<tr height="25px"><TH>S.NO</TH><TH>GRN NO.</TH><TH>SUPPLIER NAME</TH><TH>INVOICE NO.</TH><TH>RECIEVED BY</TH><TH>TOTAL AMOUNT</TH><TH>VIEW</TH><TH>REPORT</TH></tr>
<?php 
			  include("config.php");
			   if(isset($_REQUEST['submit'])){
			  $n=$_REQUEST['name'];
			  
			  $sq = mysqli_query($link,"select lr_no,b.suppl_name,suppl_inv_no,rec_by,total,grn from phr_purinv_mast as a,phr_supplier_mast as b where a.suppl_code=b.suppl_code and upper(b.SUPPL_NAME) like upper('$n%')")or die(mysqli_error($link));
				$tot=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $grn = $res['grn'];
			  $sn=$res['suppl_name'];
			  $invno = $res['suppl_inv_no'];
			  $recby = $res['rec_by'];
			  $total = $res['total'];
			  $pid = $res['lr_no'];
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $grn;?></td><td><?php echo $sn;?></td><td><?php echo $invno;?></td><td><?php echo $recby;?></td><td><?php echo $total;?></td><td style="text-align:center;"><a href="view_purchase_invoice.php?id=<?php echo $pid?>"><img src="images/view.gif" /></a></td><td><a href="PurchaseInvoice_Report.php?lr_id=<?php echo $pid ?>" target="_blank"><img src="images/pdf_icon.gif" border="0"></a></td></tr>
             <?php }$i++;}
			 }
			 }else{ ?>
			 <?php
			 
			 $sq = mysqli_query($link,"select lr_no,b.suppl_name,suppl_inv_no,rec_by,total,grn from phr_purinv_mast as a,phr_supplier_mast as b where a.suppl_code=b.suppl_code  order by a.lr_no desc  ")or die(mysqli_error($link));
	 
			  $tot=mysqli_num_rows($sq);
			  $i = 1;
			  if($sq){
			  while($res=mysqli_fetch_array($sq)){
			 
			  $grn = $res['grn'];
			  $sn=$res['suppl_name'];
			  $invno = $res['suppl_inv_no'];
			  $recby = $res['rec_by'];
			  $total = $res['total'];
			  $pid = $res['lr_no'];
			  $records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
			  
			 ?>
             <tr height="25px"><td style="text-align:center;"><?php echo $i;?></td><td><?php echo $grn;?></td><td><?php echo $sn;?></td><td><?php echo $invno;?></td><td><?php echo $recby;?></td><td><?php echo $total;?></td><td style="text-align:center;"><a href="view_purchase_invoice.php?id=<?php echo $pid?>"><img src="images/view.gif" /></a></td><td><a href="PurchaseInvoice_Report.php?lr_id=<?php echo $pid ?>" target="_blank"><img src="images/pdf_icon.gif" border="0"></a></td></tr>
             <?php }$i++;}
			 }
			 }
			 ?></table>
              <?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="purchase_invoice_list.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="purchase_invoice_list.php?next=<?php echo ($pagecount - 1) ?>&amp;searchname=<?php echo $n ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="purchase_invoice_list.php?next=<?php echo ($pagecount + 1) ?>&amp;searchname=<?php echo $n ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="purchase_invoice_list.php?next=<?php echo (($records - 1) / $nd) ?>&amp;searchname=<?php echo $n ?>" >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
	  </tr>
	</table>
	<table>
	<?php if ($rowscounts == 0) { ?>
           <tr >
           <td colspan="9" ><div align="right"><font color="#FF6600">No More Records</font> </div></td>
            </tr> 
	<?php } ?>
	</table>		
 <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>    
<script type="text/javascript">
$(function() {

    $("#name").autocomplete({
        source: "purname.php",
        minLength: 1
    });                });
</script>
 
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