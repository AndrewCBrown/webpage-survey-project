<!--
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	data_pull.html:
##	A page where the department can select what data from the databse to pull and view.
#####################################################################################################################################
-->
<!DOCTYPE html>
<html lang="en-US">
	<!--CSS stylesheet-->
	<link rel="stylesheet" text ="text/css" href="/css/masterStyles.css">
	<head>
		<title>Filter Data - NHMS Survey</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<main>
			<div class="header"></div>
			<div class="content">
				<p>Click below if you want to view all data for current students.</p>
				<form method="POST" action="/php/select_all_pull.php"> 
					<input type="submit" class="styledButton" value="View All Data"/>
				</form>
				<p>Or select what information you would like to pull from the database</p>
				<div class="flex-container">
					<button class="styledButton" onclick="firstnamefunction(1)" >First Name</button>
					<button class="styledButton" onclick="lastnamefunction(4)">Last Name</button>
					<button class="styledButton" onclick="mnumberfunction(7)">M Number</button><br>
					<button class="styledButton" onclick="emailfunction(10)">Email</button>
					<button class="styledButton" onclick="yearfunction(13)">Year Started at MNU</button>
					<button class="styledButton" onclick="egdfunction(16)">Expected Grad Date</button><br>
					<button class="styledButton" onclick="majorfunction(19)">Major</button>
					<button class="styledButton" onclick="minorfunction(22)">Minor</button>
					<button class="styledButton" onclick="advisorfunction(25)">Advisor</button><br><br>			
				</div>
				
				<form method="POST" action="/php/call_pulls.php">
					<label>Pre-Med:</label>
					<input type="hidden" name="prehealth" value="N">
					<input type="checkbox" class="larger" name="prehealth" value="Y">
					
					<label>Pre-Engineering:</label>
					<input type="hidden" name="preengineering" value="N">
					<input type="checkbox" class="larger" name="preengineering" value="Y">
					
					<hr><br><br><br>
					
					<!-- First name 1-->
					<div id="myDIV" style = "display: none">
						<label>First name:</label>
						<input type="text" name="firstname1" ><br><br>
					</div>
					
					<!-- First name 2-->
					<div id="myDIV2" style = "display: none">
						<label>First name:</label>
						<input type="text" name="firstname2" ><br><br>
					</div>
					
					<!-- First name 3-->
					<div id="myDIV3" style = "display: none">
						<label>First name:</label>
						<input type="text" name="firstname3" ><br>
						<div class="alert">Maximum of 3 per category</div><br><br>
					</div>
				 
					<!-- Last Name 1-->
					<div id="myDIV4" style = "display: none">
						<label>Last name:</label>
						<input type="text" name="lastname1" ><br><br>
					</div>
					
					<!-- Last Name 2-->
					<div id="myDIV5" style = "display: none">
						<label>Last name:</label>
						<input type="text" name="lastname2" ><br><br>
					</div>
					
					<!-- Last Name 3-->
					<div id="myDIV6" style = "display: none">
						<label>Last name:</label>
						<input type="text" name="lastname3" ><br>
						<div class="alert">Maximum of 3 per category</div><br><br>
					</div>

					<!-- M number 1-->
					<div id="myDIV7" style = "display: none">
						<label>M number: #M</label>
						<input type="hidden" name="mnumber1" value="NULL">
						<input type="number" name="mnumber1" min="0" max="99999999"><br><br>
					</div>
					
					<!-- M number 2-->
					<div id="myDIV8" style = "display: none">
						<label>M number: #M</label>
						<input type="hidden" name="mnumber2" value="NULL">
						<input type="number" name="mnumber2" min="0" max="99999999" ><br><br>
					</div>
					
					<!-- M number 3-->
					<div id="myDIV9" style = "display: none">
						<label>M number: #M</label>
						<input type="hidden" name="mnumber3" value="NULL">
						<input type="number" name="mnumber3" min="0" max="99999999" ><br>
						<div class="alert">Maximum of 3 per category</div><br><br>
					</div>

					<!-- Email 1-->
					<div id="myDIV10" style = "display: none">
						<label>Email(mnu email):</label>
						<input type="text" name="email1" ><br><br>
					</div>
					
					<!-- Email 2-->
					<div id="myDIV11" style = "display: none">
						<label>Email(mnu email):</label>
						<input type="text" name="email2" ><br><br>
					</div>
					
					<!-- Email 3-->
					<div id="myDIV12" style = "display: none">
						<label>Email(mnu email):</label>
						<input type="text" name="email3" ><br>
						<div class="alert">Maximum of 3 per category</div><br><br>
					</div>
				  
					<!-- Year started AT MNU 1-->
					<div id="myDIV13" style = "display: none">
						<label>Year Started at MNU:</label>
						<input type="month" name="year1" ><br><br>
					</div>
					
					<!-- Year started AT MNU 2-->
					<div id="myDIV14" style = "display: none">
						<label>Year Started at MNU:</label>
						<input type="month" name="year2" ><br><br>
					</div>
					
					<!-- Year started AT MNU 3-->
					<div id="myDIV15" style = "display: none">
						<label>Year Started at MNU:</label>
						<input type="month" name="year3" ><br>
						<div class="alert">Maximum of 3 per category</div><br><br>
					</div>
				  
					<!-- Expected Grad date 1-->
					<div id="myDIV16" style = "display: none">
						<label>Expected Graduation Date:</label>
						<input type="month" name="EGD1" ><br><br>
					</div>
					
					<!-- Expected Grad date 2-->
					<div id="myDIV17" style = "display: none">
						<label>Expected Graduation Date:</label>
						<input type="month" name="EGD2" ><br><br>
					</div>
					
					<!-- Expected Grad date 3-->
					<div id="myDIV18" style = "display: none">
						<label>Expected Graduation Date:</label>
						<input type="month" name="EGD3" ><br>
						<div class="alert">Maximum of 3 per category</div><br><br>
					</div>
				  
					<!-- Major 1-->
					<div id="myDIV19" style = "display: none">
						<label>Major:</label>
						<!--pre engineering  pre health checkbox-->
						<select name="major1" >
							<!--
							PHP Code from other .php files that 
								1st: Creates a connection to the database
								2nd: Creates the dropdown options from the query results
								3rd: Closes connection
							-->
							<?php 
									include $_SERVER['DOCUMENT_ROOT'].'/php/dbConn.php';
									include $_SERVER['DOCUMENT_ROOT'].'/php/survey_dropdown_majors.php';
									$conn = null;
							?>	
						</select>
						<br>
						<br>
					</div>
					
					<!-- Major 2-->
					<div id="myDIV20" style = "display: none">
						<label>Major:</label>
						<select name="major2">
							<!--
							PHP Code from other .php files that 
								1st: Creates a connection to the database
								2nd: Creates the dropdown options from the query results
								3rd: Closes connection
							-->
							<?php 
								include $_SERVER['DOCUMENT_ROOT'].'/php/dbConn.php';
								include $_SERVER['DOCUMENT_ROOT'].'/php/survey_dropdown_majors.php';
								$conn = null;
							?>
						</select>
						<br>
						<br>
					</div>
					
					<!-- Major 3-->
					<div id="myDIV21" style = "display: none">
						<label>Major:</label>
						<select name="major3">
							<!--
							PHP Code from other .php files that 
								1st: Creates a connection to the database
								2nd: Creates the dropdown options from the query results
								3rd: Closes connection
							-->
							<?php 
								include $_SERVER['DOCUMENT_ROOT'].'/php/dbConn.php';
								include $_SERVER['DOCUMENT_ROOT'].'/php/survey_dropdown_majors.php';
								$conn = null;
							?>
						</select>
						<br>
						<div class="alert">Maximum of 3 per category</div><br>
					</div>
					
				  
					<!--Minor 1-->
					<div id="myDIV22" style = "display: none">
						<label>Minor:</label>
						<input type="text" name="minor1"><br><br>
					</div>
					
					<!--Minor 2-->
					<div id="myDIV23" style = "display: none">
						<label>Minor:</label>
						<input type="text" name="minor2"><br><br>
					</div>
					
					<!--Minor 3-->
					<div id="myDIV24" style = "display: none">
						<label>Minor:</label>
						<input type="text" name="minor3"><br>
						<div class="alert">Maximum of 3 per category</div><br>
					</div>

					<!--Advisor 1-->
					<div id="myDIV25" style = "display: none">
						<label>Advisor: </label>
						<select name="advisor1" >
							<!--
							PHP Code from other .php files that 
								1st: Creates a connection to the database
								2nd: Creates the dropdown options from the query results
								3rd: Closes connection
							-->
							<?php 
								include $_SERVER['DOCUMENT_ROOT'].'/php/dbConn.php';
								include $_SERVER['DOCUMENT_ROOT'].'/php/survey_dropdown_advisors.php';
								$conn = null;
							?>
						</select>
						<br>
						<br>
					</div>
					
					<!--Advisor 2-->
					<div id="myDIV26" style = "display: none">
						<label>Advisor:</label>
						<select name="advisor2" >
							<!--
							PHP Code from other .php files that 
								1st: Creates a connection to the database
								2nd: Creates the dropdown options from the query results
								3rd: Closes connection
							-->
							<?php 
								include $_SERVER['DOCUMENT_ROOT'].'/php/dbConn.php';
								include $_SERVER['DOCUMENT_ROOT'].'/php/survey_dropdown_advisors.php';
								$conn = null;
							?>
						</select><br><br>
					</div>
					
					<!--Advisor 3-->
					<div id="myDIV27" style = "display: none">
						<label>Advisor:</label>
						<select name="advisor3" >
							<!--
							PHP Code from other .php files that 
								1st: Creates a connection to the database
								2nd: Creates the dropdown options from the query results
								3rd: Closes connection
							-->
							<?php 
								include $_SERVER['DOCUMENT_ROOT'].'/php/dbConn.php';
								include $_SERVER['DOCUMENT_ROOT'].'/php/survey_dropdown_advisors.php';
								$conn = null;
							?>
						</select><br>
						<div class="alert">Maximum of 3 per category</div><br><br>
					</div>
					<button class= "styledButton" type="button" onclick=location.reload()>Reset Filters</button>
					<input type="submit" class="styledButton" value="View Results"/>
				</form>
			</div>
			<div class="footer"></div>
		</main>
		<script src='data_pull.js'></script>
	</body>
	</html>