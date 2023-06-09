<!--
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	dbConn.php:
##	Uses server and database credentials to create a PDO connection with the database.
##	Must close the connection with "$conn = null;" after use to avoid permissions issues.
#####################################################################################################################################
-->
<?php
	//database credentials
	$servername = "localhost";
	$username = "nhms_admin";
	$password = "redacted";
	$dbname = "JESUS";

	try {
		//creates connection to database
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	//Error Catch
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
?>