<link rel="stylesheet" href="css/uis.css" type="text/css">
<script type="text/javascript" src="js/uis.js"></script>
<center>
<table>
<tbody><tr><td>Committee ID : </td><td><input required name="idn" type="text" id="com_id" onblur=validate_uname("com_id","id_error")></td><td id="id_error"></td></tr>
<tr><td>Name : </td><td><input required name="user" type="text" id="com_name"  onblur=validate_uname("com_name","user_error")></td><td id="user_error"></td></tr>
<tr><td>Password  :</td><td><input required name="pswd" type="password" id="com_pwd"  onblur=validate_pass("com_pwd","pass_error1")></td><td id="pass_error1"></td></tr>
<tr><td>Confirm Password  :</td><td><input required name="pswd" type="password" id="com_pwdc" onblur=check("com_pwd","com_pwdc","pass_error")></td><td id="pass_error"></td></tr>
<tr><td>Mail id :</td><td><input required name="mail" type="text" id="com_mail" onblur=validate_email("com_mail","mail_error")></td><td>(ex : mail@gmail.com)<div id="mail_error"></div></td></tr>
<tr><td>Phone No :</td><td><input required name="phone" type="text" id="com_phn"  onblur=validate_phnum("com_phn","phnum_error")></td><td id="phnum_error"></td></tr>
<tr><td></td><td><input type="button" onclick=send_reg(4) value="Submit" ></td></tr>
</tbody></table>

