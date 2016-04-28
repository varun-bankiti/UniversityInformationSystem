<?php
session_start();
echo '<link rel="stylesheet" type="text/css" href="css/uis.css" />';
echo '<script src="js/uis.js"></script>';
echo '<title>UIS</title>';
include("dbconnect.php");
$exam_id="exam_1";
$result=mysql_query("SELECT * FROM exam where exam_id='$exam_id'");
$row=mysql_fetch_array($result);
$answers=explode(",",$row['key']);
$names=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y');
$marks=0;
for($i=0;$i<25;$i++){
	if ($_POST[$names[$i]]==$answers[$i]){ $marks=$marks+1;}
	}
mysql_query("UPDATE evaluation set marks=$marks where stu_id='$_SESSION[user_Id]' and exam_id='$exam_id'");
echo '<center><div class="transboxa"><center>Congratulations<br><br><br><br><table><col width=200><col width=100><tr><td>ID Number:</td><td>';
echo $_SESSION['user_Id'];
echo '</td></tr><br><br><tr><td>Marks:</td><td>';
echo $marks;
echo '</td></tr></table></center></div></center>';
?>
