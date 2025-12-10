<?php include "navbar.php"; ?>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "my_project_db"; // change if needed

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
