<?php include 'database-config.php'; include 'navbar.php'; ?>
<link rel="stylesheet" href="style.css">
<div class="container">
<h2>Dashboard</h2>
<p>Welcome <?= $_SESSION['user']['name'] ?></p>
<?php if($_SESSION['user']['role']=='admin'): ?>
<a href="admin/bookings.php">Admin Panel</a>
<?php endif; ?>
</div>
