<?php
include("dbconnect.php");
$clss=$_GET['cls'];
$expire=time()+60*60*2;
setcookie("class",$clss, $expire);
session_start();
$result=mysql_query("select * from student where class='$clss'");
$date=date("d-m-Y");
echo"<table border='1'> <tr><td>Faculty Name </td><td>".$_SESSION['name']."</td></tr><tr><td>Class</td><td>$clss</td></tr><tr><td>Date</td><td>$date</td></tr>";
echo '<table border="0">
<tr>
<th>Name</th>
<th>Id</th>
<th>Attendance</th>
</tr>';
$i=0;
$id="";
while($row=mysql_fetch_array($result))
	{
		$stu[$i++]=$row['stu_id'];
		echo "<tr>";
		echo "<td>" . $row['name'] . "   </td>";
		echo "<td>" . $row['stu_id'] . "   </td>";
		$ii=$row['stu_id'];
		$id=$id." ".$ii;
		$i++;
		$r[$i++]=$row['stu_id'];
		echo "<td>"."<input type='checkbox' name='$ii' checked='checked' />";
		echo "</tr>";
	}
echo "</table>";
echo "<input type='button' value='Submit Attendance'  onclick='post_attendance()'/>";
?>
