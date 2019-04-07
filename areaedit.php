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
		<form action= "areaedit1.php" method = "post">
			<table>
				<tr><td>Program Name :</td><td><input type="Text" name="search"></input> </td></tr>
				</table>
			<input type = "submit" name = "submit" Value = "submit"/> <input type = "reset" name = "cancel" Value = "reset"/><td><input type="button" value="cancel" id=button1 name=button1 onclick="go_home()"></td>    
        
		</form>
	</body>
</html>