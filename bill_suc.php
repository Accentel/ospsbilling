<?php //include('config.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('dbconnection/connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
$service_no=trim($_POST['service_no']);	
$po_no=$_POST['po_no'];	
$pcw=$_POST['pcw'];	
$po_date=$_POST['po_date'];
 $site_name=$_POST['site_name'];	
$district=$_POST['district'];
$indus_id=$_POST['indus_id'];
$req_ref=$_POST['req_ref'];
$seeking_id=$_POST['seeking_id'];
$state=$_POST['state'];
$seeking_opt=$_POST['seeking_opt'];
$rfaid_date=$_POST['rfaid_date'];
$allcoation_date=$_POST['allcoation_date'];
$wcc_num=trim($_POST['wcc_num']);
$wcc_rec_num=$_POST['wcc_rec_num'];
//$total_amnt=$_POST['total_amnt'];
 $tot=$_POST['tot'];
  $tot1=$_POST['tot1']; 
$tot2=$tot1/2;
$sgsttotal=$_POST['sgsttotal'];
$cgsttotal=$_POST['cgsttotal'];
$tgsttotal=$sgsttotal+$cgsttotal;

$type_work=$_POST['type_work'];
//$total_amnt=$tot+$tot2;
	$date=$_POST['inv_date'];
	$loc=$_POST['loc'];
	$ses=$_POST['ses'];
	$temp=$_POST['temp'];
	$t=mysqli_query($link,"select * from employee where username='$ses'") or die(mysqli_error($link));
	$tr=mysqli_fetch_array($t);
	 $empemail=$tr['emp_email'];
	$noofrecordsquery=mysqli_query($link,"select count(1) as noofrecords from `add_bill1` where wcc_num ='$wcc_num' or service_no ='$service_no' ") or die(mysqli_error($link));
	$noofrecordsqueryfetch=mysqli_fetch_array($noofrecordsquery);
	$noofrecords=$noofrecordsqueryfetch['noofrecords'];
	 if($noofrecords==0)
	{
	$sq=mysqli_query($link,"INSERT INTO `add_bill1`(`date`, `service_no`, `po_no`, `po_date`, `site_name`, `district`, `indus_id`, 
	`req_ref`, `seeking_id`, `state`, `seeking_opt`, `rfaid_date`, `allcoation_date`, 
	`wcc_num`, `wcc_rec_num`, `total_amnt`,`total_sgst`,`total_cgst`,`total_gst`,`location`,`user`,`type_work`,`pcw`)
	 VALUES ('$date','$service_no','$po_no','$po_date','$site_name','$district','$indus_id','$req_ref','$seeking_id',
	 '$state','$seeking_opt',
	 '$rfaid_date','$allcoation_date','$wcc_num','$wcc_rec_num','$tot','$sgsttotal','$cgsttotal','$tgsttotal','$loc','$ses','$type_work','$pcw')") or die(mysqli_error($link));
	 $sno=mysqli_insert_id($link);
	 //exit;
	$cnt = count($_POST['item_code']);
	if ($cnt > 0 && $cnt == $cnt) {
for ($i=0; $i<$cnt; $i++) {
if( $_POST['item_desc'][$i]!='' ){
$lno=$_POST['sno'][$i];
$item_code=$_POST['item_code'][$i];
$item_desc=$_POST['item_desc'][$i];
$price=$_POST['price'][$i];
$qty=$_POST['qty'][$i];
$amnt=$_POST['amnt'][$i];
$sgst=$_POST['sgst'][$i];
$cgst=$_POST['cgst'][$i];
//$gst_amnt=$_POST['gst_amnt'][$i];
$uom=$_POST['uom'][$i];
$hsn=$_POST['hsn'][$i];
$sac=$_POST['sac'][$i];
$sgstamt=$_POST['sgstamt'][$i];
$cgstamt=$_POST['cgstamt'][$i];
   $gst_amnt=$sgstamt+$cgstamt;
$query = "INSERT INTO add_bill ( `service_no`, `item_code`, `price`, `qty`, `tax_amnt`, `gst_amnt`, `sgst`, `cgst`,`date`,`temp_type`,`uom`,`item_desc`,`sgstamount`,`cgstamount`,`sno`,`id1`,`hsnno`,`sacno`) 
	VALUES 
 ('$service_no','$item_code','$price','$qty','$amnt','$gst_amnt','$sgst','$cgst','$date','$temp','$uom','".addslashes($item_desc)."','$sgstamt','$cgstamt','$lno','$sno','$hsn','$sac')";
 $res=mysqli_query($link,$query) or die(mysqli_error($link));
}
     
}
	}
	  
	if($res){
	   
	print "<script>";
	print "alert('Sucessfully Saved');";
	print "self.location='bill_list.php';";
	print "</script>";

}
}
else{
    print "<script>";
	print "alert('ALERT:Duplicate Entry for WCC No or SNo!');";
	print "history.back();";
	print "</script>";
}
}




if(isset($_POST['update'])){
	 $id=$_POST['id']; 
	$service_no=$_POST['service_no'];	
		$pcw=$_POST['pcw'];	
$po_no=$_POST['po_no'];	
$po_date=$_POST['po_date'];
 $site_name=$_POST['site_name'];	
$district=$_POST['district'];
$indus_id=$_POST['indus_id'];
$req_ref=$_POST['req_ref'];
$seeking_id=$_POST['seeking_id'];
$state=$_POST['state'];
$seeking_opt=$_POST['seeking_opt'];
$rfaid_date=$_POST['rfaid_date'];
$allcoation_date=$_POST['allcoation_date'];
$wcc_num=$_POST['wcc_num'];
$wcc_rec_num=$_POST['wcc_rec_num'];

//$total_amnt=$_POST['total_amnt'];
$tot=$_POST['tot'];
  $tot1=$_POST['tot1']; 
$tot2=$tot1/2;
$sgsttotal=$_POST['totsgst'];
$totcgst=$_POST['totcgst'];
$tgsttotal=$sgsttotal+$totcgst;
$type_work=$_POST['type_work'];

//$total_amnt=$tot+$tot2;
	$date=$_POST['inv_date'];;
	$bar_code=$_POST['bar_code'];
	//$date=date('Y-m-d');
	$sub_date=$_POST['sub_date'];
	$payment_doc_date=$_POST['payment_doc_date'];
	$payment_doc_no=$_POST['payment_doc_no'];
	$ackno=$_POST['ackno'];
	$ackdt=$_POST['ackdt'];
	if($bar_code!=''){
	echo	$v="update `add_bill1` set `date`='$date', `service_no`='$service_no', `po_no`='$po_no', `po_date`='$po_date', `site_name`='$site_name',
	 `district`='$district', `indus_id`='$indus_id', 
	`req_ref`='$req_ref', `seeking_id`='$seeking_id', `state`='$state', `seeking_opt`='$seeking_opt', `rfaid_date`='$rfaid_date',
	 `allcoation_date`='$allcoation_date', 
	`wcc_num`='$wcc_num', `wcc_rec_num`='$wcc_rec_num', `total_amnt`='$tot',`total_sgst`='$sgsttotal',
	`total_cgst`='$totcgst',`total_gst`='$tgsttotal',qr_code='$bar_code',`bill_status`='Submited',bill_submit_date='$sub_date',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no',`type_work`='$type_work',pcw='$pcw',ackno='$ackno',ackdt='$ackdt'  where id='$id'";
	
	$sq=mysqli_query($link,$v) or die(mysqli_error($link));
	
	} else {
		 $v1="update `add_bill1` set `date`='$date', `service_no`='$service_no', `po_no`='$po_no', `po_date`='$po_date', `site_name`='$site_name',
	 `district`='$district', `indus_id`='$indus_id', 
	`req_ref`='$req_ref', `seeking_id`='$seeking_id', `state`='$state', `seeking_opt`='$seeking_opt', `rfaid_date`='$rfaid_date',
	 `allcoation_date`='$allcoation_date', 
	`wcc_num`='$wcc_num', `wcc_rec_num`='$wcc_rec_num', `total_amnt`='$tot',`total_sgst`='$sgsttotal',
	`total_cgst`='$totcgst',`total_gst`='$tgsttotal',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no',`type_work`='$type_work',pcw='$pcw',ackno='$ackno',ackdt='$ackdt' where id='$id'";
		$sq=mysqli_query($link,$v1) or die(mysqli_error($link));
	}
	//exit;
 	$cnt = count($_POST['item_code']);
	if ($cnt > 0 && $cnt == $cnt) {

for ($i=0; $i<$cnt; $i++) {
if( $_POST['item_desc'][$i]!='' ){
	$cnt = isset($_POST['item_code']) ? count($_POST['item_code']) : 0;
	if ($cnt > 0 && is_countable($_POST['item_code'])) {
		for ($i = 0; $i < $cnt; $i++) {
			if (isset($_POST['item_desc'][$i]) && $_POST['item_desc'][$i] != '') {
				$item_code = isset($_POST['item_code'][$i]) ? $_POST['item_code'][$i] : '';
				$item_desc = isset($_POST['item_desc'][$i]) ? $_POST['item_desc'][$i] : '';
				$price = isset($_POST['price'][$i]) ? $_POST['price'][$i] : '';
				$qty = isset($_POST['qty'][$i]) ? $_POST['qty'][$i] : '';
				$amnt = isset($_POST['amnt'][$i]) ? $_POST['amnt'][$i] : '';
				$sgst = isset($_POST['sgst'][$i]) ? $_POST['sgst'][$i] : '';
				$cgst = isset($_POST['cgst'][$i]) ? $_POST['cgst'][$i] : '';
				$gst_amnt = isset($_POST['gst_amnt'][$i]) ? $_POST['gst_amnt'][$i] : '';
				$id1 = isset($_POST['id1'][$i]) ? $_POST['id1'][$i] : '';
				$uom = isset($_POST['uom'][$i]) ? $_POST['uom'][$i] : '';
				$hsn = isset($_POST['hsn'][$i]) ? $_POST['hsn'][$i] : '';
				$sac = isset($_POST['sac'][$i]) ? $_POST['sac'][$i] : '';
				$lno = isset($_POST['sno'][$i]) ? $_POST['sno'][$i] : '';
				$sgstamt = isset($_POST['sgstamt'][$i]) ? $_POST['sgstamt'][$i] : '';
				$cgstamt = isset($_POST['cgstamt'][$i]) ? $_POST['cgstamt'][$i] : '';
				$gst_amnt = $sgstamt + $cgstamt;
				$id = isset($_POST['id']) ? $_POST['id'] : '';
				$id2 = isset($_POST['id5'][$i]) ? $_POST['id5'][$i] : '';
	
				if ($id1 != '') {
					$id1 = $id1;
				}
				if ($id1 != '' && $id2 != '') {
					$query = "update add_bill set `service_no`='$service_no', `item_code`='$item_code',item_desc='" . addslashes($item_desc) . "', `price`='$price',uom='$uom',
					`qty`='$qty', `tax_amnt`='$amnt', `gst_amnt`='$gst_amnt', `sgst`='$sgst',hsnno='$hsn',sacno='$sac',sgstamount='$sgstamt',cgstamount='$cgstamt',`cgst`='$cgst',`date`='$date',sno='$lno' where id='$id2' and id1='$id1'";
					$res = mysqli_query($link, $query) or die(mysqli_error($link));
				} else {
					$query = "INSERT INTO add_bill ( `service_no`, `item_code`, `price`, `qty`, `tax_amnt`, `gst_amnt`, `sgst`, `cgst`,`date`,`temp_type`,`uom`,`item_desc`,`sgstamount`,`cgstamount`,`sno`,`id1`,`hsnno`,`sacno`) 
						VALUES 
						('$service_no','$item_code','$price','$qty','$amnt','$gst_amnt','$sgst','$cgst','$date','$temp','$uom','" . $item_desc . "','$sgstamt','$cgstamt','$lno','$id1','$hsn','$sac')";
					$res = mysqli_query($link, $query) or die(mysqli_error($link));
				}
			}
		}
	}
}
     
}
	}
	//exit;
	if($res){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='bill_list.php';";
	print "</script>";

}
}


if(isset($_POST['update1'])){
$id=$_POST['id'];
$bar_code=$_POST['bar_code'];
	//$date=date('Y-m-d');
	$sub_date=$_POST['sub_date'];
	$payment_doc_date=$_POST['payment_doc_date'];
	$payment_doc_no=$_POST['payment_doc_no'];
		$ackno=$_POST['ackno'];
	$ackdt=$_POST['ackdt'];
$v="update `add_bill1` set qr_code='$bar_code',bill_submit_date='$sub_date',`payment_doc_date`='$payment_doc_date',`payment_doc_no`='$payment_doc_no',ackno='$ackno',ackdt='$ackdt' where id='$id'";
$res=mysqli_query($link,$v) or die(mysqli_error($link));

if($res){
	print "<script>";
	print "alert('Sucessfully Updated');";
	print "self.location='bill_list.php';";
	print "</script>";
	
	
}


}



?>
