<?php
include '../database-config.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM bookings WHERE id=$id")->fetch_assoc();

if ($_POST) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];

    $conn->query("UPDATE bookings SET
      booking_date='$date',
      booking_time='$time',
      guests='$guests'
      WHERE id=$id");

    header("Location: bookings.php");
}
?>

<link rel="stylesheet" href="../style.css">

<div class="container card">
<h2>Edit Booking</h2>

<form method="POST">
<input type="date" name="date" value="<?= $data['booking_date'] ?>" required>
<input type="time" name="time" value="<?= $data['booking_time'] ?>" required>
<input type="number" name="guests" value="<?= $data['guests'] ?>" required>
<button>Update</button>
</form>
</div>
