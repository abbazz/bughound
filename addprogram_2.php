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
			    $program_name = $_POST['program_name'];
                $version_name = $_POST['version_name'];
				$program_release = $_POST['program_release'];
				$con = mysqli_connect("localhost","root");
				mysqli_select_db($con, "bughound");
				$test = "Select * from programs where `program_name` = '{$program_name}' and `version` = '{$version_name}' and `prog_release` = '{$program_release}'";
				$result = mysqli_query($con, $test);
				
				if ( mysqli_num_rows ( $result ) >= 1 )
				{
					$message = " Program Already exist";
					echo "<script type='text/javascript'>alert('$message');</script>";
					//header ("location: add_program.php");
	
				}
				
				
	
				
               else{
				$query = "INSERT INTO programs (program_name,version,prog_release) VALUES ('$program_name','$version_name','$program_release');";
				mysqli_query($con, $query);
			    echo "Program inserted!";
			   }
				mysqli_close($con);
            ?>
            <p>
            <input type="button" value="Return" id=button1 name=button1 onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.replace("add_program.php");
            }
        </script>
            
    </body>
</html>
