<?php include '../database-config.php';
if($_SESSION['user']['role']!='admin') die("Access denied");
$res=$conn->query("SELECT u.name,b.* FROM bookings b JOIN users u ON u.id=b.user_id");
?>
<link rel="stylesheet" href="../style.css">
<div class="container">
<h2>All Bookings</h2>
<table>
<?php while($b=$res->fetch_assoc()): ?>
<tr>
<td><?= $b['name'] ?></td>
<td><?= $b['booking_date'] ?></td>
<td><?= $b['guests'] ?></td>
</tr>
<?php endwhile; ?>
</table>
</div>
