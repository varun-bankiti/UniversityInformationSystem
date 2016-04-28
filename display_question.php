<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
<?php
include("dbconnect.php");
$session_id=$_GET['user'];
$session_sub=$_GET['sub'];
$branch=$_GET['branch'];
if ($session_sub=="all"){
	$result=mysql_query("select * from questions where branch='$branch' order by posted_on DESC");
}
else{
	$result=mysql_query("select * from questions where subject='$session_sub' order by posted_on DESC");
}
if (mysql_num_rows($result)==0){
	echo "<div id='question_box'> <div class='question'><br><br>&nbsp&nbsp&nbsp&nbspThere are no Questions<br><br><br></div>";
}
else{
	while($row=mysql_fetch_array($result)){
		$result2=mysql_query("select * from answers where ques_id='$row[ques_id]'");
		$answers=mysql_num_rows($result2);
		echo "<div id='question_box'>";
		$new_ans_id="ans".$row['ques_id'][strlen($row['ques_id'])-1].($answers+1);
		if($answers>0){
			echo "<br><div class='question'>Question:-".$row['question'].'</div><div class="qby">Posted by:'.$row['posted_by'].'</div><div class="qon">On:'.$row['posted_on'].'</div>';	
			$count=0;
			$ans_no=1;
			while($row2=mysql_fetch_array($result2)){
				if ($row2['posted_by']!=$session_id) $count++;
				echo "<div class='answer'><div id='".$row2['ansr_id']."'>Answer ".$ans_no.":-".$row2['answer']."</div>";
				if ($row2['posted_by']==$session_id) echo '<input type="button" id='.$row2['ansr_id'].'b'.' value="Edit" onclick=create_update_answer("'.$session_id.'","'.$row2['ansr_id'].'","'.$row['ques_id'].'","'.$session_sub.'","'.$branch.'")>';
				echo "</div><div class='aby'>Posted by:".$row2['posted_by'].'</div><div class="aon">On:'.$row2['posted_on'].'</div>';
				$ans_no++;
			}
			
			if (($count==$answers)&&($row['posted_by']!=$session_id)){echo '<div id="'.$row['ques_id'].'"><input type="button" value="Write Answer" onclick=create_answer_fields("'.$session_id.'","'.$new_ans_id.'","'.$row['ques_id'].'","'.$session_sub.'","'.$branch.'")></div>';}
			echo '</div></div>';
		}
		else{
			echo "<br><div class='question'>".$row['question'].'</div><div class="qby">Posted by:'.$row['posted_by'].'</div><div class="qon">On:'.$row['posted_on'].'</div>';
			echo "<div class='answer'>No Answers are there</div>";
			if ($row['posted_by']!=$session_id){
				echo '<br><div id="'.$row['ques_id'].'"><input type="button" value="Write Answer" onclick=create_answer_fields("'.$session_id.'","'.$new_ans_id.'","'.$row['ques_id'].'","'.$session_sub.'","'.$branch.'")></div>';}
			echo "</div>";
		}
	
	}
}
?>


