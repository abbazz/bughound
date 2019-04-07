
<!DOCTYPE html>
<?php
   include('session.php'); 
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
			  		if(isset($_POST["probsum"])){
						$prob_summary= test_input($_POST["probsum"]);
					  }
					  if(isset($_POST["sug_fix"])){
						$sug_fix=test_input($_POST['sug_fix']);
					  }
					  if(isset($_POST["rep_emp"])){
						$reported_by=test_input($_POST['rep_emp']);
					  }
					  if(isset($_POST["rep_date"])){
						$rep_date=test_input($_POST['rep_date']);
					  }
					  if(isset($_POST["func_area"])){
						$func_area=test_input($_POST['func_area']);
					  }
					  if(isset($_POST["ass_emp"])){
						$ass_emp=test_input($_POST['ass_emp']);
					  }
					  if(isset($_POST["comments"])){
						$comments=test_input($_POST['comments']);
					  }
					  if(isset($_POST["status"])){
						$status=test_input($_POST['status']);
					  }
					  if(isset($_POST["priority"])){
						$priority=test_input($_POST['priority']);
					  }
					  if(isset($_POST["resol"])){
						$resol=test_input($_POST['resol']);
					  }
					  if(isset($_POST["resol_ver"])){
						$resol_ver=test_input($_POST['resol_ver']);
					  }
					  if(isset($_POST["res_emp"])){
						$resolved_by=test_input($_POST['res_emp']);
					  }
					  if(isset($_POST["res_date"])){
						$res_date=test_input($_POST['res_date']);
					  }
					  if(isset($_POST["test_emp"])){
						$tested_by=test_input($_POST['test_emp']);
					  }
					  if(isset($_POST["test_date"])){
						$test_date=test_input($_POST['test_date']);
					  }
					  $arr = explode(',', $program_type);

					  $var1 = $arr[0]; // OK
					  $var2 = $arr[1]; // 0989239037400167310
					  $var3 = $arr[2]; // 0.022
					$query1 = "INSERT INTO bugs (program_type, report_type, severity, prob_summary, problem, reported_by, report_date,version,prog_release,funct_area) VALUES ('$var1','$report_type','$severity','$prob_summary','$problem','$reported_by', '$rep_date ','$var2','$var2','$func_area');";
				
				mysqli_query($con, $query1);
				mysqli_close($con);
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
	<h1 class="centered-content"> New Bug Report Entry Page </h1>
	<br><br>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
	<p>
		Program: <select name="prog_type" required>
		<option disabled selected value> -- select an option -- </option>
		<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT * from programs");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['program_name'].',' .$row['version']. ','.$row['prog_release'] . "</option>";
		}
		?>
		</select>
				<span class="error">* <?php echo $progErr;?></span>
		Report Type: <select name="rep_type" required>
		<option disabled selected value> -- select an option -- </option>
				<option value="Coding Error">Coding Error</option>
				<option value="Design Issue">Design Issue</option>
				<option value="Suggestion">Suggestion</option>
				<option value="Documentation">Documentation</option>
				<option value="Hardware">Hardware</option>
				<option value="query">Query</option>
				</select>
				<span class="error">* <?php echo $repErr;?></span>
		Severity: <select name="seve"required>
		<option disabled selected value> -- select an option -- </option>
				<option value="Minor">Minor</option>
				<option value="Major">Intermediate</option>
				<option value="Fatal">Fatal</option>
				<option value="Serious">Serious</option>
				</select>
				<span class="error">* <?php echo $sevErr;?></span>
		</p>
		<p>Problem Summary: <textarea name="probsum" rows="1" cols="50" placeholder= "Write A Brief Summary Of The Problem" required></textarea>
		Reproducible? <input type="checkbox" name="repro">
		</p>
		<p>Problem: <textarea name="prob" rows="3" cols="80" placeholder= "State The Problem" required></textarea>
		<span class="error">* <?php echo $probErr;?></span> </p>
		<p> Suggested Fix: <textarea name="sug_fix" rows="3" cols="75" > </textarea> </p>
		<p> Reported By: <select name="rep_emp" required>
		<?php
		$con = mysqli_connect("localhost","root");
	 			mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT emp_name from employees");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['emp_name'] . "</option>";
		}
		?>
		</select>
		Date: <input name="rep_date" type="date">
		</p>
		<hr>
		<p>
		Functional Area: <select name="func_area" >
		<option disabled selected value> -- select an option -- </option>
		<?php
		$con = mysqli_connect("localhost","root");
		mysqli_select_db($con, "bughound");
		
		$sql= mysqli_query($con,"SELECT DISTINCT area_name from areas");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['area_name'] . "</option>";
		}
		?>
		</select>
		Assigned To: <select name="ass_emp" >
		<option selected value> -- select an option -- </option>
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
		<p> Comments: <textarea name="comments" rows="3" cols="75" placeholder= "State any comments"></textarea> </p>
		<p>
		Status <select name="status" >
			<option selected value="Open">Open</option>
			<option value="Closed">Closed</option>
		</select>
		Priority <select name="priority" >
		<option disabled selected value> -- select an option -- </option>
			<option value="Fix Immediately">Fix Immediately</option>
			<option value="Fix As Soon As Possible">Fix As Soon As Possible</option>
			<option value="Fix Before Next Milestone">Fix Before Next Milestone</option>
			<option value="Fix Before Release">Fix Before Release</option>
			<option value="Fix If Possible">Fix If Possible</option>
			<option value="Optional">Optional</option>
		</select>
		Resolution <select name="resol" >
		<option selected value> -- select an option -- </option>
			<option value="Pending">Pending</option>
			<option value="Fixed">Fixed</option>
			<option value="Irreproducible">Irreproducible</option>
			<option value="Deferred">Deferred</option>
			<option value="As Designed">As Designed</option>
			<option value="Withdrawn By Reporter">Withdrawn By Reporter</option>
			<option value="Need More Info">Need More Info</option>
			<option value="Disagree With Suggestion">Disagree With Suggestion</option>
			<option value="Duplicate">Duplicate</option>
		</select>
		Resolution Version <select name="resol_ver" >
		<option selected value> -- select an option -- </option>
			<option value="Pending">Pending</option>
			<option value="Fixed">Fixed</option>
			<option value="Irreproducible">Irreproducible</option>
			<option value="Deferred">Deferred</option>
			<option value="As Designed">As Designed</option>
			<option value="Withdrawn By Reporter">Withdrawn By Reporter</option>
			<option value="Need More Info">Need More Info</option>
			<option value="Disagree With Suggestion">Disagree With Suggestion</option>
			<option value="Duplicate">Duplicate</option>
		</select>
		</p>
		<p>
		Resolved By: <select name="res_emp">
		<option selected value> -- select an option -- </option>
		<?php
		$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
		$sql= mysqli_query($con,"SELECT emp_name from employees");
		while ($row = $sql->fetch_assoc()){
		echo "<option>" . $row['emp_name'] . "</option>";
		}
		?>
		</select>
		Date: <input name="res_date" type="date">
		Tested By: <select name="test_emp">
		<option disabled selected value> -- select an option -- </option>
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