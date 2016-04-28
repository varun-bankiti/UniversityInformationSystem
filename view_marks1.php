<?php
include("dbconnect.php");
$class_exam=explode(' ',$_GET['class_exam']);
$exam=$class_exam[1];
$class=$class_exam[0];
session_start();
$fname=$_SESSION['name'];
$fid=$_SESSION['user_Id'];
$subject=mysql_query("select  subject from faculty where name='$fname'");
$sub1=mysql_fetch_array($subject);
$sub=$sub1[0];
$result=mysql_query("Select * from internal_marks where fac_id='$fid' AND exam='$exam' AND class='$class'");
echo "<center>Fac_ID : $fid &nbsp&nbsp&nbsp&nbsp class : $class &nbsp&nbsp&nbsp&nbsp Exam : $exam<br />";
echo "<table border='1'>";
$ref=0;
while($row=mysql_fetch_array($result))
	{
		$ref=1;
		$id=$row['stu_id'];
		$marks=$row['marks'];
		echo "<tr><td>$id</td><td>$marks</td></tr>";
		}
if(!$ref)
	echo "<center><h2><blink>Marks doen't exist with given data</blink></h3></center>";
echo "</table>"
?>
