// JavaScript Document
function validate()
{
	var surname=document.regform.sname.value;
	var othernames=document.regform.othername.value;
	var phoneNo=document.regform.phone.value;
	var emailaddr=document.regform.emailaddress.value;
	var dateofbirth=document.regform.dob.value;
	var att=emailaddr.indexOf("@");
	var att=emailaddr.indexOf(".");
	if(surname=="")
	{
		alert("Enter Surname");
	}
	else if(othernames=="")
	{
		alert("Enter Other names");
	}
	else if(dateofbirth=="")
	{
		alert("Enter your date of birth");
	}
	else if(phoneNo=="")
	{
		alert("Enter your phone number");
	}
	else if(emailaddr=="")
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
}