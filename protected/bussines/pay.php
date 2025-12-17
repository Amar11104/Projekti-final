<?php
include '../database-config.php';
include '../navbar.php';

if(!isset($_SESSION['user'])){
    header("Location: ../login.php");
    exit;
}

if(!isset($_GET['id'])){
    header("Location: ../home.php");
    exit;
}

$booking_id = $_GET['id'];

// Get booking details
$res = $conn->query("SELECT * FROM bookings WHERE id=$booking_id AND user_id=".$_SESSION['user']['id']);
$booking = $res->fetch_assoc();

if(!$booking){
    echo "<p>Booking not found.</p>";
    exit;
}

$price_per_guest = 20;
$total = $booking['guests'] * $price_per_guest;

// If form submitted, mark booking as paid
if($_POST){
    // Here you can validate card number if you want
    $card_number = $_POST['card_number']; // just for demo
    $conn->query("UPDATE bookings SET paid=1 WHERE id=$booking_id");

    // Redirect to home after payment
    header("Location: ../home.php");
    exit;
}
?>

<link rel="stylesheet" href="../style.css">
<div class="container card">
<h2>Payment</h2>
<p><strong>Booking Date:</strong> <?= $booking['booking_date'] ?> at <?= $booking['booking_time'] ?></p>
<p><strong>Guests:</strong> <?= $booking['guests'] ?></p>
<p><strong>Total:</strong> $<?= $total ?></p>

<form method="POST">
<input type="text" name="card_number" placeholder="Card Number" required>
<input type="text" name="card_name" placeholder="Cardholder Name" required>
<input type="text" name="expiry" placeholder="MM/YY" required>
<input type="text" name="cvv" placeholder="CVV" required>
<button>Pay $<?= $total ?></button>
</form>
</div>

<?php include '../footer.php'; ?>
