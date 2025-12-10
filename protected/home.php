<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}
include "../navbar.php";
?>

<div class="container">
    <h2>Welcome, <?php echo $_SESSION["user"]; ?>!</h2>
    <p>You are successfully logged in.</p>
</div>
