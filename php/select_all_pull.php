<?php
/*
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	select_all_pull.php:
##	A php document that pulls all the data wanted and prints it to an external file
#####################################################################################################################################
*/
	//This file is used to pull all student data

	//This is used to log into the database
	include 'dbConn.php';

	try {
		//SQL query used to fetch all current student entries
		$stmt = 'SELECT * FROM current_students_entries';

		//Fetched data is assigned to variables before being written to an output file
		$data="";
		$file= fopen($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt',"w+");
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
		
		fwrite($file, 'M Number,First Name,Last Name,First Major,Second Major,Third Major,First Minor,Second Minor,Advisor,Pre-Health,Pre-Engineering,MNU Start Date,Expected Graduation,MNU Email,Date Submitted'.PHP_EOL);
		fwrite($file,$data);
		fclose($file);

	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

	//Closes the PDO connection
	$conn = null;

	//Moves the user to edit_data.php to view all the student entries
	header('Location: edit_data.php');
?>
