<?php
include('dbconnect.php');
$t=mysql_query("SELECT * FROM student WHERE stu_id='$_GET[uid]'");
$a=mysql_fetch_array($t);
if(($_GET['dob']==$a[5])&& (mysql_query("UPDATE accounts SET pwd='$_GET[npass]' where id='$_GET[uid]'")))
	echo 1;
else
	echo 0;
?>
