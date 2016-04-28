<script type="text/javascript" src="js/uis.js"></script>
<center>
<table >
<tbody><tr><td>ID Number : </td><td><input required name="idn" id="stu_id" type="text" onblur=validate_uname("stu_id","id_error")></td><td id="id_error"></td></tr>
<tr><td>Name : </td><td><input required name="user" id="stu_name" type="text" onblur=validate_uname(this.id,"user_error")></td><td id="user_error"></td></tr>
<tr><td>Password  :</td><td><input required name="pswd" id="stu_pass" type="password"  onblur=validate_pass(this.id,"pass_error1")></td><td id="pass_error1"></td></tr>
<tr><td>Confirm Password  :</td><td><input required name="pswd" id="stu_passc" type="password" onblur=check("stu_pass",this.id,"pass_error")></td><td id="pass_error"></td></tr>
<tr><td>Course:</td><td><select name="cours" id="stu_course">
    <option value="E2">E-II</option>
    <option value="E3">E-III</option>
    <option value="E4">E-IV</option>
</select></td></tr>


<tr><td>Branch    : </td><td>

<select required name="brnch" id="stu_branch" onchange=create_class()>
    <option value="CSE">CSE</option>
    <option value="ECE">ECE</option>
    <option value="CE">CE</option>
    <option value="ME">ME</option>
    <option value="MME">MME</option>
    <option value="CHEM">CHEM</option>
</select>

</td></tr>
<tr><td>Class     :</td><td> <input required type="text" name="clas" id="stu_cls"></td><td>( ex : sigma7)</td></tr>
<tr><td>Date of Birth :</td><td>
<select name="db_year"  id="stu_db_year" onchange=db_date(this.id,"stu_db_mon")><option value="null"></option><?php $i=1990; for($i;$i<2000;$i++)print "<option value=".$i.">".$i."</option>" ?></select>
<select name="db_mon"  id="stu_db_mon" onchange=db_date("stu_db_year",this.id)></option><?php $i=1; for($i;$i<13;$i++) if($i<10)  print "<option value=0".$i.">".$i."</option>";
else print "<option value=".$i.">".$i."</option>";?></select>
<select name="db_day"  id="stu_db_day"><option value="null"></option></select>
</td><td id="db_error"></td></tr>
<tr><td>Address :</td><td><textarea required name="add" id="stu_add"></textarea></td></tr>
<tr><td>Mail id :</td><td> <input required name="mail" type="text" id="stu_mail" onblur=validate_email(this.id,"mail_error")></td><td>(ex : mail@gmail.com)<div id="mail_error"></div></td></tr>
<tr><td>Phone No :</td><td><input required name="phone" type="text" id="stu_phn" onblur=validate_phnum(this.id,"phnum_error")> </td><td id="phnum_error"></td></tr>
<tr><td>NSS :</td><td><input name="nss_" type="checkbox" id="nss"></td></tr>
<tr><td></td><td><input type="button" value="Submit" onclick=send_reg(1)></td></tr>
</tbody></table>;
