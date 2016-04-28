<html>
<head>
	<title>View Marks
		</title>
	<link rel="stylesheet" type="text/css" href="css/uis.css">
	<script type="text/javascript" src="js/uis.js"></script>
	</head>
<body>
<table border="0" align="center" width="80%" height="100%">
<tr height="100%"><td width="20%" valign="top">
<select id="class" >
<option value="None">Select a class:</option>
<option value="Sigma6">Sigma-6</option></option>
<option value="Sigma7">Sigma-7</option>
<option value="Sigma9">Sigma-9</option>
<option value="Sigma10">Sigma-10</option>
</select>
Exam : <select id="exam" >
	<option value="None">Select Exam</option>
	<option value="CAT1">CAT1</option>
	<option value="CAT2">CAT2</option>
	<option value="CAT3">CAT3</option>
<input type="button" value="View Marks" onclick="view_marks()">
</form>
<br />
<div id="view"></div>
</td>
</body>
</html> 
