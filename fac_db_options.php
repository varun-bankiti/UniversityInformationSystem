<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
<?php 
echo '<div class="button">';
echo '<center><a href="#" onclick=attendance_take() ><div id="button">Take Attendance</div></a></center>';
echo '<center><a href="#" onclick=attendance_view() ><div id="button">View Attendance</div></a></center>';
echo '<center><a href="#" onclick=attendance_edit() ><div id="button">Edit Attendance</div></a></center><hr />';
echo '<center><a href="#" onclick=marks_take() ><div id="button">Take Marks</div></a></center>';
echo '<center><a href="#" onclick=marks_view() ><div id="button">View Marks</div></a></center>';
echo '<center><a href="#" onclick=marks_edit() ><div id="button">Edit Marks</div></a></center>';
echo '</div>';
?>
