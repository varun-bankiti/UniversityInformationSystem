<?php
include("dbconnect.php");
$date_class=explode(' ',$_GET['class_exam']);
$exam=$date_class[1];
$class=$date_class[0];
$expire=time()+60*60*2;
setcookie("class",$class, $expire);
session_start();
$fac_id=$_SESSION['user_Id'];
$result1=mysql_query("Select * from internal_marks where fac_id='$fac_id' AND exam='$exam' AND class='$class'");
echo "<center>Fac_ID : '$fac_id' &nbsp&nbsp&nbsp&nbsp Exam : $exam &nbsp&nbsp&nbsp&nbsp Class : $class<br />";
$count=0;
while($student=mysql_fetch_array($result1))
	{
		echo "$student[stu_id]   <input type='text' value='$student[marks]'  id='".$count."m"."'><br />";
		$count++;
		}
$ref=0;
echo "<input type='button' value='Submit Marks' onclick='submit_marks($count,$ref)' />";
?>
