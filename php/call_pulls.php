<?php
/*
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	call_pulls.php:
##	A php document that pulls any data based off of the filters in the data pull page, this will print to the external file
#####################################################################################################################################
*/
	$file= fopen($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt',"w+");
	fclose($file);
	$firstname1 = $_POST['firstname1'];
	$firstname2 = $_POST['firstname2'];
	$firstname3 = $_POST['firstname3'];
	$lastname1 = $_POST['lastname1'];
	$lastname2 = $_POST['lastname2'];
	$lastname3 = $_POST['lastname3'];
	$mnumber1 = $_POST['mnumber1'];
	$mnumber2 = $_POST['mnumber2'];
	$mnumber3 = $_POST['mnumber3'];
	$email1 = $_POST['email1'];
	$email2 = $_POST['email2'];
	$email3 = $_POST['email3'];
	$year1 = $_POST['year1'];
	$year2 = $_POST['year2'];
	$year3 = $_POST['year3'];
	$EGD1 = $_POST['EGD1'];
	$EGD2 = $_POST['EGD2'];
	$EGD3 = $_POST['EGD3'];
	$major1 = $_POST['major1'];
	$major2 = $_POST['major2'];
	$major3 = $_POST['major3'];
	$minor1 = $_POST['minor1'];
	$minor2 = $_POST['minor2'];
	$minor3 = $_POST['minor3'];
	$advisor1 = $_POST['advisor1'];
	$advisor2 = $_POST['advisor2'];
	$advisor3 = $_POST['advisor3'];
	$prehealth = $_POST['prehealth'];
	$preengineering = $_POST['preengineering'];

	//includes the select all statement by filter name filter
	if($firstname1!= ''){
		$firstname = $firstname1;
		include 'first_name_pull.php';
	}
	if($firstname2!= ''){
		$firstname = $firstname2;
		include 'first_name_pull.php';
	}
	if($firstname3!= ''){
		$firstname = $firstname3;
		include 'first_name_pull.php';
	}
	//includeutes the select all statement by last name filter
	if($lastname1 != ''){
		$lastname = $lastname1;
		include 'last_name_pull.php';
	}
	if($lastname2 != ''){
		$lastname = $lastname2;
		include 'last_name_pull.php';
	}
	if($lastname3 != ''){
		$lastname = $lastname3;
		include 'last_name_pull.php';
	}
	//includeutes the select all statement by m number filter
	if($mnumber1!=NULL){
		$mnumber = $mnumber1;
		include 'm_num_pull.php';
	}
	if($mnumber2!=NULL){
		$mnumber = $mnumber2;
		include 'm_num_pull.php';
	}
	if($mnumber3!=NULL){
		$mnumber = $mnumber3;
		include 'm_num_pull.php';
	}
	//includeutes the select all statement by email filter
	if($email1!=''){
		$email=$email1;
		include 'mnu_email_pull.php';
	}
	if($email2!=''){
		$email=$email2;
		include 'mnu_email_pull.php';
	}
	if($email3!=''){
		$email=$email3;
		include 'mnu_email_pull.php';
	}
	//includeutes the select all statement by entry year filter
	if($year1!=''){
		$year=$year1;
		include 'start_date_pull.php';
	}
	if($year2!=''){
		$year=$year2;
		include 'start_date_pull.php';
	}
	if($year3!=''){
		$year=$year3;
		include 'start_date_pull.php';
	}
	//includeutes the select all statement by expected grad date
	if($EGD1!=''){
		$EGD=$EGD1;
		include 'expected_grad_pull.php';
	}
	if($EGD2!=''){
		$EGD=$EGD2;
		include 'expected_grad_pull.php';
	}
	if($EGD3!=''){
		$EGD=$EGD3;
		include 'expected_grad_pull.php';
	}
	//includes the select all statement by major filter
	if($major1!='NULL'){
		$major=$major1;
		include 'majors_pull.php';
	}
	if($major2!='NULL'){
		$major=$major2;
		include 'majors_pull.php';
	}
	if($major3!='NULL'){
		$major=$major3;
		include 'majors_pull.php';
	}
	//includes the select all statement by minors filter
	if($minor1!=''){
		$minor=$minor1;
		include 'minor_pull.php';
	}
	if($minor2!=''){
		$minor=$minor2;
		include 'minor_pull.php';
	}
	if($minor3!=''){
		$minor=$minor3;
		include 'minor_pull.php';
	}
	//includes the select all statement by advisor filter
	if($advisor1!=''){
		$advisor=$advisor1;
		include 'advisor_pull.php';
	}
	if($advisor2!=''){
		$advisor=$advisor2;
		include 'advisor_pull.php';
	}
	if($advisor3!=''){
		$advisor=$advisor3;
		include 'advisor_pull.php';
	}
	//includes the select all statement by pre-engineering filter
	if($preengineering !='N'){
		$preengineeringvar = $preengineering;
		include 'pre_engineering.php';
	}
	//includes the select all statement by pre-health filter
	if($prehealth !='N'){
		$prehealthvar=$prehealth;
		include 'pre_med.php';
	}
	fopen($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt',"a+");	
	$lines=file($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt');
	$results=array_unique($lines);
	fclose($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt');

	$file= fopen($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt',"w+");
	fwrite($file, 'M Number,First Name,Last Name,First Major,Second Major,Third Major,First Minor,Second Minor,Advisor,Pre-Health,Pre-Engineering,MNU Start Date,Expected Graduation,MNU Email,Date Submitted'.PHP_EOL);
	$i=0;	
	foreach($results as $result){
		fwrite($file,$result);
	}
		
	fclose($file);

	header('Location: edit_data.php');
?>