<?php
include '../database-config.php';
include '../navbar.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

if($_POST){
    $user_id = $_SESSION['user']['id'];
    $date = $_POST['booking_date'];
    $time = $_POST['booking_time'];
    $guests = $_POST['guests'];
    $note = $_POST['note'];

  

    $stmt = $conn->prepare("INSERT INTO bookings(user_id, booking_date, booking_time, guests, note) VALUES(?,?,?,?,?)");
$stmt->bind_param("issis", $user_id, $date, $time, $guests, $note);
$stmt->execute();
$booking_id = $stmt->insert_id; // get the inserted booking ID
$stmt->close();

$total = $guests * 20; // $20 per guest

// Send booking confirmation email
$stmt = $conn->prepare("INSERT INTO bookings(user_id, booking_date, booking_time, guests, note) VALUES(?,?,?,?,?)");
$stmt->bind_param("issis", $user_id, $date, $time, $guests, $note);
$stmt->execute();
$booking_id = $stmt->insert_id; // get booking ID
$stmt->close();

// Redirect to fake payment page
header("Location: pay.php?id=$booking_id");
exit;





    echo "<p style='color:green;'>Booking created successfully! A confirmation email has been sent.</p>";
}
?>
<link rel="stylesheet" href="../style.css">
<div class="container card">
<h2>Book a Table</h2>
<form method="POST">
    <input type="date" name="booking_date" required>
    <input type="time" name="booking_time" required>
    <input type="number" name="guests" placeholder="Number of guests" required>
    <textarea name="note" placeholder="Special requests"></textarea>
    <button>Reserve</button>
</form>
</div>
<?php include '../footer.php'; ?>
