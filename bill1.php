<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');
include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
    </style>
	<script>
   
        function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
    }
    </script>
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
                </script>
                
                 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
  // When the browser is ready...
  $(function() {
    // Setup form validation on the #register-form element
    $("#register-form").validate({
        // Specify the validation rules
        rules: {
            site_name: "required",
            district: "required",
            indus_id: "required",
            state: "required",
            allcoation_date: "required",
            po_no: "required",
            po_date: "required",
            type_work: "required",
            service_no: {
                required: true,
                remote: "emailcheck1.php?data=service_no"
            },
            wcc_num: {
                required: true,
                remote: "emailcheck1.php?data=wcc_num"
            },
            wcc_rec_num: {
                required: true,
                remote: "emailcheck1.php?data=wcc_rec_num"
            }
        },
        messages: {
            site_name: "Enter Site Name",
            district: "Enter District",
            indus_id: "Enter Indus ID",
            state: "Enter State",
            allcoation_date: "Enter allcoation_date",
            po_no: "Enter Po No",
            po_date: "Enter Po Date",
            type_work: "Enter Type of Work",
            service_no: {
                required: "Please enter Serial Number",
                remote: "Serial Number Already Entered"
            },
            wcc_num: {
                required: "Please WCC Number",
                remote: "WCC Number Already Entered"
            },
            wcc_rec_num: {
                required: "Please Enter WCC Receipt Number",
                remote: "WCC Receipt Number Already Entered"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
  });
</script>

  <script type="text/javascript">
function report()
{
   		

	  window.open('list.php','mywindow1','width=1020,height=700,toolbar=no,menubar=no,scrollbars=yes')

	
}
</script>

 <script>
function showHint22(str)
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
	
	//document.getElementById("state").value=strar[1];
	
	//document.getElementById("city").value=strar[2];	
	document.getElementById("site_name").value=strar[1];	
	document.getElementById("district").value=strar[2];
    document.getElementById("state").value=strar[3];
	document.getElementById("indus_id").value=strar[4];	
	document.getElementById("seeking_id").value=strar[5];
	document.getElementById("seeking_opt").value=strar[6];
	document.getElementById("po_no").value=strar[7];
	document.getElementById("allcoation_date").value=strar[8];
	//document.getElementById("last").value=strar[11];
    }
  }
xmlhttp.open("GET","get-data1.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
 $(document).on('keyup', '.txt1', function(){
 var id=$(this).attr('data-row');
 
 var qty=document.getElementById('qty'+id).value;
 var price=document.getElementById('price'+id).value;
 
 
 bal=parseFloat(qty)*parseFloat(price);
 document.getElementById('amnt'+id).value=bal;
 calculateTotal1();
 
 });
 
 
 $(document).on('keyup', '.txt20', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var sgst=document.getElementById('sgst'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(sgst))/100;
 document.getElementById('sgstamt'+id).value=bal;
 calculateTotal2();
 
 });
 
 $(document).on('keyup', '.txt21', function(){
 var id=$(this).attr('data-row');
 
 var amt=document.getElementById('amnt'+id).value;
 var cgst=document.getElementById('sgst'+id).value;
 
 
 bal=(parseFloat(amt)*parseFloat(cgst))/100;
 document.getElementById('cgstamt'+id).value=bal;
 calculateTotal3();
 
 });
 
 
 function calculateTotal1(){
	subTotal = 0 ; total = 0; 
	$('.txt').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#tot').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 function calculateTotal2(){
	subTotal = 0 ; total = 0; 
	$('.txt50').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#sgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 function calculateTotal3(){
	subTotal = 0 ; total = 0; 
	$('.txt51').each(function(){
		
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#cgsttotal').val( subTotal.toFixed(2) );
	//$('#bamount').val( subTotal.toFixed(2) );
}
 
 </script>

                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>
         

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
								<li>
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">SMTS Billing</a>
                            </li>
                            <li>
                                <a href="#"> Fund Request</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Raise Bill request

                            </h1>
                        </div>
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                    
                                       
 <form name="frm" method="post" id="register-form" action="bill_suc.php">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr><td align="right">Serial No</td><td align="left"><input type="text" id="service_no" class="form-control"  name="service_no"></td>
                                          
                                           <td align="right">Paid To</td><td>
                                            <input id=\"pname\" list=\"city1\" name="req_ref" required class="form-control" onblur="showHint22(this.value,1)" >
<datalist id=\"city1\" >

<?php 
$sql="select distinct req_ref from refferences ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysqli_error($link));
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[req_ref]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
                                           
                                          <!-- <input type="text" name="req_ref" onChange="showHint22(this.value)" required class="form-control">--></td>
                                          <tr><td align="right">Work Description</td><td align="left"><input type="text"  class="form-control" name="site_name" id="site_name"></td>
                                        <td align="right">Fund Req. Date</td><td><input type="date" value="<?php echo date('Y-m-d')?>"  name="po_date"  class="form-control"></td>
                                        </tr>
                                        
                                        
                                        <tr><td align="right">Account No</td><td align="left"><input  type="text"  class="form-control" name="po_no" id="po_no"></td>
                                        <td align="right">IFSC Code</td><td><input type="text" name="district" id="district"  class="form-control"></td>
                                        
                                    </tr>
                                        <tr><td align="right">Account Name </td><td align="left"><input type="text"  class="form-control" name="indus_id" id="indus_id"></td>
                                       
                                            <td align="right">Invoice Date</td><td align="left"><input type="date"  name="inv_date"  value="<?php echo date('Y-m-d')?>" class="form-control"></td></tr>
                                        
                                        </tr>
                                         <tr><td align="right">Project</td><td align="left"><input type="text"  class="form-control" name="seeking_id" id="seeking_id"></td>
                                        <td align="right">State</td><td><input type="text" name="state" id="state"  class="form-control"></td>
                                        </tr>
                                        <tr><td align="right">Site ID</td><td align="left"><input type="text"  class="form-control" name="seeking_opt" id="seeking_opt"></td>
                                        <!-- <td align="right">RFAID date</td><td><input type="date" name="rfaid_date"   class="form-control"></td> -->
                                        <td align="right">Site Name</td><td><input type="text" name="state" id="state"  class="form-control"></td>    
                                    </tr>
                                        <tr><td align="right">Responsible Person</td><td align="left"><input type="text" name="wcc_num" id="wcc_num"   class="form-control"></td>
                                        <!-- <td align="right">WCC NO</td><td><input type="text" name="wcc_num" id="wcc_num"  class="form-control"> -->
                                        <!-- <button type="button" value="VIEW LIST" onclick="report();">VIEW LIST</button></td> -->
                                        <td align="right">Cluster </td><td><input type="text" name="state" id="state"  class="form-control"></td>   
                                    </tr>
                                         <!-- <tr>
                                        <td align="right">WCC Reciept NO</td><td><input type="text" name="wcc_rec_num" id="wcc_rec_num"  class="form-control"></td>
                                        <td align="right">Type of Work</td><td><input type="text" name="type_work" id="type_work"   class="form-control"></td>
                                        </tr> -->
                                        <tr>
                                        <td align="right">Category</td><td><input type="text" name="pcw" id="pcw"  class="form-control"></td>
                                        <td align="right"><strong>TOTAL AMOUNT</strong> </td><td><input type="text" type="text"   name="tot" id="tot" value="<?php echo $tot1; ?>" class="form-control"></td>
                                       </td>
                                        </tr>
                                        </table>
                                        
                                        
                                      
										  
                                        <!-- <tr><td  align="right"><strong>Total Amount</strong></td>
                                        <td colspan="1"><strong><input type="text" style="width:60px;"  name="tot" id="tot" value="<?php echo $tot1; ?>" />
                                        <input type="hidden" name="tot1" id="tot1" />
                                        </strong></td>
										 -->
									
										<!-- <td><input type="text" style="width:60px;" readonly name="sgsttotal" id="sgsttotal" value="<?php echo $sgsttotal1 ?>"/></td>
										<td><input type="text" style="width:60px;" readonly name="cgsttotal" id="cgsttotal" value="<?php echo $cgsttotal1 ?>"/></td> -->
										
										</tr>
										</tbody>
                                        </table>
                                        
                                        <div class="form-group">
                                        <div class="col-md-offset-5 col-md-3">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="add_bill.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                        
                                        
                                        <!--<script src="assets/js/jquery-2.1.4.min.js"></script>-->

<!-- <![endif]-->
<script>
/*$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
calculateTableSum(currentTable);
});*/

$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal1();
	calculateTotal2();
	calculateTotal3();
});
var i=$( "#cnt" ).val();

$(".addmore").on('click',function(){
    i++; 
	var data ="<tr>";
    data +="<td><input type='checkbox' class='case'/></td>";
	data +="<td>"+i+"</td>"; 
    data +="<td><input type='text' name='sno[]' style='width:30px;' value=''></td>";          
    data +="<td><input type='text' name='item_code[]' style='width:120px;' value=''></td>";
	data +="<td> <input type='text' name='item_desc[]' style='width:120px;' value=''></td>";          
    data +="<td><input type='text' name='uom[]' value='' style='width:70px;'></td>";
	data +="<td><input type='text' name='qty[]' data-row='"+i+"' value='' style='width:60px;' class=' ' id='qty"+i+"' onkeyup='val(this.value)' /> </td>"; 
	data +="<td><input type='text' name='price[]' data-row='"+i+"' id='price"+i+"' style='width:70px;' value='' class='txt1 ' onkeyup='val(this.value,"+i+")' /></td>";
    data +="<td> <input type='text' name='sgst[]' data-row='"+i+"'  value='' style='width:60px;' class='txt20'   id='sgst"+i+"' /></td>";          
    data +="<td><input type='text' name='cgst[]' data-row='"+i+"' value='' style='width:60px;' class='txt21'    id='cgst"+i+"' /></td>";
   
   data +="<td><input type='text' name='amnt[]' data-row='"+i+"' value='' style='width:60px;' readonly class='txt' id='amnt"+i+"' /> </td>";          
    data +="<td><input type='text' name='hsn[]' value='' style='width:50px;'  id='hsn' />	   </td>";
	data +="<td> <input type='text' name='sac[]' value='' style='width:50px;'  id='sac' />   </td>";          
    data +="<td><input type='text' name='sgstamt[]' data-row='"+i+"' value='' readonly style='width:60px;' class='txt50'  id='sgstamt"+i+"' /></td>";
   data +="<td><input type='text' name='cgstamt[]' data-row='"+i+"' value='' style='width:60px;' readonly  class='txt51' id='cgstamt"+i+"' /></td>";
	data +="</tr>";
	$('#dynamic-table1 ').append(data).find('#dynamic-table1>tbody>tr:nth-child(2)');
	

	});
function select_all() {
	$('input[class=case]:checkbox').each(function(){ 
		if($('input[class=check_all]:checkbox:checked').length == 0){ 
			$(this).prop("checked", false); 
		} else {
			$(this).prop("checked", true); 
		} 
	});
}
</script>
<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
                            if ('ontouchstart' in document.documentElement)
                                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- page specific plugin scripts -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.flash.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>
        <script src="assets/js/buttons.colVis.min.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script> 
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>

        <!-- ace scripts -->
       <!-- <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>-->
                                        
                                    <!--<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>-->  
                                      <script type="text/javascript">

function val(str,id)
{
cal=0;

var price=document.getElementById("price"+id).value;
var qty=document.getElementById("qty"+id).value;
var sgst=document.getElementById("sgst"+id).value;
var cgst=document.getElementById("cgst"+id).value;
var gst=Math.abs(sgst)+Math.abs(cgst);
cal=eval(price)*eval(qty);
document.getElementById("amnt"+id).value=Math.abs(cal);	

cal1=eval(price)*eval(qty)*eval(gst)/100;
document.getElementById("gst_amnt"+id).value=Math.abs(cal1);



}</script>
<script>
$(document).ready(function(){
$(".txt1").each(function(){
$(this).keyup(function(){
calculateSum();
});
});
});
function calculateSum(){
var sum=0;
$(".txt").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot").val(sum.toFixed(2));

}
</script> 

<script>
$(document).ready(function(){
$(".txt2").each(function(){
$(this).keyup(function(){
calculateSum1();
});
});
});
function calculateSum1(){
var sum=0;
$(".txt3").each(function(){
if(!isNaN(this.value)&&this.value.length!=0){
sum+=parseFloat(this.value);
}});
$("#tot1").val(sum.toFixed(2));

}
</script> 
<?php mysqli_close($link); ?>
</body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>
