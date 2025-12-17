<?php
include 'database-config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
$userId = $user['id'];

/* USER STATS */
$myBookings = $conn->query("SELECT COUNT(*) c FROM bookings WHERE user_id=$userId")->fetch_assoc()['c'];

/* ADMIN STATS */
if ($user['role'] === 'admin') {
    $totalBookings = $conn->query("SELECT COUNT(*) c FROM bookings")->fetch_assoc()['c'];
    $paidBookings  = $conn->query("SELECT COUNT(*) c FROM bookings WHERE paid=1")->fetch_assoc()['c'];
    $unpaidBookings= $conn->query("SELECT COUNT(*) c FROM bookings WHERE paid=0")->fetch_assoc()['c'];
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Dashboard</h1>
    <p style="opacity:0.8;">Welcome back, <b><?= htmlspecialchars($user['name']) ?></b></p>

    <!-- STATS -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;margin-top:30px;">
        <div class="card">
            <h3>📅 My Bookings</h3>
            <h1><?= $myBookings ?></h1>
        </div>

        <?php if ($user['role'] === 'admin'): ?>
        <div class="card">
            <h3>📋 Total Bookings</h3>
            <h1><?= $totalBookings ?></h1>
        </div>

        <div class="card">
            <h3>💰 Paid</h3>
            <h1><?= $paidBookings ?></h1>
        </div>

        <div class="card">
            <h3>⏳ Unpaid</h3>
            <h1><?= $unpaidBookings ?></h1>
        </div>
        <?php endif; ?>
    </div>

    <!-- USER CRUD -->
    <div class="card" style="margin-top:40px;">
        <h2>📅 My Bookings (CRUD)</h2>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:15px;margin-top:20px;">
            <a href="bussines/create.php"><button>➕ Create Booking</button></a>
            <a href="bussines/list.php"><button>📋 View / Edit / Delete</button></a>
        </div>
    </div>

    <!-- ADMIN CRUD -->
    <?php if ($user['role'] === 'admin'): ?>
    <div class="card" style="margin-top:30px;">
        <h2>🛠 Admin CRUD</h2>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:15px;margin-top:20px;">
            <a href="admin/bookings.php"><button>📋 All Bookings</button></a>
            <a href="admin/create.php"><button>➕ Create Booking</button></a>
            <a href="admin/dashboard.php"><button>📊 Admin Panel</button></a>
        </div>
    </div>
    <?php endif; ?>
<?php
$chartData = $conn->query("
  SELECT booking_date, COUNT(*) total 
  FROM bookings 
  GROUP BY booking_date 
  ORDER BY booking_date DESC 
  LIMIT 7
");
$labels = [];
$values = [];
while ($row = $chartData->fetch_assoc()) {
    $labels[] = $row['booking_date'];
    $values[] = $row['total'];
}
?>

<div class="card" style="margin-top:40px;">
  <h2>📈 Bookings (Last 7 Days)</h2>
  <canvas id="bookingChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('bookingChart'), {
  type: 'line',
  data: {
    labels: <?= json_encode($labels) ?>,
    datasets: [{
      label: 'Bookings',
      data: <?= json_encode($values) ?>,
      borderWidth: 2
    }]
  }
});
</script>

    <!-- ACCOUNT -->
    <div class="card" style="margin-top:30px;">
        <h2>👤 Account</h2>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:15px;margin-top:20px;">
            <a href="profile.php"><button>Profile</button></a>
            <a href="change-password.php"><button>Change Password</button></a>
            <a href="logout.php">
                <button style="background:#b33;color:white;">🚪 Logout</button>
            </a>
        </div>
    </div>
</div>
