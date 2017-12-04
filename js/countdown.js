// JavaScript Document


function countd(sec)
{
	
	var d=(sec-(sec%86400))/86400;	
	if(d>=2){var days=d+" days";} else {days="";}
	
	var h=((sec%86400)-(sec%86400%3600))/3600;
	if(h>=1){var hours=h+" hours";} else{hours="";}
		
	var m=((sec%86400%3600)-(sec%86400%3600%60))/60;
	if(m>=1){var minutes=m+" minutes";} else {minutes="";}
	
	var s=sec%86400%3600%60;
	var seconds=s+" seconds";
	
	var period=days+" "+hours+" "+minutes" "+seconds;
	return period;
	
}