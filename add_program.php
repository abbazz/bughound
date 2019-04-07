<!doctype html>
<?php
   include('session.php');
   $user_check = $_SESSION['login_user'];
   $con = mysqli_connect("localhost","root");
   mysqli_select_db($con, "bughound");
   $test = "Select userlevel from employees where `username` = '{$user_check}'";
   $result = mysqli_query($con, $test);
   $row = mysqli_fetch_row($result);
   //echo "$row[0]";
   if($row[0]==1)
   {
	 echo "<script language='javascript' type='text/javascript'>";
	echo "alert('Not an authorize user');";
	echo "</script>";

	$URL="welcome.php";
	echo "<script>location.href='$URL'</script>";
	   
   }
				
 ?>
<html>
<head>
<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		</head>
    <body class = "centered-wrapper" bgcolor = "#FFD700">
<title>Untitled Document</title>
<form action="addprogram_2.php" method="post">
<td>Add a Program:</td>
<br>
<td>Program Name</td>
<td><input type="text" name="program_name" required></td>
<br>
<td>Version Name</td>
<td><input type="text" name="version_name" required></td>
<br>
<td>Release Type</td>
<td><input type="text" name="program_release" required></td>
<br>
<td></td>
<br><td><input type="submit" name="submit" value="Submit"></td><td> <input type="reset" name="cancel" value="Reset"></td><td><input type="button" value="Cancel" id=button1 name=button1 onclick="go_home()"></td>    
        <script language=Javascript>
            function go_home(){
                window.location.replace("welcome.php");
            }
        </script>
</tr>
</table>
</form>
</body>
</html>