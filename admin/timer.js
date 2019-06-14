
var d = new Date();
var weekday=new Array(7);
weekday[0]="Sunday";
weekday[1]="Monday";
weekday[2]="Tuesday";
weekday[3]="Wednesday";
weekday[4]="Thursday";
weekday[5]="Friday";
weekday[6]="Saturday";

var fullmonth=new Array(12);
 fullmonth[0]="Jan";
 fullmonth[1]="Feb";
 fullmonth[2]="Mar";
 fullmonth[3]="Apr";
 fullmonth[4]="May";
 fullmonth[5]="Jun";
 fullmonth[6]="Jul";
 fullmonth[7]="Aug";
 fullmonth[8]="Sep";
 fullmonth[9]="Oct";
 fullmonth[10]="Nov";
 fullmonth[11]="Dec";
 var k;
 k=weekday[d.getDay()]+", "+fullmonth[d.getMonth()]+" "+d.getDate()+", "+d.getFullYear()+" -> ";

var myVar=setInterval(function(){myTimer()},1000);

function myTimer()
{
var d=new Date();
var t=d.toLocaleTimeString();
document.getElementById("demo").innerHTML=k+t;
}