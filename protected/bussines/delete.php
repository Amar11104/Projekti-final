<?php
session_start();
require "../../database-config.php";
if (!isset($_SESSION["user"])) header("Location: ../login.php");

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM business_items WHERE id=$id");
header("Location: list.php");
exit();
