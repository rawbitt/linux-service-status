<!DOCTYPE html>
<html lang="en">
<head>
	<title>Status</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="css/wowtalents.css">
	<style>
	@import url('https://fonts.googleapis.com/css?family=PT+Sans');
	@media(min-width:60em){html{font-size: 100%}}
	</style>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/solid.css" integrity="sha384-r/k8YTFqmlOaqRkZuSiE9trsrDXkh07mRaoGBMoDcmA58OHILZPsk29i2BsFng1B" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/fontawesome.css" integrity="sha384-4aon80D8rXCGx9ayDt85LbyUHeMWd3UiBaWliBlJ53yzm9hqN21A+o1pqoyK04h+" crossorigin="anonymous">	
	<link rel="stylesheet" type="text/css" href="style.css"/>	
</head>

<h1>Service Status</h1>

<?php

//Check last cache time
$filename = 'cache.json';
if (file_exists($filename)) {
    echo "<div id='last-cache'>Last generated: " . date ("F d Y H:i:s.", filemtime($filename)) . "</div>";
}

// Get the contents of the JSON file 
$strJsonFileContents = file_get_contents($filename);

// Convert to array 
$array = json_decode($strJsonFileContents, true);

// Loop through array and print results
echo "<div id='container'><ul>";
foreach ($array as $key => $value) {
    //echo $key . " = " . $value . "<br>";

	if (preg_match("/Active: inactive/", $value)) {
		$state = "disabled"; 
		$icon = "fas fa-pause-circle";
	}
	else if (preg_match("/Active: active/", $value)) {
		$state = "active"; 
		$icon = "fas fa-check"; 
	}
	else {
		$state = "error";
		$icon = "fas fa-exclamation-circle";
	}

	echo "<li class ='hr-start'>
        <ul>
            <li class='".$state."-li' title='".$key."'><h3><span class='".$state."-fa'><i class='".$icon."'></i></span>".$key."</h3></li>			
        </ul>
    </li>";
}
echo "</ul>";
?>
</div>
</body>
</html>
