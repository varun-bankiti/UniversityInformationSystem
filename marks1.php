<html>
<?php
include("dbconnect.php");
$clss=$_GET['cls'];
$expire=time()+60*60*2;
setcookie("class",$clss, $expire);
$result=mysql_query("select * from student where class='$clss'");
session_start();
$fname=$_SESSION['name'];
$fid=$_SESSION['user_Id'];
$subject=mysql_query("select  subject from faculty where name='$fname'");
$sub1=mysql_fetch_array($subject);
$sub=$sub1[0];
echo"<table border='1'> <tr><td>Faculty Name </td><td>$fname</td></tr><tr><td>Class</td><td>$clss</td></tr><tr><td>Subject</td><td>$sub</td></tr><tr><td>Exam</td><td><select id='exam'>
<option value='None'>Select  Exam</option>
<option value='CAT1'>CAT1</option>
<option value='CAT2'>CAT2</option>
<option value='CAT3'>CAT3</option>
</select></td></tr>";

echo '<table border="0">
<tr>
<th>Name</th>
<th>Id</th>
<th>Marks</th>
</tr>';
$i=0;
$c=0;
while($row=mysql_fetch_array($result))
	{
		$stu[$i++]=$row['stu_id'];
		echo "<tr>";
		echo "<td>" . $row['name'] . "   </td>";
		echo "<td>" . $row['stu_id'] . "   </td>";
		$ii=$row['stu_id'];
		$i++;
		$r[$i++]=$row['stu_id'];
		echo "<td>"."<input type='text' cols='2' rows='1' id='".$c."m"."'/>";
		echo "</tr>";
		$c++;
	}
echo "</table>";
echo "<input type='button'  value='Submit' onclick='submit_marks($c)'/>";
echo "<div id='valid'></div>";
?>
