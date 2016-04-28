<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
<div class="login">
	<br><br>
	<center><table>
		<tr>
			<td colspan=3><center><div id="notice">&nbsp</div></center></td>
		</tr>
		<tr></tr>
		<tr>
			<td height=40>Username</td><td>:</td><td><input type="text" name="username" id='username' placeholder="Username"></td>
		</tr>
		<tr>
			<td height=40>Password</td><td>:</td><td><input type="password" name="pwd" id='password' placeholder="Password"></td>
		</tr>
		<tr>
			<td colspan=3 align="center" height=40><input type="button" onclick=login('username','password','notice') value="Login!"></td>
		</tr>
	</table></center>
</div>
