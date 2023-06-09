<?php
/*
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	advisor_pull.php:
##	A php document that pulls the advisor wanted and prints it to an external file
#####################################################################################################################################
*/
	//this is used to log into the database
	$servername = "localhost";
	$username = "nhms_admin";
	$password = "redacted";
	$dbname = "JESUS";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//THis is where you put the SQL statement
		$stmt = 'SELECT * FROM current_students_entries WHERE Advisor = \'' .$advisor. '\'';

		//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		// this is where the data comes out and is assigned to variables
	$data="";
	$file= fopen($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt',"a+");
	foreach ($conn->query($stmt) as $row) {
		$data .= $row['M'] . ',';
		$data .= $row['First_Name'] . ',';
		$data .= $row['Last_Name'] . ',';
		$data .= $row['Major_1'] . ',';
		$data .= $row['Major_2'] . ',';
		$data .= $row['Major_3'] . ',';
		$data .= $row['Minor_1'] . ',';
		$data .= $row['Minor_2'] . ',';
		$data .= $row['Advisor'] . ',';
		$data .= $row['Pre_Med'] . ',';
		$data .= $row['Pre_Engineering'] . ',';
		$data .= $row['MNU_Start_Date'] . ',';
		$data .= $row['Expected_Grad_Date'] . ',';
		$data .= $row['MNU_email'] . ',';
		$data .= $row['Date_of_Survey']."\r\n";	
	}
	//this writes all the data to an external file 
	fwrite($file,$data);
	$lines=file($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt');
	$lines=array_unique($lines);
	fclose($file);
	 
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
	//this closes the connection to the database
	$conn = null;
?>