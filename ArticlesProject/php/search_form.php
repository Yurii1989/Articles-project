<?php
session_start();
include "dbconnect.php";
include "header.php";
include "functions.php";

if (!isset($_POST['submit'])) {
    $Token = CreateToken();
    $_SESSION['token'] = $Token[0];
    ?>

<form method="post" action="search_form.php">
    <label for="titletosearch">Search for particular title: </label>
    <input type="text" name="titletosearch" class="form-control">
    <br/>
    <input type="hidden" name="token" value="<?php echo $Token[0]; ?>">
    <input type="submit" name="submit" value="Go" class="btn btn-primary"/>
</form>

<?php
} else {
    if (empty($_POST['titletosearch'])) {
        echo "Please enter a title name above<br>
            <p><a href='search_form.php'</a> go back to search </p>";
    } else {
        //var_dump($_POST['titletosearch']);
        //echo "searching for ".$_POST['titletosearch'];
        if ($_POST['token'] == $_SESSION['token']) {
        $SearchString = "%".$_POST['titletosearch']."%";

        $SQL = $connection->prepare('SELECT * FROM article WHERE title LIKE :TITLE');
        $SQL->bindParam(':TITLE', $SearchString, PDO::PARAM_STR);
        $SQL->execute();
        $SQL->setFetchMode(PDO::FETCH_ASSOC);
        //print_r($SQL->rowCount());
        $result = $SQL->fetchAll();
        //var_dump($result);
        if ($result == []) {
            echo "Nothing found<br>
            <p><a href='search_form.php'</a> go back to search </p>";
        } else {
        for ($ArrayIndex = 0; $ArrayIndex < count($result); $ArrayIndex++) {
            echo "Article: ".$result[$ArrayIndex]['title']."<br>
            <p><a href='view.php?id=".$result[$ArrayIndex]['id']."'>Look inside</a></p>";
        }
        }
   } else {
            echo "Something wrong happened, please try again<br>
            <p><a href='search_form.php'</a> go back to search </p>";
        }
    }
}
