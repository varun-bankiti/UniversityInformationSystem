<?php include("dbconnect.php");
$access_lvl=$_GET['al'];
if ($access_lvl==1){
	if($_GET['nss']) $nss='1';
	else $nss='0';
	$v="update student set name='$_GET[name]',class='$_GET[cls]',branch='$_GET[branch]',dob='$_GET[dob]',course='$_GET[course]',address='$_GET[add]',phone_num='$_GET[phn]',mail_id='$_GET[mail]',nss='$nss' where stu_id='$_GET[user]'";
	if(mysql_query($v)) echo '1';
	else echo '0';
	}
elseif ($access_lvl==2){
	$v="update admin set name='$_GET[name]',phone_num='$_GET[phn]',mail_id='$_GET[mail]' where admin_id='$_GET[user]'";
	if(mysql_query($v)) echo '1';
	else echo '0';
	}
elseif ($access_lvl==3){
	$v="update faculty set name='$_GET[name]',branch='$_GET[branch]',phone_num='$_GET[phn]',mail_id='$_GET[mail]',subject='$_GET[subject]' where fac_id='$_GET[user]'";
	if(mysql_query($v)) echo '1';
	else echo '0';
	}
elseif ($access_lvl==4){
	$v="update committee set name='$_GET[name]',phone_num='$_GET[phn]',mail_id='$_GET[mail]' where com_id='$_GET[user]'";
	if(mysql_query($v)) echo '1';
	else echo '0';
	}
?>
