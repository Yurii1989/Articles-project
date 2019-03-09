<?php

session_start();

echo "Session Name: ".$_GET['nameforthissession'];
$_SESSION['nameforthissession'] = $_GET['nameforthissession'];
$_SESSION['anotherone'] = "anotherone";
