<?php
$muscleGroup= $_GET["muscleGroup"];

$db = new PDO("mysql:dbname=fithack;host=localhost;", "fithack", "BCHacks01!");
$rows = $db->query("SELECT e.name 
	FROM exercise e
	JOIN muscle_groups g ON g.id = e.muscle_group_id 
	WHERE g.name like '$muscleGroup';"); 
$exercises = array();
$i = 0; 
foreach ($rows as $row) {
 	$exercises[$i]=$row["name"]; 
 	$i++;
}
$json = array (
	"exercises" => $exercises
);
header("Content-type: application/json"); 
print json_encode($json, JSON_UNESCAPED_UNICODE);
?>