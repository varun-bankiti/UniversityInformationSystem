<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
<?php
include("dbconnect.php");
$session_id=$_GET['user'];
$branch=$_GET['branch'];
$result=mysql_query("SELECT * FROM branchsub where branch='$branch'");
$row=mysql_fetch_array($result);
$subjects=explode("-",$row['subjects']);
echo '<div class="button">';
foreach ($subjects as $sub){
	echo '<center><a href="#" onclick=display_question("'.$session_id.'","'.$sub.'","'.$branch.'") ><div id="button">'.$sub.'</div></a></center>';
	}
$result2=mysql_query("SELECT * FROM accounts where id='$session_id'");
$row2=mysql_fetch_array($result2);
if($row2['access_lvl']==1){
	echo '<center><a href="#" onclick=question_post("'.$session_id.'","'.$branch.'") ><div id="button">Post a Question</div></a></center>';
	}
echo '</div>';
?>
