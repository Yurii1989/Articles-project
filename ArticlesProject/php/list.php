<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';
include 'header.php';
include 'footer.php';

if (empty($_SESSION)) {
    echo "You are not logged in<br>
<a href='login.php'>Go to the Login page</a>";
} else {

//FillIn SQL //////////////////////
$SQL = $connection->prepare('SELECT * FROM `article`');
$SQL->execute();
$SQL->setFetchMode(PDO::FETCH_ASSOC);
//print_r($SQL->rowCount());
$result = $SQL->fetchAll();
//var_dump($_SESSION);

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
    echo "<nav class='navbar navbar-expand-lg navbar-light bg-light fixed-top justify-content-end'>";
    echo "<h4>Welcome back, ".$_SESSION['username'].".</h4>";
    if ($_SESSION['role'] === 'content_editor') {echo "<p class='flexy'><a class='btn btn-outline-success m-2' href='new.php'>Create new article</a></p>";}
    echo "<a class='btn btn-outline-success m-2' href='search_form.php'>Search for an article</a>";
    echo "
    <form method='post'>
    <input type='hidden' name='logout' value='123'>
        <button type='submit' class='btn btn-outline-success m-2' name='any'>Logout</button>
       </form>
    <br>";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['logout'] === '123') {
        session_unset();
        header("location: login.php");
    }

    //echo "<a class='btn btn-outline-success m-2' href='login.php'>Exit</a></p></div>";
    echo "</nav>";

    //echo "<div class='row'>";

for ($count = 0; $count < count($result); $count++) {
  
	if(is_array($result[$count]) == true ) {

	    //print_r($_SESSION);
        //echo "<div class='column'>";
        //echo "<div class='hovereffect'>";
	    if ($_SESSION['role'] === 'reader') {
            echo "<article class='wrapper'>
            <a href='view.php?id=".$result[$count]['id']."'>"."<h2>".$result[$count]['title']."</h2></a>".
                "<img src='".$result[$count]['img']."'>".
                "<p>".$result[$count]['description']."</p></article>";
        } else {
        echo "<article class='wrapper'>
        <a href='view.php?id=".$result[$count]['id']."'>"."<h2>".$result[$count]['title']."</h2></a>"."<img src='".$result[$count]['img']."'>".
        "<p>".$result[$count]['description']."</p></article>
        <form action='".$_SERVER["PHP_SELF"]."' method='post'>
        <div class='custom-control custom-checkbox my-1 mr-sm-2' id='delete'>
        <button type='submit' class='btn btn-primary my-1' name='delete' value='".$result[$count]['id']."'>Delete article</button>
        </div></form>";
	}
    }

}
    //echo "</div></div>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo $_POST;
    $SQL = $connection->prepare('DELETE FROM article WHERE id=:Id');
    $SQL->bindParam(':Id', $_POST['delete'], PDO::PARAM_INT);
    $SQL->execute();
    //header("location: list.php");
}
}
?>



