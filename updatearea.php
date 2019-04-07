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
   $query = "SELECT * FROM areas where aid = '$var'";
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
		<script language=Javascript>
            function go_home1(){
                window.location.replace("attach.php");
            }
        </script>
		<script language=Javascript>
            function go_home2(){
                window.location.replace("viewattach.php");
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

	  if (empty($_POST["program_name"]) && empty($_POST["Area_name"]) ) {
		$progErr = "program is required";
		$repErr = "area is required";
	  }
	  else{
		  $var = test_input($_POST["bug_id"]);
		  $program_type= test_input($_POST["program_name"]);
		  $report_type= test_input($_POST["Area_name"]);
	  }
	  echo "$program_type";
	  echo "$report_type";
	  echo "$var";
	  
		  		//$query1 = "INSERT INTO bugs ('$severity','$prob_summary','$problem','$sug_fix','$reported_by', '$rep_date', '$status', '$resolved_by', '$res_date', '$tested_by', '$test_date',																																											'$func_area','$ass_emp','$comments','$priority', '$resol', '$resol_ver');";
				$query1 = "update areas set program_name = '$program_type', area_name='$report_type where aid='$var'";
				
				mysqli_query($con, $query1);
				mysqli_close($con);
				//header("location:areaedit.php");
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
	Area ID: <input type="text" name="bug_id" value="<?=$rows1[0]?>" readonly><br>
	
	<p>
		Program:<input type="text" name="program_name" value="<?=$rows1[1]?>" > </input>
				<span class="error">* <?php echo $progErr;?></span>
		Area Name: <input type="text" name="Area_name" value="<?=$rows1[2]?>" > </input>
				<span class="error">* <?php echo $repErr;?></span>
		<br>
		<input type="submit" value="submit"></input> <input type="reset" value="reset"></input> <input type="button" value="cancel" onclick="go_home()"></input>
	</form>
	</body>
</html>