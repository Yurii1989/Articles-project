<?php 
include 'dbconnect.php';

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 
	//FillIn SQL with the Bind params :USERNAME
	$SQL = $connection->prepare('');
	$SQL->bindParam(':USERNAME', $_POST[username], PDO::PARAM_STR);
	$SQL->execute();
	$result = $SQL->fetch();       
	if($result[username]) {
		  if(password_verify($_POST[password], $result[password])){
                            // Password is correct, so start a new session
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = 
                         
                           
                            // Redirect user to welcome page
                            header("location: list.php");		
						}
	                     else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }

}
}
include 'header.php';

?>
    <div class="wrapper">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>    
