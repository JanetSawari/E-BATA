// JavaScript Document
function validatelogin()
{
	var emailaddr=document.loginform.useremail.value;
	var password=document.loginform.userpwd.value;
	var att=emailaddr.indexOf("@");
	var att=emailaddr.indexOf(".");
	
     if(emailaddr=="")
	{
		alert("Enter your email adrress");
	}
	
	else if(att==-1)
	{
		alert("Invalid email!");
	}
	else if(dot==-1)
	{
		alert("Invalid Email");
	}
	else if(password=="")
	{
	alert("Please enter your password.");
	}
}