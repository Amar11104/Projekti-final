<?php include "navbar.php"; ?>

<?php
session_start();
require "database-config.php";

$msg = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM usersss WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        $msg = "Username already exists!";
    } else {
        $query = "INSERT INTO usersss (username, password) VALUES ('$username', '$password')";
        mysqli_query($conn, $query);
        $msg = "Account created!";
        $success = true;
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Create Account</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Enter username" required>
        <input type="password" name="password" placeholder="Enter password" required>
        <button type="submit">Sign Up</button>
    </form>

    <p class="<?php echo $success ? 'success' : 'message'; ?>"><?php echo $msg; ?></p>

    <a href="login.php">Login instead</a>
</div>
