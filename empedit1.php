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
        <title>View Employee Data</title>
    </head>
    <body class = "centered-wrapper" bgcolor = "#FFD700">
        <?php
        if(isset($_POST["searchemp"])){
            $search_emp_name= test_input($_POST["searchemp"]);
        }
        $con = mysqli_connect("localhost","root");
        mysqli_select_db($con, "bughound");
        $query1 = "SELECT emp_id, emp_name, username, userlevel FROM employees where emp_name = '$search_emp_name';";
        $result = mysqli_query($con, $query1);
        echo "<table border=1 ><th>Employee ID</th><th>Employee Name</th><th>Username</th><th>Userlevel</th>";
        $none=0;
        while($rows=mysqli_fetch_row($result)) {
            $none=1;
            echo "<tr><td><a href = 'updateemp.php?value_key=$rows[0]'>".$rows[0]."</td> <td>".$rows[1]."</td> <td>".$rows[2]."</td> <td>".$rows[3]."</td></tr>";
        }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<?php
    if($none==0)
		Echo "<h3>No matching records found.</h3>\n";
		mysqli_close($con);
        ?>
		<input type="button" value="Go Back" id=button1 name=button1 onclick="go_home()"></td>
		<script language=Javascript>
            function go_home(){
                window.location.replace("empedit.php");
            }
        </script>
	</body>
</html>