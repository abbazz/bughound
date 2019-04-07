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
			$search_report_type = test_input($_POST['search1']);
			$search_severity = test_input($_POST['search2']);
			$search_status = test_input($_POST['search5']);
			$reported_by = test_input($_POST['search8']);
			$all = test_input($_POST['search9']);
			
            $con = mysqli_connect("localhost","root");
			mysqli_select_db($con, "bughound");
			//$query = "SELECT * FROM bugs where program_type = '$search_prog_name' or report_type = '$search_report_type' or severity = '$search_severity' or funct_area = '$search_func_area' or assigned_to = '$search_asssigned_to' or status = '$search_status'";
			if(!empty($search_prog_name) || !empty($search_report_type) || !empty($search_severity) || !empty($search_status) || !empty($reported_by)){
			$query1 = "SELECT * FROM bugs where program_type = '$search_prog_name' or report_type = '$search_report_type' or severity = '$search_severity' or status = '$search_status' or reported_by = '$reported_by'";
			}
			if(!empty($search_prog_name)&&!empty($search_report_type)){
				$query1 = "SELECT * FROM bugs where program_type = '$search_prog_name' and report_type = '$search_report_type'";
			}
			if(!empty($search_prog_name)&&!empty($reported_by)){
				$query1 = "SELECT * FROM bugs where program_type = '$search_prog_name' and reported_by = '$reported_by'";
			}
			
			if(!empty($search_severity)&&!empty($reported_by)){
				$query1 = "SELECT * FROM bugs where severity = '$search_severity' and reported_by = '$reported_by'";
			}
			
			if(!empty($all)){
				$query1 = "SELECT * FROM bugs where status='open'";
			}
			
			$result = mysqli_query($con, $query1);
            echo "<table border=1 ><th>Bug ID</th><th>program type</th><th>report type</th><th>severity</th><th>problem summary</th><th>problem</th><th>suggested fix</th><th>reported by</th><th>report date</th><th>status</th><th>resolved by</th><th>resolve date</th><th>tested by</th><th>test date</th><th>functional area</th><th>assigned to</th><th>priority</th>\n";
            $none = 0;
            while($rows=mysqli_fetch_row($result)) {
                $none=1;
				echo "<tr><td><a href = 'updateb.php?value_key=$rows[0]'>".$rows[0]."</td> <td>".$rows[1].','.$rows[20].','.$rows[21]."</td> <td>".$rows[2]."</td> <td>".$rows[3]."</td> <td>".$rows[4]."</td> <td>".$rows[5]."</td> <td>".$rows[6]."</td> <td>".$rows[7]."</td> <td>".$rows[8]."</td> <td>".$rows[9]."</td> <td>".$rows[10]."</td> <td>".$rows[11]."</td> <td>".$rows[12]."</td> <td>".$rows[13]."</td> <td>".$rows[14]."</td> <td>".$rows[15]."</td> <td>".$rows[17]."</td></tr>";
			}
			//<a href="page.php?value_key=some_value">Link</a>
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
                window.location.replace("searchb.php");
            }
        </script>
	</body>
</html>