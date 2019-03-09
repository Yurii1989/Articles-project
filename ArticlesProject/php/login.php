<?php 
include 'dbconnect.php';
include "header.php";
$password_err = '';
$username_err = '';
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 
	//FillIn SQL with the Bind params :USERNAME
	$SQL = $connection->prepare('SELECT id, username, password, role FROM users WHERE `username` = :USERNAME');
	$SQL->bindParam(':USERNAME', $_POST['username'], PDO::PARAM_STR);
	$SQL->execute();
	$result = $SQL->fetch();
	if($result['username']) {
		  if(password_verify($_POST['password'], $result['password'])){
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION['id'] = $result['id'];
                            $_SESSION['username'] = $result['username'];
                            $_SESSION['role'] = $result['role'];
                            // Redirect user to welcome page
                            //In case it's admin send him to admin console
                            if ($_SESSION['role'] === 'admin') {
                                header("location: admin.php");
                            } else {
                                header("location: list.php");
                            }
						}
	                     else {
                            // store an error message in variable if password is not valid
                            $password_err = "The password you entered is not valid.";
                        }

} else {
        // store an error message in variable if username does not exist
	    $username_err = 'Username does not exist';
    }
}

?>
<body class="imgview" style="height: 1000px;" background="../storage/jpg.jpg">
    <div style="width: 50%;" class="bgtext">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
                <h5 style="color: red"><?php echo $username_err; ?></h5>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <h5 style="color: red"><?php echo $password_err; ?></h5>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
                <div class="links"><a href="register.php">Register</a></div>
            </div>
        </form>
    </div>    
