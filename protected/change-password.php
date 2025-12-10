<?php
session_start();
require "../database-config.php";

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}

$msg = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old = $_POST["old"];
    $new = password_hash($_POST["new"], PASSWORD_DEFAULT);

    $u = $_SESSION["user"];
    $res = mysqli_query($conn, "SELECT * FROM usersss WHERE username='$u'");
    $row = mysqli_fetch_assoc($res);

    if (!password_verify($old, $row["password"])) {
        $msg = "Old password incorrect.";
    } else {
        mysqli_query($conn, "UPDATE usersss SET password='$new' WHERE username='$u'");
        $msg = "Password changed!";
        $success = true;
    }
}
?>

<?php include "../navbar.php"; ?>

<div class="container">
    <h2>Change Password</h2>

    <form method="POST">
        <input type="password" name="old" placeholder="Old password" required>
        <input type="password" name="new" placeholder="New password" required>
        <button type="submit">Update Password</button>
    </form>

    <p class="<?php echo $success ? 'success' : 'message'; ?>"><?php echo $msg; ?></p>
</div>
