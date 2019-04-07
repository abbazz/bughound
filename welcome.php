<?php
   include('session.php'); 
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>Bughound</title>
    </head>

	<body class = "centered-wrapper" bgcolor= "#FFD700">
		<h1 class="centered-content"> Welcome to Bughound </h1>
		<br>
		<br>
		<form action= "report.php" action="post">
		<input type="submit" value="Report A Bug"></input>
		</form>
		<br>
		<form action = "searchb.php" method = "post">
		<input type = "submit" name = "submit" Value = "Search For what you want"/>
		</form>
		<br>
		<form action = "employee_registration.php" method = "post">
		<input type = "submit" name = "submit" Value = "Add an Employee"/>
		</form>
		<br>
		<form action = "area.php" method = "post">
		<input type = "submit" name = "submit" Value = "Add an area"/>
		</form>
		<br>
		<form action = "add_program.php" method = "post">
		<input type = "submit" name = "submit" Value = "Add a program"/>
		</form>
		<br>
		<form action= "exporttables.php" action="post">
		<input type="submit" value="Export Tables"></input>
		</form>
		<br>
		<form action= "areaedit.php" action="post">
		<input type="submit" value="Edit Area"></input>
		</form>
		<br>
		<form action= "empedit.php" action="post">
		<input type="submit" value="Edit An Employee"></input>
		</form>
		<br>
		<form action= "logout.php" action="post">
		<input type="submit" value="Logout"></input>
		</form>
		
		
		
		
	</body>
</html>