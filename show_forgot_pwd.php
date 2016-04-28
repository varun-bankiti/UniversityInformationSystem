<link href="reg.css" rel="stylesheet" type="text/css" />
<link href="default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="script.js"></script>
<body>
<center><h1>Change Password</h1>
<table>
<span id='emsg' style="color:red;"></span>
<tr><td>USER ID</td><td>:</td><td><input type="text" name="user" id="userid" size="25" value="" placeholder="UserID"></td></tr>

<tr><td>Date of Birth</td><td>:</td><td><input type="text" name="dob" id="dob" size="25" value="" placeholder="Date of Birth">(YYYY-MM-DD)</td></tr>
<td>New Password</td><td>:</td><td><input type="password" name="npass" id="npass" size="25" value="" placeholder="New Password"></td></tr>
<td>Confirm Password</td><td>:</td><td><input type="password" name="cnpass" id="cnpass" size="25" value="" placeholder="Confirm New Password"></td></tr>
<tr><td colspan=3 align="center">
<input type=submit value="Update"  onclick="update_pwd()" class="submit"></td></tr></table>
</center>
</div>
