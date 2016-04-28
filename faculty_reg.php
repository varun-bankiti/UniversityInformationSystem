<?php
include("dbconnect.php");
?>
<link rel="stylesheet" href="css/uis.css" type="text/css">
<script type="text/javascript" src="js/uis.js"></script>
<center>
<table>
<tbody><tr><td>ID: </td><td><input required name="idn" type="text" id="fac_id" onblur=validate_uname(this.id,"id_error")></td><td id="id_error"></td></tr>
<tr><td>Name : </td><td><input required name="user" type="text" id="fac_name"  onblur=validate_uname(this.id,"user_error")></td><td id="user_error"></td></tr>
<tr><td>Password  :</td><td><input required name="pswd" type="password" id="fac_pwd" onblur=validate_pass(this.id,"pass_error1")></td><td id="pass_error1"></td></tr>
<tr><td>Confirm Password  :</td><td><input required name="pswd" type="password" id="fac_pwdc" onblur=check("fac_pwd",this.id,"pass_error")></td><td id="pass_error"></td></tr>


<tr><td>Branch    : </td><td>
<select name="brnch" id="fac_branch" onchange="create_subjects()">
    <option value="CSE">CSE</option>
    <option value="ECE">ECE</option>
    <option value="CE">CE</option>
    <option value="MEC">MEC</option>
    <option value="MME">MME</option>
    <option value="CHEM">CHEM</option>
</select>

</td></tr>
<tr><td>Subject:</td><td><select name="fac_subject" id="fac_subject">
	<option value="FLAT">FLAT</option>
	<option value="DS">DS</option>
	<option value="PSP">PSP</option>
	<option value="DOA">DOA</option>
	</select>
</td></tr>
<tr><td>Mail id :</td><td><input required name="mail" type="text" id="fac_mail" onblur=validate_email(this.id,"mail_error")></td><td>(ex : mail@gmail.com)<div id="mail_error"></div></td></tr>
<tr><td>Phone No :</td><td><input required name="phone" type="text" id="fac_phn" onblur=validate_phnum(this.id,"phnum_error")> </td><td id="phnum_error"></td></tr>
<tr><td></td><td><input type="button" onclick=send_reg(3)  value="submit" > </td></tr>
</tbody></table>
</form>
