<?php
   include('session.php'); 
 ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>View Employee Data</title>
    </head>
    <body class = "centered-wrapper" bgcolor = "#FFD700">
        <?php
			$search_prog_name = $_POST['search'];
			$search_report_type = $_POST['search1'];
			$search_severity = $_POST['search2'];
			$search_func_area = $_POST['search3'];
			$search_asssigned_to = $_POST['search4'];
			$search_status = $_POST['search5'];
			$search_priority = $_POST['search6'];
			$search_resolution = $_POST['search7'];
			$search_reported_by = $_POST['search8'];
			$search_reported_date = $_POST['search9'];
			$search_resolved_by = $_POST['search10'];
			
            $con = mysqli_connect("localhost","root");
			mysqli_select_db($con, "bughound");
			$query = "SELECT emp_id, emp_name FROM employees where emp_id like '%".$search."%' or emp_name like '%".$search."%' or username like '%".$search."%' or userlevel like '%".$search."%'";
			$result = mysqli_query($con, $query);
            echo "<table border=1 ><th>emp_id</th><th>Name</th>\n";
            $none = 0;
            while($rows=mysqli_fetch_row($result)) {
                $none=1;
				echo "<tr><td><a href = \"edit.php?id=>" .$rows[0]. "\">".$rows[0]."</a></td> <td>".$rows[1]."</td></tr>";
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
                window.location.replace("search.php");
            }
        </script>
	</body>
</html>