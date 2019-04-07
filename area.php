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
<form action="area2.php" method="post">
<td>Add an area:</td>
<br>
<td>Program_name<select name="program_name" required></td>
<option disabled selected value> -- select an option -- </option>
		<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT program_name from programs");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['program_name'] . "</option>";
		}
		?>
		</select>
		<br>
<td>Function name</td>
<td><input type="text" name="area_name" required></td>
<br>
<td>Version<select name="version" required></td>
<option disabled selected value> -- select an option -- </option>
		<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT distinct version from programs");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['version'] . "</option>";
		}
		?>
		</select>
		<br>
<td>Release<select name="prog_release" required></td>
<option disabled selected value> -- select an option -- </option>
		<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT distinct prog_release from programs");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['prog_release'] . "</option>";
		}
		?>
		</select>
		<br>
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