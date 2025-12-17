<?php
include '../database-config.php';

if($_POST){
  $name = $_POST['name'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $guests = $_POST['guests'];
  $note = $_POST['note'];

  $conn->query("INSERT INTO bookings 
    (user_name, booking_date, booking_time, guests, note)
    VALUES ('$name','$date','$time','$guests','$note')");

  header("Location: bookings.php");
}
?>
<link rel="stylesheet" href="../style.css">

<div class="container card">
<h2>Create Booking</h2>

<form method="POST">
<input name="name" placeholder="Customer Name" required>
<input type="date" name="date" required>
<input type="time" name="time" required>
<input type="number" name="guests" placeholder="Guests" required>
<textarea name="note" placeholder="Note"></textarea>
<button>Create</button>
</form>
</div>
