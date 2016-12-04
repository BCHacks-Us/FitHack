<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 12/3/2016
 * Time: 6:22 PM
 */

$data = "";

    $muscleGroup= "Abdominal";

    $db = new PDO("mysql:dbname=fithack;host=localhost;", "fithack", "BCHacks01!");

    $rows = $db->query("SELECT e.name 
	FROM exercise e
	JOIN muscle_groups g ON g.id = e.muscle_group_id 
	WHERE g.name like '$muscleGroup';");
$exercises = array();
    $i = 0;
    foreach ($rows as $row) {
        $exercises[$i]=$row["name"];
        $data .= "<li><p>
                <input type=\"checkbox\" id=" . $i . " />
                <label for=" . $i . ">". $row["name"] ."</label>
            </p></li>";
        $i++;
    }

?>

<!DOCTYPE html>
<html>
<!--
Workout page
-->
<head>
    <script type="text/javascript" src="fithack.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Exo+2" rel="stylesheet">

    <link rel="stylesheet" href="index.css" type='text/css'>
    <title>BCFitHack</title>
</head>
<body class="row">

<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">FitHack</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="sass.html">Workout 101</a></li>
            <li><a href="collapsible.html">Login</a></li>
        </ul>
    </div>
</nav>

<div id="header" class="col s8 offset-s2 card">
    <h1 class="text center-align">AB WORKOUTS</h1>
    <h5 class="center-align"><a class="h" href="workout_select.html">Back to Muscle Group</a></h5>
    <br>
    <br>
    <br>
    <!--<h2 class="text center-align"> About </h2>-->
    <p class="text"> Build your own weight workout based on muscle area of interest. Click on your muscle area of interest in order to display exercises related to that muscle
        group. Then, when you are done tell this to print to pdf so you can take our workout with you! </p>

    <ul>
        <?php echo $data; ?>
    </ul>

    <Button class="btn">Add Workout To List</Button>

</div>


<!--<div id="infoPage">-->
<!--<h2 class="text">What is Strength and Volume?</h2>-->
<!---->
<!--<button type="button" class="btn btn-primary" id="infoButton">Click Here!</button>-->
<!--</div>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

</body>
</html>