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
		<title>Untitled Document</title>
</head>
 
<body class = "centered-wrapper" bgcolor= "#FFD700">
<form action="Employee2.php" method="post">
<td>Add an Employee:</td>
<br>
<td>Name</td>
<td><input type="text" name="name" required></td>
<br>
<td>User Name</td>
<td><input type="text" name="user_name" required></td>
<br>
<td>Password</td>
<td><input type="password" name="password" required></td>
<br>
<td>User Level</td>
<td><input type="number_format" name="user_level" required></td>
<td></td>
<br><td><input type="submit" name="submit" value="Submit"></td><td> <input type="reset" name="reset" value="Reset"></td><td><input type="button" value="Cancel" id=button1 name=button1 onclick="go_home()"></td>    
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