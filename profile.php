<html>
<head>
<link rel="stylesheet" type="text/css" href="css/uis.css" />
<script type="text/javascript" src="js/uis.js"></script>
</head>
<body>
<div class=table>
<? 
include("dbconnect.php");
$profile_id=$_GET['profile_id'];
$session_id=$_GET['user'];
$ac=$_GET['access_lvl'];

switch($ac){

case 1:{	

	$select1=mysql_query("select * from student where stu_id='$profile_id'");
	$ar=mysql_fetch_array($select1);
	if($ar['nss']) $nss="Yes";
	else $nss="No";
	print	"<div id=prof>
	<br/>Profile:$ar[name]<br/><br/>
	</div>";
	print 
	"<br/><table border=0 cellpadding=9>

	<tr>
	<td><b>Student Id</b><td>:</td></td><td><div id='stu_id'>".$ar['stu_id']."</div></td>
	<tr/>
	<tr>
	<td><b>Name</b></td><td>:</td><td><div id='stu_name'>".$ar['name']."</div></td>
	</tr>
	<tr>
	<td><b>Course</b></td><td>:</td><td><div id='stu_course'>".$ar['course']."</div></td>
	</tr>	
	<tr>
	<td><b>Branch</b></td><td>:</td><td><div id='stu_branch'>".$ar['branch']."</div></td>
	</tr>	
	<tr>
	<td><b>Class</b></td><td>:</td><td><div id='stu_cls'>".$ar['class']."</div></td>
	</tr>
	<tr>
	<td><b>Date of Birth</b></td><td>:</td><td><div id='stu_dob'>".$ar['dob']."</div></td>
	</tr>
	<tr>
	<td><b>Address</b></td><td>:</td><td><div id='stu_add'>".$ar['address']."</div></td>
	</tr>
	<tr>
	<td><b>Mail</b></td><td>:</td><td><div id='stu_mail'>".$ar['mail_id']."</div></td>
	</tr>
	<td><b>Phone</b></td><td>:</td><td><div id='stu_phn'>".$ar['phone_num']."</div></td>
	</tr> 
	<tr><td><b>Member of NSS<b></td><td>:</td><td><div id='stu_nss'>".$nss."</div></td></tr>
	
	
	</table>";
	break;
	}

case 3:{

	$select2=mysql_query("select * from faculty where fac_id='$profile_id'");
	$ar=mysql_fetch_array($select2);
	print	"<div id=prof>
	<br/>Profile:$ar[name]<br/><br/>
	</div>";
	print "<br><table border=0 cellpadding=9>

	<tr>
	<td><b>Faculty Id</b><td>:</td></td><td><div id='fac_id'>".$ar['fac_id']."</div></td>
	<tr/>
	<tr>
	<td><b>Name</b></td><td>:</td><td><div id='fac_name'>".$ar['name']."</div></td>
	</tr>
	<tr>
	<td><b>Subject</b></td><td>:</td><td><div id='fac_subject'>".$ar['subject']."</div></td>
	</tr>
	<tr>
	<td><b>Branch</b></td><td>:</td><td><div id='fac_branch'>".$ar['branch']."</div></td>
	</tr>	
	<tr>
	<td><b>Mail</b></td><td>:</td><td><div id='fac_mail'>".$ar['mail_id']."</div></td>
	</tr>
	<tr><td><b>Phone</b></td><td>:</td><td><div id='fac_phn'>".$ar['phone_num']."</div></td></tr>	
	</table>";
	break;
	}
case 2:{

	$select3=mysql_query("select * from admin where admin_id='$profile_id'");
	$ar=mysql_fetch_array($select3);
	
	print	"<div id=prof>
	<br/>Profile:$ar[name]<br/><br/>
	</div>";
	print "<br><table border=0 cellpadding=9>

	<tr>
	<td><b>Faculty Id</b><td>:</td></td><td><div id='admin_id'>".$ar['admin_id']."</div></td>
	<tr/>
	<tr>
	<td><b>Name</b></td><td>:</td><td><div id='admin_name'>".$ar['name']."</div></td>
	</tr>
	<tr>
	<td><b>Mail</b></td><td>:</td><td><div id='admin_mail'>".$ar['mail_id']."</div></td>
	</tr>
	<tr><td><b>Phone</b></td><td>:</td><td><div id='admin_phn'>".$ar['phone_num']."</div></td></tr>	
	<tr><td><b>Type</b></td><td>:</td><td><div id='admin_type'>".$ar['type']."</div></td></tr>	
	</table>";
	break;
	}
case 4:{

	$select3=mysql_query("select * from committee where com_id='$profile_id'");
	$ar=mysql_fetch_array($select3);
	
	print	"<div id=prof>
	<br/>Profile:$ar[name]<br/><br/>
	</div>";
	print "<br><table border=0 cellpadding=9>

	<tr>
	<td><b>Faculty Id</b><td>:</td></td><td><div id='com_id'>".$ar['com_id']."</div></td>
	<tr/>
	<tr>
	<td><b>Name</b></td><td>:</td><td><div id='com_name'>".$ar['name']."</div></td>
	</tr>
	<tr>
	<td><b>Mail</b></td><td>:</td><td><div id='com_mail'>".$ar['mail_id']."</div></td>
	</tr>
	<tr><td><b>Phone</b></td><td>:</td><td><div id='com_phn'>".$ar['phone_num']."</div></td></tr>	
	</table>";
	break;
	}
}
if ($session_id==$profile_id)
	print "<div id='save'></div><br><input type=button ' value='Edit' id='edit' onclick=edit_profile_fields('".$ac."','".$profile_id."')></a>";

?>
</div>
</body>
</html>
