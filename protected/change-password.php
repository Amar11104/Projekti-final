<?php
include 'database-config.php';
include 'navbar.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

if($_POST){
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];

    $user = $_SESSION['user'];
    $res = $conn->query("SELECT password FROM users WHERE id=".$user['id']);
    $u = $res->fetch_assoc();

    if(password_verify($current, $u['password'])){
        $hash = password_hash($new, PASSWORD_DEFAULT);
        $conn->query("UPDATE users SET password='$hash' WHERE id=".$user['id']);
        echo "<p style='color:green;'>Password changed successfully!</p>";
    } else {
        echo "<p style='color:red;'>Current password is incorrect.</p>";
    }
}
?>
<link rel="stylesheet" href="style.css">
<div class="container card">
<h2>Change Password</h2>
<form method="POST">
<input type="password" name="current_password" placeholder="Current Password" required>
<input type="password" name="new_password" placeholder="New Password" required>
<button>Change Password</button>
</form>
</div>
<?php include 'footer.php'; ?>
