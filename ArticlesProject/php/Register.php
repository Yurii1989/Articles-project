<?php
include 'dbconnect.php';
include 'functions.php';
include 'header.php';

$username_err = '';
$password_err = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username'])) {
        $errorMessage = "You forgot to type Username";
        echo $errorMessage;
    } else if (empty($_POST['password'])) {
        $errorMessage = "You forgot to type Password";
        echo $errorMessage;
    } else if (empty($_POST['confirm_password'])) {
        $errorMessage = "You forgot to confirm Password";
        echo $errorMessage;
    } else {
        if ($_POST['password'] != $_POST['confirm_password']) {
            $errorMessage = "Password does not match Confirm Password";
            echo $errorMessage;
        } else {
            $reader = "reader";
            //FillIn SQL with the Bind params :USERNAME
            $SQL = $connection->prepare('INSERT INTO users (username, password, role) VALUES (:USERNAME, :PASSWORD, :USERROLE)');
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $SQL->bindParam(':USERNAME', $_POST['username'], PDO::PARAM_STR);
            $SQL->bindParam(':PASSWORD', $hash, PDO::PARAM_STR);
            $SQL->bindParam(':USERROLE', $reader, PDO::PARAM_STR);
            $SQL->execute();

            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['role'] = $reader;
            header('Location: list.php');
        }
            include 'header.php';
    }
}
?>
<body class="imgview" style="height: 1000px;" background="../storage/jpg.jpg">
<div style="width: 50%;" class="bgtext">
        <h2>Register</h2>
        <form action="" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
                <h5 style="color: red"><?php echo $username_err; ?></h5>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="REGISTER">
                <div class="links"><a href="login.php"><< Go back to login page</a></div>
            </div>
        </form>
    </div>
