<?php include "navbar.php"; ?>

<?php
$theme = isset($_COOKIE["theme"]) && $_COOKIE["theme"] === "dark" ? "light" : "dark";
setcookie("theme", $theme, time() + 86400 * 30, "/");
header("Location: protected/home.php");
exit();
?>
