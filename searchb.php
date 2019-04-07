<!DOCTYPE html>
<?php
   include('session.php'); 
 ?>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script language=Javascript>
            function go_home(){
                window.location.replace("welcome.php");
            }
        </script>
    </head>
	<body class = "centered-wrapper" bgcolor= "#FFD700">
		<h1> Search Page </h1>
		<form action= "searchb1.php" method = "post">
			<table>
				<tr><td>Program Name :</td><td><input type="Text" name="search"></input> </td></tr>
				<tr><td>Report Type :</td><td><input type="Text" name="search1"/>  </td></tr>
				<tr><td>Severity :</td><td><input type="Text" name="search2"/> </td></tr>
				<tr><td>Bug Status :</td><td><input type="Text" name="search5" /> </td></tr>
				<tr><td>Bug Reported By :</td><td><input type="Text" name="search8"/> </td></tr>
				<tr><td>View all Bugs :</td><td><input type="Text" name="search9"/> </td></tr>
				</table>
			<input type = "submit" name = "submit" Value = "submit"/> <input type = "reset" name = "cancel" Value = "reset"/><td><input type="button" value="cancel" id=button1 name=button1 onclick="go_home()"></td>    
        
		</form>
	</body>
</html>