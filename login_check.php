<?php
include("dbconnect.php");
$username=$_GET['user'];
$password=$_GET['pass'];
$result=mysql_query("SELECT * FROM accounts where id='$username' AND pwd='$password'");
if(mysql_num_rows($result)==1){
	$row=mysql_fetch_array($result);
	$access_lvl=$row['access_lvl'];
	session_start();
	$_SESSION['user_Id']=strtoupper($username);
	$_SESSION['access_lvl']=$access_lvl;
	if ($access_lvl==1){
		$result2=mysql_query("SELECT * FROM student where stu_id='$username'");
		$row2=mysql_fetch_array($result2);
		$_SESSION['branch']=$row2['branch'];
		$_SESSION['name']=$row2['name'];
		$_SESSION['subject']='all';
		}
	elseif($access_lvl==2){
		$result2=mysql_query("SELECT * FROM admin where admin_id='$username'");
		$row2=mysql_fetch_array($result2);
		$_SESSION['name']=$row2['name'];
		}
	elseif($access_lvl==3){
		$result2=mysql_query("SELECT * FROM faculty where fac_id='$username'");
		$row2=mysql_fetch_array($result2);
		$_SESSION['branch']=$row2['branch'];
		$_SESSION['subject']=$row2['subject'];
		$_SESSION['name']=$row2['name'];
		}
	elseif($access_lvl==4){
		$result2=mysql_query("SELECT * FROM committee where com_id='$username'");
		$row2=mysql_fetch_array($result2);
		$_SESSION['name']=$row2['name'];
		}
	echo 1;
	}
else{
	echo 0;
}
?>
