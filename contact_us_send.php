<html>
<head>
<link rel="stylesheet" type="text/css" href="contact.css" />
</head>
<body>
<?php
include("dbconnect.php");
session_start();
$noti=mysql_query("select * from notices");
$num_rows=mysql_num_rows($noti)+1;
$ins_notices="INSERT INTO notices  VALUES('notice$num_rows','$_GET[to]','$_SESSION[user_Id]','$_GET[dat]','$_GET[sub]"."-"."$_GET[msg]') ";
mysql_query($ins_notices);
echo "Thank You <br/> Your message has been sent to Admin";
?>
</body>

</html>
