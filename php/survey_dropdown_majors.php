<!--
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	survey_dropdown_majors.php:
##	Populates html dropdown box options with the database's entries from the 'majors' table for student_view_survey.php.
##	Due to server permissions, requires dbConn.php to be included before this to connect to the database.
#####################################################################################################################################
-->
<?php
	//mySQL statement to run; pulls all rows from the majors table
	$sql = 'SELECT * FROM majors';
	$query = $conn->query($sql);

	//Loops through the SQL query and echoes the rows to the called HTML file as dropdown box options
	foreach ($query as $row) {
		echo ('<option>' . $row[Major] . '</option>');
	}
?>