<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';

if($_SESSION["loggedin"] == true) {
	
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//AddToDB //////////////////////////////////////

//ProcessFile
		
		
if($SQL->execute()) {
header("Location: view.php?id=$_POST[id]"); /* Redirect browser */
}
else {
echo "Error in Insert";
print_r($SQL->errorInfo());
$SQL->debugDumpParams();
var_dump($_POST);
}

}

else {
include 'header.php';


$result = GetFromDBWithId($_GET[id],$connection);
var_dump($result);
?>
		<form method="POST" action="edit.php" enctype="multipart/form-data">
		    <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?? ''; ?>"
			<div class="form-group">
			    <label for="title">Tip a title for your project</label>
			    <input class="form-control" type="text" name="title" value="<?php echo $result[0]['title'] ?? ''; ?>"></input>
			</div>
			
			<div class="form-group">
			    <label for="description">Define a description for your project</label>
			    <textarea class="form-control" name="description"><?php echo $result[0]['description'] ?? ''; ?></textarea>
			</div>
		
			<div class="form-group">
			    <label for="image">Choose an image for your project</label>
			    <input class="form-control" type="file" name="image"></input>
			</div>
			<div class="form-group cc">
		    	<button class="btn btn-default" type="submit">Submit</button>
			</div>
		</form>

<?php
}

	
	}
	


