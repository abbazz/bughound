<!DOCTYPE html>
<?php
   include('session.php');
	$user_check = $_SESSION['login_user'];
   $con = mysqli_connect("localhost","root");
   mysqli_select_db($con, "bughound");
   $test = "Select userlevel from employees where `username` = '{$user_check}'";
   $result = mysqli_query($con, $test);
   $row = mysqli_fetch_row($result);
   //echo "$row[0]";
   if($row[0]!=3)
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
	
        <form action="exporttables1.php" method="post">
            Select a particular table: 
				<select name="table" id="table" required>
                <option selected="selected" value=""></option>
                <option value="bugs"> Bugs </option>
                <option value="areas">  Areas </option>
                <option value="employees"> Employees </option>
                <option value="attachments"> Attachments </option>
                <option value="programs"> Programs</option>              
            </select>
			<br>            
Select a format for the file: 
				<select name="format" id="format" required>
                <option selected="selected" value=""></option>
				 <option value="xml">  XML </option> 
                <option value="ascii"> ASCII </option>               
            </select>
            <br><br>
            <input type='submit' value='Export'/>
            <input type="button" value="Go Back" id=button1 name=button1 onclick="go_home()">
<script language=Javascript>
            function go_home(){
                window.location.replace("welcome.php");
            }
        </script>
        </form>
    </body>
</html>