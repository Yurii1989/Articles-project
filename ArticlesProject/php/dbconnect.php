<?php 

	$db = 'articles-project';
	$host = '127.0.0.1';
	$username = 'root';
	$password = '';



$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];
try {
  $connection = new PDO($dsn, $username, $password, $options);
} catch (Exception $e) {
  error_log($e->getMessage());
  exit('Something weird happened'); 
}


//Function returns an Array with results from DB
function GetFromDBWithId($Id, $connectionIn) {
	$SQL = $connectionIn->prepare('SELECT * FROM `article` WHERE id = :Id');
	$SQL->bindParam(':Id', $Id, PDO::PARAM_INT);
	$SQL->execute();
	$SQL->setFetchMode(PDO::FETCH_ASSOC);
	$abc = $SQL->fetchAll();
	return $abc;
}

?>
