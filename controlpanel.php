<?php
include 'connect.php';
if(isset($_REQUEST["e"])){
$username=$_REQUEST["e"];
$email=$_REQUEST["e"];
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
					header("Location:administration.php"); 
					      
	                 echo "<script type='text/javascript'>
				          document.location = 'administration.php?e=''';
				           </script>";
                           
                           exit;
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
	?>
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
	
	
	<A HREF="administration.php?e=<?php echo $username ?>">LOG OUT</A>
		
	
	</div>
<div id="search" align="center">  
           <div align="center" style="float:left;  width:450px; margin:auto;"></div>
		  
		 <div align="center" style=" width:450px; float:left">		
		</div>
			
</div>

	</div>  

<div id="container">
<img src="images/top-header.jpg" />

<div id="leftsidebar">	
	<div style="padding-right:10px;padding-left:10px">
			
	<div align="center" style="margin-top:10px" id="user4">
	
	
	 <div class="moduletable_menu" style="min-height:250px;" >			
				
	<?php
	$username=$_REQUEST["e"];
	mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());		
	$strSQL = "SELECT * FROM administrators   where username='".$username."'";
	$rs = mysql_query($strSQL);	
	while($row = mysql_fetch_array($rs))
	 {
	 if($row['depertment']=="general")
	 {
	echo "	
		<h3>ADMIN REG.</h3>";
if (isset($_COOKIE["incomplete"])){if($_COOKIE["incomplete"]==1){echo "<font color='red'>All Required Fields Must Be Completed !!</font>";setcookie("incomplete",1, time()-61); }}
echo "<form NAME='registration' action='administratorscgi.php' method='post'>
<p align='center'> USERNAME:<br> <INPUT TYPE='text' size='20' NAME='uname' /></p>";
if (isset($_COOKIE["uname"])){  if($_COOKIE["uname"]==1){echo "<font color='red'>The Username Is Taken!!</font>";setcookie("uname",1, time()-61); }}	
echo "<p align='center'>PASSWORD:<br> <INPUT TYPE='password'size='20' NAME='pword' /></p>
<p align='center'>CONFIRM PASSWORD:<br> <INPUT TYPE='password'size='20' NAME='cpword' /></p>";
if (isset($_COOKIE["cpword"])){  if($_COOKIE["cpword"]==1){echo "<font color='red'>Password Confirmation Failed !!</font>";setcookie("cpword",1, time()-61); }}
echo "<p align='center'>FIRST NAME:<br> <INPUT TYPE='text'size='20' NAME='fname'/></p>
<p align='center'>SECOND NAME:<br> <INPUT TYPE='text' size='20'NAME='sname'/ ></p>
<p align='center'>LAST NAME:<br> <INPUT TYPE='text' size='20'NAME='lname'/ ></p>
<p align='center'>NATIONAL ID NO.:<br> <INPUT TYPE='text' size='20'NAME='idno'/ ></p>
<p align='center'>DEPERTMENT:<br><input type='hidden' NAME='depertment'/>
  <select NAME='depertment'>
  <option value='' >DEPERTMENT
  <option value='general' >GENERAL
  <option value='technical' >TECHNICAL
  <option value='business' >BUSINESS  
  </select>
</p>
<input type='hidden' NAME='e' value ='";$username=$_REQUEST["e"]; echo $username; echo"' />
<p  align='center'><INPUT NAME='button1' TYPE='submit' VALUE='Register'/></p>
</FORM>

";
}
}	
?>
</div>
</div>
</div>
</div>
<div id="main">	

	<div align="center" style="margin-top:10px" id="user4">
	<table cellspacing="0" border="1" align="center">
	
	<tr>
	<td colspan="1"  align="center" id="slides" >
	<h3>INSERT ITEM</h3>
	<p align="center">	<?php 
		if (isset($_COOKIE["category"])){
		  if($_COOKIE["category"]==1){
		echo "<font color='red'><br>Success!!</font>";
		setcookie("category",1, time()-11); }}
		if (isset($_COOKIE["category"])){
		  if($_COOKIE["category"]==2){
		echo "<font color='red'><br>Success!!</font>";
		setcookie("category",2, time()-11); }}
		if (isset($_COOKIE["file"])){
		  if($_COOKIE["file"]==1){
		echo "<font color='red'><br>Success!!</font>";
		setcookie("file",1, time()-11); }}
		if (isset($_COOKIE["file"])){
		  if($_COOKIE["file"]==2){
		echo "<font color='red'><br>Success!!</font>";
		setcookie("file",2, time()-11); }}

?></p>
	<form NAME="sambaza" enctype="multipart/form-data" action="post.php" method="post">
		
<p align="center">CATEGORY:<br /><INPUT TYPE="hidden" > 
 <select name="category" >
  	<option value=" ">CATEGORY 
    <option value="men" >MEN    
    <option value="ladies" >LADIES
     <option value="kids" >KIDS
      <option value="giftvouchers" >GIFT VOUCHERS
       <option value="school" >SCHOOL
        </select>	</p>
       

<p  align="center">CAGEROIES:(do not leave any preceding space))<br /><input type="text"  accept="text/html" size="20"name="manufacturer"
 value=" "/ ></p>
<p  align="center">MODEL:<br /><input type="text"  accept="text/html" size="20"name="model" value=" "/ ></p>
<p  align="center">QUANTITY:<br /><input type="text"  accept="text/html" size="20"name="qty" value=" "/ ></p>
		
<p align="right">PICTURE:<input name="photo" type="file" /></p>

<p  align="center">DESCRIPTION:<br /><textarea name="description"cols="25" rows="10"class="validate[optional] " ></textarea>
</p>


<p  align="center">PRICE:<input type="text"  accept="text" size="20"name="price" value=""/ ></p>

	
	<input type="hidden"  name="e" value="<?php echo $_REQUEST["e"];?>" />
<p  align="center"><INPUT NAME="button1" TYPE="submit" VALUE="POST"/></p>
</FORM>
	
	</td>
	<td  align="center" width="400"  >
    <div style="height:550px;overflow:auto;">
    <table border="1" width="100%">
    <tr bgcolor="#993300" style="color:#FFF;">
    <td>ITEM</td>
    <td width="20">QTY</td>
    <td width="30">PRICE</td>
    <td width="30">TOTAL</td>
    <td>BUYER</td></tr>
    
   <?php
   	
   mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
	
	
	if(isset($_REQUEST['orderno'])){						   
mysql_query("update iorders set completed='YES' WHERE order_no='".$_REQUEST['orderno']."'");}

					
					
		
	    $strSQL = "SELECT * FROM iorders where completed='NO'";
		$rs = mysql_query($strSQL);
	       while($row = mysql_fetch_array($rs))
	                {
			echo"<tr><td>".$row['item_name']."</td>
			<td>".$row['quantity']."</td>
			<td>".$row['price']."</td>
			<td>".$row['total']."</td>
			<td>".$row['buyer_contacts']."<br>
			
			<a href=controlpanel.php?e=".$username."&&orderno=".$row['order_no']." ><font color=red>complete</font></a>

</td></tr>";
		            
					}
				
					
				
			        
   ?> 
    
    
    
    
    </table>
    
    </div>
	</td>
	
	  	 
	
	</tr>
	 
	</table>
	

	
	</div>
		
	</div>	
 
<div id="rightsidebar">
	<div style="padding-right:10px;padding-left:10px">
	<div class="moduletable">
			<h3>DELETE ITEM</h3>
		
	<form  method="post" action="delete.php">
	<p>ITEM NUMBER: </p>         
	<p><input name="itemnumber" type="text" size="12"  /></p>
       <input name="tebo" type="hidden" value="item"  />
	<input type='hidden' NAME='e' value ='?<?php $username=$_REQUEST["e"]; echo $username; ?>' />
			<?php if (isset($_COOKIE["success11"])){  if($_COOKIE["success11"]==1){echo "<font color='red'>success !!</font>";setcookie("success11",1, time()-61); }}?> 	  
    <p><input name="submit" type="submit"value="DELETE" />	
       <input type="reset" name="Reset" value="Reset" /></p>      
      </form></div></div>
      
  
	  
        <div style="padding-right:10px;padding-left:10px">
	<div class="moduletable">
			<h3>DELETE ADMIN</h3>
		
	<form  method="post" action="delete.php">
	<p>EMPLOYEE NUMBER: </p>         
	<p><input name="itemnumber" type="text" size="12"  /></p>
       <input name="tebo" type="hidden" value="admin"  />
	<input type='hidden' NAME='e' value ='?<?php $username=$_REQUEST["e"]; echo $username; ?>' />
			<?php if (isset($_COOKIE["success11"])){  if($_COOKIE["success11"]==1){echo "<font color='red'>success !!</font>";setcookie("success11",1, time()-61); }}?> 	  
    <p><input name="submit" type="submit"value="DELETE" />	
       <input type="reset" name="Reset" value="Reset" /></p>      
      </form>
	  </div>	  
	</div>	
 </div>
		
			<div style="clear:both"></div>
			



<div id="footer">
<P align="center">© Copyright | 2014|  ~ All Rights Reserved|   <A HREF="administration.php">Admin Login</A></p>

<img src="images/botround.jpg" width="980" height="15" alt="" />
</div>
</div>
</body>
</html>
