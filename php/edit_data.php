<!--
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	edit_data.php:
##	An html file that allows you to see data pulled and edit it or download it if need be
#####################################################################################################################################
-->
<!DOCTYPE html>
<html lang="en-US">
	<!--CSS stylesheet-->
	<link rel="stylesheet" text ="text/css" href="/css/masterStyles.css">
	<head>
		<title>View Data - NHMS Survey</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<main>
		<div class="header"></div>
		<!-- This part of the code creates two buttons that bring you to different pages. -->
		<div class="content">
			<p>Make changes to data by clicking on the cells you wish to edit</p>
			<p>Make sure to only Capitalize the first letter of each word or it will not work</p>
			<p>Click on "Change Data" to finalize your changes</p>

			<table id="myTable">
				<thead>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</thead>

				<?php
					$file_handle = fopen($_SERVER['DOCUMENT_ROOT'].'/output/student_data.txt', "rb");

					while (!feof($file_handle) ) {
						$line_of_text = fgets($file_handle);
						$parts = explode(',', $line_of_text);
						if ($parts[0] != "") {
							echo "<tr><td><div contenteditable>$parts[0]</div></td>";
							echo "<td><div contenteditable>$parts[1]</div></td>";
							echo "<td><div contenteditable>$parts[2]</div></td>";
							echo "<td><div contenteditable>$parts[3]</div></td>";
							echo "<td><div contenteditable>$parts[4]</div></td>";
							echo "<td><div contenteditable>$parts[5]</div></td>";
							echo "<td><div contenteditable>$parts[6]</div></td>";
							echo "<td><div contenteditable>$parts[7]</div></td>";
							echo "<td><div contenteditable>$parts[8]</div></td>";
							echo "<td><div contenteditable>$parts[9]</div></td>";
							echo "<td><div contenteditable>$parts[10]</div></td>";
							echo "<td><div contenteditable>$parts[11]</div></td>";
							echo "<td><div contenteditable>$parts[12]</div></td>";
							echo "<td><div contenteditable>$parts[13]</div></td>";
							echo "<td><div contenteditable>$parts[14]</div></td></tr>";
						}
					}
					fclose($file_handle);
				?>    
			</table>
			
			<a href="/department/data_pull.php"><button class="styledButton">Go Back</button></a>
			<button class="styledButton" onclick="editdata()">Change Data</button>
			<a href="/output/student_data.txt" download="student_data.txt"><button class="styledButton">Download Data</button></a>
			
			<form style="display:none" action="edit_data_write.php" method= "post">
				<input type="text" id="datavar" name="datavar">
				<input  id ="submit" type="submit" onclick="submit">
			</form>
		</div>
		<div class="footer"></div>
		<script>
		function editdata(){
		  var data="";
		  var r;
		  var c;
		  
		  for (r=1; r<document.getElementById("myTable").rows.length -  1; r++){
			for (c=0; c<document.getElementById("myTable").rows[0].cells.length; c++){
			data +=	document.getElementById("myTable").rows[r].cells[c].innerHTML +",";
			}
			data += 'Endofline';
			document.getElementById("datavar").value = data;
			document.getElementById("submit").click();
			
		  }
		}
		</script>
		</main>
	</body>
</html>
