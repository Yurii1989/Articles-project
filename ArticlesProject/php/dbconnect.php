<?php 

	$db = 'DbWorkExample';
	$host = 'mysql';
	$username = 'trainer';
	$password = 'trainer';



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
function GetFromDBWithId($Id,$connectionIn) {

}




?>
