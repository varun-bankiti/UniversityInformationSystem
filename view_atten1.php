<html>
<head>
<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
</head>
</html>
<?php
include("dbconnect.php");
session_start();
$fac_id=$_SESSION['user_Id'];
$date_class=explode(' ',$_GET['class_date']);
$date=$date_class[1];
$class=$date_class[0];
$result=mysql_query("Select * from attendance where fac_id='$fac_id' AND date='$date' AND class='$class'");
$row=mysql_fetch_array($result);
$pre=explode(",",$row['present']);
$abs=explode(",",$row['absent']);
if(sizeof($abs)==1 && sizeof($pre)==1)
	{
	echo "<blink><center><h3>Invalid input, please check your input data</h3></center></blink>";
	return;
	}	
echo "<center><h3>Fac_ID : '$fac_id' &nbsp&nbsp&nbsp&nbsp Date : $date &nbsp&nbsp&nbsp&nbspClass : $class<br /><h3>";
echo "<br /><b><h3><u>List of student absentees</u></b><br />";
if(sizeof($abs)==1)
	{
		echo "<b><h3><u>None</u></b><br />";
		}
foreach($abs as $id)
	{
		echo "$id<br />";
		}
echo "<br /><b><u>List of students present</u></b><br />";
foreach($pre as $id)
	{
		echo "$id<br />";
		}
echo "</h3>";
?>
