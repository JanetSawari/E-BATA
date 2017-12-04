<html>
<?php
include 'connect.php';
$username=$_REQUEST['e'];
   mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
		
	   
mysql_query("update orders set completed='YES' WHERE order_no='".$_REQUEST['orderno']."'");


	
	 echo "<script type='text/javascript'>
				document.location = 'controlpanel.php?e=".$username."';
				</script>";
?>
</html>