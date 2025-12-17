<?php
include '../database-config.php';
include '../navbar.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT * FROM bookings WHERE id=$id");
    $booking = $res->fetch_assoc();
}

if($_POST){
    $date = $_POST['booking_date'];
    $time = $_POST['booking_time'];
    $guests = $_POST['guests'];
    $note = $_POST['note'];
    $paid = isset($_POST['paid']) ? 1 : 0;

    $stmt = $conn->prepare("UPDATE bookings SET booking_date=?, booking_time=?, guests=?, note=?, paid=? WHERE id=?");
    $stmt->bind_param("ssisii", $date, $time, $guests, $note, $paid, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: list.php");
}
?>
<link rel="stylesheet" href="../style.css">
<div class="container card">
<h2>Edit Booking</h2>
<form method="POST">
    <input type="date" name="booking_date" value="<?= $booking['booking_date'] ?>" required>
    <input type="time" name="booking_time" value="<?= $booking['booking_time'] ?>" required>
    <input type="number" name="guests" value="<?= $booking['guests'] ?>" required>
    <textarea name="note"><?= $booking['note'] ?></textarea>
    <label><input type="checkbox" name="paid" <?= $booking['paid'] ? 'checked' : '' ?>> Paid</label>
    <button>Update Booking</button>
</form>
</div>
<?php include '../footer.php'; ?>
