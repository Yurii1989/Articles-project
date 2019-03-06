<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';

include 'header.php';

//var_dump($_GET);

$result = GetFromDBWithId($_GET['id'],$connection);
//print_r($result);
echo "<div class='row'>";

for ($count = 0; $count < count($result); $count++) { 
	if(is_array($result[$count]) == true ) {
        echo "<h2>".$result[$count]['title']."</h2>"."<img src='".$result[$count]['img']."'>".
            "<p>".$result[$count]['description']."</p>";
	}
	if($_SESSION["loggedin"] == true) echo "<p><a href='edit.php?id=".$result[$count]['id']."'</a> edit this article </p>
                                            <p><a href='list.php'</a> go back to the list </p>";
}

echo "</div class='row'>";

include 'footer.php';
    
