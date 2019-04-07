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
		<h1> Search for a program </h1>
		<form action= "programedit1.php" method = "post">
			<table>
				<tr><td>Program name :</td><td><input type="Text" name="search"></input> </td></tr>
			
			<tr><td><input type = "submit" name = "submit" Value = "submit"/> <input type = "reset" name = "cancel" Value = "reset"/><td><input type="button" value="cancel" id=button1 name=button1 onclick="go_home()"></td>    </tr>
        	</table>
		</form>
	</body>
</html>