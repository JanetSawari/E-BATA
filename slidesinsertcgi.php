
<?php
 include 'connect.php';
if(isset($_REQUEST["e"])){
$username=$_REQUEST["e"];
	if($username==""||$username==NULL)
	{
  echo "<script type='text/javascript'>
				document.location = 'administration.php';
				</script>";exit;
				}
	else
	{
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
		
	    $strSQL = "SELECT * FROM administrators where username='$username'";
		$rs = mysql_query($strSQL);
	       while($row = mysql_fetch_array($rs))
	                {
		             if($row['logged']=="NO")
		             {	        
	                 echo "<script type='text/javascript'>
				          document.location = 'administration.php?e=''';
				           </script>";exit;
						   }
					}
				}
			        
	}
	else
	{
	 echo "<script type='text/javascript'>
				document.location = 'administration.php';
				</script>";exit;
				}
	
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
	
	$itemnumber=mysql_real_escape_string($_REQUEST["itemnumber"]);
	$tebo=mysql_real_escape_string($_REQUEST["tebo"]);	
	
	
	mysql_query("INSERT INTO $tebo
	 (`itemnumber`)
 	VALUES
  	('$itemnumber')") or die (mysql_error());
	
			
	
	mysql_close();
	$username=$_REQUEST["e"];	 
	  if($tebo == "deals"){setcookie("success",1, time()+60);}
	  $ttebo=$_REQUEST["ttebo"];
	  	 
	  if($ttebo == "Tnew"){setcookie("success4",1, time()+60);}
	  
	
			
echo "<script type='text/javascript'>
				document.location = 'controlpanel.php?e=".$username."';
				</script>";exit;
				
	
	?>