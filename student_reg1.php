<link rel="stylesheet" href="css/uis.css" type="text/css">
<script type="text/javascript" src="js/uis.js"></script>
<table >
<tbody><tr><td>ID Number : </td><td><input required name="idn" id="stu_id" type="text" onblur=validate_uname("stu_id","id_error")></td><td id="id_error"></td></tr>
<tr><td>Name : </td><td><input required name="user" id="stu_name" type="text" onblur=validate_uname(this.id,"user_error")></td><td id="user_error"></td></tr>
<tr><td>Password  :</td><td><input required name="pswd" id="stu_pass" type="password"  onblur=validate_pass(this.id,"pass_error1")></td><td id="pass_error1"></td></tr>
<tr><td>Confirm Password  :</td><td><input required name="pswd" id="stu_passc" type="password" onblur=check("stu_pass",this.id,"pass_error")></td><td id="pass_error"></td></tr>
<tr><td>Course:</td><td><select name="cours" id="stu_course">
	<option value="P1">P-I</option>
	<option value="P2">P-II</option>
    <option value="E1">E-I</option>
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
<tr><td>Class     :</td><td> <input required type="text" name="cls" id="stu_cls"></td><td>( ex : sigma7)</td></tr>
<tr><td>Date of Birth :</td><td><input required name="db" type="text" id="stu_dob" </td><td>(ex : dd/mm/yyyy )</td></tr>
<tr><td>Address :</td><td><textarea required name="add" id="stu_add"></textarea></td></tr>
<tr><td>Mail id :</td><td> <input required name="mail" type="text" id="stu_mail" onblur=validate_email(this.id,"mail_error")></td><td>(ex : mail@gmail.com)</td><td id="mail_error"></td></tr>
<tr><td>Phone No :</td><td><input required name="phone" type="text" id="stu_phn" onblur=validate_phnum(this.id,"phnum_error")> </td><td id="phnum_error"></td></tr>
<tr><td>NSS :</td><td><input name="nss_" type="checkbox" id="nss"></td></tr>
<tr><td></td><td><input type="button" onclick=send_reg(1) value="Submit" ></td></tr>
</tbody></table>;
