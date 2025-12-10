<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
    exit();
}

include "../navbar.php";
require "../database-config.php";

// Count total business items
$res = mysqli_query($conn, "SELECT COUNT(*) AS total FROM business_items");
$row = mysqli_fetch_assoc($res);
$totalItems = $row['total'];
?>

<div style="padding:50px; display:flex; flex-wrap:wrap; justify-content:space-around;">

    <div class="card" style="flex:1; min-width:250px;">
        <h3>Total Products</h3>
        <p style="font-size:30px; font-weight:bold;"><?php echo $totalItems; ?></p>
    </div>

    <div class="card" style="flex:1; min-width:250px;">
        <h3>Logged In User</h3>
        <p style="font-size:24px;"><?php echo $_SESSION["user"]; ?></p>
    </div>

    <div class="card" style="flex:1; min-width:250px;">
        <h3>Quick Actions</h3>
        <p><a href="change-password.php"><button>Change Password</button></a></p>
        <p><a href="business/list.php"><button>Manage Products</button></a></p>
    </div>

</div>
