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

		  
		  <div id="controls">
	 <?php	
$username=$_REQUEST["e"];


  include 'connect.php';
	if($username==""||$username==NULL)
	{
     setcookie("username",FAILED, time()+10);
  echo "<script type='text/javascript'>
				document.location = 'administration.php';
				</script>";exit;
				}
	

  	//--------------------------------------------------------------------------------------------------------
  	 
$category=$_REQUEST["category"];
$manufacturer=$_REQUEST["manufacturer"];
$model=$_REQUEST["model"];
$qty=$_REQUEST["qty"];
$price=$_REQUEST["price"];
$description=$_REQUEST["description"];


$file=($_FILES['photo']['name']);


	if(($category!=NULL||$category!="")&&($file==NULL||$file==""))
{
	

mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());	

$category=mysql_real_escape_string($_POST['category']);
$manufacturer=mysql_real_escape_string($_POST['manufacturer']);
$model=mysql_real_escape_string($_POST['model']);
$qty=mysql_real_escape_string($_POST['qty']);
$description=mysql_real_escape_string($_POST['description']);
$price=mysql_real_escape_string($_POST['price']);

	
//---------------------------------------------------------------------------------------------------------------------------------
$strSQL = "INSERT INTO item( `category`,`manufacturer`, `model`, `total`, `description`,`price`)
 VALUES
  ('$category', '$manufacturer','$model','$qty','$description','$price')"; 
  



	// The SQL statement is executed 
	mysql_query($strSQL) or die (mysql_error());					
$itemnumber=mysql_insert_id();
	setcookie("category",1, time()+10);

		
	}
  



//-------------------------------------------------------------------------------------------------------------------------------
$file=($_FILES['photo']['name']);

if(($category==NULL||$category=="")&&($file!=NULL||$file!=""))
{

mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());


	//define a maxim size for the uploaded images in Kb
 define ("MAX_SIZE","100"); 

//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }


 $errors=0;

	$file=($_FILES['photo']['name']);
 	
 	if ($file) 
 	{
 	
 		$filename = stripslashes($_FILES['photo']['name']);
 	
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 
 $size=filesize($_FILES['photo']['tmp_name']);

if ($size > MAX_SIZE*1024)
{

	$errors=1;
}

$file1=time().$filename;

$newname="images/".$file1;
	
	$str = "INSERT INTO item(`image`)
 VALUES
  ('$file1')"; 
  



	mysql_query($str) or die (mysql_error());	
	$itemnumber=mysql_insert_id();
//---------------------------------------------------------------------------------------------------------------------------------
 


 
 if(move_uploaded_file($_FILES['photo']['tmp_name'], $newname)) 
 { 
 setcookie("file",1, time()+10);
 
setcookie("file",2, time()+10); 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
   } 
  }
 
}

//---------------------------------------------------------------------------------------------------------------------------------
if(($category!=NULL||$category!="")&&($file!=NULL||$file!=""))
{


mysql_connect("$host", "$user", "$pass") or die (mysql_error());	
	mysql_select_db("$db") or die(mysql_error());	
	
	

	//define a maxim size for the uploaded images in Kb
 define ("MAX_SIZE","100"); 

//This function reads the extension of the file. It is used to determine if the file  is an image by checking the extension.
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }


 $errors=0;
//checks if the form has been submitted


 
 	//reads the name of the file the user submitted for uploading
 	//$image=$_FILES['image']['name'];
	$file=($_FILES['photo']['name']);
 	//if it is not empty
 	if ($file) 
 	{
 	//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['photo']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 	//if it is not a known extension, we will suppose it is an error and will not  upload the file,  
	//otherwise we will do more tests

//get the size of the image in bytes
 //$_FILES['photo']['tmp_name'] is the temporary filename of the file
 //in which the uploaded file was stored on the server
 $size=filesize($_FILES['photo']['tmp_name']);

//compare the size with the maxim size we defined and print error if bigger
if ($size > MAX_SIZE*1024)
{

	$errors=1;
}

//we will give an unique name, for example the time in unix time format
$file1=time().$filename;
//the new name will be containing the full path where will be stored (images folder)
$newname="images/".$file1;


$category=mysql_real_escape_string($_POST['category']);
$manufacturer=mysql_real_escape_string($_POST['manufacturer']);
$model=mysql_real_escape_string($_POST['model']);
$qty=mysql_real_escape_string($_POST['qty']);
$description=mysql_real_escape_string($_POST['description']);
$price=mysql_real_escape_string($_POST['price']);

	

$str = "INSERT INTO item( `category`,`manufacturer`, `model`, `total`,`description`,`price`,image)
 VALUES
  ('$category', '$manufacturer','$model', '$qty','$description','$price','$file1')"; 
  

	// The SQL statement is executed 
	mysql_query($str) or die (mysql_error());	
	
$itemnumber=mysql_insert_id();

 //Writes the photo to the server 
 if(move_uploaded_file($_FILES['photo']['tmp_name'], $newname)) 
 { 
 setcookie("file",1, time()+10);
 //Tells you if its all ok 
 echo "<p align=center>The file was received</p>"; 
 } 
 else { 
 
 //Gives and error if its not
   setcookie("file",2, time()+10);
 
 echo "Sorry, there was a problem uploading your file."; 
   } 
  }
 
}
	


	//$itemnumber=$_GET["itemnumber"];
    $query="select * from item where itemnumber=$itemnumber";	
	$rs = mysql_query( $query);	
	while($row = mysql_fetch_array($rs)) {
	   echo "<font color=red align=center>Availbale Stock:</font><b>". $row['total'] . "</b><br>"; 

	  echo "<h3 align=center><u>". $row['manufacturer'] ." ". $row['model'] . "</u> </h3>";	
	     	
	  echo "<font color=red align=center>Item Number:</font><b>". $row['itemnumber'] . "</b><br>";	
	  
	 	
	  
                                                                              //Resize image	  //-------------------------------------------------------------------------------------------------------------------------------
																		  		
 if ($row['image']!=NULL)
$source_pic ="images/".$row['image'] ;

$destination_pic ="images/".$row['image'] ;
$max_width = 400;
$max_height = 400;

																		  


	
  	$extension = getExtension($source_pic);
 	$extension = strtolower($extension);

     if($extension='jpeg'){
     $src = imagecreatefromjpeg($source_pic);
        }
	 elseif($extension='jpg'){
     $src = imagecreatefromjpeg($source_pic);
        }
	  elseif($extension='png'){
     $src = imagecreatefrompng($source_pic);
        }
	 elseif($extension='gif'){
     $src = imagecreatefromgif($source_pic);
        }
	elseif($extension='bmp'){
     $src = imagecreatefromwbmp($source_pic);
        }
	elseif($extension='xbm'){
     $src = imagecreatefromxbm($source_pic);
        }


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


echo "<img  src=images/" .$row['image'] ."></img> <br><br>";
//--------------------------------------------------------------------------------------------------------------------------------
	
	  
	
	  if ($row['description']!=NULL)
	  echo "<h3 align=center><u>Description</u> </h3>";		
	  echo "<pre><i>". $row['description'] . "</i></pre><br><br><br>";	
	    if ($row['price']>0)
	  echo "<font color=red align=center>Selling Price:</font><b>Ksh " . $row['price'] . "</b><br><br><br>";
	  
	  }







echo "<A HREF='controlpanel.php?e=".$username."' >Back</A>";


	exit;
/*echo "<script type='text/javascript'>
	document.location = 'controlpanel.php?e=".$username."';
	</script>";	
	 exit;*/

//--------------------------------------------------------------------------------------------------------------------------
?>

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
	 
	echo "<li><a href=results.php?itemnumber=0&rows=0&category=accessories&manufacturer=".$manufacturer. ">".$manufacturer."</a></li>";
	 
	 
	} 
	 
	?>

</ul>
			
        </div>
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

	

