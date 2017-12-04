
//You will receive a different greeting based
//on what day it is. Note that Sunday=0,
//Monday=1, Tuesday=2, etc.
var d=new Date()
theDay=d.getDay()
switch (theDay)
{
case 1:
  document.write("Hallo, Its a great monday")
  break
case 2:
  document.write("Hallo, Its a great tuesday")
  break
case 3:
  document.write("Hallo, Its a great wednsday")
  break
case 4:
  document.write("Hallo, Its a great thursday")
  break
case 5:
  document.write("Hallo, Its Finally Friday")
  break
case 6:
  document.write("Hallo, Today is Super Saturday")
  break
case 0:
  document.write("Hallo, Sleepy Sunday today.")
  break
default:
  document.write(" something is wrong somewhere")
}