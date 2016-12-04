/*Nicole Riley 
CSE 154 Section AH 
Homework 4
This is the script for a page that makes a 15 piece puzzle with a background image. There is a 
shuffle button that the user uses to shuffle the pieces of the puzzle into a solvable state so
the user can solve it. There is also a selector that is put in that allows the user to change
the background image of the puzzle. Puzzle pieces that are movable in the puzzle will change
the color of their piece number and border to red and pieces that are movable will move into
the empty space of the puzzle when clicked. 
*/

/*Nicole Riley 
Script for interacting with a fithack page
*/

(function (){
	"use strict";


	/*Sets up event listeners for button pressing and sets up the puzzle pieces and the background.
	selector for the page. */
	window.onload = function() {
		document.getElementById("traps").onclick = printExercises;
		document.getElementById("bi1").onclick = printExercises; 
		document.getElementById("bi2").onclick = printExercises; 
		document.getElementById("pecs").onclick = printExercises; 
		document.getElementById("abs").onclick = printExercises; 
		document.getElementById("delt1").onclick = printExercises; 
		document.getElementById("delt2").onclick = printExercises; 
		document.getElementById("hammy1").onclick = printExercises; 
		document.getElementById("hammy2").onclick = printExercises; 
		document.getElementById("calf1").onclick = printExercises; 
		document.getElementById("calc2").onclick = printExercises; 
		document.getElementById("tri1").onclick = printExercises; 
		document.getElementById("tri2").onclick = printExercises; 
	};

	function printExercises() {
		var muscleGroup = this.title; 
		ajaxRequest("getWorkouts.php?muscleGroup=" + muscleGroup, listExercises);
	}

	function listExercises() {
		if(this.status == 200) {
			var response = JSON.parse(this.responseText); 
			var list_start= document.createElement("ol");
			var exercises = response.exercises; 
			for(var i = 0; i < exercises.length; i++) {
				var item = document.createElement(ul);
				var checkbox = document.createElement(input);
				checkbox.type = "checkbox"; 
				checkbox.name = exercises[i];
			}
		} else {
			alert("server does not like this request"); 
		}
		
	}

	/*Takes in a string representing the url for the ajax request and a function. 
	This function sets up an ajax request, sets the onload function for that request,
	and sends out the ajax request. */
	function ajaxRequest(url, onloadFunction) {
		var ajax = new XMLHttpRequest(); 
		ajax.onload = onloadFunction; 
		ajax.open("GET", url, true);
		ajax.send(); 
	}

})();