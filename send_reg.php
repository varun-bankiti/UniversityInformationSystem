<?php
include("dbconnect.php");
$Acess_Level=$_GET['ref'];
if ($Acess_Level==1)//student
{
if($_GET['nss']) $nss=1;
else $nss=0;
$sql="INSERT INTO student 
VALUES ('$_GET[id]','$_GET[name]','$_GET[cls]','$_GET[branch]','$_GET[course]','$_GET[dob]','$_GET[add]','','$_GET[mail]','$_GET[phn]',$nss)";
}
elseif ($Acess_Level==3)//faculty
{
$sql="INSERT INTO faculty 
VALUES ('$_GET[id]','$_GET[mail]','$_GET[subject]','$_GET[branch]','','$_GET[mail]','$_GET[phn]')";
}
else //committee
{
$sql="INSERT INTO committee 
VALUES ('$_GET[id]','$_GET[name]','','$_GET[mail]','$_GET[phn]')";
}
$sql2="INSERT INTO accounts (id, name, pwd, access_lvl) VALUES ('$_GET[id]','$_GET[name]','$_GET[pass]','$Acess_Level')";
if(mysql_query($sql)&& mysql_query($sql2)) echo 1;
else echo 0;
