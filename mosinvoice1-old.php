<?php //include('config.php');
        /**/
       $content = '';
$content .= '
			<style>
      table.page_header {position: running(header);width: 100%;height:120px;margin-bottom: border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
    table.page_footer {position: running(footer);width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}

    div.niveau
    {
        padding-left: 5mm;
    }
         
        #wrapper
        {
            width:800px;
            margin:0 15mm;
        }
         
        .page
        {
            height:297mm;
            width:210mm;
            page-break-after:always;
        }
 
        table
        {
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            border-spacing:0;
            border-collapse: collapse; 
             margin-top:50px;
        }
         
        table td 
        {
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 2mm;
        }
         
        table.heading
        {
            height:50mm;
        }
         
        h1.heading
        {
            font-size:14pt;
            color:#000;
            font-weight:normal;
        }
         
        h2.heading
        {
            font-size:9pt;
            color:#000;
            font-weight:normal;
        }
         
        hr
        {
            color:#ccc;
            background:#ccc;
        }
         
        #invoice_body
        {
            height: 149mm;
        }
         
        #invoice_body , #invoice_total
        {   
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
     
            border-spacing:0;
            border-collapse: collapse; 
             
            margin-top:6mm;
        }
         
        #invoice_body table td , #invoice_total table td
        {
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding:2mm 0;
        }
         
        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            font-family:monospace;
            text-align:right;
            padding-right:3mm;
            font-size:10pt;
        }
         
        #footer
        {   
            width:100%;
            margin:0 15mm;
            padding-bottom:3mm;
			
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            background:#eee;
             text-align:center;
            border-spacing:0;
            font-size:18px;
            border-collapse: collapse; 
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }

				</style>

				';
        
        /* you css */
include('dbconnection/connection.php');
//$bid=$_GET['id'];
$loc=$_GET['loc'];
$id=$_GET['id'];
$email=$_GET['email'];
$q1=mysqli_query($link,"select * from location where id='$loc'") or die(mysqli_error($link));
$r1=mysqli_fetch_array($q1);
$st=$r1['shippingto'];
$bt=$r1['billingto'];
//get empname
$q10=mysqli_query($link,"select * from employee where emp_name='$loc'") or die(mysqli_error($link));
$r1=mysqli_fetch_array($q1);
$st=$r1['shippingto'];

$q=mysqli_query($link,"select * from add_mbill1 where id='$id'") or die(mysqli_error($link));
$r=mysqli_fetch_array($q);
$service_no=$r['service_no'];
$invdate1=$r['date'];
$invdate = date('d-M-y', strtotime( $invdate1 ));
$po_no=$r['po_no'];
$po_date1=$r['po_date'];

$po_date = date('d-M-y', strtotime( $po_date1 ));

$opo_no=$r['opo_no'];
$opo_date1=$r['opo_date'];

$opo_date = date('d-M-y', strtotime( $opo_date1 ));

$site_name=$r['site_name'];
$district=$r['district'];
$indus_id=$r['indus_id'];
$req_ref=$r['req_ref'];
$seeking_id=$r['seeking_id'];
$state=$r['state'];
$seeking_opt=$r['seeking_opt'];
$rfaid_date1=$r['rfaid_date'];

$rfaid_date = date('d-M-y', strtotime( $rfaid_date1 ));

           // if($rfaid_date1 != '0000-00-00'){
			//   $rfaid_date=$rfaid_date;
			//   } else {
		//	$rfaid_date= "N/A";	 


$allcoation_date1=$r['allcoation_date'];

$allcoation_date = date('d-M-y', strtotime( $allcoation_date1 ));

$wcc_num=$r['wcc_num'];
$wcc_rec_num=$r['wcc_rec_num'];
$total_amnt=$r['total_amnt'];
$total_sgst=$r['total_sgst'];
$total_cgst=$r['total_cgst'];
$total_gst=$r['total_gst'];
$content = ob_get_clean();

$html = '';
$html .= '
<page backtop="25mm" backbottom="30mm"  style="font-size: 12pt">
    <page_header>
    <table class="page_header" style="margin-left:15px;margin-bottom:50px;width:100%;">
            <tr>
                <td  text-align: center;">
                   <img src="headerlogo.jpg" style="width:100%;height:120px;" />
                </td>
            </tr>
        </table>


</page_header>
    <page_footer>
    <table class="page_footer" style="width:100%;margin-left:15px;font-size:17px;">
            <tr>
                <td >
                <hr/>
                <div style="text-align:center;">Regd.Office : Farha Villa, D.No.8-1-22/1/J/1, 7 Tombs Road, Tolichowki, Hyderabad - 500 008. T.S.</div>             
    <div style="text-align:center;">Email : ospsinfo@ospsindia.com, ospshyd@yahoo.com, Website:www.ospsindia.com</div>
<div style="text-align:center;">CIN:U64203TG2004PTC042772</div>
<div style="text-align:center;">Branch Office : A3/302,Kohinoor Estate, Mulla Road, Wakedewadi,Pune-411001.</div>
                  <div style="text-align:center;">  page [[page_cu]]/[[page_nb]]</div>
                </td>
            </tr>
        </table>
    
    
    </page_footer>
    </page>';
$html .= '
<div style="height:10px;"></div>
<h5 align="center"  style="color:#ff0000;">Invoice</h5>
<table  border="1" style="font-size:10.5px;margin:15px;"  width="800" cellpadding="0" cellspacing="0">
<tr>
<td style="width:320px;">
<table  >
<tr>
<td>Invoice No:<br/>Invoice Date:</td>
<td>'.$service_no.'<br/>'.$invdate.'</td>
</tr>
</table>
</td>
<td  style="width:320px;">
<table   >
<tr>
<td>PAN No:-AAACO8174A<br/>GST NO:-36AAACO8174AIZM</td>
<td>STATE:-TELANGANA1255<br/>STATE CODE:-36</td>
</tr>

</table>
 
 
 </td>
 </tr>
 
 <tr>
 <td style="width:320px;">
 <table cellpadding="0" cellspacing="10">
			<tr>
			<td>'.$bt.'</td>
			</tr>
			</table>
 
 
 </td>
 <td style="width:320px;">
 <table >
		  <tr>
		  <td>Po No    '.$po_no.'</td>
		  <td>PO DATE&nbsp;    '.$po_date.'</td>
		  </tr>
		  <tr>
		  <td>Po No    '.$opo_no.'</td>
		  <td>PO DATE&nbsp;    '.$opo_date.'</td>
		  </tr>
		  <tr>
            <td>
			Site Name:'.$site_name.'<br/>
			Indus ID:'.$indus_id.'<br/>
			Seeking Opt ID:'.$seeking_id.'<br/>
			Seeking Opt:'.$seeking_opt.'<br/>
			Allocation Date:'.$allcoation_date.'<br/>
			WCC NO:'.$wcc_num.'<br/>
			WCC RECIEPT NO:'.$wcc_rec_num.'<br/>
			</td>
			<td>
			District:'.$district.',<br/>
			Req.ref.NO :'.$req_ref.',<br/>
			State :'.$state.',<br/>
			'; 
		
	$html .=',<br/>
			<br/><br/><br/>
			
			</td></tr></table></td></tr></table>';
 
 $html .= ' <table style="font-size:8.5px;margin:15px;width:900px;" border="1"  cellpadding="0" cellspacing="0">
 <tr>
<th style="text-align:center;">SNo</th>
<th  style="text-align:center;">ITEM DESCRIPTION</th>
<th style="text-align:center;">HSN/SAC No</th>
<th style="text-align:center;">UNIT</th>
<th style="text-align:center;">Qty</th>
<th style="text-align:center;">RATE</th>
<th style="text-align:center;">TAXABLE AMOUNT</th>


</tr>';

$sq=mysqli_query($link,"select distinct(sgst) from add_mbill where service_no='$service_no' ");
  $count=mysqli_num_rows($sq);
  $cont=mysqli_num_rows($sq);
 $k=1;

 //echo $x;
 while($r=mysqli_fetch_array($sq)){
	 $sggst=$r['sgst'];
	 
	 
	 $sq1=mysqli_query($link,"select  sum(tax_amnt) as tax_amnt,sum(gst_amnt) as gst from add_mbill where service_no='$service_no' and sgst='$sggst'");

 while($r1=mysqli_fetch_array($sq1)){
	 $tax_amnt=$r1['tax_amnt'];
	 $gst=$r1['gst'];

	 

 /*$aa="select a.item_desc,a.primary_uom,a.hsn,a.sac,b.item_code,b.qty,b.price,b.tax_amnt,b.gst_amnt,b.sgst,b.cgst
 from add_bill b,products a where b.service_no='$service_no' and b.item_code=a.item_code and b.sgst='$sggst'";*/
 $aa="select * from add_mbill where service_no='$service_no' and cgst='$sggst' and id1='$id'";
$t=mysqli_query($link,$aa) or die(mysqli_error($link));
$i=1;
while($rows=mysqli_fetch_array($t)){
	$hsn=$rows['hsnno'];
	$sac=$rows['sacno'];
	if($hsn!='0'){
	$hsn=$hsn;
	}else{
		$hsn=$sac;
	}
	$html .='
	<tr >
<th>' . "<br/> ". $i . '</th>
<td style="width:250px;">' . $rows['item_desc'] . '</td>
<th >' . $hsn . '</th>
<th style="width:60px;">' . $rows['uom'] . '</th>
<th style="width:80px;text-align:center;">' . $rows['qty'] . '</th>
<th style="width:80px;text-align:center;">' . $rows['price'] . '</th>
<th>' . $rows['tax_amnt'] . '</th>

</tr>';
	
	$gst_amnt=$t1['gst_amnt'];
$gst_amnt1=$gst_amnt+$gst_amnt1;


$tt_amt=$t1['total_price'];
$tt_amt1=$tt_amt+$tt_amt1;


$tx=$t1['tax_amnt'];
 $tx1=$tx+$tx1;
$total_price=$t1['total_price'];

 
$gst_amnt2=$gst_amnt+$gst_amnt2;
$tst=$gst_amnt1/2;
 $tamt=$tax_amnt+$gst;
	
	
	$i++; }
	
	$html .='<tr>
	<td colspan="4" rowspan="4"></td>
<td colspan="2" align="right" style="font-size:11px;"><b>Basic Amounts -'.$k.'</b></td><th>'.$tax_amnt.'</th></tr>
 <tr>
 <td  colspan="2" align="right" style="font-size:11px;"><b>CGST'.$sggst.'%</b></td>
 <th>'.$total_sgst .'</th>
 </tr>
 <tr>
 <td colspan="2" align="right" style="font-size:11px;"><b>SGST'.$sggst.'%</b></td>
 <th>'.($total_sgst).'</th>
 </tr>
 <tr>
 <td colspan="2" align="right" style="font-size:11px;"><b>Total Amount </b></td>
 <th>'. $tamt.'</th>
 </tr>';
	

 $k++; } } 
	$html .='<tr><td colspan="4" rowspan="4"></td>
 <td colspan="2" align="right" style="font-size:11px;"><b>Basic Amounts - A</b></td>
 <th>'.$total_amnt.'</th></tr>
 <tr>
 <td  colspan="2" align="right" style="font-size:11px;"><b>CGST 9%</b></td>
 <th>'.$total_cgst.'</th>
 </tr>
 <tr>
 <td colspan="2" align="right" style="font-size:11px;"><b>SGST 9%</b></td>
 <th>'.$total_sgst.'</th>
 </tr>
 <tr>
 <td colspan="2" align="right" style="font-size:11px;"><b>Total Amount </b></td>
 <th>'.$tamt.'</th></tr> 
 <tr>	<th colspan="4">';
 
 $tmt=round($tamt);
      
     
     $number = round($tmt);
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
 
 
 
			$html .='Total Invoice Amount in Words:Rupees- "'.strtoupper($result) .  $points .' ONLY  	</th>
        <th colspan="4" style="font-size:11px;">For OSPS Telecom Services Pvt.Ltd.
        <br/><br/>
	   <br/>  <br/>  <br/>
        Authorized Signatory
        
        </th></tr> ';
 $html .='</table>';
 
 
 
        require_once('html2pdf/html2pdf.class.php');


        $html2pdf = new HTML2PDF('P', 'A4', 'fr');

        $html2pdf->setDefaultFont('Arial');
        
       $html2pdf->writeHTML($content, isset($_GET['vuehtml']));

        $html2pdf = new HTML2PDF('P', 'A4', 'fr',false, 'UTF-8', array(mL, mT, mR, mB));
		 //$html2pdf->WriteHTML($content);
//$html2pdf->SetHeader();
$html2pdf->setTestIsImage(false);
     


        $html2pdf->WriteHTML($html);
	      
        $separator = md5(time());
        $eol = PHP_EOL;
        //$filename = "pdf-document.pdf";
		$content = $html2pdf->Output('minvoice-'.$id.'.pdf','F');
		
		
		
		header('Location:map.php?id='.$id.'&loc='.$loc.'&email='.$email.'&sno='.$service_no);
		
		//exit;
		
        


        /**/
    

?>

