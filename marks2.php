<?php
include("dbconnect.php");
$clss=$_COOKIE['class'];
$result=mysql_query("select * from student where class='$clss'");
$marks=explode(' ',$_GET['str']);
$exam=$marks[0];
$ref=$marks[1];
session_start();
$fname=$_SESSION['name'];
$fid=$_SESSION['user_Id'];
$subject=mysql_query("select  subject from faculty where name='$fname'");
$sub1=mysql_fetch_array($subject);
$sub=$sub1[0];
$i=1;
$j=-1;
$k=0;
if($ref=="edit")
	{
	mysql_query("delete from internal_marks where fac_id='$fid' and exam='$exam' and class='$clss'");
	$i=2;
	}
$result1=mysql_query("select exam from internal_marks where class='$clss' and exam='$exam' and subject='$sub'");
if(count(mysql_fetch_array($result1))>1)
	{
		echo '<center><h2><blink>Marks are already exist</blink></h2></center>';
		return;
		}
while($row=mysql_fetch_array($result))
	{
	$idd=$row['stu_id'];
	$check[++$j]=$idd;
	$markss=$marks[$i++];
	$check1[$k++]=$markss;
	mysql_query("INSERT into internal_marks values('$fid','$sub','$clss','$idd','$exam','$markss')");
	}
echo "<br /> <blink><center><h2>Marks are successfully submitted </h2></center></blink><br />";
echo"<br /><table><tr><th>Id number</th><th>Marks</th></tr>";
for($k=0;$k<=$j;$k++)
	{
		echo '<tr><td><center>'.$check[$k]."</center></td><td> <center>".$check1[$k].'<center/></td></tr><br />';
		}
echo '</table>';
?>
