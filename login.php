<?php include "navbar.php"; ?>

<?php
session_start();
require "database-config.php";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"];

    $res = mysqli_query($conn, "SELECT * FROM usersss WHERE username='$username'");
    if (mysqli_num_rows($res) === 1) {
        $row = mysqli_fetch_assoc($res);

        if (password_verify($password, $row["password"])) {
            $_SESSION["user"] = $row["username"];
            header("Location: protected/home.php");
            exit();
        } else {
            $msg = "Wrong password.";
        }
    } else {
        $msg = "User not found.";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Login</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button>Login</button>
    </form>

    <p class="message"><?php echo $msg; ?></p>

    <a href="signup.php">Create account</a>
</div>
