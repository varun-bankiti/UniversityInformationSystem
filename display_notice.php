<link rel="stylesheet" href="css/uis.css" type="text/css">
<script type="text/javascript" src="js/uis.js"></script>
<?php 
include("dbconnect.php");
$session_id=$_GET['user'];
$result=mysql_query("select * from notices");
$count=0;
$from=$_GET['from'];
$access_lvl=$_GET['access_lvl'];
while($row=mysql_fetch_array($result)){
	if($from==5){
		if ($row['to']=='all'){
			$count++;
			}
		elseif ($row['to']=="all_students"){
			if ($access_lvl==1) $count++;
			}
		elseif ($row['to']=="all_faculty"){
			if ($access_lvl==3) $count++;
			}
		elseif ($row['to']=="all_committee"){
			if ($access_lvl==4) $count++;
			}		
		else{
			$ids=explode("-",$row['to']);
			foreach ($ids as $val){
				if ($val==$session_id){
					$count++;
				}
			}
		} 
	}
	else{
		$from_id=$row['from'];
		$result2=mysql_query("select * from accounts where id ='$from_id'");
		$row2=mysql_fetch_array($result2);
		if($row2['access_lvl']==$from){
			if ($row['to']=='all'){
			$count++;
			}
			elseif ($row['to']=="all_students"){
				if ($access_lvl==1) $count++;
				}
			elseif ($row['to']=="all_faculty"){
				if ($access_lvl==3) $count++;
				}
			elseif ($row['to']=="all_committee"){
				if ($access_lvl==4) $count++;
				}		
			else{
				$ids=explode("-",$row['to']);
				foreach ($ids as $val){
					if ($val==$session_id){
						$count++;
					}
				}
			} 		
		}
	}
}
if ($count==0){
	if ($from==5)
		echo "<div class='notice_box'><br><center>There are no Notices.</div>";
	else if($from==4)
		echo "<div class='notice_box'><br><center>There are no Notices From committee.</div>";
	else if($from==3)
		echo "<div class='notice_box'><br><center>There are no Notices From Faculty.</div>";
	else if($from==2)
		echo "<div class='notice_box'><br><center>There are no Notices From Admin.</div>";
	}
else {
	echo '<body onload=notice_hide("'.$count.'")>';
	$result=mysql_query("select * from notices order by time DESC");
	$counta=1;
	while($row=mysql_fetch_array($result)){
		if($from==5){
			if ($row['to']=="all"){
				$from_id=$row['from'];
				$result2=mysql_query("select * from accounts where id ='$from_id'");
				$row2=mysql_fetch_array($result2);
				$name=$row2['name'];
				echo '<div class="notice_button"><div id="from"><a href="#" onclick=notice_select('.$counta.')>Notice From :  '.$from_id."  ".$name.'</a></div><div id="on" align="right">'.$row['time'].'</div></div>';
				echo '<div id="n'.$counta.'"><div class="notice_box">'.$row['notice'].'</div></div>';
				echo '<br>';
				$counta=$counta+1;
				}
			elseif($row['to']=="all_students"){
				if($access_lvl=="1"){
					$from_id=$row['from'];
					$result2=mysql_query("select * from accounts where id ='$from_id'");
					$row2=mysql_fetch_array($result2);
					$name=$row2['name'];
					echo '<div class="notice_button"><div id="from"><a href="#" onclick=notice_select('.$counta.')>Notice From :  '.$from_id."  ".$name.'</a></div><div id="on" align="right">'.$row['time'].'</div></div>';
					echo '<div id="n'.$counta.'"><div class="notice_box" >'.$row['notice'].'</div></div>';
					echo '<br>';
					$counta=$counta+1;
					}
				}
			elseif($row['to']=="all_faculty"){
				if($access_lvl=="3"){
					$from_id=$row['from'];
					$result2=mysql_query("select * from accounts where id ='$from_id'");
					$row2=mysql_fetch_array($result2);
					$name=$row2['name'];
					echo '<div class="notice_button"><div id="from"><a href="#" onclick=notice_select('.$counta.')>Notice From :  '.$from_id."  ".$name.'</a></div><div id="on" align="right">'.$row['time'].'</div></div>';
					echo '<div id="n'.$counta.'"><div class="notice_box" >'.$row['notice'].'</div></div>';
					echo '<br>';
					$counta=$counta+1;
					}
				}
			elseif($row['to']=="all_committee"){
				if($access_lvl=="4"){
					$from_id=$row['from'];
					$result2=mysql_query("select * from accounts where id ='$from_id'");
					$row2=mysql_fetch_array($result2);
					$name=$row2['name'];
					echo '<div class="notice_button"><div id="from"><a href="#" onclick=notice_select('.$counta.')>Notice From :  '.$from_id."  ".$name.'</a></div><div id="on" align="right">'.$row['time'].'</div></div>';
					echo '<div id="n'.$counta.'"><div class="notice_box"  >'.$row['notice'].'</div></div>';
					echo '<br>';
					$counta=$counta+1;
					}
				}
			else{
				$ids=explode("-",$row['to']);
				foreach ($ids as $val){
					if (($val==$session_id)||$val==strtolower($session_id)){
						$from_id=$row['from'];
						$result2=mysql_query("select * from accounts where id ='$from_id'");
						$row2=mysql_fetch_array($result2);
						$name=$row2['name'];
						echo '<div class="notice_button"><div id="from"><a href="#" onclick=notice_select('.$counta.')>Notice From :  '.$from_id."  ".$name.'</a></div><div id="on" align="right">'.$row['time'].'</div></div>';
						echo '<div id="n'.$counta.'"><div class="notice_box"  >'.$row['notice'].'</div></div>';
						echo '<br>';
						$counta=$counta+1;			
						}
					} 
				}
			}
		else{
			if($row['to']=="all"){
				$id=$row['from'];
				$result2=mysql_query("select * from accounts where id ='$id'");
				$row2=mysql_fetch_array($result2);
				$name=$row2['name'];
				if ($from==$row2['access_lvl']){
					echo '<div class="notice_button"><div id="from"><a href="#" onclick=notice_select('.$counta.')>Notice From :  '.$id." ".$name.'</a></div><div id="on" align="right">'.$row['time'].'</div></div>';
					echo '<div id="n'.$counta.'"><div class="notice_box">'.$row['notice'].'</div></div>';
					echo '<br>';
					$counta=$counta+1;		
					}
				}
			elseif($row['to']=="all_students"){
				if($access_lvl==1){
					$id=$row['from'];
					$result2=mysql_query("select * from accounts where id ='$id'");
					$row2=mysql_fetch_array($result2);
					$name=$row2['name'];
					if ($from==$row2['access_lvl']){
						echo '<div class="notice_button"><div id="from"><a href="#" onclick=notice_select('.$counta.')>Notice From :  '.$id." ".$name.'</a></div><div id="on" align="right">'.$row['time'].'</div></div>';
						echo '<div id="n'.$counta.'"><div class="notice_box">'.$row['notice'].'</div></div>';
						echo '<br>';
						$counta=$counta+1;		
						}
					}
				}
			elseif($row['to']=="all_faculty"){
				if($access_lvl==3){
					$id=$row['from'];
					$result2=mysql_query("select * from accounts where id ='$id'");
					$row2=mysql_fetch_array($result2);
					$name=$row2['name'];
					if ($from==$row2['access_lvl']){
						echo '<div class="notice_button"><div id="from"><a href="#" onclick=notice_select('.$counta.')>Notice From :  '.$id." ".$name.'</a></div><div id="on" align="right">'.$row['time'].'</div></div>';
						echo '<div id="n'.$counta.'"><div class="notice_box">'.$row['notice'].'</div></div>';
						echo '<br>';
						$counta=$counta+1;		
						}
					}
				}
			elseif($row['to']=="all_committee"){
				if($access_lvl==4){
					$id=$row['from'];
					$result2=mysql_query("select * from accounts where id ='$id'");
					$row2=mysql_fetch_array($result2);
					$name=$row2['name'];
					if ($from==$row2['access_lvl']){
						echo '<div class="notice_button"><div id="from"><a href="#" onclick=notice_select('.$counta.')>Notice From :  '.$id." ".$name.'</a></div><div id="on" align="right">'.$row['time'].'</div></div>';
						echo '<div id="n'.$counta.'"><div class="notice_box">'.$row['notice'].'</div></div>';
						echo '<br>';
						$counta=$counta+1;		
						}
					}
				}
			else{
				$ids=explode("-",$row['to']);
				foreach ($ids as $val){
					if (($val==$session_id)||$val==strtolower($session_id)){
						$id=$row['from'];
						$result2=mysql_query("select * from accounts where id ='$id'");
						$row2=mysql_fetch_array($result2);
						$name=$row2['name'];
						if ($from==$row2['access_lvl']){
							echo '<div class="notice_button"><div id="from"><a href="#" onclick=notice_select('.$counta.')>Notice From :  '.$id." ".$name.'</a></div><div id="on" align="right">'.$row['time'].'</div></div>';
							echo '<div id="n'.$counta.'"><div class="notice_box">'.$row['notice'].'</div></div>';
							echo '<br>';
							$counta=$counta+1;	
							}	
						}
					}
				}		
			}
		}		
	}
?>
</body>
