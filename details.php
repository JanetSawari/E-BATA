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

<div id="inner_contentColumn" class="middlecolumn" align="center" >

		  
		  <div id="controls" style="min-height:200px;">
	<?php 
	
mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());
if(isset($_GET["itemnumber"])&& $_GET["itemnumber"]!=NULL){
	$itemnumber=$_GET["itemnumber"];
	 $query="select * from item where itemnumber=$itemnumber";


	$rs = mysql_query( $query);
	if(mysql_num_rows( $rs)==0){echo "NO RECORDS FOUND!";}	
	while($row = mysql_fetch_array($rs)) {
	   
	  echo "<h3 align=center><u>". $row['manufacturer'] ." ". $row['model'] . "</u> </h3>";	
	     	
	  echo "<font color=red align=center>Item Number:</font><b>". $row['itemnumber'] . "</b><br>";
	  
	  $hits=$row['hits']+1;
	  	
 mysql_query("update item set hits='".$hits."' where itemnumber='".$itemnumber."'");
 setcookie("viewed",$row['category'],time()+60*60*24*365);  
	  if ($row['image']!=NULL)	
	  
                                                                              //Resize image	  //-------------------------------------------------------------------------------------------------------------------------------		

$source_pic ="images/".$row['image'] ;

$destination_pic ="images/".$row['image'] ;
$max_width = 400;
$max_height = 400;

$src = imagecreatefromjpeg($source_pic);
 list($width,$height)=getimagesize($source_pic);

$x_ratio = $max_width / $width;
$y_ratio = $max_height / $height;

 if( ($width <= $max_width) && ($height <= $max_height) ){
     $tn_width = $width;
     $tn_height = $height;
     }elseif (($x_ratio * $height) < $max_height){
         $tn_height = ceil($x_ratio * $height);
         $tn_width = $max_width;
     }else{
         $tn_width = ceil($y_ratio * $width);
         $tn_height = $max_height;
 }

$tmp=imagecreatetruecolor($tn_width,$tn_height);
imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);

imagejpeg($tmp,$destination_pic,100);
imagedestroy($src);
imagedestroy($tmp);
//--------------------------------------------------------------------------------------------------------------------------------
	
	  	
	  echo "<a href=cart.php?itemnumber=".$row['itemnumber']."><img  src=images/" .$row['image'] ."></img></a> <br><br>";
	
	  if ($row['description']!=NULL)
	  echo "<a href=cart.php?itemnumber=".$row['itemnumber']."><h3 align=center><u>Description</u> </h3></a>";		
	  echo "<pre ><i>". $row['description'] . "</i></pre><br><br><br>";	
	    if ($row['price']>0)
	  echo "<a href=cart.php?itemnumber=".$row['itemnumber']."><font color=red align=center>Selling Price:</font><b>Ksh " . $row['price'] . "</b></a><br><br>";
	  
	  echo "<a href=cart.php?itemnumber=".$row['itemnumber']."><font color=red align='right'>ADD TO CART</font></a><br>";	
	  	
	  }
}else{echo "Enter a a valid item number";}



?>
		</div>

	</div>		





	
<div style="clear:both"></div>



<div id="footer">
<P align="center">© Copyright | 2014|  ~ All Rights Reserved</a></p>

<img src="images/botround.jpg" width="980" height="15" alt="" />
</div>
</div>
</body>
</html>
