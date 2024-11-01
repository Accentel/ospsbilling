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
	</head>

	<body>

	<div id="conteneur">

		 <?php /*?> <div id="header"><?php include("title.php"); ?><b id="logout">Welcome to <?php echo $_SESSION['name1']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></b></div><?php */?>
			<?php
			include("logo.php");
			include("main_menu.php");
			?>
		  <div id="centre">
          <h1 style="color:red;" align="center">DUE PATIENT LIST</h1>
          
                
			<table width="100%" border="0" cellspacing="5" cellpadding="1">
             <tr>
                
                <form name="frm" method="post" >
                <td class="label1">Admit Date:<input name="searchname" class="tcal" type="text" value="<?php echo date("d-m-Y");?>" class="textbox1" id="searchingpop" autocomplete="off"</td>
				<td align="left"><input name="submit" type="submit" value="" style="background:url(images/go1.gif);width:42px;height:22px;border-style:none;" /></td>
				</form>
                 
                
              </tr>
            </table>
			</form>
			<table width="100%" border="0" id="expense_table" style="font-size:14px;" cellspacing="0" cellpadding="0">
              <thead>
                <tr height="30px">
                
                 <th class="TH1">PATIENT/CUSTOMER NAME </th>
				 <th class="TH1">CUSTOMER TYPE </th>
                  <th class="TH1">AGE</th>
                  <th class="TH1">GENDER</th>
                  <th class="TH1">SALE DATE</th>
				     <th class="TH1">DUE AMOUNT </th>
                     <th class="TH1">PAY DUE</th>
                      <th class="TH1">PRINT </th>
  					<!----------- <th class="TH1">View </th>-->
                 
				
                </tr>
                <?php
					include("config.php");
					 if(isset($_REQUEST['submit'])){
					$adate = $_REQUEST['searchname'];
					if($adate != ""){
					$ad = date('Y-m-d',strtotime($adate));
					$sqls=mysqli_query($link,"SELECT id,cust_name,age,sex,(total_amount-paid_amount),sal_date,if(customer_type='c','Customer','Patient') from due_patients as b ,phr_salent_mast as p where b.lr_no=p.lr_no and total_amount <> paid_amount and sal_date='$ad'")or die(mysqli_error($link));
					}
					if($sqls){
					$tot=mysqli_num_rows($sqls);
					while($row=mysqli_fetch_array($sqls)){
						$id1=$row[0];
						
						$cust_name=$row[1];
						$age=$row[2];
						$gender=$row[3];
						$saledate=date('d-m-Y', strtotime($row[5]));
						$ctype=$row[6];
						$dueamount=$row[4];
						
					$rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ")or die(mysqli_error($link));
					while($rw1 = mysqli_fetch_array($rs1)){ $cust_name =$rw1[0];}
					$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
					?>
                <tr height="25px"><td><?php echo $cust_name ?></td><td><?php echo $ctype?></td><td><?php echo $age?></td><td><?php echo $gender?></td><td><?php echo $saledate?></td><td><?php echo $dueamount?></td><td><a href="due_patient_edit.php?pat_no=<?php echo $id1?>"><img src="images/edit.gif" /></a></td><td><a href="duecustomerbill1.php?id1=<?php echo $id1?>"><img src="images/print.png" /></a></td></tr>
				<?php }}
				}}
				else{
				$sqls=mysqli_query($link,"SELECT id,cust_name,age,sex,(total_amount-paid_amount),sal_date,if(customer_type='c','Customer','Patient') from due_patients as b ,phr_salent_mast as p where b.lr_no=p.lr_no and total_amount <> paid_amount")or die(mysqli_error($link));

					if($sqls){
					$tot=mysqli_num_rows($sqls);
					while($row=mysqli_fetch_array($sqls)){
						$id1=$row[0];
						
						$cust_name=$row[1];
						$age=$row[2];
						$gender=$row[3];
						$saledate=date('d-m-Y', strtotime($row[5]));
						$ctype=$row[6];
						$dueamount=$row[4];
						
					$rs1=mysqli_query($link,"Select patientname from patientregister where registerno='$cust_name' ")or die(mysqli_error($link));
					while($rw1 = mysqli_fetch_array($rs1)){ $cust_name =$rw1[0];}
					$records++;
				$remainig_records = $remainig_records + 1;//0
				$rowscounts++;//1
				if ($rowstart <= $rowend && $remainig_records == $rowstart) {
					$rowstart++;
					$rowscounts = 0;
				?>
				<tr height="25px"><td><?php echo $cust_name ?></td><td><?php echo $ctype?></td><td><?php echo $age?></td><td><?php echo $gender?></td><td><?php echo $saledate?></td><td><?php echo $dueamount?></td><td><a href="due_patient_edit.php?pat_no=<?php echo $id1?>"><img src="images/edit.gif" /></a></td><td><a href="duecustomerbill1.php?id1=<?php echo $id1?>"><img src="images/print.png" /></a></td></tr>
				<?php }}
				}} ?>
                </thead></table></td></tr></table>
				<?php if($tot==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="813">&nbsp;</td>
		<td width="34" align="left"></td>
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?><a href="duecustomer.php?next=0" ><?php } ?><img src="images/first.gif" title="First" alt="First" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
	   
		<td width="25" align="right"><?php if (!($pagecount == 0)) { ?>
			  <a  href="duecustomer.php?next=<?php echo ($pagecount - 1) ?>"><?php } ?><img src="images/previous.gif" title="Previous" alt="Previous" width="16" height="14" border="0"/></a></td>
		  <td width="10">&nbsp;</td>
	  
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?>
			  <a href="duecustomer.php?next=<?php echo ($pagecount + 1) ?>"><?php } ?><img src="images/next.gif" title="Next" alt="Next" width="16" height="14" border="0"/></a></td>
		<td width="10">&nbsp;</td>
		<td width="25" align="right"><?php if ($rowscounts > 0) { ?><a href="duecustomer.php?next=<?php echo (($records - 1) / $nd) ?>" >  <?php } ?><img src="images/last.gif" title="Last" alt="Last" width="16" height="14" border="0"/></a></td>
	  </tr>
	</table>
	<table>
	<?php if ($rowscounts == 0) { ?>
           <tr >
           <td colspan="9" ><div align="right"><font color="#FF6600">No More Records</font> </div></td>
            </tr> 
	<?php } ?>
	</table>	
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