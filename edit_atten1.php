<?php
include("dbconnect.php");
$date_class=explode(' ',$_GET['class_date']);
$date=$date_class[1];
$class=$date_class[0];

$details=$class." ".$date." "." edit";

session_start();
$fac_id=$_SESSION['user_Id'];
$result1=mysql_query("Select * from attendance where fac_id='$fac_id' AND date='$date' AND class='$class'");
$row=mysql_fetch_array($result1);
echo "<center>Fac_ID :".$fac_id." &nbsp&nbsp&nbsp&nbsp Date : $date &nbsp&nbsp&nbsp&nbspClass : $class<br />";
$pre=explode(",",$row['present']);
$abs=explode(",",$row['absent']);
$result2=mysql_query("select * from student where class='$class'");
$count=0;
if(count($pre)==1 && count($abs)==1)
	{
	echo "<br /><blink><h3>Attendance doesn't exist</h3></blink>";
	return;
	}
while($student=mysql_fetch_array($result2))
	{
		if(in_array($student['stu_id'],$pre))
			echo "$student[stu_id]   <input type='checkbox' checked='checked'  id='".$count."c"."' ><br />";
		else
			echo  "$student[stu_id]  <input type='checkbox' id='".$count."c"."'><br />";
		$count++;
		}
echo "<input type='button' value='Submit Attendance' onclick=edit_attendance(".$count.") />";
?>
