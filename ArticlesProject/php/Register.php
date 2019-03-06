<?php
include 'dbconnect.php';
include 'functions.php';
include 'header.php';

$username_err = '';
$password_err = '';

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $errorMessage = "Blya";
            echo $errorMessage;
        }
    }
    if ($_POST['password'] != $_POST['confirm_password']) {
        $errorMessage = "Blya should be Blya";
        echo $errorMessage;
    }

    //FillIn SQL with the Bind params :USERNAME
    $SQL = $connection->prepare('INSERT INTO users (username, password) VALUES (:USERNAME, :PASSWORD)');
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $SQL->bindParam(':USERNAME', $_POST['username'], PDO::PARAM_STR);
    $SQL->bindParam(':PASSWORD', $hash, PDO::PARAM_STR);
    $SQL->execute();

    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION['id'] = $result['id'];
    $_SESSION['username'] = $result['username'];
    header('Location: list.php');
}
include 'header.php';

?>
    <div class="wrapper">
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
                <a href="login.php">Go back to login page</a>
            </div>
        </form>
    </div>