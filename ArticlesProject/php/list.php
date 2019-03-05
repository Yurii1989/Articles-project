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

//var_dump($result);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) echo "<button type=\"button\" class='btn btn-success'><p><a href='new.php'>Create new article</a></p></button>";
$abc = [];
for ($count = 0; $count < count($result); $count++) {
  
	if(is_array($result[$count]) == true ) {
        echo "<article class='wrapper'><a href='view.php?id=".$result[$count]['id']."'>"."<h2>".$result[$count]['title']."</h2></a>"."<img src='".$result[$count]['img']."'>".
        "<p>".$result[$count]['description']."</p></article>
        <form class='form-inline'>
        <div class='custom-control custom-checkbox my-1 mr-sm-2'>
        <input type='checkbox' class='custom-control-input' name='delete[]' value='".$result[$count]['id']."'>
        <label class='custom-control-label' for='customControlInline'>Check to delete</label>
        </div>";

	}

}
$array = $_GET['delete'];
print_r($array);
foreach ($array as $id) {
    echo $id;
    $SQL = $connection->prepare('DELETE FROM article WHERE id=:Id');
    $SQL->bindParam(':Id', $id, PDO::PARAM_INT);
    $SQL->execute();
}
echo "<button type='submit' class='btn btn-primary my-1'>Delete</button>
        </form>";
?>



