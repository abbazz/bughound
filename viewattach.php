<!DOCTYPE HTML>

<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		
    </head>
    <body class = "centered-wrapper" bgcolor= "#FFD700">
        <h2>
		<?php
	include('session.php');
	$con = mysqli_connect("localhost","root");
	mysqli_select_db($con, "bughound");
	$user_check = $_SESSION['login_user'];
   $con = mysqli_connect("localhost","root");
   mysqli_select_db($con, "bughound");
   	$var = $_SESSION['var'];
$query="SELECT attachment FROM bugs where bug_id = '$var'";
$result=mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
if(empty($row[0]))
{
	echo "No attachment found";
}	
if($row[0]!='Null')
{ 
	$files_field= $row['attachment'];
	$files_show= "$files_field";
	//$attach_id= $row['attach_id'];
	print "<tr>\n"; 	
	print "\t<td>\n"; 
	echo "<div align=center><a href='Uploads/files/$files_show'>$files_field</a></div>";
	print "</td>\n";
	print "</tr>\n"; 
} 
print "</table>\n"; 
?>
            <input type="button" value="Return" id=button1 name=button1 onclick="go_home()">    
        </h2>
        <script language=Javascript>
            function go_home(){
                window.location.replace("searchb.php");
            }
        </script>
            
    </body>
</html>