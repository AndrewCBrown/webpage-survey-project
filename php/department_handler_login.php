<!--
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	department_handler_login.php:
##	Compares entered username and password to those stored in the database, and returns
#####################################################################################################################################
-->
<?php
include 'dbConn.php';

//This is used to pull the stuff
$username1 = $_POST["username"];
$password1 = $_POST["password"];

//this is the function that checks the username and password to match
function checklogin($username1,$username2, $password1, $password2){
	echo "Made it in?";
	if ($username1==$username2 && $password1==$password2) {
		echo "yes";
		header('Location: https://nhmssurvey.mnu.edu/department/data_pull.php');
	} 
	else {
		echo "no";
		header('Location: https://nhmssurvey.mnu.edu/department/department_view_failed_login.html');
		return 1;
	}
}

//This is where you put the SQL statement
$stmt = 'SELECT USERNAME, PASSWORD FROM LOGIN WHERE USERNAME = \'' . $username1 . '\'';

// this is where the data comes out and is assigned to variables
foreach ($conn->query($stmt) as $row) {
	$username2= $row['USERNAME'];
	$password2= $row['PASSWORD'];
}

//this is the function call
checklogin($username1, $username2, $password1, $password2);

$conn = null;
?>