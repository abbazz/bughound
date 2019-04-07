<?php
   include('session.php'); 
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
	<body class = "centered-wrapper" bgcolor= "#FFD700">
		<h1> Search Page </h1>
		<form action= "search1.php" method = "post" onsubmit = "return validate (this)">
			<table>
				<tr><td>Program Name :</td><td><input type="Text" name="search" required </td></tr>
				<tr><td>Report Type :</td><td><input type="Text" name="search1" required </td></tr>
				<tr><td>Severity :</td><td><input type="Text" name="search2" required </td></tr>
				<tr><td>Functional_area :</td><td><input type="Text" name="search3" required </td></tr>
				<tr><td>Bug Assigned To :</td><td><input type="Text" name="search4" required </td></tr>
				<tr><td>Bug Status :</td><td><input type="Text" name="search5" required </td></tr>
				<tr><td>Bug Priority:</td><td><input type="Text" name="search6" required </td></tr>
				<tr><td>Resolution :</td><td><input type="Text" name="search7" required </td></tr>
				<tr><td>Bug Reported By :</td><td><input type="Text" name="search8" required </td></tr>
				<tr><td>Bug Reported Date :</td><td><input type="Text" name="search9" required </td></tr>
				<tr><td>Bug Resolved By :</td><td><input type="Text" name="search10" required </td></tr>
			</table>
			<input type = "submit" name = "submit" Value = "submit"/> <input type = "reset" name = "cancel" Value = "reset"/><td><input type="button" value="cancel" id=button1 name=button1 onclick="go_home()"></td>    
        <script language=Javascript>
            function go_home(){
                window.location.replace("welcome.php");
            }
        </script>
		</form>
	</body>
</html>