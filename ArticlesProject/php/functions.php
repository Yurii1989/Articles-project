<?php 


function ProcessUploadedFile($FileObj){
		$UpLoadDir = "../storage";
		// MimeType Checks
		var_dump($FileObj);
		//echo exec('whoami');
	    //$tmp_name = basename($FileObj[0]["image"]["name"]);
        $fileNameOnServer = bin2hex(random_bytes(5))."_".$FileObj['image']['name'];
        move_uploaded_file($FileObj['image']['tmp_name'],$UpLoadDir."/".$fileNameOnServer);

        return $UpLoadDir."/".$fileNameOnServer;

}

function CreateToken() {
    $cipher = "aes-128-gcm";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $key = gethostname();
    $UniqId = bin2hex(random_bytes(32));
    //echo "UniqId $UniqID<br/>";
    $ciphertext = openssl_encrypt($UniqId, $cipher, $key, $options=0, $iv, $tag);
    return [$ciphertext, $cipher, $iv, $tag];
}
function DecryptToken($TokenToValidate) {
    return openssl_decrypt($TokenToValidate[0], $TokenToValidate[1], gethostname(),
        $options=0, $TokenToValidate[2], $TokenToValidate[3]);
}
        
