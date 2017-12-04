<?php include 'connect.php';$email=""; ?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<title>BATASHOE</title>
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

<div id="inner_contentColumn" class="middlecolumn" align="center" >

		  
		  <div id="controls" style="margin-top:10px;">
	<form action="cart.php" method="post"/>
	<table align="center" border="1"  cellspacing="0" width="550">
	<tr  ><td align="center" colspan="6"><h3><font color="#FF0000">SHOPPING CART</font></h3>
	<?php if (isset($_COOKIE["expired"]))
	{
     echo " CART HAS EXPIRED!!";
	 exit;
	 }
     ?>
 </td></tr>
	<tr bgcolor="#F7706C" ><td align="center">ITEM NUMBER</td><td align="center">MANUFACTURER</td><td align="center">MODEL</td><td align="">QUANTITY</td><td align="center">UNIT PRICE</td><td align="center">SUB TOTAL</td></tr><tr>
	
	
	<?php 
	
mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
	$total=0;
 if(isset($_REQUEST["update"]))
 {
 $itemnumber=NULL;
 }else{
   
	$itemnumber=$_GET["itemnumber"];
	}
	if (isset($_COOKIE["cart"]))
	{
	$cartname=$_COOKIE["cart"];
	$find = "SELECT * FROM $cartname where itemnumber='".$itemnumber."'";	
	$rows= mysql_query($find );
	$numberofrows=mysql_num_rows($rows);
    if($numberofrows!=0)
		{
		$itemnumber=NULL;
		}		
	
	mysql_query("INSERT INTO $cartname( `itemnumber`)
              VALUES('$itemnumber')");
			   
	$query="select * from $cartname ";	
	$rs = mysql_query( $query);	
	while($row = mysql_fetch_array($rs))
	 {	     	
	 $rs1=mysql_query("SELECT * FROM item   where itemnumber=".$row['itemnumber']."");	 
	while($row1 = mysql_fetch_array($rs1))
	 {	     	
	  echo "<td align='center'>". $row1['itemnumber'] . "</td>";	
	  echo "<td align='center'>". $row1['manufacturer'] . "</td>";
	  echo "<td align='center' >". $row1['model'] . "</td>";
	  $quantity=$row1['itemnumber'];
	  if(isset($_REQUEST["update"]))
	  {
	  $q=$_REQUEST[$quantity];
	}else
	{$q=1;}	
		$total_items = $row1['total'];
	  	if($q < $total_items){
	  echo "<td align='center'><INPUT TYPE='text'size='6' value='".$q."' NAME='". $quantity ."'/>	  
           <input type='hidden' NAME='p". $row1['itemnumber'] ."' value ='". $row1['price'] . "' />
		   <input type='hidden' NAME='update' value ='update' />";
	  echo "<td align='center'><font color=red align=center>". $row1['price'] . "</font></td>";
	     
	  $subtotal= $q*$row1['price'] ; 
	  echo "<td align='center'>Ksh: ".$subtotal."</td></tr><tr>";	
	  $total=$total+$subtotal;
	  
	    mysql_query("update $cartname set 
	  itemname='".$row1['manufacturer']."".$row1['model']."',
	  quantity='".$q."',
	  cost='".$subtotal."'
	  where itemnumber=". $row1['itemnumber'] 
	  );	  
	  }else{
	  	$mess = "Maximum Order Items is ".$total_items;
	  } 
	  
	  

	  	}		
	  }   	
	
	}
	else
	{
	$cartname=md5(mt_rand(1,1000000)*time());
	
	setcookie("cart",$cartname, time()+15*60);
	
	mysql_query("CREATE TABLE`$db`.`$cartname` 
	            (`itemnumber` BIGINT NOT NULL ,
				`itemname` VARCHAR(100)  NULL ,
				`quantity` INT NULL ,
				`cost` DOUBLE NULL ,
                 `createtime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                   )");
    mysql_query("INSERT INTO $cartname( `itemnumber`)
              VALUES('$itemnumber')"); 
			  
			
	 $query="select * from $cartname ";	
	$rs = mysql_query( $query);	
	while($row = mysql_fetch_array($rs))
	  $rs1=mysql_query("SELECT * FROM item   where itemnumber=".$row['itemnumber']."");	 
	  
	while($row1 = mysql_fetch_array($rs1))
	 {	     	
	  echo "<td align='center'>". $row1['itemnumber'] . "</td>";	
	  echo "<td align='center'>". $row1['manufacturer'] . "</td>";
	  echo "<td align='center' >". $row1['model'] . "</td>";
	  $quantity=$row1['itemnumber'];
	 if(isset($_REQUEST["update"]))
	  {
	  $q=$_REQUEST[$quantity];}	else{$q=1;}	
	  echo "<td align='center'><INPUT TYPE='text'size='6' value='".$q."' NAME='". $quantity ."'/>	  
           <input type='hidden' NAME='p". $row1['itemnumber'] ."' value ='". $row1['price'] . "' />
		   <input type='hidden' NAME='update' value ='update' />";
	  echo "<td align='center'><font color=red align=center>". $row1['price'] . "</font></td>";	
	  $subtotal= $q*$row1['price'] ; 
	  echo "<td align='center'>Ksh: ".$subtotal."</td></tr><tr>";	
	  $total=$total+$subtotal;
	  
	  mysql_query("update $cartname set 
	  itemname='".$row1['manufacturer']."".$row1['model']."',
	  quantity='".$q."',
	  cost='".$subtotal."'
	  where itemnumber=". $row1['itemnumber'] 
	  );
	    
	  } 
	  
	   
	}	
	
?>

</tr>
<tr bgcolor="#F7706C" ><td align="center">TOTAL</td><td align="center" colspan="4"><font color="#FF0000">
<?php
if(isset($mess)){
	echo $mess;
}else{
	echo "Please Enter the desired Quantities and Click  below to Update";
}
?>
</font></td><td align="center"><b><?php echo "Ksh: ".$total; ?></b></td></tr>
<tr  ><td align="center"></td><td align="center" colspan="4"><font color="#FF0000"><p  align='center'><INPUT NAME='button1' TYPE='submit' VALUE='UPDATE CART'/></p></font></td><td align="center"></td></tr>
</table>

</FORM>

<form action="iframe.php" method="post">
<table width="550" align="center">
<tr ><td colspan="3" align="center"><font color="#FF0000"><h3>PLEASE ENTER YOUR PERSONAL INFORMATION</h3></font></td></tr>
	
	<input type="hidden" name="amount" value="<?php echo $total; ?>" />
	<input type="hidden" name="type" value="MERCHANT" readonly="readonly" />
	<input type="hidden" name="description" value="Account load-up" />
	<input type="hidden" name="reference" value="001" />    
    
	<input type="hidden" name="cartname" value="<?php echo $cartname; ?>" />
	<tr><td>FIRST NAME:</td><td><input type="text" size="30"  name="first_name" value="" /></td><td rowspan="3"><img src="images/payments.PNG" width="200" height="100"</td></tr>
	<tr><td>LAST NAME:</td><td><input type="text" size="30" name="last_name" value="" /></td></tr>
<tr><td>ADDRESS:</td><td><input type="text" size="30" name="address" value="" /></td></tr>
<tr><td>EMAIL:</td><td><input type="text" size="30" name="email" value="" /></td></tr>
<tr><td>PHONE:</td><td><input type="text" size="30" name="phone" value="" /></td></tr>
<tr  ><td colspan="3" align="center" ><input align="right" type="submit" value="CHECK OUT" /></td></tr>
</table>

</form>
		</div>

	</div>		



		
			<div style="clear:both"></div>
			

	
<div style="clear:both"></div>



<div id="footer">
<P align="center">© Copyright | 2014|  ~ All Rights Reserved</a></p>

<img src="images/botround.jpg" width="980" height="15" alt="" />
</div>
</div>
</body>
</html>