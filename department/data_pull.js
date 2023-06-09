/*
####################################################################################################################################
##	NHMS Graduation Information Survey
##
##	Software Engineering in Practice class of Fall 2020
##	Members: Andrew Brown, Benjamin Downey, Gunnar Joe Brown, Luke Evans, Ryan Sattler
##
##	data_pull.js:
##	Holds the Javascript functions used by data_pull.php
#####################################################################################################################################
*/
var y=0;
//This function sets decides which myDiv it is going to show depending on which button is clicked. It calls myFunction
function firstnamefunction(){
	var x = document.getElementById("myDIV");
	var y = document.getElementById("myDIV2");
	var z = document.getElementById("myDIV3");
	if (x.style.display == "none") {
		x.style.display = "block";
	}
	else if (y.style.display == "none") {
		y.style.display = "block";
	}
	else if (z.style.display == "none") {
		z.style.display = "block";
	}
	else {
		x=0;
	}
}

function lastnamefunction(){
	var x = document.getElementById("myDIV4");
	var y = document.getElementById("myDIV5");
	var z = document.getElementById("myDIV6");
	if (x.style.display == "none") {
		x.style.display = "block";
	}
	else if (y.style.display == "none") {
		y.style.display = "block";
	}
	else if (z.style.display == "none") {
		z.style.display = "block";
	}
	else {
		x=0;
	}
}

function mnumberfunction(){
	var x = document.getElementById("myDIV7");
	var y = document.getElementById("myDIV8");
	var z = document.getElementById("myDIV9");
	if (x.style.display == "none") {
		x.style.display = "block";
	}
	else if (y.style.display == "none") {
		y.style.display = "block";
	}
	else if (z.style.display == "none") {
		z.style.display = "block";
	}
	else {
		x=0;
	}
}

function emailfunction(){
	var x = document.getElementById("myDIV10");
	var y = document.getElementById("myDIV11");
	var z = document.getElementById("myDIV12");
	if (x.style.display == "none") {
		x.style.display = "block";
	}
	else if (y.style.display == "none") {
		y.style.display = "block";
	}
	else if (z.style.display == "none") {
		z.style.display = "block";
	}
	else {
		x=0;
	}
}

function yearfunction(){
	var x = document.getElementById("myDIV13");
	var y = document.getElementById("myDIV14");
	var z = document.getElementById("myDIV15");
		if (x.style.display == "none") {
			x.style.display = "block";
		}
	else if (y.style.display == "none") {
		y.style.display = "block";
	}
	else if (z.style.display == "none") {
		z.style.display = "block";
	}
	else {
		x=0;
	}
}

function egdfunction(){
	var x = document.getElementById("myDIV16");
	var y = document.getElementById("myDIV17");
	var z = document.getElementById("myDIV18");
	if (x.style.display == "none") {
		x.style.display = "block";
	}
	else if (y.style.display == "none") {
		y.style.display = "block";
	}
	else if (z.style.display == "none") {
		z.style.display = "block";
	}
	else {
		x=0;
	}
}

function majorfunction(){
	var x = document.getElementById("myDIV19");
	var y = document.getElementById("myDIV20");
	var z = document.getElementById("myDIV21");
	if (x.style.display == "none") {
		x.style.display = "block";
	}
	else if (y.style.display == "none") {
		y.style.display = "block";
	}
	else if (z.style.display == "none") {
		z.style.display = "block";
	}
	else {
		x=0;
	}
}

function minorfunction(){
	var x = document.getElementById("myDIV22");
	var y = document.getElementById("myDIV23");
	var z = document.getElementById("myDIV24");
	if (x.style.display == "none") {
		x.style.display = "block";
	}
	else if (y.style.display == "none") {
		y.style.display = "block";
	}
	else if (z.style.display == "none") {
		z.style.display = "block";
	}
	else {
		x=0;
	}
}

function advisorfunction(){
	var x = document.getElementById("myDIV25");
	var y = document.getElementById("myDIV26");
	var z = document.getElementById("myDIV27");
	if (x.style.display == "none") {
		x.style.display = "block";
	}
	else if (y.style.display == "none") {
		y.style.display = "block";
	}
	else if (z.style.display == "none") {
		z.style.display = "block";
	}
	else {
		x=0;
	}
}

function reloadPage() {
	location.reload();
}