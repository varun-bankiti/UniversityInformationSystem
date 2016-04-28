<?php
include("dbconnect.php");
session_start();
if($_GET['ref']=="1"){
	$query=mysql_query("SELECT * FROM evaluation where stu_id='$_SESSION[user_Id]'");
	if (mysql_num_rows($query)>0){
		echo "<center><table border=1><tr style='background:lightgreen'><td width=100>ID</td><td  width=100>Exam ID</td><td  width=100>Marks</td><td  width=100>Rank</td><td>Conducted On</td></tr>";
		while(($result=mysql_fetch_array($query))){
			$result2=mysql_query("SELECT * FROM exam where exam_id='$result[1]'");
			$row=mysql_fetch_array($result2);
			echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>".$row[4]."</td></tr>";
			}
		echo "<table></center>";
		}
	else{
		echo "<br /><br /><center><h2><blink><font color='red'>You did not wrote any exams</h2></font></blink></center>";
		}
}
else{
	$query=mysql_query("SELECT * FROM evaluation where exam_id='$_GET[eid]'");
	if (mysql_num_rows($query)>0){
		echo "<center><table border=1><tr style='background:lightgreen'><td width=100>ID</td><td  width=100>Exam ID</td><td  width=100>Marks</td><td  width=100>Rank</td><td>Conducted On</td></tr>";
		while(($result=mysql_fetch_array($query))){
			$result2=mysql_query("SELECT * FROM exam where exam_id='$result[1]'");
			$row=mysql_fetch_array($result2);
			echo "<tr><td>".$result[0]."</td><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[3]."</td><td>".$row[4]."</td></tr>";
			}
		echo "<table></center>";
		}
	else{
		echo "<br /><br /><center><h2><blink><font color='red'>No Details Found With Given Exam Id</h2></font></blink></center>";
		}
}

?>
