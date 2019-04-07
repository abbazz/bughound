<?php
   include('session.php');
	$table_name = $_POST['table'];
    $table_type_name = $_POST['format'];
	
	echo "$table_name";
	
	if($table_type_name=='xml'){
		
//Create file name to save
$filename = "export_xml_".date("Y-m-d_H-i",time()).".xml";

$db = mysqli_connect("localhost","root","","bughound");
//Extract data to export to XML
$sqlQuery = "SELECT * FROM `{$table_name}`" ;
if (!$result = $db->query($sqlQuery)) {
    throw new Exception(sprintf('Mysqli: (%d): %s', $mysql->errno, $mysql->error));
}

//Create new document 
$dom = new DOMDocument;
$dom->preserveWhiteSpace = FALSE;

//add table in document 
$table = $dom->appendChild($dom->createElement('table'));

//add row in document 
foreach($result as $row) {
    $data = $dom->createElement('row');
    $table->appendChild($data);

    //add column in document 
    foreach($row as $name => $value) {

        $col = $dom->createElement('column', $value);
        $data->appendChild($col);
        $colattribute = $dom->createAttribute('name');
        // Value for the created attribute
        $colattribute->value = $name;
        $col->appendChild($colattribute);           
    }
}



$dom->formatOutput = true; // set the formatOutput attribute of domDocument to true 
// save XML as string or file 
$test1 = $dom->saveXML(); // put string in test1
$dom->save($filename); // save as file
$dom->save('xml/'.$filename);

	}
	
	else if ($table_type_name=='ascii')
	{
	$con = mysqli_connect("localhost","root");
   mysqli_select_db($con, "bughound");
   $test = "SELECT * FROM `{$table_name}` INTO OUTFILE 'C:/xampp/htdocs/bughound/{$table_name}.txt' CHARACTER SET utf8 FIELDS TERMINATED BY ','";
   //$test = "Select * from `{$table_name}` into outfile `C:/xampp/htdocs/bughound/ascii.txt` character set utf8 fields terminated by ','";
   $result = mysqli_query($con, $test);
   }
	echo "<script language='javascript' type='text/javascript'>";
	echo "alert('Table Exported');";
	echo "</script>";

	$URL="exporttables.php";
	echo "<script>location.href='$URL'</script>";   

?>