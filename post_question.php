<?php
include("dbconnect.php");
$session_id=$_GET['user'];
$branch=$_GET['branch'];
$question=$_GET["question"];
$subject=$_GET["subject"];
$date=$_GET['date'];
$result=mysql_query("SELECT * FROM questions");
$total_questions=mysql_num_rows($result);
$ques_id="ques".($total_questions+1);
if(mysql_query("INSERT INTO questions(ques_id,question,subject,posted_by,posted_on,branch) values('$ques_id','$question','$subject','$session_id','$date','$branch')"))
	echo "1";
else 
	echo "0";
?>
