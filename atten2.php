<?php
include("dbconnect.php");
$clss=$_GET['class'];
$result=mysql_query("select * from student where class='$clss'");
$i=-1;
$j=-1;
if($_GET['date']=="today")
	$date=date("Y-m-d");
else
	$date=$_GET['date'];
$Abs="";
$Pre="";
$report=$_GET['str'];
$report1=explode(" ",$report);
$ii=0;
session_start();
$fac_id=$_SESSION['user_Id'];
if($_GET['checked']=='checked')
	{
	$x="delete from attendance where fac_id='$fac_id' and date='$date' and class='$clss'";
	mysql_query($x);
	}
while($row=mysql_fetch_array($result))
	{
	if($report1[$ii++]=='true')
			$Pre=$Pre.$row['stu_id'].",";
	else
			$Abs=$Abs.$row['stu_id'].",";
	}
if(mysql_query("INSERT into attendance values('$fac_id','$clss','$date','$Pre','$Abs')")){
	echo "<blink>&nbsp &nbsp &nbsp<h2> Attendance is successfully sumbitted</h2> </center></blink><br /><b><u>Absentees Id's</u></b><br />";
	$count=1;
	$stu=explode(',',$Abs);
	array_pop($stu);
	if(!sizeof($stu))
		echo '<h2>None</h2>';
	foreach( $stu as $abs)
			{
			print $count++.'. '.$abs."<br />";
			}
	}
else{
	echo "<blink><center><h2>Attendance is already exist <h2></center></blink>";
	}
?>
