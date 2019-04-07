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
        <h2>
            <?php
                $name = $_POST['program_name'];
                $username = $_POST['area_name'];
				$password = $_POST['version'];
				$userlevel = $_POST['prog_release'];
				$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
				$query = "INSERT INTO areas (program_name,area_name,version,prog_release) VALUES ('$name','$username','$password','$userlevel');";
				mysqli_query($con, $query);
				echo "Data has been successfully inserted in the database!";
				mysqli_close($con);
            ?>
            <p>
            <input type="button" value="Return" id=button1 name=button1 onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.replace("area.php");
            }
        </script>
            
    </body>
</html>
