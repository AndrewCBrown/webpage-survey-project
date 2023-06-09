<?php
/*
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	change_data_submit.php:
##	A php document that allows you to change submitted data
#####################################################################################################################################
*/
	//initializes the variables
	$mnumber= "";
	$firstname= "";
	$lastname= "";
	$major1= "";
	$major2= "";
	$major3= "";
	$minor1 = "";
	$minor2 = "";
	$advisor= "";
	$pre_health = "";
	$pre_engineering= "";
	$year= "";
	$EGD = "";
	$email= "";
	
	//this is used to log into the database
	$servername = "localhost";
	$username = "nhms_admin";
	$password = "redacted";
	$dbname = "JESUS";

	//actually opens the database connection
	try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = 'INSERT INTO current_students_entries(M, First_Name, Last_Name, Major_1, Major_2, Major_3, Minor_1, Minor_2, Advisor, Pre_Med, ';
	$stmt .= 'Pre_Engineering, MNU_Start_Date, Expected_Grad_Date, MNU_email, Date_of_Survey) VALUES (';
	$stmt .= $mnumber . ', ';
	$stmt .= '\'' . $firstname . '\', ';
	$stmt .= '\'' . $lastname . '\', ';
	$stmt .= '\'' . $major1 . '\', ';
	$stmt .= '\'' . $major2 . '\', ';
	$stmt .= '\'' . $major3 . '\', ';
	$stmt .= '\'' . $minor1 . '\', ';
	$stmt .= '\'' . $minor2 . '\', ';
	$stmt .= '\'' . $advisor . '\', ';
	$stmt .= '\'' . $pre_health . '\', ';
	$stmt .= '\'' . $pre_engineering . '\', ';
	$stmt .= '\'' . $year . '\', ';
	$stmt .= '\'' . $EGD . '\', ';
	$stmt .= '\'' . $email . '\', ';
	$stmt .= '\'' . date("Y-m-d H:i:s") . '\')';	

	$file_handle = fopen($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt', "rd");

	while (!feof($file_handle) ) {
		$line_of_text = fgets($file_handle);
		$parts = explode(',', $line_of_text);
		
		//sets each of the variables for the statement
		$mnumber= $parts[0];
		$firstname= $parts[1];
		$lastname= $parts[2];
		$major1= $parts[3];
		$major2= $parts[4];
		$major3= $parts[5];
		$minor1 = $parts[6];
		$minor2 = $parts[7];
		$advisor= $parts[8];
		$pre_health = $parts[9];
		$pre_engineering= $parts[10];
		$year= $parts[11];
		$EGD = $parts[12];
		$email= $parts[13];
		$dos=$parts[14];
		
	
		
		if ($mnumber!=""){
			
		
		
		$deletestmt= 'DELETE FROM current_students_entries WHERE M='.$mnumber;
		echo $deletestmt;
		
		$conn->query($deletestmt);
		
		echo $firstname;
		$stmt = 'INSERT INTO current_students_entries(M, First_Name, Last_Name, Major_1, Major_2, Major_3, Minor_1, Minor_2, Advisor, Pre_Med, ';
		$stmt .= 'Pre_Engineering, MNU_Start_Date, Expected_Grad_Date, MNU_email, Date_of_Survey) VALUES (';
		$stmt .= $mnumber . ', ';
		$stmt .= '\'' . $firstname . '\', ';
		$stmt .= '\'' . $lastname . '\', ';
		$stmt .= '\'' . $major1 . '\', ';
		$stmt .= '\'' . $major2 . '\', ';
		$stmt .= '\'' . $major3 . '\', ';
		$stmt .= '\'' . $minor1 . '\', ';
		$stmt .= '\'' . $minor2 . '\', ';
		$stmt .= '\'' . $advisor . '\', ';
		$stmt .= '\'' . $pre_health . '\', ';
		$stmt .= '\'' . $pre_engineering . '\', ';
		$stmt .= '\'' . $year . '\', ';
		$stmt .= '\'' . $EGD . '\', ';
		$stmt .= '\'' . $email . '\', ';
		$stmt .= '\'' . $dos . '\')';	
		//runs the prepared statement with the reassigned variables
		echo $stmt;
		$conn->query($stmt);
		}
	}
	fclose($file_handle);

	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	
	//closes the connection to the database
	$conn = null; 
?>