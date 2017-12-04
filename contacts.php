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
	
    
    
    
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />


<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

    
    
    
    
	
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
<h1>Contact Us</h1>
<div class="post">
				<h2 class="title"><a href="#">Contact Us</a></h2>
				<div class="entry">
				<h4><strong><font color="#0000FF"><strong>Incase of any queries please contact us on the below:</strong>       </font>     </h4>
            <table>
            <tr>
            <td height="215"><img src="images/logo.png" width="244" height="100" /></td>
           
            <td>
        	  <p class="details"><strong>Bata Shoe Kenya</strong></p>
            <p class="details"><strong>P.O BOX 23</strong>-00200</p>
            <p class="details"><strong>NAIROBI.</strong></p>
            <p class="details"><strong>Email:info@bata-portal.com</strong></p>
            <p class="details"><strong>Phone: +254-726 66 89 41</strong></p>
              </td>
           </tr>
           </table>
    <p>We are always happy to hear from you. If you have any questions or comments,<br /> feel free to contact us by using the form below&nbsp;and we'll get back to you soon.</p>
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="250" valign="top"><p align="right">&nbsp;</p></td>
        <td width="502" valign="top">
        <form id="formMail" name="formMail" method="post" action="">
        	<?php
			
        	require 'feedback.php';
        	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){
        		if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){
        			$name = $_POST['name'];
					$email = $_POST['email'];
					$message = $_POST['message'];
        			$query = "INSERT INTO feedback (`name`, `email`, `message`) VALUES ('".$name."', '".$email."', '".$message."');";
        			$result = mysql_query($query);
        			echo "<font color = red>Thank you for your feedback<font>";
        		}else{
        			echo "<font color = red>Please Fill in the missing fields</font>";
        		}
        
        	}
        	
        	
        	 ?>
          <p><span id="nameTextField">
          <label for="name"></label>
          <input type="text" name="name" id="name" />
          <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></p>
          <p><span id="emailTextField">
          <label for="email"></label>
          <input type="text" name="email" id="email" />
          <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></p>
          <p><span id="messageTextArea">
          <label for="message"></label>
          <textarea name="message" id="message" cols="45" rows="5"></textarea>
          <span id="countmessageTextArea">&nbsp;</span><span class="textareaRequiredMsg">A value is required.</span><span class="textareaMinCharsMsg">Minimum number of characters not met.</span><span class="textareaMaxCharsMsg">Exceeded maximum number of characters.</span></span></p>
          <p>
            <input type="submit" name="Submit" id="Submit" value="Submit" />
          </p>
          <p>&nbsp;</p>
        </form>
          <p>&nbsp;</p>
        <p>&nbsp;</p></td>
      </tr>
    </table>
    <p>&nbsp;</p>
<p>&nbsp;</p>
    <p>&nbsp;</p>
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("nameTextField", "none", {hint:"Name", minChars:1, maxChars:50, validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("emailTextField", "email", {hint:"Email", minChars:1, maxChars:50, validateOn:["blur"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("messageTextArea", {minChars:1, maxChars:400, validateOn:["blur"], counterType:"chars_count", counterId:"countmessageTextArea", hint:"message"});
    </script></div>
  <div class="footer" align="center">
        <!-- end .footer --></div>
  <!-- end .container --></div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
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
