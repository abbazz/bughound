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

	$URL="searchb.php";
	echo "<script>location.href='$URL'</script>";
	   
   }
   if(isset($_GET['value_key'])){
	$var = $_GET['value_key']; 
   $query = "SELECT * FROM bugs where bug_id = '$var'";
	$result = mysqli_query($con, $query);
    $rows1=mysqli_fetch_row($result);
	
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
$progErr = $repErr = $sevErr = $probErr = "";
$program_type = $report_type = $severity = $comment = "";
$sug_fix = $reported_by = $rep_date = $func_area = $ass_emp = "";
$comments = $status = $priority = $resol = $resol_ver = "";
$resolved_by = $res_date = $tested_by = $test_date = $prob_summary = $problem = "";
$con=mysqli_connect("localhost","root");
mysqli_select_db($con, "bughound");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	  if (empty($_POST["prog_type"]) && empty($_POST["rep_type"]) && empty($_POST["seve"])) {
		$progErr = "program is required";
		$repErr = "report is required";
		$sevErr = "Severity is required";
	  }
	  else{
		  $prob_summary= test_input($_POST["probsum"]);
			$problem= test_input($_POST["prob"]);
		  if(strlen(trim(preg_replace('/\xc2\xa0/','',$prob_summary))) == 0 || strlen(trim(preg_replace('/\xc2\xa0/','',$problem))) == 0){
			$probsumErr = "This Field Has White Spaces";
		  }
		  else{
		  $program_type= test_input($_POST["prog_type"]);
		  $report_type= test_input($_POST["rep_type"]);
		  $severity= test_input($_POST["seve"]);
		  if((empty($_POST["probsum"]) && !empty($_POST["prob"])) ||(empty($_POST["prob"]) && !empty($_POST["probsum"])) || (empty($_POST["prob"]) && !empty($_POST["probsum"]))){
		  
			$probErr = "Both of these fields are required";

		  }
		  else{	
					$var= test_input($_POST["bug_id"]);
				    $prob_summary= test_input($_POST["probsum"]);
				    $problem= test_input($_POST["prob"]);
					$sug_fix=test_input($_POST['sug_fix']);
					$reported_by=test_input($_POST['rep_emp']);
					$rep_date=test_input($_POST['rep_date']);
					$func_area=test_input($_POST['func_area']);
					$ass_emp=test_input($_POST['ass_emp']);
					$comments=test_input($_POST['comments']);
					$status=test_input($_POST['status']);
					$priority=test_input($_POST['priority']);
					$resol=test_input($_POST['resol']);
					$resol_ver=test_input($_POST['resol_ver']);
					$resolved_by=test_input($_POST['res_emp']);
					$res_date=test_input($_POST['res_date']);
					$tested_by=test_input($_POST['test_emp']);
					$test_date=test_input($_POST['test_date']);
					//$query1 = "INSERT INTO bugs ('$severity','$prob_summary','$problem','$sug_fix','$reported_by', '$rep_date', '$status', '$resolved_by', '$res_date', '$tested_by', '$test_date',																																											'$func_area','$ass_emp','$comments','$priority', '$resol', '$resol_ver');";
					$query1 = "update bugs set program_type = '$program_type', report_type='$report_type', severity = '$severity', prob_summary ='$prob_summary',  problem='$problem', suggest_fix='$sug_fix', reported_by='$reported_by', report_date='$rep_date', status='$status', resolved_by='$resolved_by', resolve_date='$res_date', tested_by='$tested_by', tested_date=''$test_date'', funct_area='$func_area', assigned_to='$ass_emp', comments='$comments', priority='$priority', resolution='$resol', resolution_version='$resol_ver' where bug_id='$var'";
				
				mysqli_query($con, $query1);
				mysqli_close($con);
				 header("location:searchb.php");
		  }

	  }
}
}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


?>

		  
	<h1 class="centered-content"> Update Report Page </h1>
	<br><br>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
	<p>
	Bug ID: <input type="text" name="bug_id" value="<?=$rows1[0]?>" readonly><br>
	
	<p>
		Program: <select name="prog_type">
		<?php if(!empty($rows1[1])) {?>
		<option selected value="<?=$rows1[1]?>"> <?=$rows1[1]?></option>
		<?php } ?>
		<?php
		
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT program_name from programs");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['program_name'] . "</option>";
		}
		?>
		</select>
				<span class="error">* <?php echo $progErr;?></span>
		Report Type: <select name="rep_type">
		<?php if(!empty($rows1[2])) {?>
		<option selected value="<?=$rows1[2]?>"> <?=$rows1[2]?></option>
		<?php } ?>
				<option value="Coding Error">Coding Error</option>
				<option value="Design Issue">Design Issue</option>
				<option value="Suggestion">Suggestion</option>
				<option value="Documentation">Documentation</option>
				<option value="Hardware">Hardware</option>
				<option value="query">Query</option>
				</select>
				<span class="error">* <?php echo $repErr;?></span>
		Severity: <select name="seve">
		<?php if(!empty($rows1[3])) {?>
		<option selected value="<?=$rows1[3]?>"> <?=$rows1[3]?></option>
		<?php } ?>
		
				<option value="Minor">Minor</option>
				<option value="Major">Intermediate</option>
				<option value="Fatal">Serious</option>
				</select>
				<span class="error">* <?php echo $sevErr;?></span>
		</p>
		<p>Problem Summary: <textarea name="probsum" rows="1" cols="50" placeholder= "Write A Brief Summary Of The Problem"> <?=$rows1[4]?></textarea>
		Reproducible? <input type="checkbox" name="repro">
		</p>
		<p>Problem: <textarea name="prob" rows="3" cols="80" placeholder= "State The Problem"> <?=$rows1[5]?></textarea>
		<span class="error">* <?php echo $probErr;?></span> </p>
		<p> Suggested Fix: <textarea name="sug_fix" rows="3" cols="75" ><?=$rows1[6]?></textarea> </p>
		<p> Reported By: <input type="text" name="rep_emp" value="<?=$rows1[7]?>" readonly>
		</input>
		Date: <input type="text" name="rep_date" value="<?=$rows1[8]?>" readonly> </input>
		</p>
		<hr>
		<p>
		Functional Area: <select name="func_area">
		<?php if(!empty($rows1[14])) {?>
		<option selected value="<?=$rows1[14]?>"> <?=$rows1[14]?></option>
		<?php } ?>
				<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT funct_area from areas");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['funct_area'] . "</option>";
		}
		?></select>
		Assigned To: <select name="ass_emp">
		<?php if(!empty($rows1[15])) {?>
		<option selected value="<?=$rows1[15]?>"> <?=$rows1[15]?></option>
		<?php } ?>
		<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT emp_name from employees");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['emp_name'] . "</option>";
		}
		?>
		</select>
		</p>
		<p> Comments: <textarea name="comments" rows="3" cols="75" placeholder= "State any comments"><?=$rows1[16]?></textarea> </p>
		<p>
		Status <select name="status">
		<?php if(!empty($rows1[9])) {?>
		<option selected value="<?=$rows1[9]?>"> <?=$rows1[9]?></option>
		<?php } ?>
			<option value="Open">Open</option>
			<option value="Closed/Open">Closed/Open</option>
			<option value="Closed">Closed</option>
			<option value="Resolved">Open</option>
		</select>
		Priority <select name="priority">
		<?php if(!empty($rows1[17])) {?>
		<option selected value="<?=$rows1[17]?>"> <?=$rows1[17]?></option>
		<?php } ?>
			<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT priority from areas");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['priority'] . "</option>";
		}
		?>
		</select>
		Resolution <select name="resol">
		<?php if(!empty($rows1[18])) {?>
		<option selected value="<?=$rows1[18]?>"> <?=$rows1[18]?></option>
		<?php } ?>
			<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT resolution from areas");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['resolution'] . "</option>";
		}
		?>
		</select>
		Resolution Version <select name="resol_ver">
		<?php if(!empty($rows1[19])) {?>
		<option selected value="<?=$rows1[19]?>"> <?=$rows1[19]?></option>
		<?php } ?>
			<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT resolution_version from areas");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['resolution_version'] . "</option>";
		}
		?>
		</select>
		</p>
		<p>
		Resolved By: <select name="res_emp">
		<?php if(!empty($rows1[10])) {?>
		<option selected value="<?=$rows1[10]?>"> <?=$rows1[10]?></option>
		<?php } ?>
		<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT emp_name from employees");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['emp_name'] . "</option>";
		}
		?>
		</select>
		Date: <input type="text" name="res_date" value="<?=$rows1[11]?>" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="Enter a date in this formart YYYY-MM-DD"> </input>
		Tested By: <select name="test_emp">
		<?php if(!empty($rows1[12])) {?>
		<option selected value="<?=$rows1[12]?>"> <?=$rows1[12]?></option>
		<?php } ?>
		<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT emp_name from employees");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['emp_name'] . "</option>";
		}
		?>
		</select>
		Date: <input name="test_date" type="date">
		Treat as Deferred? <input type="checkbox" name="defer"></input>
		</p>
		<input type="submit" value="submit"></input> <input type="reset" value="reset"></input> <input type="button" value="cancel" onclick="go_home()"></input>
	</form>
	</body>
</html>