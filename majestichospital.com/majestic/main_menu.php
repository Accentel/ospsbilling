<?php
$name=$_SESSION['name1'];
	if($name == "admin")
	{
	//echo "hi";
	include("menu/menu.php");
	//include("main_menu old.php");
?>
<?php
	}
	else
	{
	//echo "welcome";
		//include("main_menu1.php");
	include("menu/menu1.php");
	//echo "hi";
	}	
	?>
 