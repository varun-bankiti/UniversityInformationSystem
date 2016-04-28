<link rel="stylesheet" type="text/css" href="css/uis.css">
<script type="text/javascript" src="js/uis.js"></script>
<title>UIS</title>
<div class="top">
<div id="logout">
<font size=2>Username:<input type="text" placeholder="Virtuosers" id="usernamet" size=13>
&nbsp&nbsp&nbspPassword:<input type="password" placeholder="*****" id="passwordt"  size=13>
&nbsp&nbsp&nbsp<input type="Button" onclick=login("usernamet","passwordt","noticet") value="Login!">
</div>

<span id='noticet'></span>
</div>
<BR>
<div class="outer">
	<div class="main">
		<div id="images">
			<div class="image">
				<div id="imge1"></div>
			</div>
			<div class="logo">
				<div id="imge"></div>
			</div>	
		</div>
		<div id="container">
			<div class="sidepane">
				<div id="sidepane">
					<div class="button">
					<center><a href="#" onclick="show_login()"><div id="button">Login</div></a></center><br>
					<center><a href="#" onclick="show_reg()"><div id="button">Register</div></a></center><br>
					<center><a href="#" onclick="show_forgot_pwd()"><div id="button">Forgot Password</div></a></center><br>
					<center><a href="#" onclick="show_about_uis()"><div id="button">About UIS</div></a></center><br>
					</div>
				</div>
			</div>
			<div class="body">
				<div id="body"><center>
				<marquee height=350 width=700 ><img src="images/3.jpg" height=350>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="images/1.jpg" height=350>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="images/2.png" height=350></img>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</marquee></center>
				</div>
			</div>
		</div>
		<div class="footer">
			<center>Copyright &copy VIRTUOSERS All Rights Reserved</center>
		</div>
	</div>
</div>
</BODY>

</HTML>
