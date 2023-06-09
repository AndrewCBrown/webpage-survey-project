<?php
/*
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	edit_data_write.php:
##	A php document that allows you to edit the data and write it to a file
#####################################################################################################################################
*/
	//Recieves the data in the tables
	$data = $_POST['datavar'];
	
	//Replaces the  code words in the data to make it look like a csv
	$data = str_replace(',Endofline',"\r\n", $data);
	$data = str_replace('<div contenteditable="">',"", $data);
	$data = str_replace('</div>',"", $data);
	
	//Opens file to write the data to
	$file= fopen($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt',"w");
	
	//Writes the data to the file
	fwrite($file, $data);
	
	//Closes the file
	fclose($file);

	//Takes the new .txt file and updates the information in the database.
	include 'change_data_submit.php';

	//Redirects the user back to edit_data.php
	header('Location: edit_data.php');
?>