<?php include 'connect.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
<link rel="stylesheet" href="css/template.css" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.slideshow.min.js"></script>
	<script type="text/javascript" src="js/jquerytiming.js"></script>

<title>Bata Shoes</title>
</head>

<body>
<div id="main">
	<div class="header">	
		
			</div>
	
	
	<div id="topmenu">		
				
	<A HREF="index.php" >HOME</A>
	<A HREF="document.php">ABOUT US</A>
	<A HREF="document.php">CONTACTS</A>
	<A HREF="register.php">DIRECTORS</A>
	
	</div>
		</div>
		<div id="search" align="center">  
           <P align="center">  <form  method="get" action="result.php">   
          KEYWORD:
          <input name="keyword" type="text"  class="inputbox" />
		  MANUFACTURER:
          <input name="manufacturer" type="text"  class="inputbox" />
		  MODEL:
          <input name="model" type="text"  class="inputbox" />
		  <input name="itemnumber" type="hidden"value="0"  />
		  <input name="rows" type="hidden"value="0"  />
		   <input name="category" type="hidden"value=""   />		   
          <input name="submit" type="submit" id="submit" value="Find" />
          <input type="reset" name="Reset" value="Reset" />      
      	  </form></p> </div>		
	
	
	<div style="clear:both"></div>

<div id="leftColumn" class="column">
		<div class="module_menu">
		<div >
<h3>PHONES</h3>
<ul>	<?php
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
	$strSQL = "SELECT DISTINCT manufacturer FROM item WHERE category= 'phones' ";
	$rs = mysql_query($strSQL);
	while($row = mysql_fetch_array($rs))
	 {	
	 $manufacturer=$row['manufacturer'];
	 
	echo "<li><a href=results.php?itemnumber=0&rows=0&category=phones&manufacturer=".$manufacturer. ">".$manufacturer."</a></li>";
	 
	 
	} 
	 
	?>


		</ul>
				
</div></div>
		
		
	
		<div class="module_menu">
		<div >			
		<h3 align="center">NEW ITEMS</h3>		
		<ul>
		<?php
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
	$strSQL = "SELECT * FROM new  where onoroff=1";
	$rs = mysql_query($strSQL);
	while($row = mysql_fetch_array($rs))
	 {	
	  $new=mysql_query("SELECT * FROM item   where itemnumber=".$row['itemnumber']."");
	 while($row = mysql_fetch_array($new))
	 {
	 $name=$row['manufacturer']." ".$row['model'];
	 
	 echo "<li><a href=details.php?itemnumber=".$row['itemnumber'].">" .$name . "</a></li>";
	} 
	} 
	?>
	</ul>		
	</div></div>
					
</div>



<div id="inner_contentColumn" class="middlecolumn" align="center" >

	<div id="slideshow" >
		<?php
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());	
	$strSQL = "SELECT * FROM deals where onoroff=1";
	$rs = mysql_query($strSQL);
	while($row = mysql_fetch_array($rs))
	 {
	  $slides=mysql_query("SELECT * FROM item   where itemnumber=".$row['itemnumber']."");
	 while($row = mysql_fetch_array($slides))
	 {
	
	 echo "<a href=details.php?itemnumber=".$row['itemnumber']."><img  src=images/" .$row['image'] . " width='400px'height='200'></img></a>";
	
	}
	} 
	?>
	
	  </div>
<div id="slideshowstill">
		
	<table width="400" cellspacing="10">
	<tr><td colspan="4" bgcolor="#000000" height="25px" align="center"><font color="#FFFFFF"><b>TOP DEALS</b></font> </td></tr>
	<tr >
	
		<?php
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());	
	$strSQL = "SELECT * FROM deals  where onoroff=1";
	$rs = mysql_query($strSQL);
	$cells=0;
	while($row = mysql_fetch_array($rs))
	 {	
	 $platinum=mysql_query("SELECT * FROM item   where itemnumber=".$row['itemnumber']."");
	 while($row = mysql_fetch_array($platinum))
	 {
		 	   	

if ($row['image']!=NULL)
{

echo "<td align=center>";

	echo "<a href=details.php?itemnumber=".$row['itemnumber']."><img align=center  src=images/".$row['image']. " width='80' height='60'></img><br>"; 

	
		}

	 	$name=$row['manufacturer']." ".$row['model'];
	 echo "<a href=details.php?itemnumber=".$row['itemnumber'].">" .$name . "</a>";
	echo "</td>";
	$cells=$cells+1;
	if($cells==4)
	{
	echo "</tr><tr>";
	$cells=0;
	}
	}
	} 
	?>
	</tr>
	</table>
		</div>

	</div>		



<div id="rightColumn" class="column">
	<div class="module_menu">
	     <div > 
		    <h3>ACCESSORIES</h3>
			<ul>
	<?php
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
	$strSQL = "SELECT DISTINCT manufacturer FROM item WHERE category= 'accessories' ";
	$rs = mysql_query($strSQL);
	while($row = mysql_fetch_array($rs))
	 {	
	 $manufacturer=$row['manufacturer'];
	 
	echo "<li><a href=results.php?itemnumber=0&rows=0&category=phones&manufacturer=".$manufacturer. ">".$manufacturer."</a></li>";
	 
	 
	} 
	 
	?>

</ul>
			
        </div>
	</div>	
 </div>

		
			<div style="clear:both"></div>
			

	<div id="footer">	
	<hr />
	<div style="color:#698F48;"><center>Copyright © 2012 CoolLinks. All Rights Reserved|<A HREF="administration.php"> Admin</A></center></div>
</div>
</div>



</body>
</html>