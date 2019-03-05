<?php 


function ProcessUploadedFile($FileObj){
		$UpLoadDir = "../storage";
		// MimeType Checks
		var_dump($FileObj);
		//echo exec('whoami');
	    //$tmp_name = basename($FileObj[0]["image"]["name"]);
        move_uploaded_file($FileObj['image']['tmp_name'],$UpLoadDir."/".$FileObj['image']['name']);

        return $UpLoadDir."/".$FileObj['image']['name'];

}        
        
