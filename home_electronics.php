<?php include 'connect.php';$email=""; ?>	
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
<?php include 'topnav.php'; ?>
<div id="search" align="center">  
           <div align="center" style="float:left;  width:450px; margin:auto;">  <form  method="get" action="result.php">   
          SEARCH BY KEYWORD:
          <input name="keyword" type="text"  size="50" class="inputbox" />		 
		  <input name="itemnumber" type="hidden"value="0"  />
		  <input name="rows" type="hidden"value="0"  />
		   <input name="category" type="hidden"value=""   />
		    <input name="region" type="hidden"value=""   />		    
			<input type="hidden"  name="e" value="<?php echo $email;?>" />		   
          <input name="submit" type="submit" id="submit" value="Find" />
          <input type="reset" name="Reset" value="Reset" />      
      	  </form></div>
		  
		 <div align="center" style=" width:450px; float:left">		
		<form method="get" action="details.php" >
		SEARCH BY ITEM NUMBER:
		<input type="text"   name="itemnumber" size="35"class="inputbox" />
			<input type="hidden"  name="e" value="<?php echo $email;?>" />	
		<input type="submit" value="Find" />
		 <input type="reset" name="Reset" value="Reset" />
		</form></div>
			
</div>

	</div>  

<div id="container">
<img src="images/top-header.jpg" />

    
    
    

	<div style="clear:both"></div>	
	<div id="leftsidebar">	
	<div style="padding-right:10px;padding-left:10px">
			
	<div align="center" style="margin-top:10px" id="user4">
	
	
	 <div class="moduletable_menu" style="min-height:250px;" >
	<h3>KIDS CATEGORIES</h3>
		<ul >
        	<?php
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
	$strSQL = "SELECT DISTINCT manufacturer FROM item WHERE category= 'kids' ";
	$rs = mysql_query($strSQL);
	while($row = mysql_fetch_array($rs))
	 {	
	 $manufacturer=$row['manufacturer'];
	 
	echo "<li><a href=home_electronics.php?itemnumber=0&rows=0&category=kids&manufacturer=".$manufacturer. ">".$manufacturer."</a></li>";
	 
	 
	} 
	 
	?>


		</ul>
				
  </div>	
	
				
	</div>		
	</div>	
	</div>

	<div id="main2">

 <table width="700" cellspacing="10">
	
	<tr >
		  
	<?php

	
   
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
	if(isset($_GET["manufacturer"])){
	$manufacturer=mysql_real_escape_string($_GET["manufacturer"]);
	}
	$category=mysql_real_escape_string($_GET["category"]);
	$itemnumber=mysql_real_escape_string($_GET["itemnumber"]);	
	$oldnumber=$itemnumber;
	
	if(isset($_GET["manufacturer"])){
    $query="select * from item where itemnumber >'".$itemnumber."'  and category= '".$category."'
	and manufacturer like '%".$manufacturer."%' ORDER BY itemnumber ";
	}
	else
	{
	$query="select * from item where itemnumber >'".$itemnumber."'  and category= '".$category."' ORDER BY itemnumber ";
	}
	
	$rs = mysql_query( $query);
	if(mysql_num_rows($rs)==0){
		echo("NO RECORDS FOUND!!");
	}
	else
	{
	$numberofrows=mysql_num_rows($rs);
	$counter=0;
	$cells=0;
	
	
	/*echo"<h2 align=center><u>".$numberofrows." records to check out!</u></h2>";*/

	while($row= mysql_fetch_array($rs)) {
	echo "<td align=center>";
	
	  
	   echo "<a href=details.php?itemnumber=".$row['itemnumber']." ><h5 align=center><u>".$row['manufacturer']." ".$row['model']. "</u> </h5></a>";	  	
		

if ($row['image']!=NULL)
	echo "<a href=details.php?itemnumber=".$row['itemnumber']." ><img align=center src=images/".$row['image']. " width='80' height='100'></img></a><br>";	  
	  	if ($row['price']>0)	 
	  echo "<font color=red align=center >Price:<br></font><b> Ksh ". $row['price'] . "</b><br>";	  
	
		echo "</td>";
	$cells=$cells+1;
	if($cells==7)
	{
	echo "</tr><tr>";
	$cells=0;
	}
	
	
	  $counter=$counter+1;	 
	  if($counter==14)
	  break;
	  
	  }
	  
	  if($numberofrows>14)	  
 echo "</tr><tr><td colspan='3' align='center' ><a href=results.php?itemnumber=". $row['itemnumber']."&category=".$category." align=right>Next</a></td>";
	}

?>

	</tr>
	</table>


    </div>
    
	
	
<div style="clear:both"></div>



<div id="footer">
<P align="center">© Copyright | 2014|  ~ All Rights Reserved</a></p>

<img src="images/botround.jpg" width="980" height="15" alt="" />
</div>
</div>
</body>
</html>
