<?php
include '../database-config.php';
$id = $_GET['id'];

$data = $conn->query("SELECT * FROM bookings WHERE id=$id")->fetch_assoc();

if($_POST){
  $name=$_POST['name'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $guests=$_POST['guests'];
  $note=$_POST['note'];

  $conn->query("UPDATE bookings SET
    user_name='$name',
    booking_date='$date',
    booking_time='$time',
    guests='$guests',
    note='$note'
    WHERE id=$id");

  header("Location: bookings.php");
}
?>
<link rel="stylesheet" href="../style.css">

<div class="container card">
<h2>Edit Booking</h2>

<form method="POST">
<input name="name" value="<?= $data['user_name'] ?>">
<input type="date" name="date" value="<?= $data['booking_date'] ?>">
<input type="time" name="time" value="<?= $data['booking_time'] ?>">
<input type="number" name="guests" value="<?= $data['guests'] ?>">
<textarea name="note"><?= $data['note'] ?></textarea>
<button>Update</button>
</form>
</div>
