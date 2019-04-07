<!DOCTYPE html>
<?php
	include('session.php');
	$con = mysqli_connect("localhost","root");
	mysqli_select_db($con, "bughound");
	$user_check = $_SESSION['login_user'];
   $con = mysqli_connect("localhost","root");
   mysqli_select_db($con, "bughound");
   $test2 = "Select userlevel from employees where `username` = '{$user_check}'";
   $result2 = mysqli_query($con, $test2);
   $row2 = mysqli_fetch_row($result2);
   //echo "$row[0]";
   if($row2[0]!=3)
   {
	 echo "<script language='javascript' type='text/javascript'>";
	echo "alert('Not an authorize user');";
	echo "</script>";

	$URL="empedit.php";
	echo "<script>location.href='$URL'</script>";
	   
   }
   if(isset($_GET['value_key'])){
	$var = $_GET['value_key']; 
   $query = "SELECT emp_id, emp_name, username, userlevel FROM employees where emp_id = '$var'";
	$result = mysqli_query($con, $query);
    $rows1=mysqli_fetch_row($result);
	$_SESSION['var']=$var;
}
 ?>
 <html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>Bughound</title>
		<style>
		.error {color: #FF0000;}
		</style>
		<script language=Javascript>
            function go_home(){
                window.location.replace("welcome.php");
            }
        </script>
    </head>
    <body class = "centered-wrapper" bgcolor= "#FFD700">
    <?php
    $con=mysqli_connect("localhost","root");
    mysqli_select_db($con, "bughound");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
            $var2 = test_input($_POST["emp_id"]);
            $emp_name= test_input($_POST["emp_name"]);
            $emp_username= test_input($_POST["emp_username"]);
            $userlevel = test_input($_POST["emp_level"]);

            $query2 = "update employees set emp_name = '$emp_name', username='$emp_username', userlevel='$userlevel' where emp_id='$var2';";
                  
                  mysqli_query($con, $query2);
                  mysqli_close($con);
                  header("location:empedit.php");
    }
  
  
      function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }

?>
    <h1> Edit Employee </h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
    <br>
    <p>Employee ID: <textarea name = "emp_id" rows = "1" columns = "50"><?=$rows1[0]?></textarea>
    Employee Name: <textarea name = "emp_name" rows = "1" columns = "50"><?=$rows1[1]?></textarea></p>
    <p>Employee UserName: <textarea name = "emp_username" rows = "1" columns = "50"><?=$rows1[2]?></textarea>
    Employee Level: <textarea name = "emp_level" rows = "1" columns = "50"><?=$rows1[3]?></textarea></p>
    <br>
    <input type="submit" value="Update"></input> <input type="reset" value="reset"></input> <input type="button" value="cancel" onclick="go_home()"></input>
    </form>
    </body>
</html>
