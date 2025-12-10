<?php
session_start();
?>

<div class="navbar">
    <div class="logo">
        <a href="/Projekti-final/index.php" style="font-weight:bold; font-size:20px;">My Business</a>
    </div>
    <div class="links">
        <a href="/Projekti-final/index.php">Home</a>

        <?php if(isset($_SESSION['user'])): ?>
            <a href="/Projekti-final/protected/dashboard.php">Dashboard</a>
            <a href="/Projekti-final/protected/business/list.php">Business</a>
            <a href="/Projekti-final/protected/profile.php">Profile</a>
            <a href="/Projekti-final/logout.php">Sign Out</a>
        <?php else: ?>
            <a href="/Projekti-final/login.php">Login</a>
            <a href="/Projekti-final/signup.php">Sign Up</a>
        <?php endif; ?>
    </div>
</div>
