<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';
include 'header.php';

//FillIn SQL //////////////////////
$SQL = $connection->prepare('');
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
print_r($SQL->rowCount());
$result = $SQL->fetchAll();

//var_dump($result);
if($_SESSION["loggedin"] == true) echo "<div class='row'><p><a href='new.php'</a> new.php </p></div>";

for ($count = 0; $count < count($result); $count++) { 
	echo "<div class='row'>";

  
	if(is_array($result[$count]) == true ) {
	//Loop and Create HTML

	}
	echo "</div>";
}



