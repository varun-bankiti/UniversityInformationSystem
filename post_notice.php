<html>
<head>
<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
<?php 
include("dbconnect.php");
$session_id=$_GET['user'];
$access_lvl=$_GET['access_lvl'];
?>
<script type="text/javascript">



function submi()
{
if(document.getElementById("id").value=="None")
{alert("Select Anyone");
return false;}
}

</script>
</head>
<body>
<textarea rows="8" cols="80" name="notice" id="notice" placeholder="Write Notice Here...">
</textarea><div id='display'></div>
<select name="to"  id="notice_to" onchange="opt()">
<option value="all">To All</option>
<option value="ids">To Any Id or Id's</option>
<option value="all_students">All Students</option>
<option value="all_faculty">All Faculty</option>
<option value="all_committee">All Committee</option>
</select>
<div id="place"></div><br>
<?php echo '<input type="button"  onclick=post_n("'.$session_id.'","'.$access_lvl.'") value="Send"/>';?>
</body>
</html>
