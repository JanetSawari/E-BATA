// JavaScript Document

function cpassword(pass,cpass)
{
	if(pass!=cpass)
	{
	document.getElementById("confirm").innerHTML="Password Confirmation Failed!";	
	}
else
	{
	document.getElementById("confirm").innerHTML=" ";	
	}
}



function minimum(amount)
{
	if(amount<10)
	{
	document.getElementById("min").innerHTML="Amount Must be $10 or More!";	
	}
else
	{
	document.getElementById("confirm").innerHTML=" ";	
	}
}

