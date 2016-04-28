<?php
include("dbconnect.php");
echo '<link rel="stylesheet" type="text/css" href="Exam/exam.css" />';
echo '<script src="Exam/exam.js"></script>';
echo '<title>UIS</title>';
echo '<body onload=varun()></body>';
$result = mysql_query("SELECT * FROM exam");
$count=0;
session_start();
$exam_id='exam_1';
$names=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y');
while($row = mysql_fetch_array($result))
  {
   $result2=mysql_query("SELECT * FROM evaluation where exam_id='$exam_id' and stu_id='$_SESSION[user_Id]'");
  if (isset($_SESSION['user_Id'])&& (mysql_num_rows($result2)==0)){
	mysql_query("INSERT INTO evaluation values('$_SESSION[user_Id]','$exam_id',0,0)");
	echo '<div class="main"><form id="vin" method="POST" action="eval.php">';
	echo '<table border=0><col width=500><col width=500> <col width=300><tr><td>'.$_SESSION['user_Id'].'</td><td>Welcome '.$_SESSION['name'].'</td><td><div id="time"></div></td></tr></table><br><br>';
	echo '</div>';
	echo '<div class="questions">';
	echo '<br><br><br>';
	for($i=0;$i<25;$i++){
		echo strval($i+1).')';
		echo '<br>&nbsp&nbsp<img src="Exam/questions/'.strval($i+1).'.png"><br><br>';
		echo "\n";
		echo '<div class="options">&nbspA<input type="radio" name="'.$names[$i].'" value="0" />&nbsp&nbspB<input type="radio" name="'.$names[$i].'" value="1" />&nbsp&nbspC<input type="radio" name="'.$names[$i].'" value="2" />&nbsp&nbspD<input type="radio" name="'.$names[$i].'" value="3" />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="'.$names[$i].'" value="4" checked="checked"/></div><br><br>';
		echo "\n";
		}
	echo '<center><input type="button" value="Submit" onClick="vinay(0)"></center>';
	echo '</form>';
	echo '</div>';
	echo '<center><div class="footer">Copyright @ Virtuosers | All Rights Reserved</center>';
	}
   else if (isset($_SESSION['user_Id'])&& (mysql_num_rows($result2)==1)){
	echo '<center><div class="footer">Already Completed Your Exam!<br>';
	}
  }
?> 




