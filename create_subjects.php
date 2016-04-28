<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
<?php
include("dbconnect.php");
$branch=$_GET['branch'];
$result=mysql_query("SELECT * FROM branchsub where branch='$branch'");
$row=mysql_fetch_array($result);
echo '<select id="subjects">';
echo '<option value="None" >Subject</option></option></option>';
$subjects=explode("-",$row['subjects']);
foreach($subjects as $sub){
	echo '<option value="'.$sub.'">'.$sub.'</option>';
	}
?>
