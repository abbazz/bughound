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
                $name = $_POST['name'];
                $username = $_POST['user_name'];
				$password = $_POST['password'];
				$userlevel = $_POST['user_level'];
				$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
				$query = mysqli_query($con,"SELECT username FROM employees WHERE username='".$username."'");
				if(mysqli_num_rows($query) != 0)
				{
				echo "<script language='javascript' type='text/javascript'>";
				echo "alert('username already exist');";
				echo "</script>";

				$URL="employee_registration.php";
				echo "<script>location.href='$URL'</script>";
	   
   
				}
   
				$query = "INSERT INTO employees (emp_name, username, password, userlevel) VALUES ('$name','$username','$password','$userlevel');";
				mysqli_query($con, $query);
				echo "Data has been successfully inserted in the database!";
				mysqli_close($con);
            ?>
            <p>
            <input type="button" value="Return" id=button1 name=button1 onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.replace("employee_registration.php");
            }
        </script>
            
    </body>
</html>
