<?php 
include 'database-config.php';

if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email already exists
    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($res->num_rows > 0){
        echo "<p style='color:red;'>This email is already registered!</p>";
    } else {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $conn->query("INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')");
        header("Location: login.php");
        exit;
    }
}
?>
<link rel="stylesheet" href="style.css">
<div class="container card">
<h2>Sign Up</h2>
<form method="POST">
<input name="name" placeholder="Name" required>
<input name="email" type="email" placeholder="Email" required>
<input name="password" type="password" placeholder="Password" required>
<button>Create Account</button>
</form>
<p>Already have an account? <a href="login.php">Login</a></p>
</div>
