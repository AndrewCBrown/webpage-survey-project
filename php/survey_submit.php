<?php
/*
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	survey_submit.php:
##	A php document that submits the data entered in the survey into the database
#####################################################################################################################################
*/
	//This is used to pull the values from student_view_survey.php
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$mnumber = $_POST["mnumber"];
	$email = $_POST["email"];
	$year = $_POST["year"];
	$EGD = $_POST["EGD"];
	$pre_health = $_POST["pre-health"];
	$pre_engineering = $_POST["pre-engineering"];
	$major1 = $_POST["major1"];
	$major2 = $_POST["major2"];
	$major3 = $_POST["major3"];
	$minor1 = $_POST["minor1"];
	$minor2 = $_POST["minor2"];
	$advisor = $_POST["advisor"];

	//Modifiers (This prepares the entries to be put into the database with the correct formatting)
	if (substr($email, -8) != "@mnu.edu"){
		$email .= "@mnu.edu";
	} 
	
	$year .= '-01';
	$EGD .= '-01';

	if ($pre_health == 'on'){
		$pre_health = 'Y';
	}
	else {
		$pre_health = 'N';
	}

	if ($pre_engineering == 'on'){
		$pre_engineering = 'Y';
	}
	else {
		$pre_engineering = 'N';
	}

	if ($major2 == ''){
		$major2 = 'NULL';
	}
	if ($major3 == ''){
		$major3 = 'NULL';
	}

	if ($minor1 == ''){
		$minor1 = 'NULL';
	}
	if ($minor2 == ''){
		$minor2 = 'NULL';
	}

	//This is used to log into the database
	$servername = "localhost";
	$username = "nhms_admin";
	$password = "redacted";
	$dbname = "JESUS";

	//Creating the SQL insertion query for current_students_entries
	//M, First_Name, Last_Name, Major_1, Major_2, Major_3, Minor_1, Minor_2, Advisor, Pre_Med, Pre_Engineering,
	//MNU_Start_Date, Expected_Grad_Date, MNU_email, Date_of_Survey
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

	//Create select statement to make sure the survey has not been already submitted this period
	$time_period = 2592000; //This is for how often you want someone to be able to submit an identical survey in seconds (30 days is 2,592,000 seconds)
	$select_stmt = 'SELECT * FROM current_students_entries WHERE ';
	$select_stmt .= 'M = ' . $mnumber . ' AND ';
	$select_stmt .= 'First_Name = \'' . $firstname . '\' AND ';
	$select_stmt .= 'Last_Name = \'' . $lastname . '\' AND ';
	$select_stmt .= 'Major_1 = \'' . $major1 . '\' AND ';
	$select_stmt .= 'Major_2 = \'' . $major2 . '\' AND ';
	$select_stmt .= 'Major_3 = \'' . $major3 . '\' AND ';
	$select_stmt .= 'Minor_1 = \'' . $minor1 . '\' AND ';
	$select_stmt .= 'Minor_2 = \'' . $minor2 . '\' AND ';
	$select_stmt .= 'Advisor = \'' . $advisor . '\' AND ';
	$select_stmt .= 'Pre_Med = \'' . $pre_health . '\' AND ';
	$select_stmt .= 'Pre_Engineering = \'' . $pre_engineering . '\' AND ';
	$select_stmt .= 'MNU_Start_Date = \'' . $year . '\' AND ';
	$select_stmt .= 'Expected_Grad_Date = \'' . $EGD . '\' AND ';
	$select_stmt .= 'MNU_email = \'' . $email . '\'';

	//Create select statment to see if an entry with the M number already exists
	$check_archive_stmt = 'SELECT * FROM current_students_entries WHERE M = ' . $mnumber;

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		foreach ($conn->query($select_stmt) as $row) {
			$qfirstname = $row['First_Name'];
			$qDoS = $row['Date_of_Survey'];
		}
		
		$already_entered = ($qfirstname == '') ? false : true;
		
		//Special case for identical surveys entered far enough apart
		if (strtotime(date("Y-m-d H:i:s")) - strtotime($qDoS) > $time_period){
			$already_entered = false;
		}
		
		foreach ($conn->query($check_archive_stmt) as $row) {
			$afirstname = $row['First_Name'];
		}
		
		$need_to_archive = ($afirstname == '') ? false : true;
		
		if (!$already_entered) {
			if ($need_to_archive){ //this if block moves the row to the archive table			
				foreach ($conn->query($check_archive_stmt) as $row) {
					$ar_mnumber = $row['M'];
					$ar_firstname = $row['First_Name'];
					$ar_lastname = $row['Last_Name'];
					$ar_major1 = $row['Major_1'];
					$ar_major2 = $row['Major_2'];
					$ar_major3 = $row['Major_3'];
					$ar_minor1 = $row['Minor_1'];
					$ar_minor2 = $row['Minor_2'];
					$ar_advisor = $row['Advisor'];
					$ar_pre_health = $row['Pre_Med'];
					$ar_pre_engineering = $row['Pre_Engineering'];
					$ar_year = $row['MNU_Start_Date'];
					$ar_EGD = $row['Expected_Grad_Date'];
					$ar_email = $row['MNU_email'];
					$ar_DoS = $row['Date_of_Survey'];
				}
				
				//Create the insert statment to archive the row (copy it from current into archive)
				$ar_stmt = 'INSERT INTO archive_students_entries(M, First_Name, Last_Name, Major_1, Major_2, Major_3, Minor_1, Minor_2, Advisor, Pre_Med, ';
				$ar_stmt .= 'Pre_Engineering, MNU_Start_Date, Expected_Grad_Date, MNU_email, Date_of_Survey) VALUES (';
				$ar_stmt .= $ar_mnumber . ', ';
				$ar_stmt .= '\'' . $ar_firstname . '\', ';
				$ar_stmt .= '\'' . $ar_lastname . '\', ';
				$ar_stmt .= '\'' . $ar_major1 . '\', ';
				$ar_stmt .= '\'' . $ar_major2 . '\', ';
				$ar_stmt .= '\'' . $ar_major3 . '\', ';
				$ar_stmt .= '\'' . $ar_minor1 . '\', ';
				$ar_stmt .= '\'' . $ar_minor2 . '\', ';
				$ar_stmt .= '\'' . $ar_advisor . '\', ';
				$ar_stmt .= '\'' . $ar_pre_health . '\', ';
				$ar_stmt .= '\'' . $ar_pre_engineering . '\', ';
				$ar_stmt .= '\'' . $ar_year . '\', ';
				$ar_stmt .= '\'' . $ar_EGD . '\', ';
				$ar_stmt .= '\'' . $ar_email . '\', ';
				$ar_stmt .= '\'' . $ar_DoS . '\')';
				
				$conn->query($ar_stmt);
				
				//Create the delete statement to remove the row from current once it has been copied to archive
				$dr_stmt = 'DELETE FROM current_students_entries WHERE M = ' . $ar_mnumber;
				
				$conn->query($dr_stmt);
			}
			
			$conn->query($stmt);
			//Redirects the connection to the thank you for submitting page
			header("Location: https://nhmssurvey.mnu.edu/students/student_view_thanks.html");
		}
		
		else {
			//Send to already you already entered your survey page
			header("Location: https://nhmssurvey.mnu.edu/students/student_view_warning_duplicateEntry.html");
		}
	
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}


	//For debugging (These lines won't appear unless an exception is thrown and the page isn't redirected
	echo nl2br('The insert statement:');
	echo $stmt;
	echo nl2br('The select statement:');
	echo $select_stmt;

	//Closes the PDO connection
	$conn = null;  
?>