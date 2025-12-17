<?php
include '../database-config.php';
include '../navbar.php';

if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
    header("Location: ../login.php");
    exit;
}

$res = $conn->query("SELECT b.*, u.name, u.email FROM bookings b JOIN users u ON b.user_id = u.id ORDER BY b.created_at DESC");
$price_per_guest = 20;
?>

<link rel="stylesheet" href="../style.css">
<div class="container">
<h1>Admin Dashboard</h1>

<?php while($b = $res->fetch_assoc()){ 
    $total = $b['guests'] * $price_per_guest;
?>
<div class="card">
    <p><strong>User:</strong> <?= $b['name'] ?> (<?= $b['email'] ?>)</p>
    <p><strong>Date:</strong> <?= $b['booking_date'] ?> at <?= $b['booking_time'] ?></p>
    <p><strong>Guests:</strong> <?= $b['guests'] ?></p>
    <p><strong>Total Price:</strong> $<?= $total ?></p>
    <p><strong>Note:</strong> <?= $b['note'] ?></p>
    <p><strong>Status:</strong> <?= $b['paid'] ? 'Paid ✅' : 'Not Paid ❌' ?></p>
    <?php if(!$b['paid']){ ?>
        <a href="mark-paid.php?id=<?= $b['id'] ?>"><button>Mark Paid</button></a>
    <?php } ?>
</div>
<?php } ?>

</div>
<?php include '../footer.php'; ?>
