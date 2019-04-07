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
			$search_prog_name = test_input($_POST['search']);
            $con = mysqli_connect("localhost","root");
			mysqli_select_db($con, "bughound");
			//$query = "SELECT * FROM bugs where program_type = '$search_prog_name' or report_type = '$search_report_type' or severity = '$search_severity' or funct_area = '$search_func_area' or assigned_to = '$search_asssigned_to' or status = '$search_status'";
			if(!empty($search_prog_name) ){
			$query1 = "SELECT distinct program_name FROM areas where program_name = '$search_prog_name'" ;
			}
			$result = mysqli_query($con, $query1);
            echo "<table border=1 ><th>Program Name</th>\n";
            $none = 0;
            while($rows=mysqli_fetch_row($result)) 
            {
                $none=1;
				echo "<tr><td><a href = 'updateprogram.php?value_key=$rows[0]'>".$rows[0]."</td>" ;
			}
			//<a href="page.php?value_key=some_value">Link</a>
            function test_input($data) 
            {
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
            function go_home()
            {
                window.location.replace("programedit.php");
            }
        </script>
	</body>
</html>