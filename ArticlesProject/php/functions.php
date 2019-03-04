<?php 


function ProcessUploadedFile($FileObj){
		$UpLoadDir = "../storage/";
		// MimeType Checks
		
		//var_dump($FileObj);
		//echo exec('whoami');
	
		$name = basename($_FILES["image"]["name"][$key]);
        move_uploaded_file($FileObj[tmp_name], "$UpLoadDir/$FileObj[name]");
		return "$UpLoadDir/$FileObj[name]";
}        
        
