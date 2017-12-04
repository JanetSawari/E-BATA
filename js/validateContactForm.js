// JavaScript Document
function validateContact()
{
	var name=document.userQuery.questionername.value;
	var emailaddr=document.userQuery.questionerEmail.value;
	var userquest=document.userQuery.query.value;
	var att=emailaddr.indexOf("@");
	var dot=emailaddr.indexOf(".");
	if(name=="")
	{
		alert("Please enter your name.");
	}
	else if(emailaddr=="")
	{
		alert("Please enter your email adress.");
	}
	else if(att==-1)
	{
		alert("Invalid email!");
	}
	else if(dot==-1)
	{
		alert("Invalid Email");
	}
	else if(userquest=="")
	{
	alert("Please enter your question.");
	}
}