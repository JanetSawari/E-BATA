

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<title>ELECTRONICS</title>
	<link rel="stylesheet" href="css/template.css" type="text/css" />
	<link rel="stylesheet" href="css/maini.css" type="text/css">
	<script type="text/javascript" src="js5/jquery.js"></script>
	<script type="text/javascript" src="js5/jquery.slideshow.min.js"></script>
	<script type="text/javascript" src="js5/jquerytiming.js"></script>
    <script type="text/javascript" src="ajaxslide.js"></script>
	
	
<script src="Scripts/jquery-latest.js" type="text/javascript"></script>
<script src="Scripts/thickbox.js" type="text/javascript"></script>
<link href="css/thickbox.css" rel="stylesheet" type="text/css" />


<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<script src="Scripts/jquery-latest.js" type="text/javascript"></script>

<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
</head>


<body>
	<div id="header">
	<div id="headerinside">	
		
 <div  align="left"id="logo"><img src="images/logo.png" width="261" height="40"></div>	
		
	</div>
	<div id="topmenu">
	
	
	<A HREF="index.php?e=""">HOME</A>
	<A HREF="mobiles.php?e=""">LADIES</A>
	<A HREF="office_electronics.php?e=""">MEN</A>
	<A HREF="home_electronics.php?e=""">KIDS</A>	
	<a href="contacts.php?e=""">CONTACTS</a>	
	
	</div>
<div id="search" align="center">  
           <div align="center" style="float:left;  width:450px; margin:auto;">  <form  method="get" action="result.php">   
          SEARCH BY KEYWORD:
          <input name="keyword" type="text"  size="50" class="inputbox" />		 
		  <input name="itemnumber" type="hidden"value="0"  />
		  <input name="rows" type="hidden"value="0"  />
		   <input name="category" type="hidden"value=""   />
		    <input name="region" type="hidden"value=""   />		    
			<input type="hidden"  name="e" value="" />		   
          <input name="submit" type="submit" id="submit" value="Find" />
          <input type="reset" name="Reset" value="Reset" />      
      	  </form></div>
		  
		 <div align="center" style=" width:450px; float:left">		
		<form method="get" action="details.php" >
		SEARCH BY ITEM NUMBER:
		<input type="text"   name="itemnumber" size="35"class="inputbox" />
			<input type="hidden"  name="e" value="" />	
		<input type="submit" value="Find" />
		 <input type="reset" name="Reset" value="Reset" />
		</form></div>
			
</div>

	</div>  

<div id="container">
<img src="images/top-header.jpg" />



<div id="inner_contentColumn" class="middlecolumn" align="center" >

	<div id="wrong">
	 
	  
	  
	  <?php
	include 'connect.php';
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
	
	$username=$_POST["username"];
	$password=$_POST["password"];
		
	$strSQL = "SELECT * FROM administrators where username='$username'";	
	$rs = mysql_query($strSQL);
	if(mysql_num_rows($rs)!=0)
	{
		
	while($row = mysql_fetch_array($rs))
	 {
	 
	 if ($row['status']==1)
	 
	   {
	  
	   if($_POST["attempts"]<3)
	     {	
			
  		if(($password==$row['pass'])&& ($username==$row['username']))
				{
					// If correct, we set the session to YES
	 			   
				$Login="YES";    		
	 			mysql_query("UPDATE administrators SET logged='".$Login."' WHERE username='".$username."'");	 
	 			 $username = $_POST["username"];
				
				 				 
				 echo "<script type='text/javascript'>
				document.location = 'controlpanel.php?e=".$username."';
				</script>";

				// header("Location:controlpanel.php");
	 
				}//end if pass
					else {	 
					// If not correct, we set the session to NO				  
				   					  
	 			   		$attempts=$_POST["attempts"]+1;				
				   		$left=3-$attempts;				
				  		echo "<br><br>";
				 		echo "<p><b>Your username and password combination is incorrect!!</b><br><br></p>";
				  		echo "<p><a href='admin.php?attempts=".$attempts."&&number=".$_POST["number"]."'>Try Loging In Once Again</a><br><b></p>";
				  		echo "<p>YOU HAVE ".$left." ATTEMPTS LEFT!!!<br><br></p>";
						}//end else incorrect 
	  		}//end if attempts
			  else{
			      mysql_query("UPDATE administrators
  			      SET status=2
			      WHERE username='$username'");
			      echo "<br><br><br>";
			      echo "<p>DUE TO TOO MANY LOG-IN ATTEMPTS,YOUR ACCOUNT IS NOW LOCKED.TO UNLOCK, CONTACT ANOTHER ADMINISTRATOR</p>"; 					
			     }//end else too many			
		}//end if status 
			else
			{
			echo "<br><br><br>";
			echo "<p>SORRY! YOUR ACCOUNT IS LOCKED. TO UNLOCK, CONTACT ANOTHER ADMINISTRATOR</p> ";
			}//end else locked	
		}//end while				
	}//end if username
	else
	{
	$attempts=$_POST["attempts"]+1;				
	$left=3-$attempts;
	echo "<br><br><br>";
	echo "<p>SORRY! THE USERNAME YOU ENTERED DOES NOT EXIST</p> ";
	$number=$_POST["number"];
	echo "<p><a href='admin.php?attempts=".$attempts."&&number=".$number."'>Try Loging In Once Again</a><br><b></p>";
	echo "<p>YOU HAVE ".$left." ATTEMPTS LEFT!!!<br><br></p>";
	 if($left==0)echo "<script type='text/javascript'>
				document.location = 'administration.php';
				</script>";//header("Location:administration.php");
	}//end else USERNAME
	// Close the database connection
	mysql_close();
	?>
	  
	   
	 	
	  
	      

	
	</div>
	</div>		



<div id="footer">
<P align="center">© Copyright | 2014|  ~ All Rights Reserved|   <A HREF="administration.php">Admin Login</A></p>

<img src="images/botround.jpg" width="980" height="15" alt="" />
</div>
</div>
</body>
</html>
