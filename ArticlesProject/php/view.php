<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';
include 'footer.php';
include 'header.php';

//var_dump($_GET);

$result = GetFromDBWithId($_GET['id'],$connection);
//print_r($result);
echo "</div>";
for ($count = 0; $count < count($result); $count++) { 
	if(is_array($result[$count]) == true ) {
        echo "<div class='row' style='width: 80%; margin: 1rem auto;'><div><img src='".$result[$count]['img']."'></div>"."
              <div class='column' style='max-width: 70%'><h2>".$result[$count]['title']."</h2>".
              "<p>".$result[$count]['description']."</p></div></div>";
	}
	if($_SESSION["loggedin"] == true)
        if ($_SESSION['role'] === 'content_editor') {
            echo "<p style='height: 1.5rem; width: 80%; margin: 1rem auto;'><a href='edit.php?id=".$result[$count]['id']."'> Edit this article </a></p>";
        }
	echo "<p style='height: 1.5rem; width: 80%; margin: 1rem auto;'><a href='list.php'><< Go back to the list </a></p>";
}


include 'footer.php';
    
