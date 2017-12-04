// JavaScript Document
function validateOrdinary()
{
	var surname1=document.regform.surname.value;
	var middlename=document.regform.middlename.value;
	var othernames=document.regform.othername.value;
	var gender.document.regform.gender.value;
	var telephone=document.regform.telephone.value;
	var emailaddr=document.regform.email.value;
	var education=document.regform.education.value;
	var city=documentation.regform.city.value;
	var dob=document.regform.year.value;
	var nation=document.regform.country.value;
	var address=document.regform.address.value;
	var postalcode=document.regform.postalcode.value;
	var nationalId=document.regform.nationalId.value;
	var att=emailaddr.indexOf("@");
	var att=emailaddr.indexOf(".");
	if(surname=="")
	{
		alert("Enter Surname");
	}
	else if(middlename=="")
	{
		alert("Enter your middle name");
	}
	else if(othernames=="")
	{
		alert("Enter your other names");
	}
	else if(gender=="")
	{
		alert("Enter your Gender");
	}
	else if(dob=="")
	{
		alert("Enter your date of birth");
	}
	else if(nation=="")
	{
	alert("Select your country");
	}
	else if(nationalId=="")
	{
	alert("Enter your national ID");
	}
	else if(address=="")
	{
		alert("Enter your postal address");
	}
	else if(postalcode=="")
	{
		alert("Enter your postal code");
	}
	else if(city=="")
	{
		alert("Enter your City/Town");
	}
	else if(telephone=="")
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
	else if(education=="")
	{
		alert("Select your education category");
	}
}
function declaration()
{
document.declare.submit.enabled=true;

}