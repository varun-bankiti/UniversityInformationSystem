//Timer Start#########################################
function date()
{
var today=new Date();
var year=today.getFullYear();
var month=today.getMonth();
var d=today.getDate();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
month=month+1;
document.getElementById('date').innerHTML=year+"-"+month+"-"+d+" "+h+":"+m+":"+s;
t=setTimeout(function(){date()},500);
}
function curr_time()
{
var today=new Date();
var year=today.getFullYear();
var month=today.getMonth();
var d=today.getDate();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
month=month+1;
d=year+"-"+month+"-"+d+" "+h+":"+m+":"+s;
return d;
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
//Timer End#########################################

function v(){
	document.getElementById("n1").style.display="none";
}
function defaul(user,access_lvl,from){
	notices(user,access_lvl,from);
	date();
	}
//Notice Start#########################################
var j=0;
function notice_hide(divs){
	for (k=1;k<=divs;k++){
		if (val=document.getElementById("n"+k)){
			val.style.display="none";
			}
	}
}
function varun(){
	notice=new XMLHttpRequest();
	notice.onreadystatechange=function()
	{
		if (notice.readyState==4 && notice.status==200){
			document.getElementById("test").innerHTML=notice.responseText;
			}
	}
	url="display_notice.php?user=R091057&from=5&access_lvl=1";
	notice.open("GET",url,true);
	notice.send();
	}
function notice_select(i){
		if (j==i){
			document.getElementById("n"+i).style.display="none";
			j=0;
			}
		else{
			if (j>0)
				document.getElementById("n"+j).style.display="none";
			document.getElementById("n"+i).style.display="block";
			j=i;
		}
}
function display_notice(user,from,access_lvl){
	notice=new XMLHttpRequest();
	notice.onreadystatechange=function()
	{
		if (notice.readyState==4 && notice.status==200){
			document.getElementById("body").innerHTML=notice.responseText;
			notice_hide(100);
			}
	}
	url="display_notice.php?user="+user+"&from="+from+"&access_lvl="+access_lvl;
	notice.open("GET",url,true);
	notice.send();
	}
function notices_from(user,access_lvl){
	notice2=new XMLHttpRequest();
	notice2.onreadystatechange=function(){
		if (notice2.readyState==4 && notice2.status==200){
			document.getElementById("sidepane").innerHTML=notice2.responseText;
		}
	}
	url="from.php?user="+user+"&access_lvl="+access_lvl;
	notice2.open("GET",url,true);
	notice2.send();
}
function post_notice(user,access_lvl){
	notice3=new XMLHttpRequest();
	notice3.onreadystatechange=function(){
		if (notice3.readyState==4 && notice3.status==200){
			document.getElementById("body").innerHTML=notice3.responseText;
		}
	}
	url="post_notice.php?user="+user+"&access_lvl="+access_lvl;
	notice3.open("GET",url,true);
	notice3.send();
	}
function post_n(user,access_lvl){
	notice=document.getElementById("notice").value;
	if (notice=="") document.getElementById("display").innerHTML="Notice Canot Be Empty";
	else{
	v=document.getElementById("notice_to").value;
	if(v!="ids")
		to=v;
	else
		to=document.getElementById("to_ids").value;
	dat=curr_time();
	notice4=new XMLHttpRequest();
	notice4.onreadystatechange=function(){
		if (notice4.readyState==4 && notice4.status==200){
			if (notice4.responseText=="1"){
				notices(user,access_lvl,"5");
				count=1;
			}
		}
	}
	url="post_notice2.php?user="+user+"&notice="+notice+"&date="+dat+"&to="+to;
	notice4.open("GET",url,true);
	notice4.send();
	}
	} 
count=1;
function opt(){
	if((document.getElementById('notice_to').value=="ids")){
	nam1=document.createElement('p');
	nam1.setAttribute('id','text');
	document.getElementById('place').appendChild(nam1)
	document.getElementById('text').innerHTML="Write Id Numbers and separate with (- 'hifen' )";
	nam=document.createElement('input');
	nam.setAttribute('type','text');
	nam.setAttribute('name','inp');
	nam.setAttribute('id','to_ids');
	nam.setAttribute('placeholder','Enter');
	document.getElementById('place').appendChild(nam);
	count=0;
	}
	else {document.getElementById('place').innerHTML="";}
}
function notices(user,access_lvl,notice_from){
	display_notice(user,notice_from,access_lvl);
	notices_from(user,access_lvl);
	}

//Notices End#########################################
//Discussion start######################################
function display_question(user,sub,branch){
	questions=new XMLHttpRequest();
	questions.onreadystatechange=function()
	{
		if (questions.readyState==4 && questions.status==200){
			document.getElementById("body").innerHTML=questions.responseText;
			}
	}
	var url="display_question.php?user="+user+"&sub="+sub+"&branch="+branch;
	questions.open("GET",url,true);
	questions.send();
}
function subjects(user,branch){
	questions2=new XMLHttpRequest();
	questions2.onreadystatechange=function()
	{
		if (questions2.readyState==4 && questions2.status==200){
			document.getElementById("sidepane").innerHTML=questions2.responseText;
			}
	}
	var url="subjects.php?user="+user+"&branch="+branch;
	questions2.open("GET",url,true);
	questions2.send();
	}
function discussion(user,sub,branch){
	display_question(user,sub,branch);
	subjects(user,branch);
}

function post_answer(user,ansr_id,ques_id,old_new,sub,branch){
	ans=document.getElementById(ansr_id+"t").value;
	dat=curr_time();
	answer=new XMLHttpRequest();
	answer.onreadystatechange=function()
	{
		if (answer.readyState==4 && answer.status==200){
			if (answer.responseText==1)
				display_question(user,sub,branch);
			else{
				if(old_new==1)
					document.getElementById(ques_id).innerHTML="Unable to Post Answer.";
				else
					document.getElementById(ansr_id).innerHTML="Unable to Update Answer.";
				}
			}
	}
	var url="post_answer.php?user="+user+"&ansr_id="+ansr_id+"&ques_id="+ques_id+"&date="+dat+"&ansr="+ans+"&old_new="+old_new;
	answer.open("GET",url,true);
	answer.send();
	}
function create_update_answer(user,ansr_id,ques_id,sub,branch){
	val=document.getElementById(ansr_id).innerHTML;
	val2=val.substring(10,val.length);
	but=document.createElement("input");
	but.setAttribute("type","button");
	but.setAttribute("onclick","post_answer('"+user+"','"+ansr_id+"','"+ques_id+"','0','"+sub+"','"+branch+"')");
	but.setAttribute("value","Save");
	document.getElementById(ansr_id).innerHTML='Answer:-<br><textArea id="'+ansr_id+'t'+'" rows=2 cols=70>'+val2+'</textArea>';
	document.getElementById(ansr_id).appendChild(but);
	document.getElementById(ansr_id+"b").style.visibility="hidden";
	}
function create_answer_fields(user,ansr_id,ques_id,sub,branch){
	tex=document.createElement("textArea");
	tex.setAttribute("id",ansr_id+"t");
	tex.setAttribute('cols','70');
	tex.setAttribute('rows','5');
	but=document.createElement("input");
	but.setAttribute("type","button");
	but.setAttribute("value","Post Answer");
	but.setAttribute("onclick","post_answer('"+user+"','"+ansr_id+"','"+ques_id+"','1','"+sub+"','"+branch+"')");
	document.getElementById(ques_id).innerHTML="";
	document.getElementById(ques_id).appendChild(tex);
	document.getElementById(ques_id).appendChild(but);
}

function post_q(user,branch){
	subject=document.getElementById("subjects").value;
	question=document.getElementById("question").value;
	dat=curr_time();
	question_post=new XMLHttpRequest(); 
	question_post.onreadystatechange=function()
	  {
	  if (question_post.readyState==4 && question_post.status==200)
	    {
		if (question_post.responseText=="1"){
			display_question(user,subject,branch);
			}
		else{
			alert("Question not Posted");
			display_quesion(user,subject,branch);
			}
  		discussion(user,'all',branch);
	    }
	  }
	url="post_question.php?branch="+branch+"&subject="+subject+"&question="+question+"&date="+dat+"&user="+user;
	question_post.open("GET",url,true);
	question_post.send();
	}
function question_post(user,branch){
	post_question=new XMLHttpRequest(); 
	post_question.onreadystatechange=function()
	  {
	  if (post_question.readyState==4 && post_question.status==200)
	    {
	    document.getElementById("body").innerHTML=post_question.responseText;
	    }
	  }
	url="question.php?user="+user+"&branch="+branch;
	post_question.open("GET",url,true);
	post_question.send();
	}
function show_db_options(){
	dboptions=new XMLHttpRequest(); 
	dboptions.onreadystatechange=function()
	  {
	  if (dboptions.readyState==4 && dboptions.status==200)
	    {
	    document.getElementById("sidepane").innerHTML=dboptions.responseText;
	    document.getElementById("body").innerHTML="<h2><font color='red'><center>Welcome to Faculty Database</center></font></h2>";
	    }
	  }
	dboptions.open("GET","fac_db_options.php",true);
	dboptions.send();

}
function attendance_take(){
	atten=new XMLHttpRequest(); 
	atten.onreadystatechange=function()
	  {
	  if (atten.readyState==4 && atten.status==200)
	    {
	    document.getElementById("body").innerHTML=atten.responseText;
	    }
	  }
	atten.open("GET","atten.php",true);
	atten.send();
	}
function take_attendance(str){
  attend1=new XMLHttpRequest(); 
attend1.onreadystatechange=function()
  {
  if (attend1.readyState==4 && attend1.status==200)
    {
    document.getElementById("view").innerHTML=attend1.responseText;
    }
  }
attend1.open("GET","atten1.php?cls="+str,true);
attend1.send();
}
function post_attendance()
{
	c=document.getElementById('class').value;
	str="";
	var b=document.getElementById("attendance");
	for(i=0;i<(b.length)-1;++i)
		{
			str=str+b.elements[i].checked+" ";
		}
	attend2=new XMLHttpRequest(); 
	attend2.onreadystatechange=function()
  {
  if (attend2.readyState==4 && attend2.status==200)
    {
    document.getElementById("view").innerHTML=attend2.responseText;
    }
  }
url="atten2.php?str="+str+"&date="+'today'+"&class="+c+"&checked=notchecked";
attend2.open("GET",url,true);
attend2.send();
}
function view_attendance()
	{
		var d=document.getElementById("dat").value;
		var c=document.getElementById("class").value;
		dd=d.split('-');
		day=parseInt(dd[2]);
		month=parseInt(dd[1]);
		year=parseInt(dd[0]);
		if( year<2008|| day<1 || day>31 || month <1 || month>12 || c=='None' ||d.length==0	|| day==NaN || month==NaN || year==NaN)
			{
				document.getElementById('view').innerHTML='<center><h2><blink>Invalid details</blink></h2></center>';
				return;
				}
		str=document.getElementById("class").value+" "+document.getElementById("dat").value;
		view_atten=new XMLHttpRequest();
		view_atten.onreadystatechange=function()
		{
		if (view_atten.readyState==4 && view_atten.status==200)
			{
			document.getElementById("view").innerHTML=view_atten.responseText;
			}
		}
		view_atten.open("GET","view_atten1.php?class_date="+str,true);
		view_atten.send();
	}
function attendance_view()
	{
		view_atten=new XMLHttpRequest(); 
		view_atten.onreadystatechange=function()
		{
		if (view_atten.readyState==4 && view_atten.status==200)
			{
			document.getElementById("body").innerHTML=view_atten.responseText;
			}
		}
		view_atten.open("GET","view_atten.php",true);
		view_atten.send();
	}
function view_edit_attendance()
	{
		var d=document.getElementById("dat").value;
		var c=document.getElementById("class").value;
		dd=d.split('-');
		day=parseInt(dd[2]);
		month=parseInt(dd[1]);
		year=parseInt(dd[0]);
		if( year<2008 || day<1 || day>31 || month <1 || month>12 || c=='None' ||d.length==0 || day==NaN || month==NaN || year==NaN)
			{
				document.getElementById('view').innerHTML='<center><h2><blink>Invalid details</blink></h2></center>';
				return;
				}
		var str=c+" "+d;
		view_atten=new XMLHttpRequest(); 
		view_atten.onreadystatechange=function()
		{
		if (view_atten.readyState==4 && view_atten.status==200)
			{
			document.getElementById("view").innerHTML=view_atten.responseText;
			}
		}
		url="edit_atten1.php?class_date="+str;
		view_atten.open("GET",url,true);
		view_atten.send();
	}
function edit_attendance(total)
{
	var d=document.getElementById("dat").value;
	var c=document.getElementById("class").value;
	str="";
	for(i=0;i<total;i++)
		{
			str+=document.getElementById(i+"c").checked+" ";
		}
	edit_atten=new XMLHttpRequest(); 
	edit_atten.onreadystatechange=function()
  {
  if (edit_atten.readyState==4 && edit_atten.status==200)
    {
    document.getElementById("view").innerHTML=edit_atten.responseText;
    }
  }
url="atten2.php?str="+str+"&date="+d+"&class="+c+"&checked=checked";
edit_atten.open("GET",url,true);
edit_atten.send();
}
function attendance_edit()
	{
		view_atten=new XMLHttpRequest(); 
		view_atten.onreadystatechange=function()
		{
		if (view_atten.readyState==4 && view_atten.status==200)
			{
			document.getElementById("body").innerHTML=view_atten.responseText;
			}
		}
		view_atten.open("GET","edit_atten.php",true);
		view_atten.send();
	}
function marks_take()
	{
		view_atten=new XMLHttpRequest(); 
		view_atten.onreadystatechange=function()
		{
		if (view_atten.readyState==4 && view_atten.status==200)
			{
			document.getElementById("body").innerHTML=view_atten.responseText;
			}
		}
		view_atten.open("GET","marks.php",true);
		view_atten.send();
	}
function take_marks(str){
  if(str=="None")
	{
		document.getElementById("valid").innerHTML="<center><h2><blink>Please select class</blink></h2></center>";
		return;
		}
  marks1=new XMLHttpRequest(); 
  marks1.onreadystatechange=function()
  {
  if (marks1.readyState==4 && marks1.status==200)
    {
    document.getElementById("view").innerHTML=marks1.responseText;
    }
  }
marks1.open("GET","marks1.php?cls="+str,true);
marks1.send();
}
function submit_marks(count,ref)
{
	if(document.getElementById('exam').value=='None')
		{
			document.getElementById("valid").innerHTML='<center><h2><blink>Please select exam</blink></h2></center>'
			return;
			}
	str=document.getElementById('exam').value+" ";
	if(ref=='0')
		str=str+"edit ";
	for(i=0;i<count;i++)
		{
			if(document.getElementById(i+'m').value=='')
				{
					document.getElementById("valid").innerHTML='<center><h2><blink>Enter all students marks</blink></h2></center>'
					return;
					}
			str=str+document.getElementById(i+'m').value+" ";
		}
	marks2=new XMLHttpRequest(); 
	marks2.onreadystatechange=function()
  {
  if (marks2.readyState==4 && marks2.status==200)
    {
    document.getElementById("view").innerHTML=marks2.responseText;
    }
  }
marks2.open("GET","marks2.php?str="+str,true);
marks2.send();
}
function marks_view()
	{
		view_atten=new XMLHttpRequest(); 
		view_atten.onreadystatechange=function()
		{
		if (view_atten.readyState==4 && view_atten.status==200)
		{
			document.getElementById("body").innerHTML=view_atten.responseText;
			}
		}
		view_atten.open("GET","view_marks.php",true);
		view_atten.send();
	}
function view_marks()
	{
		if(document.getElementById("class").value=='None')
			{
				document.getElementById('view').innerHTML="<center><h2><blink>Please choose class</blink></h2></center>"
				return;
				}
		if(document.getElementById("exam").value=='None')
			{
			document.getElementById('view').innerHTML="<center><h2><blink>Please choose exam</blink></h2></center>"
			return;
			}
		var str=document.getElementById("class").value+" "+document.getElementById("exam").value;
		view_marks=new XMLHttpRequest(); 
		view_marks.onreadystatechange=function()
		{
		if (view_marks.readyState==4 && view_marks.status==200)
			{
			document.getElementById("view").innerHTML=view_marks.responseText;
			}
		}
		view_marks.open("GET","view_marks1.php?class_exam="+str,true);
		view_marks.send();
	}
function marks_edit()
	{
		edit_marks=new XMLHttpRequest(); 
		edit_marks.onreadystatechange=function()
		{
		if (edit_marks.readyState==4 && edit_marks.status==200)
			{
			document.getElementById("body").innerHTML=edit_marks.responseText;
			}
		}
		edit_marks.open("GET","edit_marks.php",true);
		edit_marks.send();
	}
function view_edit_marks()
	{
		if(document.getElementById("class").value=='None')
			{
				document.getElementById('view').innerHTML="<center><h2><blink>Please choose class</blink></h2></center>"
				return;
				}
		if(document.getElementById("exam").value=='None')
			{
			document.getElementById('view').innerHTML="<center><h2><blink>Please choose exam</blink></h2></center>"
			return;
			}
		var str=document.getElementById("class").value+" "+document.getElementById("exam").value;
		view_marks=new XMLHttpRequest(); 
		view_marks.onreadystatechange=function()
		{
		if (view_marks.readyState==4 && view_marks.status==200)
			{
			document.getElementById("view").innerHTML=view_marks.responseText;
			}
		}
		view_marks.open("GET","edit_marks1.php?class_exam="+str+"&check='1'",true);
		view_marks.send();
	}

//Profile  ##################################
function edit_profile_fields(access_lvl,user){
	if ((access_lvl==1)){
		create_input("stu_name");
		create_input("stu_course");
		create_input("stu_cls");
		create_input("stu_phn");
		create_input("stu_mail");
		create_input("stu_branch");
		create_input("stu_dob");
		add_v=document.getElementById("stu_add").innerHTML;
		add=document.getElementById("stu_add").innerHTML="<textarea id='stu_addn' rows=4 cols=60>"+add_v+"</textarea>";
		nss_v=document.getElementById("stu_nss").innerHTML;
		if (nss_v=='1')
			document.getElementById("stu_nss").innerHTML="<input type='checkbox' id='stu_nssn' checked='checked'>";
		else
			document.getElementById("stu_nss").innerHTML="<input type='checkbox' id='stu_nssn'>";

		document.getElementById('edit').style.visibility="hidden";
		edit=0;
		}
	else if ((access_lvl==3)){
		create_input("fac_name");
		create_input("fac_subject");
		create_input("fac_phn");
		create_input("fac_mail");
		create_input("fac_branch");
		document.getElementById('edit').style.visibility="hidden";
		edit=0;
		}
	else if ((access_lvl==4)){
		create_input("com_name");
		create_input("com_phn");
		create_input("com_mail");
		document.getElementById('edit').style.visibility="hidden";
		edit=0;
		}
	else if ((access_lvl==2)){
		create_input("admin_name");
		create_input("admin_phn");
		create_input("admin_mail");
		document.getElementById('edit').style.visibility="hidden";
		edit=0;
		}
	document.getElementById('save').innerHTML="<input type='button' value='Save' onclick=edit_profile('"+access_lvl+"','"+user+"')>";
	}
function edit_profile(access_lvl,user){
	edit_profile=new XMLHttpRequest();
	edit_profile.onreadystatechange=function(){
		if (edit_profile.readyState==4 && edit_profile.status==200){
			if(edit_profile.responseText=="1"){
				profile_own(user,user,access_lvl);
				}
			else{
				alert("Unable to Save");
				profile_own(user,user,access_lvl);
				}
		}
	}
	if (access_lvl==1){
		nam=document.getElementById('stu_namen').value;
		course=document.getElementById('stu_coursen').value;
		branch=document.getElementById('stu_branchn').value;
		clas=document.getElementById('stu_clsn').value;
		address=document.getElementById('stu_addn').value;
		dob=document.getElementById('stu_dobn').value;
		mail=document.getElementById('stu_mailn').value;
		phn=document.getElementById('stu_phnn').value;
		nss=document.getElementById('stu_nssn').checked;
		url="edit_profile.php?name="+nam+"&course="+course+"&branch="+branch+"&dob="+dob+"&add="+address+"&cls="+clas+"&mail="+mail+"&phn="+phn+"&nss="+nss+"&al="+access_lvl+"&user="+user;
		}
	else if (access_lvl==3){
		nam=document.getElementById('fac_namen').value;
		branch=document.getElementById('fac_branchn').value;
		mail=document.getElementById('fac_mailn').value;
		phn=document.getElementById('fac_phnn').value;
		subject=document.getElementById('fac_subjectn').value;
		url="edit_profile.php?name="+nam+"&branch="+branch+"&mail="+mail+"&phn="+phn+"&al="+access_lvl+"&user="+user+"&subject="+subject;
		}
	else if (access_lvl==4){
		nam=document.getElementById('com_namen').value;
		mail=document.getElementById('com_mailn').value;
		phn=document.getElementById('com_phnn').value;
		url="edit_profile.php?name="+nam+"&mail="+mail+"&phn="+phn+"&al="+access_lvl+"&user="+user;
		}
	else if (access_lvl==2){
		nam=document.getElementById('admin_namen').value;
		mail=document.getElementById('admin_mailn').value;
		phn=document.getElementById('admin_phnn').value;
		url="edit_profile.php?name="+nam+"&mail="+mail+"&phn="+phn+"&al="+access_lvl+"&user="+user;
		}
	edit_profile.open("GET",url,true);
	edit_profile.send();
	}
function create_input(old_id){
	temp=document.createElement("input");
	temp.setAttribute("type","text");
	value=document.getElementById(old_id).innerHTML;
	temp.setAttribute("value",value);
	document.getElementById(old_id).innerHTML="";
	temp.setAttribute("id",old_id+"n");
	document.getElementById(old_id).appendChild(temp);
	}
function profile_own(user,prof_id,access_lvl){
	view_profile=new XMLHttpRequest(); 
	view_profile.onreadystatechange=function()
	{
	if (view_profile.readyState==4 && view_profile.status==200)
		{
		document.getElementById("sidepane").innerHTML="";
		document.getElementById("body").innerHTML=view_profile.responseText;
		}
	}
	view_profile.open("GET","profile.php?user="+user+"&profile_id="+prof_id+"&access_lvl="+access_lvl,true);
	view_profile.send();
	}
function profile_search1(user,access_lvl){
	prof_id=document.getElementById("search_id").value;
	view_profile=new XMLHttpRequest();
	view_profile.onreadystatechange=function()
	{
	if (view_profile.readyState==4 && view_profile.status==200)
		{
		document.getElementById("body").innerHTML=view_profile.responseText;
		}
	}
	url="profile.php?user="+user+"&profile_id="+prof_id+"&access_lvl="+access_lvl;
	view_profile.open("GET",url,true);
	view_profile.send();
	}
function profile_search(user,access_lvl){
	document.getElementById("sidepane").innerHTML="";
	document.getElementById("body").innerHTML="<center><input type='text' id='search_id' placeholder='Enter Id to search'><br><input type='button' id='search' value='Search' onclick=profile_search1('"+user+"','1')></center>"
	}



function show_exam(){
	exam=new XMLHttpRequest(); 
	exam.onreadystatechange=function()
	{
	if (exam.readyState==4 && exam.status==200)
		{
		document.getElementById("sidepane").innerHTML="";
		document.getElementById("body").innerHTML=exam.responseText;
		}
	}
	exam.open("GET","exam.php",true);
	exam.send();
	}

function contact_us(){
	contact_us1=new XMLHttpRequest(); 
	contact_us1.onreadystatechange=function()
	{
	if (contact_us1.readyState==4 && contact_us1.status==200)
		{
		document.getElementById("body").innerHTML=contact_us1.responseText;
		}
	}
	contact_us1.open("GET","contact_us.php",true);
	contact_us1.send();
	}
function contact_us_send(){
	to=document.getElementById("to").value;
	sub=document.getElementById("sub").value;
	msg=document.getElementById("msg").value;
	if((to=="")||(sub=="")|| (msg=="")){document.getElementById("text").innerHTML="<font color=red> All Fields Are Required. Cannot be Empty</font>";return;}
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("body").innerHTML=xmlhttp.responseText;
	    }
	  }
		dat=curr_time();
		url="contact_us_send.php?to="+to+"&sub="+sub+"&msg="+msg+"&dat="+dat;

	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}		


//starts Exam page for student
function stu_exam(){
	exam=new XMLHttpRequest(); 
	exam.onreadystatechange=function()
	{
	if (exam.readyState==4 && exam.status==200)
		{
		document.getElementById("sidepane").innerHTML=exam.responseText;
		document.getElementById("body").innerHTML="<center>Welcome to EXAM page";
		}
	}
	exam.open("GET","stu_exam_options.php",true);
	exam.send();
	}
function write_exam(){
		document.getElementById("body").innerHTML="<center><blink><h1>There is no exam for you<h1></blink></center>";
		}

	var message="Sorry, right-click has been disabled"; 

	function clickIE() {if 
	(document.all) {(message);return false;}} 
	function clickNS(e) {if 

	(document.layers||(document.getElementById&&!document.all)) { 
	if 
	(e.which==2||e.which==3) {(message);return false;}}} 
	if (document.layers) 

	{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;} 

	else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;} 

	document.oncontextmenu=new Function("return false") 

	function mahi(){document.getElementById("vid").style.visibility="hidden";}
	function vinay(){
	var x;
	var r=confirm("Are You Sure Want To Submit!");
		if (r==true){
			if (v==0){document.getElementById("vin").submit();
				stopTimer();}
		}
	}

	var c1, ID = null;
	var t,c2=1,c;
	var c5,c6;
	function startTimer() {
	    if (ID != null) {
		stopTimer();
	    }
	    c1 = 3600;
	    ID = window.setInterval(run, 1000);
	}

	function stopTimer() {
	    window.clearInterval(ID);
	    ID = null;
	    document.getElementById("time").innerHTML="";
	}

	function run() {
	    if (c1<=-1){
		stopTimer();
		document.getElementById("vin").submit();
		}
	    else{
	    c5 =Math.floor(c1/60);
	    c6 = c1%60; 
	    document.getElementById("time").innerHTML = c5+":"+c6;
	    c1--;
		}
	}
	function clearText(field)
	{
	    if (field.defaultValue == field.value) field.value = '';
	    else if (field.value == '') field.value = field.defaultValue;
	}

	function varun(){
	mahi();
	startTimer();
	}
//Exam page for students end here
//Exam page for faculty start here
function fac_exam(){
	exam=new XMLHttpRequest(); 
	exam.onreadystatechange=function()
	{
	if (exam.readyState==4 && exam.status==200)
		{
		document.getElementById("sidepane").innerHTML=exam.responseText;
		document.getElementById("body").innerHTML="<center><h2>Instructions </h2></center><br /><li>Send request to ADMIN for EXAM_ID before 1 day(atleast).</li><br /><li>Upload exam files with EXAM_ID.zip with Key.</li><br /><li>After getting exam IP send IP to students.</li><br /> ";
		}
	}
	exam.open("GET","fac_exam_options.php",true);
	exam.send();
	}
function view_recent()
	{
		// give link to recent exams
		}
function view_status1(){
document.getElementById("body").innerHTML="<center><h2>Enter Exam Id:</h2><input type='text' name='exam_id' id='exam_id' placeholder='Exam ID'><div id='text'></div><br><input type='button' onclick=view_status('0') value='View Statistics'></center>";
}
function view_status(ref)
	{
	if (ref=="0"){
		eid=document.getElementById("exam_id").value;
		if (eid.length<1){
			document.getElementById('text').innerHTML='Enter Correct Details';return;}
		url="view_statistics.php?ref="+ref+"&eid="+eid;
		}
	else 	url="view_statistics.php?ref="+ref+"&eid=all";
	view_status2=new XMLHttpRequest(); 
	view_status2.onreadystatechange=function()
	{
	if (view_status2.readyState==4 && view_status2.status==200)
		{
		document.getElementById("body").innerHTML=view_status2.responseText;
		}
	}
	view_status2.open("GET",url,true);
	view_status2.send();
	}

//#########lOGIn#########
function show_login(){
	show_logi=new XMLHttpRequest(); 
	show_logi.onreadystatechange=function()
	{
	if (show_logi.readyState==4 && show_logi.status==200)
		{
		document.getElementById("body").innerHTML=show_logi.responseText;
		}
	}
	show_logi.open("GET","show_login.php",true);
	show_logi.send();
}
function login(use,pwd,notice){
	user=document.getElementById(use).value;
	password=document.getElementById(pwd).value;
	login_check=new XMLHttpRequest(); 
	login_check.onreadystatechange=function()
	{
	if (login_check.readyState==4 && login_check.status==200)
		{
		if(login_check.responseText==1){
			window.location.href="";
			}
		else{
			document.getElementById(notice).innerHTML="<blink><font color='red'>Invalid Login!</font></blink>";
			}
		}
	}
	login_check.open("GET","login_check.php?user="+user+"&pass="+password,true);
	login_check.send();
}
function logout(){
	window.location.href="";
	}
function show_reg(){
document.getElementById("body").innerHTML="<center><div class='button'><a href='#' onclick=regestration(1)><div id='button'>Student</div></a><a href='#' onclick=regestration(3)><div id='button'>Faculty</div></a><a href='#' onclick=regestration(4)><div id='button'>Committee</div></a></div></center>";
}
function regestration(ref){
	show_re=new XMLHttpRequest(); 
	show_re.onreadystatechange=function()
	{
	if (show_re.readyState==4 && show_re.status==200)
		{
		document.getElementById("body").innerHTML=show_re.responseText;
		}
	}
	if (ref==1) url="student_reg.php";
	else if (ref==3) url="faculty_reg.php";
	else if (ref==4) url="comity_reg.php";
	show_re.open("GET",url,true);
	show_re.send();
	}
function send_reg(ref){
	send_re=new XMLHttpRequest(); 
	send_re.onreadystatechange=function()
	{
	if (send_re.readyState==4 && send_re.status==200)
		{
		if (send_re.responseText==1)
			document.getElementById("body").innerHTML="<center><h1>Sucessfull Regestered<br> You Can Now Login Into UIS</h1>";
		}
		else{
			document.getElementById("body").innerHTML="<center><h1>Unable To Register<br>Oops Something went wrong</h1>";
			}
	}

	if (ref==1){
		if(validate_uname("stu_id","id_error")&& validate_uname("stu_name","user_error")&&validate_pass("stu_pass","pass_error1")&&check("stu_pass","stu_passc","pass_error")&& validate_email("stu_mail","mail_error")&&validate_phnum("stu_phn","phnum_error")&& validate_dob("stu_db_day","db_error")){
			stu_id=document.getElementById("stu_id").value;
			stu_name=document.getElementById("stu_name").value;
			stu_pass=document.getElementById("stu_pass").value;
			stu_mail=document.getElementById("stu_mail").value;
			stu_dob=document.getElementById("stu_db_year").value+"-"+document.getElementById("stu_db_mon").value+"-"+document.getElementById("stu_db_day").value;
			stu_cls=document.getElementById("stu_cls").value;
			stu_add=document.getElementById("stu_cls").value;
			stu_phn=document.getElementById("stu_phn").value;
			stu_branch=document.getElementById("stu_branch").value;
			stu_course=document.getElementById("stu_course").value;
			nss=document.getElementById("nss").checked;
			url="send_reg.php?id="+stu_id+"&name="+stu_name+"&pass="+stu_pass+"&cls="+stu_cls+"&branch="+stu_branch+"&phn="+stu_phn+"&course="+stu_course+"&dob="+stu_dob+"&mail="+stu_mail+"&nss="+nss+"&add="+stu_add+"&ref="+ref;
			send_re.open("GET",url,true);
			send_re.send();
			}
		}
	else if(ref==3){
		if(validate_uname("fac_id","id_error") && validate_uname("fac_name","user_error")&& validate_pass("fac_pwd","pass_error1")&&check("fac_pwd","fac_pwdc","pass_error")&&validate_email("fac_mail","mail_error")&&validate_phnum("fac_phn","phnum_error")){
			fac_id=document.getElementById("fac_id").value;
			fac_name=document.getElementById("fac_name").value;
			fac_pass=document.getElementById("fac_pwd").value;
			fac_mail=document.getElementById("fac_mail").value;
			fac_phn=document.getElementById("fac_phn").value;
			fac_branch=document.getElementById("fac_branch").value;
			fac_subject=document.getElementById("fac_subject").value;
			url="send_reg.php?id="+fac_id+"&name="+fac_name+"&pass="+fac_pass+"&branch="+fac_branch+"&phn="+fac_phn+"&mail="+fac_mail+"&subject="+fac_subject+"&ref="+ref;
			send_re.open("GET",url,true);
			send_re.send();
			}
		}
	else if(ref==4){
		if(validate_uname("com_id","id_error") && validate_uname("com_name","user_error")&& validate_pass("com_pwd","pass_error1")&&check("com_pwd","com_pwdc","pass_error")&&validate_email("com_mail","mail_error")&&validate_phnum("com_phn","phnum_error")){
			com_id=document.getElementById("com_id").value;
			com_name=document.getElementById("com_name").value;
			com_pass=document.getElementById("com_pwd").value;
			com_mail=document.getElementById("com_mail").value;
			com_phn=document.getElementById("com_phn").value;
			url="send_reg.php?id="+com_id+"&name="+com_name+"&pass="+com_pass+"&phn="+com_phn+"&mail="+com_mail+"&ref="+ref;
			send_re.open("GET",url,true);
			send_re.send();
			}
		}
}
function validate_dob(day,error){
	if(document.getElementById(day).value=="null"){document.getElementById(error).innerHTML="<font color='red'>Select Day</font>";return false;}
	else{document.getElementById(error).innerHTML="<font color='green'>OK</font>";
        return true;}
}
function validate_phnum(id,error_dis)
{
	var che_name = /^[0-9]*$/;
	name=document.getElementById(id).value;
	if(name.match(che_name)==null){
		document.getElementById(error_dis).innerHTML="<font color='red'>only numbers</font>";
		return false;
	}
	else if(name.length<9 || name.length>12)
	{
		document.getElementById(error_dis).innerHTML="<font color='red'>9 to 12 digits only</font>";
		return false;
	}
	else
        {
        document.getElementById(error_dis).innerHTML="<font color='green'>OK</font>";
        return true;
	}
}

function validate_pass(id,error_dis)
{

	name=document.getElementById(id).value;
	if(name.length<5 || name.length>20)
        {
        document.getElementById(error_dis).innerHTML="<font color='red'>Size 5-10 characters</font>";
        return false;
        }
	else if(name.match(' ')!=null)
        {
        document.getElementById(error_dis).innerHTML="<font color='red'>empty space is not allowed</font>";
        return false;
        }
	else
        {
        document.getElementById(error_dis).innerHTML="<font color='green'>OK</font>";
        return true;}
}
function check(id,id_conf,error_dis)
{

	name=document.getElementById(id).value;
	if(document.getElementById(id).value!=document.getElementById(id_conf).value){
		document.getElementById(error_dis).innerHTML="<font color='red'>password does not match</font>";
	return false;}
	else if(name.length<5 || name.length>20)
        {
        document.getElementById(error_dis).innerHTML="<font color='red'>Size 5-10 characters</font>";
        return false;
        }
	else if(name.match(' ')!=null)
        {
        document.getElementById(error_dis).innerHTML="<font color='red'>empty space is not allowed</font>";
        return false;
        }
        
	
	else
        {
        document.getElementById(error_dis).innerHTML="<font color='green'>OK</font>";
        return true;}
}
	
function validate_uname(id,error_dis)
{

	var name = document.getElementById(id).value;
	if ((id=="stu_name")||(id=="fac_name")||(id=="com_name")) var che_name = /^[a-zA-Z][a-zA-Z0-9\_\-\.\" "]*$/ ;
        else var che_name = /^[a-zA-Z][a-zA-Z0-9\_\-\.]*$/ ;
        if(name.match(che_name)==null)
        {
        document.getElementById(error_dis).innerHTML="<font color='red'>Alphabet Followed by alphanumeric with /-/_/.</font>";
        return false;
        }
        else if(name.length<4 || name.length>20)
        {
        document.getElementById(error_dis).innerHTML="<font color='red'>Size 5-10 characters</font>";
        return false;
        }
        else
        {
        document.getElementById(error_dis).innerHTML="<font color='green'>OK</font>";
        return true;
        }

}
function validate_email(id,error_dis)
{

	var name = document.getElementById(id).value;
	var che_name = /^([a-zA-Z][a-zA-Z0-9\_\-\.]*\@[a-zA-Z0-9\-]*\.[a-zA-Z]{2,4})?$/i ;
	if(name=="")
	{
		document.getElementById(error_dis).innerHTML="<font color='red'>Please Enter Email</font>";
		return false;
	}
	else if(name.match(che_name)==null)
	{
		document.getElementById(error_dis).innerHTML="<font color='red'>Enter Valid Email</font>";
		return false;
	}
	else
	{
		document.getElementById(error_dis).innerHTML="<font color='green'>OK</font>";
		return true;
	}
}
function db_date(id_year,id_mon)
{
	str="";
	i=1;
	id_day="stu_db_day";
	id_val=document.getElementById(id_day).value;
	year=document.getElementById(id_year).value;
	if(year%100==0 && document.getElementById(id_mon).value==2){						
		if(year%400==0){
			for(i;i<30;i++) {
				if(i<10) str=str+'<option value=0'+i+'>'+i+'</option>';
				else str=str+'<option value='+i+'>'+i+'</option>';
			}
		}
	}
	else if(year%4==0 && document.getElementById(id_mon).value==2){
		for(i;i<30;i++) {
			if(i<10) str=str+'<option value=0'+i+'>'+i+'</option>';
			else str=str+'<option value='+i+'>'+i+'</option>';
		}
	}
	else if(document.getElementById(id_mon).value==2)
		for(i;i<29;i++) {
			if(i<10) str=str+'<option value=0'+i+'>'+i+'</option>';
			else str=str+'<option value='+i+'>'+i+'</option>';
		}
	else if((document.getElementById(id_mon).value==4)||(document.getElementById(id_mon).value==6)||(document.getElementById(id_mon).value==9)||(document.getElementById(id_mon).value==11))
		for(i;i<31;i++){
			if(i<10) str=str+'<option value=0'+i+'>'+i+'</option>';
			else str=str+'<option value='+i+'>'+i+'</option>';
		}
	else 
		for(i;i<32;i++) {
			if(i<10) str=str+'<option value=0'+i+'>'+i+'</option>';
			else str=str+'<option value='+i+'>'+i+'</option>';
		}
	document.getElementById("stu_db_day").innerHTML=str;
	validate_dob("stu_db_day","db_error")
	
}
function create_subjects()
{
	document.getElementById('fac_subject').innerHTML="";
	if(document.getElementById('fac_branch').value=='CSE')
		subject("FLAT","ISE","PSP","SCLD");
	else if(document.getElementById('fac_branch').value=='ECE')
		subject("SS","AEC","PSP","DOA");
	else if(document.getElementById('fac_branch').value=='CE')
		subject("DOA","IE","WRE","SA");
	else if(document.getElementById('fac_branch').value=='MEC')
		subject("DOM","IE","PDA","FM");
	else if(document.getElementById('fac_branch').value=='MME')
		subject("MM","NFEM","MT","IE");
	else if(document.getElementById('fac_branch').value=='CHEM')
		subject("CT","MAT4","IE","HT");
	

}
function subject(s1,s2,s3,s4)
{
	sub1=document.createElement("option");
	sub1.setAttribute('id',s1);
	document.getElementById('fac_subject').appendChild(sub1);
	document.getElementById(s1).innerHTML=s1;
	sub2=document.createElement("option");
	sub2.setAttribute('id',s2);
	document.getElementById('fac_subject').appendChild(sub2);
	document.getElementById(s2).innerHTML=s2;
	sub3=document.createElement("option");
	sub3.setAttribute('id',s3);
	document.getElementById('fac_subject').appendChild(sub3);
	document.getElementById(s3).innerHTML=s3;
	sub4=document.createElement("option");
	sub4.setAttribute('id',s4);
	document.getElementById('fac_subject').appendChild(sub4);
	document.getElementById(s4).innerHTML=s4;
}



function show_forgot_pwd(){
	show_forgot_pw=new XMLHttpRequest(); 
	show_forgot_pw.onreadystatechange=function()
	{
	if (show_forgot_pw.readyState==4 && show_forgot_pw.status==200)
		{
		document.getElementById("body").innerHTML=show_forgot_pw.responseText;
		}
	}
	show_forgot_pw.open("GET","show_forgot_pwd.php",true);
	show_forgot_pw.send();
}
function show_about_uis(){
	show_about_ui=new XMLHttpRequest(); 
	show_about_ui.onreadystatechange=function()
	{
	if (show_about_ui.readyState==4 && show_about_ui.status==200)
		{
		document.getElementById("body").innerHTML=show_about_ui.responseText;
		}
	}
	show_about_ui.open("GET","about_uis.php",true);
	show_about_ui.send();
}

function update_pwd(){
	uid=document.getElementById('userid').value;
	dob=document.getElementById('dob').value;
	npass=document.getElementById('npass').value;
	cnpass=document.getElementById('cnpass').value;
	if(uid=="")	
		document.getElementById("emsg").innerHTML='<blink><b>User ID is Missing</b></blink>';
	else if(dob=="")
		document.getElementById("emsg").innerHTML='<blink><b>Enter your Date of Birth</b></blink>';
	else if(npass=="")
		document.getElementById("emsg").innerHTML='<blink><b>Enter your New password</b></blink>';
	else if(cnpass=="")
		document.getElementById("emsg").innerHTML='<blink><b>Conform your password</b></blink>';
	else if(npass!=cnpass)
		document.getElementById("emsg").innerHTML='<blink><b>Password not match</b></blink>';
	else
	{	
		update_pw=new XMLHttpRequest(); 
		update_pw.onreadystatechange=function()
		{
		if (update_pw.readyState==4 && update_pw.status==200)
			{
			if(update_pw.responseText==1)
				document.getElementById("body").innerHTML="<center><h1>Successfull Updated Password<br> You Can Now Login Into UIS With new Password</h1>";
			else document.getElementById("body").innerHTML="<center><font color=red>Wrong Details.Unable to Change Password</font></center>";
			}
		}
		url="pwd_update.php?uid="+uid+"&npass="+npass+"&dob="+dob;
		update_pw.open("GET",url,true);
		update_pw.send();
		}
	}
