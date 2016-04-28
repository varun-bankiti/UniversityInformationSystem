
var message="Sorry, right-click has been disabled"; 

function clickIE() {if 
(document.all) {(message);return false;}} 
function clickNS(e) {if 

(document.layers||(document.getElementById&&!document.all)) { 
if 
(e.which==2||e.which==3) {(message);return false;}}} 
if (document.layers) 

{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;} 

else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;} 

document.oncontextmenu=new Function("return false") 

function mahi(){document.getElementById("vid").style.visibility="hidden";}
function vinay(){
var x;
var r=confirm("Are You Sure Want To Submit!");
	if (r==true){
	document.getElementById("vin").submit();
			stopTimer();
	}
}

var c1, ID = null;
var t,c2=1,c;
var c5,c6;
function startTimer() {
    if (ID != null) {
        stopTimer();
    }
    c1 = 3600;
    ID = window.setInterval(run, 1000);
}

function stopTimer() {
    window.clearInterval(ID);
    ID = null;
    document.getElementById("time").innerHTML="";
}

function run() {
    if (c1<=-1){
	stopTimer();
	document.getElementById("vin").submit();
	}
    else{
    c5 =Math.floor(c1/60);
    c6 = c1%60; 
    document.getElementById("time").innerHTML = c5+":"+c6;
    c1--;
	}
}
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

function varun(){
mahi();
startTimer();
}
