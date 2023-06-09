<!--
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	student_view_survey.php:
##	A form-object survey that requires all fields to be filled out in order to be submitted. The form is then sent to 
##	survey_submit.php to be processed. Page then advances to student_view_thanks.html.
#####################################################################################################################################
-->
<!DOCTYPE html>
<html lang="en-US">
<!--CSS stylesheet-->
<link rel="stylesheet" text ="text/css" href="/css/masterStyles.css">
<head>
	<title>Student Survey - NHMS Survey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="header"></div>
	<main>
		<!-- This the the survey for the students to fill out that collects information.  it collects first name, last name, m number,
		email, year, expected graduation date, pre-health, pre-engineering, major(up to three), minor(up to two), and advisor. -->
		<div class="content">
			<center>
			<p> Thank you for filling out this survey.<br> The information you provide goes towards improving the NHMS department.</p>
			
			<form name="student_survey" action="/php/survey_submit.php" method="post" onsubmit="return validation()">
				<label>First Name:</label>
				<input type="text" name="firstname" onclick="hidePopups()" required>
				<div class="popup">
					<span class="popuptext" id="fnPopup">Please use valid characters only in this field</span>
				</div>
				
				<label>Last Name:</label>
				<input type="text" name="lastname" onclick="hidePopups()" required>
				<div class="popup">
					<span class="popuptext" id="lnPopup">Please use valid characters only in this field</span>
				</div>
				
				<label>M Number: #M</label>
				<input type="number" name="mnumber" min="0" max="99999999" required>
				
				<label>MNU Email (everything before @mnu.edu):</label>
				<input type="text" name="email" onclick="hidePopups()" required>
				<div class="popup">
					<span class="popuptext" id="emPopup">Please remove any invalid characters in this field</span>
				</div>
				
				<label>Year-Month Started at MNU:</label>
				<input type="month" name="year" placeholder="yyyy-mm" required>
				<div class="popup">
					<span class="popuptext" id="sdPopup">Please enter as yyyy-mm</span>
				</div>
				
				<label>Expected Graduation Year-Month:</label>
				<input type="month" name="EGD" placeholder="yyyy-mm" required>
				<div class="popup">
					<span class="popuptext" id="gdPopup">Please enter as yyyy-mm</span>
				</div>
				
				<label>Pre-Med:</label>
				<input type="checkbox" class="larger" name="pre-health" >
				
				<label>Pre-Engineering:</label>
				<input type="checkbox" class="larger" name="pre-engineering" >

				<label>1st Major:</label>
				<!--Creates a Dropdown populated with the database entries-->
				<select name="major1" required>
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
				<!-- This button enables people to see a second major and then hides this button. -->
				<button class="styledButton" type="button" onclick="this.style.display='none'; pickFunction(1);">Add Major</button>
				<div id="myDIV" style = "display: none">
					<label>2nd Major:</label>
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
					<!-- This button enables students to enter a third major if they need it and then hides the button -->
					<button class="styledButton" type="button" onclick="this.style.display='none'; pickFunction(2)">Add Major</button>
				</div>
				
				<div id="myDIV2" style = "display: none">
					<label>3rd Major:</label>
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
					<div class="alert">Maximum of 3 majors</div>
				</div>
				
				<label>1st Minor:</label>
				<input type="text" name="minor1" onclick="hidePopups()">
				<div class="popup">
				<span class="popuptext" id="m1Popup">Please use valid characters only in this field</span>
				</div>
				<!-- This button enables students to add a second minor if they need to. -->
				<button class="styledButton" type="button" onclick="this.style.display='none'; pickFunction(3)">Add Minor</button>
				
				<div id="myDIV3" style = "display: none">
					<label>2nd Minor:</label>
					<input type="text" name="minor2" onclick="hidePopups()">
					<div class="popup">
					<span class="popuptext" id="m2Popup">Please use valid characters only in this field</span>
					</div>
					<div class="alert">Maximum of 2 minors</div>
				</div>
				
				<label>Advisor:</label>
				<select name="advisor" required>
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
				<br>
				<br>
					<input class="styledButton" type="submit" value="Submit Survey">
			</form>
		</div>

		<script>
			var y=0;
			<!-- This function sets decides which myDiv it is going to show depending on which button is clicked.  it calls myFunction -->
			function pickFunction(y){
				if (y==1){
					var x = document.getElementById("myDIV");
					myFunction(x);
				}
				else if (y==2){
					var x = document.getElementById("myDIV2");
					myFunction(x);
				}
				else if (y==3){
					var x = document.getElementById("myDIV3");
					myFunction(x);
				}
			}
			<!-- This function actually shows the second and third major and second minor.  it is called in pickFunction -->
			function myFunction(x) {
				if (x.style.display == "none") {
					x.style.display = "block";
				}
				else {
					x.style.display = "none";
				}
			}
			
			function validation() { //this function should be called on submit before the php form is submitted.
				var firstname = document.getElementsByName("firstname")[0].value;
				var lastname = document.getElementsByName("lastname")[0].value;
				var email = document.getElementsByName("email")[0].value;
				var year = document.getElementsByName("year")[0].value;
				var EGD = document.getElementsByName("EGD")[0].value;
				var minor1 = document.getElementsByName("minor1")[0].value;
				var minor2 = document.getElementsByName("minor2")[0].value;
				
				var valid = true;
				var valid_chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
				var valid_chars_email = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()`~-_=+[{]}\|;:,<.>/?";
				var valid_nums = "1234567890";
				var valid_dash = "-";
				var i;
				
				for (i = 0; i < firstname.length; i++){
					if (!valid_chars.includes(firstname[i])){
						valid = false;
					}
				}
				if (i == 0){valid = false;}
				
				if (!valid){
					document.getElementsByName("firstname")[0].scrollIntoView();
					var popup = document.getElementById("fnPopup");
					popup.style.visibility = "visible";
					popup.classList.toggle("show");
					return valid;
				}
				
				
				i = 0;
				for (i = 0; i < lastname.length; i++){
					if (!valid_chars.includes(lastname[i])){
						valid = false;
					}
				}
				if (i == 0){valid = false;}
				
				if (!valid){
					document.getElementsByName("lastname")[0].scrollIntoView();
					var popup = document.getElementById("lnPopup");
					popup.style.visibility = "visible";
					popup.classList.toggle("show");
					return valid;
				}
				
				
				i = 0;
				for (i = 0; i < email.length; i++){
					if (!valid_chars_email.includes(email[i])){
						valid = false;
					}
				}
				if (i == 0){valid = false;}
				
				if (!valid){
					document.getElementsByName("email")[0].scrollIntoView();
					var popup = document.getElementById("emPopup");
					popup.style.visibility = "visible";
					popup.classList.toggle("show");
					return valid;
				}
				
				
				if (year.length != 7)				{valid = false;}
				if (!valid_nums.includes(year[0]))	{valid = false;}
				if (!valid_nums.includes(year[1]))	{valid = false;}
				if (!valid_nums.includes(year[2]))	{valid = false;}
				if (!valid_nums.includes(year[3]))	{valid = false;}
				if (!valid_dash.includes(year[4]))	{valid = false;}
				if (!valid_nums.includes(year[5]))	{valid = false;}
				if (!valid_nums.includes(year[6]))	{valid = false;}
				
				if (!valid){
					document.getElementsByName("year")[0].scrollIntoView();
					var popup = document.getElementById("sdPopup");
					popup.style.visibility = "visible";
					popup.classList.toggle("show");
					return valid;
				}
				
				
				if (EGD.length != 7)				{valid = false;}
				if (!valid_nums.includes(EGD[0]))	{valid = false;}
				if (!valid_nums.includes(EGD[1]))	{valid = false;}
				if (!valid_nums.includes(EGD[2]))	{valid = false;}
				if (!valid_nums.includes(EGD[3]))	{valid = false;}
				if (!valid_dash.includes(EGD[4]))	{valid = false;}
				if (!valid_nums.includes(EGD[5]))	{valid = false;}
				if (!valid_nums.includes(EGD[6]))	{valid = false;}
				
				if (!valid){
					document.getElementsByName("EGD")[0].scrollIntoView();
					var popup = document.getElementById("gdPopup");
					popup.style.visibility = "visible";
					popup.classList.toggle("show");
					return valid;
				}
				
				
				i = 0;
				for (i = 0; i < minor1.length; i++){
					if (!valid_chars.includes(minor1[i])){
						valid = false;
					}
				}
				if (!valid){
					document.getElementsByName("minor1")[0].scrollIntoView();
					var popup = document.getElementById("m1Popup");
					popup.style.visibility = "visible";
					popup.classList.toggle("show");
					return valid;
				}
				
				
				i = 0;
				for (i = 0; i < minor2.length; i++){
					if (!valid_chars.includes(minor2[i])){
						valid = false;
					}
				}				
				if (!valid){
					document.getElementsByName("minor2")[0].scrollIntoView();
					var popup = document.getElementById("m2Popup");
					popup.style.visibility = "visible";
					popup.classList.toggle("show");
					return valid;
				}
				
				
				return valid;
			}
			
			function hidePopups() {
				var fnPopup = document.getElementById("fnPopup");
				var lnPopup = document.getElementById("lnPopup");
				var emPopup = document.getElementById("emPopup");
				var sdPopup = document.getElementById("sdPopup");
				var gdPopup = document.getElementById("gdPopup");
				var m1Popup = document.getElementById("m1Popup");
				var m2Popup = document.getElementById("m2Popup");
				
				fnPopup.style.visibility = "hidden";
				lnPopup.style.visibility = "hidden";
				emPopup.style.visibility = "hidden";
				sdPopup.style.visibility = "hidden";
				gdPopup.style.visibility = "hidden";
				m1Popup.style.visibility = "hidden";
				m2Popup.style.visibility = "hidden";
			}
		</script>
	</main>
	<div class ="footer"></div>
</body>
</html>

