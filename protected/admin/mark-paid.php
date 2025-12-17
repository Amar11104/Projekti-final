<?php
include '../database-config.php';

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
    header("Location: ../login.php");
    exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn->query("UPDATE bookings SET paid=1 WHERE id=$id");
}

header("Location: dashboard.php");
exit;
?>
