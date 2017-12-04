// JavaScript Document
var xmlHttp

function usern(str)
{

xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 
var url="ajaxuser.php";
url=url+"?username="+str;
xmlHttp.onreadystatechange=statec;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);


} 

function statec() 
{

	
if (xmlHttp.readyState==4)
{
	
//document.getElementById("usernameexists").innerHTML="Working";	
	
document.getElementById("usernameexists").innerHTML=xmlHttp.responseText;

}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}