<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
<?php 
$session_id=$_GET['user'];
$access_lvl=$_GET['access_lvl'];
echo '<div class="button">';
echo '<center><a href="#" onclick=display_notice("'.$session_id.'","3") ><div id="button">From Faculty</div></a></center>';
echo '<center><a href="#" onclick=display_notice("'.$session_id.'","4") ><div id="button">From Committee</div></a></center>';
echo '<center><a href="#" onclick=display_notice("'.$session_id.'","2") ><div id="button">From Admin</div></a></center>';
if (!($access_lvl==1)){
echo '<center><a href="#" onclick=post_notice("'.$session_id.'") ><div id="button">Post Notice</div></a></center>';
}
echo '</div>';
?>
