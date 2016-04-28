<?php
include("dbconnect.php");
$session_id=$_GET['user'];
$notice=$_GET["notice"];
$to=$_GET["to"];
$date=$_GET['date'];
$q=mysql_query("select * from notices");
$c=mysql_num_rows($q)+1;
if(mysql_query("insert into notices values('notice$c','$to','$session_id','$date','$notice')"))
	echo "1";
else
	echo "0";

