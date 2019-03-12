<?php
session_start();
include "dbconnect.php";
include "header.php";

if (empty($_SESSION)) {
    echo "Get the hell out from this page";
} else {
    echo "<h4>Welcome back, ".$_SESSION['username'].".</h4>
    <form method='post'>
        <input type='hidden' name='logout' value='123'>
        <button type='submit' class='btn btn-primary' name='any'>Logout</button>
    </form>
    <br>";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['logout']))) {
        session_unset();
        header("location: login.php");
    }

if ($_SESSION['role'] === 'admin') {
$SQL = $connection->prepare('SELECT id, username, role FROM users');
$SQL->execute();
$result = $SQL->fetchAll();

echo "<table class='table'>
        <thead class='thead-dark'>
        <tr>
            <th scope='col'>username</th>
            <th scope='col'>role</th>
            <th scope='col'>change role</th>
            <th scope='col'>delete user</th>
        </tr>
        </thead>
        <tbody>";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['chosen_role'] !== 'Choose...') {
        print_r($_POST);
        $SQL = $connection->prepare('UPDATE users SET role =:Role WHERE id =:Id');
        $SQL->bindParam(':Role', $_POST['chosen_role'], PDO::PARAM_STR);
        $SQL->bindParam(':Id', $_POST['id'], PDO::PARAM_INT);
        $SQL->execute();
        header("location: admin.php");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['add_role'] !== 'Choose...') {
        print_r($_POST);
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $SQL = $connection->prepare('INSERT INTO users (username, password, role) VALUES (:NewName, :NewPass, :NewRole)');
        $SQL->bindParam(':NewRole', $_POST['add_role'], PDO::PARAM_STR);
        $SQL->bindParam(':NewName', $_POST['add_name'], PDO::PARAM_STR);
        $SQL->bindParam(':NewPass', $hash, PDO::PARAM_STR);
        $SQL->execute();
        header("location: admin.php");
    }
foreach ($result as $value) {
    //echo "<h2>".$value['username']."</h2>";
    ?>
        <tr>
            <td>
                <?php echo $value['username']; ?>
            </td>
            <td>
                <?php echo $value['role']; ?>
            </td>
            <td>
                <form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post' >
                    <div class="row align-items-center">
                        <div class='custom-control custom-checkbox my-1 mr-sm-2' id='change_role'>
                        <select class="custom-select mr-sm-2" name="chosen_role">
                            <option selected>Choose...</option>
                            <option value="admin">admin</option>
                            <option value="content_editor">content_editor</option>
                            <option value="reader">reader</option>
                        </select>
                        <button type='submit' class='btn btn-primary my-1' name="id" value='<?php echo $value['id']; ?>'>Change</button>
                        </div>
                    </div>
                </form>
            </td>
            <td>
                <?php echo "<a href='delete_user.php?deleteId=".$value['id']."'>delete</a>"; ?>

            </td>
        </tr>

<?php
}
echo "
    </tbody>
    </table>";
    echo "<h4>Add new user:</h4>
        <form action='".$_SERVER['PHP_SELF']."' method='post'>
            <div class='form-group'>
            <label for='name'>User name:</label>
            <input type='text' name='add_name' class='form-control'>
            <label for='password'>User password:</label>
            <input type='password' name='password' class='form-control'>
            <label for='role'>User role:</label>
            <select class='form-control custom-select mr-sm-2' name='add_role'>
                            <option selected>Choose...</option>
                            <option value='admin'>admin</option>
                            <option value='content_editor'>content_editor</option>
                            <option value='reader'>reader</option>
                        </select>
            </div>
            <button type='submit' class='btn btn-primary'>Add user</button>
        </form>";

}
}
