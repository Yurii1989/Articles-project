<?php 
session_start();
include 'dbconnect.php';
include 'functions.php';

if($_SESSION["loggedin"] == true) {
	
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//AddToDB //////////////////////////////////////
        $SQL = $connection->prepare('UPDATE article SET
        img = :img,
        title = :title,
        pub_date = :time,
        description = :descr WHERE id = :Id');
        if(!empty($_FILES['image']['name'])) {
            $imageResult = ProcessUploadedFile($_FILES);
            $SQL->bindParam(':img', $imageResult,PDO::PARAM_STR);
        } else {
            $SQL = $connection->prepare('UPDATE article SET
            title = :title,
            pub_date = :time,
            description = :descr WHERE id = :Id');
            $abc = GetFromDBWithId($_POST['id'],$connection);
        }

        $SQL->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
        $newTime = new DateTime();
        $date = $newTime->format('Y-m-d H:i:s');
        $SQL->bindParam(':time', $date, PDO::PARAM_STR);
        $SQL->bindParam(':descr', $_POST['description'], PDO::PARAM_STR);
        $SQL->bindParam(':Id', $_POST['id'], PDO::PARAM_INT);
	    $SQL->execute();
	    $updatedDB = $SQL->fetchAll();
	    print_r($updatedDB);

		
		
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


$result = GetFromDBWithId($_GET['id'],$connection);
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
	


