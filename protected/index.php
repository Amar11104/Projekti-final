<?php
include 'database-config.php';

if (isset($_SESSION['user'])) {
    header("Location: home.php");
} else {
    header("Location: public/landing.php");
}
exit;
?>
