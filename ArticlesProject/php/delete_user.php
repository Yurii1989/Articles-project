<?php

include "dbconnect.php";
include "functions.php";
include "header.php";

if (isset($_GET['deleteId'])) {
    $SQL = $connection->prepare('DELETE FROM users WHERE id=:Id');
    $SQL->bindParam(':Id', $_GET['deleteId'], PDO::PARAM_INT);
    $SQL->execute();
    header('Location: admin.php');
}