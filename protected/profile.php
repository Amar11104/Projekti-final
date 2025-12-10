<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}
include "../navbar.php";
?>

<div class="container">
    <h2>Profile</h2>
    <p><b>Username:</b> <?php echo $_SESSION["user"]; ?></p>
    <p><b>Status:</b> Active User</p>
</div>
