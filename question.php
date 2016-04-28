<html>
<head>
<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
<script type="text/javascript">
function submi()
{
	if(document.getElementById("branch").value=="None")
	{
	alert("Select any Branch");
	return false;
	}
	else if(document.getElementById("subjects").value=="None")
	{
	alert("Select any Subjet");
	return  false;
	}
}
</script>
<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>


</head>
<body>
<textarea rows="8" cols="80" name="question" id="question" placeholder="Write your question here....">
</textarea><br>
<?php
include("dbconnect.php");
$branch=$_GET['branch'];
$session_id=$_GET['user'];
$result=mysql_query("SELECT * FROM branchsub where branch='$branch'");
$row=mysql_fetch_array($result);
echo "<div id='subject'>";
echo '<select id="subjects" name="subjects">';
echo '<option value="None" >Subject</option></option></option>';
$subjects=explode("-",$row['subjects']);
foreach($subjects as $sub){
	echo '<option value="'.$sub.'">'.$sub.'</option>';
	}
echo '</div>';
echo '<input type="button" value="send" onclick=post_q("'.$session_id.'","'.$branch.'")>';

?>

</body>
</html>
