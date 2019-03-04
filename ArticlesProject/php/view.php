<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';

include 'header.php';

var_dump($_GET);

$result = GetFromDBWithId($_GET[id],$connection);

echo "<div class='row'>";

for ($count = 0; $count < count($result); $count++) { 
	if(is_array($result[$count]) == true ) {
	//Loop And FillIn HTML//////////////////////////
	}
	if($_SESSION["loggedin"] == true) echo "<p><a href='edit.php?id=".$result[$count][id]."'</a> edit.php </p>";
}

echo "</div class='row'>";

include 'footer.php';
    
