<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2//EN">

<title>UIS</title>
<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
<?php
include("dbconnect.php");
$session_id=$_SESSION['user_Id'];
$access_lvl=$_SESSION['access_lvl'];
if ($access_lvl==1 || $access_lvl==3){
	$branch=$_SESSION['branch'];
	$subject=$_SESSION['subject'];
	}
$name=$_SESSION['name'];
?>
<div class="top"><div id="date">Date</div>
	<div id="logout"><a href="logout.php">LOGOUT</a></div>
	<?php echo '<div id="noticet">Welcome '.$name.'</div>';?>
</div>
<BR>
<div class="outer">
	<div class="main">
		<div id="images">
			<div class="image">
				<div id="imge1"></div>
			</div>
			<div class="logo">
				<div id="imge"></div>
			</div>
<?php
echo '<BODY onload=defaul("'.$session_id.'","'.$access_lvl.'","5")>';
?>
	
			<div class="menu">
				<ul>
			<?php
			if ($access_lvl==1){
					echo '<li><a href="#" onclick=notices("'.$session_id.'","'.$access_lvl.'","5")>Home</a></li>';
					echo '<li><a href="#" onclick=profile_own("'.$session_id.'","'.$session_id.'","'.$access_lvl.'")>Profile</a></li>';
					echo '<li><a href="#" onclick=discussion("'.$session_id.'","'.$subject.'","'.$branch.'")>Discussion</a></li>';
					echo '<li><a href="#" onclick=stu_exam()>Exams</a></li>';
					echo '<li><a href="#" onclick=contact_us()>Contact Admin</a></li>';

				}
			elseif($access_lvl==2){
					echo '<li><a href="#" onclick=notices("'.$session_id.'","'.$access_lvl.'","5")>Home</a></li>';
					echo '<li><a href="#" onclick=profile_own("'.$session_id.'","'.$session_id.'","'.$access_lvl.'")>Profile</a></li>';
					echo '<li><a href="#" onclick=profile_search("'.$session_id.'","'.$access_lvl.'")>Search</a></li>';			

				}
			elseif($access_lvl==3){
					echo '<li><a href="#" onclick=notices("'.$session_id.'","'.$access_lvl.'","5")>Home</a></li>';
					echo '<li><a href="#" onclick=profile_own("'.$session_id.'","'.$session_id.'","'.$access_lvl.'")>Profile</a></li>';
					echo '<li><a href="#" onclick=discussion("'.$session_id.'","'.$subject.'","'.$branch.'")>Discussion</a></li>';
					echo '<li><a href="#" onclick=show_db_options()>Database</a></li>';
					echo '<li><a href="#" onclick=fac_exam()>Exam</a></li>';
					echo '<li><a href="#" onclick=profile_search("'.$session_id.'","'.$access_lvl.'")>Search</a></li>';			
				}
			elseif($access_lvl==4){
					echo '<li><a href="#" onclick=notices("'.$session_id.'","'.$access_lvl.'","5")>Home</a></li>';
					echo '<li><a href="#" onclick=profile_own("'.$session_id.'","'.$session_id.'","'.$access_lvl.'")>Profile</a></li>';
					echo '<li><a href="#" onclick=profile_search("'.$session_id.'","'.$access_lvl.'")>Search</a></li>';			

				}
				?>
				</ul>
			</div>
		</div>
		<div id="container">
			<div class="sidepane">
				<div id="sidepane"></div>
			</div>
			<div class="body">
				<div id="body">Welcome</div>
			</div>
		</div>
		<div class="footer">
			<center>Copyright &copy VIRTUOSERS All Rights Reserved</center>
		</div>
	</div>
</div>
