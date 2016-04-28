<?php 
include("dbconnect.php");
$session_id=$_GET['user'];
$ansr_id=$_GET['ansr_id'];
$ques_id=$_GET['ques_id'];
$ansr=$_GET['ansr'];
$date=$_GET['date'];
$old_new=$_GET['old_new'];
if ($old_new==1) {
	if(mysql_query("INSERT INTO answers(ansr_id,ques_id,posted_by,posted_on,answer) values('$ansr_id','$ques_id','$session_id','$date','$ansr')"))
		echo "1";
	else 
		echo "0";
}
else{
	if(mysql_query("UPDATE answers SET answer='$ansr',posted_on='$date' where ansr_id='$ansr_id'"))
		echo "1";
	else
		echo "0";
	}
?>
