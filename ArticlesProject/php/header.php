<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php $fileName = substr($_SERVER['PHP_SELF'], 38);
        $title = explode('.', $fileName);
        echo ($title[0]); ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
	<div class="container">

<?php if(isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] == true) echo "<div class='row'><p><a href='login.php'> login.php  </a> </p></div>"; ?>

