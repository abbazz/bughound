<!DOCTYPE HTML>
<?php
include('session.php');
	$con = mysqli_connect("localhost","root");
	mysqli_select_db($con, "bughound");
	$user_check = $_SESSION['login_user'];
   $con = mysqli_connect("localhost","root");
   mysqli_select_db($con, "bughound");
 
	$var = $_SESSION['var']; 	
 if(isset($_POST['submitattach'])){
		$name= $_FILES['file']['name'];
		$tmp_name= $_FILES['file']['tmp_name'];
		$submitbutton= $_POST['submitattach'];
		$position= strpos($name, "."); 
		$fileextension= substr($name, $position + 1);
		$fileextension= strtolower($fileextension);
		if (isset($name)) 
		{
			$path= 'C:xampp/htdocs/bughound/uploads/files/';
			if (!empty($name))
			{
				if (move_uploaded_file($tmp_name, $path.$name)) 
				{
					//echo 'copy to directory';
				}
			}
		}
		if(!empty($name))
		{
			//$sql="INSERT INTO bugs (attachment) VALUES ('$name') where bug_id = '$var'";
			$sql = "update bugs set attachment = '$name ' where bug_id = '$var'";
			
			if (mysqli_query($con, $sql)) {
              // echo 'insertion ';
			  $URL="searchb.php";
			echo "<script>location.href='$URL'</script>";
            }
		}
   }
   ?>
<html>
<body>
<form method='post' enctype="multipart/form-data">
		<input type="file" name="file"/>
		<input type="submit" name="submitattach" value="Upload"/><br><br>
		
		</form>
		</body>
</html>