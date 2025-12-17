<?php
include 'database-config.php';
include 'navbar.php';

// Make sure user is logged in
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Update user in database
    $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $user['id']);
    $stmt->execute();
    $stmt->close();

    // Update session data
    $_SESSION['user']['name'] = $name;
    $_SESSION['user']['email'] = $email;

    echo "<p style='color:green;'>Profile updated successfully!</p>";
}
?>
<link rel="stylesheet" href="style.css">
<div class="container card">
<h2>Profile</h2>
<form method="POST">
<input name="name" value="<?= $user['name'] ?>" placeholder="Name" required>
<input name="email" type="email" value="<?= $user['email'] ?>" placeholder="Email" required>
<button>Update Profile</button>
</form>
</div>
<?php include 'footer.php'; ?>
