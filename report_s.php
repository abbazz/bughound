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

    $program_type = $_POST['prog_type'];
	$report_type=$_POST['rep_type'];
	$severity=$_POST['seve'];
	$prob_summary=$_POST['probsum'];
	//$repro=$_POST['repro'];
	$problem=$_POST['prob'];
	$sug_fix=$_POST['sug_fix'];
	$reported_by=$_POST['rep_emp'];
	$rep_date=$_POST['rep_date'];
    $func_area=$_POST['func_area'];
    $ass_emp=$_POST['ass_emp'];
	$comments=$_POST['comments'];
	$status=$_POST['status'];
	$priority=$_POST['priority'];
	$resol=$_POST['resol'];
	$resol_ver=$_POST['resol_ver'];
	$resolved_by=$_POST['res_emp'];
	$res_date=$_POST['res_date'];
	$tested_by=$_POST['test_emp'];
	$test_date=$_POST['test_date'];
	//$defer=$_POST['defer'];


$con=mysqli_connect("localhost","root");
mysqli_select_db($con, "bughound");
$query1 = "INSERT INTO areas (funct_area, assigned_to, comments, priority, resolution, resolution_version) VALUES ('$func_area','$ass_emp','$comments','$priority', '$resol', '$resol_ver');";
$query2 = "INSERT INTO bugs (prob_summary, problem, suggest_fix, reported_by, report_date, status, resolved_by, resolve_date, tested_by, tested_date) VALUES ('$prob_summary','$problem','$sug_fix','$reported_by', '$rep_date', '$status', '$resolved_by', '$res_date', '$tested_by', '$test_date');";
//$query3 = "INSERT INTO programs (report_type, program_name, severity) VALUES ('$report_type','$program_type','$severity');";
mysqli_query($con, $query1);
mysqli_query($con, $query2);
mysqli_query($con, $query3);
echo "Data Has been successfully entered in the database";
mysqli_close($con);

?>

