// JavaScript Document
function validateMail()
{
	var name=document.mailList.name.value;
	var emailaddr=document.mailList.email.value;
	var att=emailaddr.indexOf("@");
	var att=emailaddr.indexOf(".");
	if(name=="")
	{
		alert("Please enter name!");
	}
	else if(emailaddr=="")
	{
		alert("Please enter your email adrress");
	}
	
	else if(att==-1)
	{
		alert("Invalid email, it lacks "@" symbol!");
	}
	else if(dot==-1)
	{
		alert("Invalid email, it lacks a "."!");
	}
}