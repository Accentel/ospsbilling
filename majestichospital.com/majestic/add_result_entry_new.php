<?php //include('config.php');
session_start();
ini_set('display_errors', 1);
include('config.php');
if($_SESSION['name1'])
{
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
     $('#loader').bind('ajaxStart', function(){
    $(this).show();
}).bind('ajaxStop', function(){
    $(this).hide();
});
/*$().ready(function() {
	$("#bno").autocomplete("set7.php", {
		width: 150,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});

});*/
</script>
<style>
  .loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
 
  width: 50px;
  height: 50px;
  animation: spin 2s linear infinite;
}
.loaders{
    align-items: center;
}


@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<script>
function showlabbillnos()
{
  //document.getElementById("loaders").style.display="block";
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
   // document.getElementById("country5").innerHTML=xmlhttp.responseText;
	//document.getElementById("country5").innerHTML=show;
	var show=xmlhttp.responseText;
	document.getElementById("loaders").style.display="none";
	//alert(show);
	document.getElementById("billnos").innerHTML=show;
	//document.location.reload();
    }
  }
xmlhttp.open("GET","loadbillnos.php",true);
xmlhttp.send();
}
function showHint(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
  document.getElementById("loaders").style.display="block";
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
	document.getElementById("loaders").style.display="none";
	var show=xmlhttp.responseText;
	var strar=show.split("@");
	//document.getElementById("supname").value=strar[2];
	//alert(strar);
	document.getElementById("bdate").value=strar[1];
	document.getElementById("pname").value=strar[2];	
	document.getElementById("age").value=strar[3];
    document.getElementById("gender").value=strar[4];
	document.getElementById("dname").value=strar[5];
	document.getElementById("testnames").innerHTML=strar[6];
    
	document.getElementById("invgtable").innerHTML=strar[7];
    document.getElementById("rows").value=strar[8];
    }
  }
xmlhttp.open("GET","search1.php?q="+str,true);
xmlhttp.send();
}


</script>

<script>
showlabbillnos();
function showHint1(str)
{
//alert(str);
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
	var strar=show.split("@");
//alert(strar);	
	document.getElementById("invgtable").innerHTML=strar[1];
    document.getElementById("rows").value=strar[2];
    }
  }
xmlhttp.open("GET","search001.php?q="+str,true);
xmlhttp.send();
}
</script>	
	</head>

	<body>
	    
    
  
	<div id="conteneur">

		 
    </div>
			
			  <?php
			  include("logo.php");
				include("main_menu.php");
			  ?>
			   
		<div id="centre" style="height:auto;">
		<?php 
                 $id=$_REQUEST['bno'];
                $sql="SELECT * FROM bill WHERE BillNO = '$id'";
                $result = mysqli_query($link,$sql)or die(mysqli_error($link));
                                while($row=  mysqli_fetch_array($result)){
                                    $billno=$row['BillNO'];
                                     $PatientName=$row['PatientName'];
                                      $BillDate=$row['BillDate'];
                                       $Age=$row['Age'];
                                        $Sex=$row['Sex'];
                                         $DoctorName=$row['DoctorName'];
                                }
                
                                /*start*/
                                
//$sql="SELECT * FROM bill WHERE BillNO = '$q'";

           /*end*/
                                

                ?>
          <div align="center" style="font-size:20px;color:red;font-weight:bold;margin-bottom:20px;">Result Entry</div>
		  <form name="frm" method="post" action="insert_result.php">
			<table width="100%" border="0" cellpadding="4" cellspacing="0">
                                
                    <tr >
                        <td align="right" >Bill No. :</td>
                        <td align="left" >
                            <input type="text" name="bno" value="<?php echo $billno ?>" id="bno" class="text" list="billnos" onchange="showHint(this.value)" ontab="showHint(this.value)"/>
                            <datalist id="billnos" >
</datalist><br/><b style="color:red;">(Note:please wait for 2 sec for bill no's to load)</b>
                        </td>
						 <td align="right" >Bill Date :</td>
                        <td align="left" >
                            <input type="text" name="bdate" value="<?php echo $BillDate ?>" id="bdate" style="width:188px;height:20px;" readonly class="tcal"/>
                        </td>
						
                    </tr>
					<tr >
                        <td align="right" >Patient Name :</td>
                        <td align="left" >
                            <input type="text" name="pname" readonly id="pname" class="text" value="<?php echo $PatientName ?>" /><input type="hidden" name="user" value="<?php echo $_SESSION['name1']; ?>"/>
                        </td>
						<input type="hidden" name="rows" readonly id="rows" class="text" />
                        
						 <td align="right" >Age :</td>
                        <td align="left" >
                            <input type="text" name="age" readonly id="age" class="text" value="<?php echo $Age ?>"/>
                        </td>
                    </tr>
					<tr >
                        <td align="right" >Gender :</td>
                        <td align="left" >
                           <input type="text" name="gender" readonly id="gender" class="text" value="<?php echo $Sex ?>"/>
							
                        </td>
						 <td align="right" >Doctor Name :</td>
                        <td align="left" >
                            <input type="text" readonly name="dname" id="dname" class="text"/>
							
                        </td>
                    </tr>
                     <div class="loader" id="loaders"  style="display:block">
					<tr>
						<td colspan="4" id="testnames">
							
						</td>
					</tr>
                     <tr >
					 <td colspan="4">
                       <table width="100%">
                     
					 <tr >
						<td colspan="4" id="invgtable">
						
						</td>
					 </tr>
					 </table>
					 </td>
                    </tr>
					
           
        </table>
                      
                      
		 <div align="center"><input type="submit" name="submit" value="Save" Class="butt"/> <input type="button" value="Close" Class="butt" onclick="window.location.href='result_entry.php'"/></div>
        
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

header('Location:index.php?authentication failed');

}

?>