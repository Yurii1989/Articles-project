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
    $SQL = $connection->prepare('SELECT * FROM `article`');
    $SQL->execute();
    $SQL->setFetchMode(PDO::FETCH_ASSOC);
    $result = $SQL->fetchAll();

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
        echo "<nav class='navbar navbar-expand-lg navbar-light bg-light fixed-top justify-content-between'>";
        echo "<h4>Welcome back, ".$_SESSION['username'].".</h4><div class='d-flex justify-content-end'>";
        if ($_SESSION['role'] === 'content_editor') {echo "<p class='flexy'><a class='btn btn-outline-primary m-2' href='new.php'>Create new article</a></p>";}
        echo "<p class='flexy'><a class='btn btn-outline-primary m-2' href='search_form.php'>Search for an article</a></p>";
        echo "
        <form method='post' style='height: 54px'>
        <input type='hidden' name='logout' value='123'>
        <button type='submit' class='btn btn-outline-primary m-2' name='any'>Logout</button>
       </form></div>";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['logout']))) {
            session_unset();
            header("location: login.php");
        }

        echo "</nav>";
        echo "<br><br><br>";
        echo "<div class='d-flex flex-wrap'>";
        for ($count = 0; $count < count($result); $count++) {
	        if(is_array($result[$count]) == true ) {
	            if ($_SESSION['role'] === 'reader') {
                    echo "<div class='card w-25'>
                        <div>
                            <img class='card-img-top' src='".$result[$count]['img']."'>
                        </div>
                        <div class='card-body'>
                            <a href='view.php?id=".$result[$count]['id']."'>"."<h3 class='card-title'>".$result[$count]['title']."</h3></a>".
                            "<p>".substr($result[$count]['description'], 0, 100)."...</p>
                        </div>
                     </div>";
                } else {
                    echo "<div class='card w-25'>
                        <div>
                            <img class='card-img-top' src='".$result[$count]['img']."'>
                        </div>
                        <div class='del_biathlette'>
                            <form action='".$_SERVER["PHP_SELF"]."' method='post'>
                                <div class='custom-control custom-checkbox my-1 mr-sm-2' id='delete'>
                                    <button type='submit' class='btn btn-primary my-1' name='delete' value='".$result[$count]['id']."'>Delete article</button>
                                </div>
                            </form>
                        </div>
                        <div class='card-body'>
                            <a href='view.php?id=".$result[$count]['id']."'>"."<h3>".$result[$count]['title']."</h3></a>".
                            "<p>".substr($result[$count]['description'], 0, 100)."...</p>
                        </div>
                     </div>";
	            }
            }

        }
        echo "</div>";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['delete']))) {
            $SQL = $connection->prepare('DELETE FROM article WHERE id=:Id');
            $SQL->bindParam(':Id', $_POST['delete'], PDO::PARAM_INT);
            $SQL->execute();
            header("location: list.php");
        }
}
?>



