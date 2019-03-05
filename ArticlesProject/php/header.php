<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            border: 0;
        }
        body { font: 14px sans-serif; }
        .wrapper{ width: 70%; padding: 20px; border: 1px solid grey; border-radius: 10px; margin: 10px auto;}
        .btn {width: 15%; display: flex; margin: 5px auto; padding-top: 15px;}
        .btn:hover {border: 1px solid blue;}
    </style>
</head>
<body>
	<div class="container">

<?php if(isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] == true) echo "<div class='row'><p><a href='login.php'> login.php  </a> </p></div>"; ?>

