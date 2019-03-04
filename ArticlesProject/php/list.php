<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';
include 'header.php';

//FillIn SQL //////////////////////
$SQL = $connection->prepare('SELECT * FROM `article`');
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
//print_r($SQL->rowCount());
$result = $SQL->fetchAll();

var_dump($result);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) echo "<div class='row'><p><a href='new.php'>new.php</a></p></div>";
$abc = [];
for ($count = 0; $count < count($result); $count++) { 
	echo "<div class='row'>";
  
	if(is_array($result[$count]) == true ) {
        echo "<a href='view.php?id=".$result[$count]['id']."'>"."<h2>".$result[$count]['title']."</h2></a>"."<img src='".$result[$count]['img']."'>".
        "<p>".$result[$count]['description']."</p>";
	}
	echo "</div>";
}
?>



